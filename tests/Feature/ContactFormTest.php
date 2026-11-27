<?php

namespace Tests\Feature;

use App\Mail\ContactAutoReply;
use App\Mail\ContactMail;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_contact_page_renders_the_form(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Kirim Pesan Langsung')
            ->assertSee(config('mail.owner.address'));
    }

    public function test_message_is_sent_to_the_owner_address(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ])->assertRedirect(route('home').'#kontak');

        Mail::assertSent(ContactMail::class, function (ContactMail $mail) {
            return $mail->hasTo(config('mail.owner.address'))
                && $mail->hasReplyTo('budi@example.com');
        });
    }

    public function test_auto_reply_is_sent_to_the_sender(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ])->assertRedirect(route('home').'#kontak');

        Mail::assertSent(ContactAutoReply::class, function (ContactAutoReply $mail) {
            return $mail->hasTo('budi@example.com')
                && $mail->hasReplyTo(config('mail.owner.address'));
        });
    }

    public function test_auto_reply_is_skipped_when_the_sender_is_the_owner(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'name' => 'Angga',
            'email' => config('mail.owner.address'),
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Menguji form kontak milik sendiri.',
        ])->assertRedirect(route('home').'#kontak');

        Mail::assertSent(ContactMail::class);
        Mail::assertNotSent(ContactAutoReply::class);
    }

    public function test_a_failed_auto_reply_does_not_hide_the_success(): void
    {
        $pending = \Mockery::mock(PendingMail::class);
        $pending->shouldReceive('send')->andReturnUsing(function ($mailable) {
            if ($mailable instanceof ContactAutoReply) {
                throw new \RuntimeException('auto-reply down');
            }

            return null;
        });

        Mail::shouldReceive('to')->andReturn($pending);

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ])->assertRedirect(route('home').'#kontak')
            ->assertSessionHas('success')
            ->assertSessionMissing('error');
    }

    public function test_success_message_is_flashed_after_sending(): void
    {
        Mail::fake();

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ])->assertSessionHas('success');

        $this->get('/')->assertSee('Pesan berhasil dikirim');
    }

    public function test_message_requires_the_expected_fields(): void
    {
        Mail::fake();

        $this->post('/contact', [])
            ->assertSessionHasErrors(['name', 'email', 'subject', 'message']);

        Mail::assertNothingSent();
    }

    public function test_a_failed_delivery_shows_an_error_instead_of_crashing(): void
    {
        Mail::shouldReceive('to')->andThrow(new \RuntimeException('SMTP down'));

        $this->post('/contact', [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pesan dari Portofolio Web',
            'message' => 'Halo, saya ingin membuat website untuk usaha saya.',
        ])->assertRedirect(route('home').'#kontak')
            ->assertSessionHas('error');
    }
}
