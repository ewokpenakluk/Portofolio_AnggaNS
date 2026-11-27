<?php

namespace App\Http\Controllers;

use App\Mail\ContactAutoReply;
use App\Mail\ContactMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    /**
     * Kirim pesan dari form kontak ke email pemilik portofolio, lalu kirim
     * tanda terima otomatis ke pengirim.
     */
    public function send(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 2 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'subject.required' => 'Subjek wajib diisi.',
            'message.required' => 'Pesan wajib diisi.',
            'message.min' => 'Pesan minimal 10 karakter.',
        ]);

        try {
            Mail::to(config('mail.owner.address'), config('mail.owner.name'))
                ->send(new ContactMail($validated));
        } catch (Throwable $exception) {
            // The visitor only needs a friendly message; the real cause belongs
            // in the log so a broken SMTP credential is easy to diagnose.
            Log::error('Contact form delivery failed.', [
                'error' => $exception->getMessage(),
                'sender' => $validated['email'],
            ]);

            return redirect()->to(route('home').'#kontak')
                ->withInput()
                ->with('error', 'Maaf, pesan belum terkirim. Silakan coba lagi atau hubungi saya langsung via email/WhatsApp.');
        }

        $this->sendAutoReply($validated);

        return redirect()->to(route('home').'#kontak')
            ->with('success', 'Pesan berhasil dikirim! Saya akan membalas secepatnya. 🚀');
    }

    /**
     * Tanda terima untuk pengirim. Kegagalannya tidak boleh membuat pesan
     * dianggap gagal: pesan utama sudah sampai ke pemilik portofolio.
     */
    private function sendAutoReply(array $data): void
    {
        // Jangan balas ke alamat pemilik sendiri, supaya tidak terjadi
        // balasan berantai saat pemilik menguji formnya sendiri.
        if (strcasecmp($data['email'], (string) config('mail.owner.address')) === 0) {
            return;
        }

        try {
            Mail::to($data['email'], $data['name'])
                ->send(new ContactAutoReply($data));
        } catch (Throwable $exception) {
            Log::warning('Contact auto-reply failed.', [
                'error' => $exception->getMessage(),
                'recipient' => $data['email'],
            ]);
        }
    }
}
