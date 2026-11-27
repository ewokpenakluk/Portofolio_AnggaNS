<?php

namespace App\Mail\Transport;

use Illuminate\Http\Client\Factory as HttpFactory;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\SentMessage;
use Symfony\Component\Mailer\Transport\AbstractTransport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\MessageConverter;

/**
 * Delivers mail through Brevo's HTTP API instead of SMTP.
 *
 * Serverless hosts such as Vercel run on infrastructure that commonly filters
 * outbound SMTP ports, so a Gmail SMTP connection is unreliable there. The API
 * travels over HTTPS and therefore works from any environment.
 *
 * @see https://developers.brevo.com/reference/sendtransacemail
 */
class BrevoApiTransport extends AbstractTransport
{
    public function __construct(
        protected HttpFactory $http,
        protected string $apiKey,
        protected string $endpoint = 'https://api.brevo.com/v3/smtp/email',
    ) {
        parent::__construct();
    }

    protected function doSend(SentMessage $message): void
    {
        // A missing key produces Brevo's vague "authentication not found in
        // headers", so fail with an actionable message instead.
        if ($this->apiKey === '') {
            throw new TransportException(
                'BREVO_API_KEY is empty. Set it in the environment and redeploy.',
            );
        }

        $email = MessageConverter::toEmail($message->getOriginalMessage());

        if (! $email instanceof Email) {
            throw new TransportException('The Brevo transport only supports email messages.');
        }

        $response = $this->http
            ->withHeaders([
                'api-key' => $this->apiKey,
                'accept' => 'application/json',
            ])
            ->asJson()
            ->post($this->endpoint, $this->payload($email, $message->getEnvelope()));

        if ($response->failed()) {
            throw new TransportException(sprintf(
                'Brevo rejected the message (HTTP %d): %s',
                $response->status(),
                $response->body(),
            ));
        }

        $messageId = $response->json('messageId');

        if (is_string($messageId) && $messageId !== '') {
            $message->setMessageId($messageId);
        }
    }

    public function __toString(): string
    {
        return 'brevo';
    }

    /**
     * @return array<string, mixed>
     */
    protected function payload(Email $email, Envelope $envelope): array
    {
        $payload = [
            'sender' => $this->formatAddress($envelope->getSender()),
            'to' => $this->formatAddresses($email->getTo()),
            'subject' => (string) $email->getSubject(),
        ];

        if ($replyTo = $email->getReplyTo()) {
            $payload['replyTo'] = $this->formatAddress($replyTo[0]);
        }

        if ($cc = $email->getCc()) {
            $payload['cc'] = $this->formatAddresses($cc);
        }

        if ($bcc = $email->getBcc()) {
            $payload['bcc'] = $this->formatAddresses($bcc);
        }

        if ($text = $email->getTextBody()) {
            $payload['textContent'] = $text;
        }

        if ($html = $email->getHtmlBody()) {
            $payload['htmlContent'] = $html;
        }

        return $payload;
    }

    /**
     * @param  list<Address>  $addresses
     * @return list<array{email: string, name?: string}>
     */
    protected function formatAddresses(array $addresses): array
    {
        return array_map($this->formatAddress(...), $addresses);
    }

    /**
     * @return array{email: string, name?: string}
     */
    protected function formatAddress(Address $address): array
    {
        $formatted = ['email' => $address->getAddress()];

        if ($name = $address->getName()) {
            $formatted['name'] = $name;
        }

        return $formatted;
    }
}
