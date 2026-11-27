<?php

namespace Tests\Feature;

use App\Mail\ContactMail;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;
use Tests\TestCase;

class BrevoTransportTest extends TestCase
{
    /**
     * @return array<string, string>
     */
    private function contactData(): array
    {
        return [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ];
    }

    private function useBrevoMailer(): void
    {
        config([
            'mail.default' => 'brevo',
            'mail.mailers.brevo.key' => 'brevo-test-key',
            'mail.from.address' => 'owner@example.com',
            'mail.from.name' => 'Angga',
        ]);

        // Mailers are cached once resolved, so drop anything built earlier.
        Mail::forgetMailers();
    }

    public function test_brevo_transport_posts_the_message_to_the_api(): void
    {
        Http::fake([
            'api.brevo.com/*' => Http::response(['messageId' => '<abc@brevo>'], 201),
        ]);

        $this->useBrevoMailer();

        Mail::to('owner@example.com')->send(new ContactMail($this->contactData()));

        Http::assertSent(function (Request $request): bool {
            return $request->url() === 'https://api.brevo.com/v3/smtp/email'
                && $request->method() === 'POST'
                && $request->hasHeader('api-key', 'brevo-test-key')
                && $request['sender']['email'] === 'owner@example.com'
                && $request['to'][0]['email'] === 'owner@example.com'
                && $request['subject'] === '[Portfolio] Pesan dari Portofolio Web — dari Budi Santoso'
                && $request['replyTo']['email'] === 'budi@example.com'
                && str_contains((string) $request['htmlContent'], 'Budi Santoso');
        });
    }

    public function test_brevo_transport_throws_when_the_api_rejects_the_message(): void
    {
        Http::fake([
            'api.brevo.com/*' => Http::response(['message' => 'Sender not verified'], 400),
        ]);

        $this->useBrevoMailer();

        $this->expectException(TransportException::class);

        Mail::to('owner@example.com')->send(new ContactMail($this->contactData()));
    }

    public function test_brevo_transport_reports_a_missing_api_key_clearly(): void
    {
        Http::fake();

        config([
            'mail.default' => 'brevo',
            'mail.mailers.brevo.key' => '',
            'mail.from.address' => 'owner@example.com',
        ]);

        Mail::forgetMailers();

        $this->expectException(TransportException::class);
        $this->expectExceptionMessage('BREVO_API_KEY is empty');

        Mail::to('owner@example.com')->send(new ContactMail($this->contactData()));

        Http::assertNothingSent();
    }
}
