<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: '[Portfolio] '.$this->data['subject'].' — dari '.$this->data['name'],
            replyTo: [
                new Address($this->data['email'], $this->data['name']),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact',
            with: [
                'name' => $this->data['name'],
                'email' => $this->data['email'],
                'subject' => $this->data['subject'],
                'msg' => $this->data['message'],
            ],
        );
    }
}
