@component('mail::message')
# Pesan Baru dari Portfolio 🚀

Ada pesan baru masuk dari **{{ $name }}** melalui form kontak portfolio kamu.

---

**Nama:** {{ $name }}
**Email:** {{ $email }}
**Subjek:** {{ $subject }}

**Pesan:**
{{ $msg }}

---

@component('mail::button', ['url' => 'mailto:' . $email, 'color' => 'success'])
Balas ke {{ $name }}
@endcomponent

*Pesan ini dikirim otomatis dari form kontak portfolio.*

Salam,
{{ config('app.name') }}
@endcomponent
