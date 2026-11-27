<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactAutoReply extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Balasan otomatis ini dikirim ke pengunjung, jadi `replyTo` diarahkan ke
     * pemilik portofolio: kalau pengunjung menekan "Balas", pesannya langsung
     * masuk ke inbox pemilik, bukan ke alamat pengirim itu sendiri.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Terima kasih, pesan Anda sudah saya terima — '.config('mail.owner.name'),
            replyTo: [
                new Address(config('mail.owner.address'), config('mail.owner.name')),
            ],
        );
    }

    public function content(): Content
    {
        $phone = (string) config('mail.owner.phone');

        return new Content(
            markdown: 'emails.contact-auto-reply',
            with: [
                'name' => $this->data['name'],
                'subject' => $this->data['subject'],
                'msg' => $this->data['message'],
                'ownerName' => config('mail.owner.name'),
                'ownerEmail' => config('mail.owner.address'),
                'ownerPhone' => trim(chunk_split($phone, 4, ' ')),
                'ownerWhatsapp' => 'https://wa.me/62'.ltrim($phone, '0'),
            ],
        );
    }
}
