@extends('layouts.app')

@section('title', 'Hubungi Saya — Angga Nugraha Sofyan')
@section('description', 'Kirim pesan untuk kolaborasi, magang, atau sekadar berdiskusi seputar web development.')

@section('content')

<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12 space-y-8">

    {{-- Header --}}
    <div class="text-center space-y-3" data-anim="up">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
            <span class="w-2 h-2 rounded-full bg-blue-600"></span>
            KARIER & KONEKSI
        </span>
        <h1 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">Hubungi Saya 👋</h1>
        <p class="text-sm text-slate-500 max-w-md mx-auto">
            Tertarik mendiskusikan peluang magang, proyek rekayasa web, atau kerja sama riset? Kirim pesan Anda di bawah ini.
        </p>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-2xl p-4 flex items-start gap-3 shadow-xs"
         x-data="{ show: true }" x-show="show" x-transition>
        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
        </svg>
        <div class="flex-1">
            <p class="text-sm font-bold">Pesan Terkirim!</p>
            <p class="text-xs text-emerald-700 mt-0.5">{{ session('success') }}</p>
        </div>
        <button @click="show = false" class="text-emerald-500 hover:text-emerald-700">✕</button>
    </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
    <div class="bg-rose-50 border border-rose-200 text-rose-800 rounded-2xl p-4 flex items-start gap-3 shadow-xs">
        <svg class="w-5 h-5 text-rose-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        <p class="text-sm">{{ session('error') }}</p>
    </div>
    @endif

    {{-- Main Form Card --}}
    <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 shadow-xs" data-anim="up" data-anim-delay="0.12">
        <form action="{{ route('contact.send') }}" method="POST"
              x-data="{ loading: false }"
              @submit="loading = true"
              class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                {{-- Name --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                    <input type="text"
                           name="name"
                           value="{{ old('name') }}"
                           placeholder="Contoh: Alex Pratama"
                           required
                           class="w-full bg-slate-50 border @error('name') border-rose-300 @else border-slate-200 @enderror
                                  text-slate-900 text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                  focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                    @error('name')
                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Alamat Email</label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="alex@company.com"
                           required
                           class="w-full bg-slate-50 border @error('email') border-rose-300 @else border-slate-200 @enderror
                                  text-slate-900 text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                  focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                    @error('email')
                    <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Subject --}}
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Tujuan Hubungan</label>
                <select name="subject"
                        class="w-full bg-slate-50 border border-slate-200 text-slate-900 text-sm rounded-xl px-4 py-3
                               focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                    <option value="Penawaran Magang (Internship)" {{ old('subject') == 'Penawaran Magang (Internship)' ? 'selected' : '' }}>Penawaran Magang (Internship)</option>
                    <option value="Peluang Kolaborasi Proyek" {{ old('subject') == 'Peluang Kolaborasi Proyek' ? 'selected' : '' }}>Peluang Kolaborasi Proyek</option>
                    <option value="Perekrutan Graduate / Junior Role" {{ old('subject') == 'Perekrutan Graduate / Junior Role' ? 'selected' : '' }}>Perekrutan Graduate / Junior Role</option>
                    <option value="Diskusi Teknis / Lainnya" {{ old('subject') == 'Diskusi Teknis / Lainnya' ? 'selected' : '' }}>Diskusi Teknis / Lainnya</option>
                </select>
            </div>

            {{-- Message --}}
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Pesan Detail</label>
                <textarea name="message"
                          rows="4"
                          placeholder="Jelaskan gambaran proyek atau peran yang ditawarkan..."
                          required
                          class="w-full bg-slate-50 border @error('message') border-rose-300 @else border-slate-200 @enderror
                                 text-slate-900 text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                 focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition resize-none">{{ old('message') }}</textarea>
                @error('message')
                <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                    :disabled="loading"
                    class="w-full flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700
                           disabled:opacity-60 disabled:cursor-not-allowed
                           text-white text-sm font-bold py-3.5 px-6 rounded-xl
                           transition shadow-sm shadow-blue-500/20 active:scale-95">
                <span x-show="!loading">Kirim Pesan Sekarang →</span>
                <span x-show="loading" class="flex items-center gap-2">
                    <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                    Sedang Mengirim...
                </span>
            </button>

        </form>
    </div>

</div>

@endsection
