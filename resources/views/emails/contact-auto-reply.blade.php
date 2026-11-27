@component('mail::message')
# Terima kasih, {{ $name }}! 👋

Pesan Anda sudah saya terima. Saya akan membalas **dalam waktu kurang dari 24 jam kerja**.

---

**Subjek:** {{ $subject }}

**Pesan yang Anda kirim:**

> {{ $msg }}

---

Kalau ada tambahan detail, cukup balas email ini — balasan Anda akan langsung masuk ke inbox saya.

@component('mail::button', ['url' => $ownerWhatsapp, 'color' => 'success'])
Chat via WhatsApp
@endcomponent

**Kontak langsung**

- Email: [{{ $ownerEmail }}](mailto:{{ $ownerEmail }})
- WhatsApp / Telepon: {{ $ownerPhone }}

---

Salam hangat,
**{{ $ownerName }}**

*Email ini dikirim otomatis sebagai tanda terima. Tidak perlu dibalas jika tidak diperlukan.*
@endcomponent
