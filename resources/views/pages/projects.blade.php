@extends('layouts.app')

@section('title', 'Proyek Unggulan — Angga Nugraha Sofyan')
@section('description', 'Koleksi proyek rekayasa perangkat lunak dan arsitektur web, termasuk SIPMAS dan Smart Desa Subang.')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-12 space-y-16">

    {{-- ========================================================================= --}}
    {{-- PAGE HEADER WITH AMBIENT GLOW --}}
    {{-- ========================================================================= --}}
    <div class="relative pb-6 border-b border-slate-200" data-anim="up">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div class="space-y-2">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    CASE STUDY & CAPSTONE ARCHITECTURE
                </div>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-slate-900 tracking-tight">
                    Karya Nyata Rekayasa Web
                </h1>
            </div>
            <p class="text-xs sm:text-sm text-slate-500 max-w-md leading-relaxed">
                Eksplorasi implementasi sistem informasi terintegrasi, pemecahan masalah sektor publik, alur persetujuan berjenjang, dan antarmuka modern.
            </p>
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- PROYEK 1: SIPMAS (TUGAS AKHIR) --}}
    {{-- ========================================================================= --}}
    <section class="relative bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 lg:p-10 shadow-sm overflow-hidden" data-anim="up"
             x-data="{
                 activeTab: 'landing',
                 previewModal: false,
                 previewSrc: '',
                 previewTitle: '',
                 openPreview(src, title) {
                     this.previewSrc = src;
                     this.previewTitle = title;
                     this.previewModal = true;
                 }
             }">

        {{-- Ambient decorative background lights --}}
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-emerald-200/40 rounded-full blur-3xl pointer-events-none animate-pulse-glow"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-blue-200/40 rounded-full blur-3xl pointer-events-none animate-pulse-glow" style="animation-delay: 2s;"></div>

        <div class="relative z-10 space-y-10">

            {{-- 1. Top Badges & Meta Info --}}
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-black bg-gradient-to-r from-emerald-500 to-teal-600 text-white shadow-xs">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a10.99 10.99 0 00-.25 2.309c0 3.018 1.902 5.688 4.75 6.643a1 1 0 00.5 0c2.848-.955 4.75-3.625 4.75-6.643 0-.79-.09-1.564-.25-2.309l2.644-1.131a1 1 0 000-1.84l-7-3zM5.5 10.36c0-2.31 1.4-4.32 3.5-5.11 2.1.79 3.5 2.8 3.5 5.11 0 2.25-1.39 4.23-3.5 5.04-2.11-.81-3.5-2.79-3.5-5.04z"/></svg>
                        PROYEK 1 · TUGAS AKHIR (TA)
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Desa Sagalaherang, Subang
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                        Full-Stack Production Ready
                    </span>
                </div>

                <div class="text-xs font-mono text-slate-400 font-medium">
                    Arsitektur Multi-Role · Real-Time Tracking
                </div>
            </div>

            {{-- 2. 2-Column Showcase Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">

                {{-- LEFT COLUMN: Narration, Problem/Solution, and Interactive Tab Cards --}}
                <div class="lg:col-span-5 space-y-6">

                    <div>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mb-2">
                            SIPMAS — Sistem Informasi Pengaduan Masyarakat
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                            Platform digitalisasi tata kelola aspirasi warga desa yang menggantikan prosedur pelaporan tatap muka manual dengan sistem terpusat, transparan, dan terukur.
                        </p>
                    </div>

                    {{-- Challenge vs Solution Cards --}}
                    <div class="grid grid-cols-1 gap-3">
                        <div class="bg-amber-50/70 border border-amber-200/80 rounded-2xl p-3.5 flex items-start gap-3">
                            <span class="text-base flex-shrink-0">⚠️</span>
                            <div class="text-xs">
                                <span class="font-bold text-amber-900 block mb-0.5">Tantangan Lapangan:</span>
                                <p class="text-amber-800/90 leading-relaxed">
                                    Aduan warga sebelumnya lambat diproses, sering terjadi tumpang tindih berkas, serta warga tidak mengetahui sejauh mana status keluhannya ditindaklanjuti.
                                </p>
                            </div>
                        </div>

                        <div class="bg-blue-50/70 border border-blue-200/80 rounded-2xl p-3.5 flex items-start gap-3">
                            <span class="text-base flex-shrink-0">💡</span>
                            <div class="text-xs">
                                <span class="font-bold text-blue-900 block mb-0.5">Solusi Rekayasa SIPMAS:</span>
                                <p class="text-blue-800/90 leading-relaxed">
                                    Memisahkan peran akses (Warga & Admin Desa), visualisasi tahapan status secara transparan, serta kalkulasi analitik kategori pengaduan otomatis.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- Interactive Tab Triggers --}}
                    <div class="space-y-2.5 pt-2">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">
                            PILIH TAMPILAN SISTEM (KLIK UNTUK PRATINJAU):
                        </span>

                        <div @click="activeTab = 'landing'"
                             :class="activeTab === 'landing' ? 'border-blue-600 bg-blue-50/60 shadow-xs ring-1 ring-blue-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'"
                             class="cursor-pointer border rounded-2xl p-3.5 transition-all duration-200 flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div :class="activeTab === 'landing' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700 group-hover:bg-blue-100 group-hover:text-blue-700'"
                                     class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs transition">
                                    01
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Landing Page Publik</h4>
                                    <p class="text-[11px] text-slate-500">Pintu gerbang informasi & edukasi warga</p>
                                </div>
                            </div>
                            <span :class="activeTab === 'landing' ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-1'"
                                  class="text-blue-600 text-xs font-bold transition-all">
                                Aktif ➔
                            </span>
                        </div>

                        <div @click="activeTab = 'user'"
                             :class="activeTab === 'user' ? 'border-blue-600 bg-blue-50/60 shadow-xs ring-1 ring-blue-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'"
                             class="cursor-pointer border rounded-2xl p-3.5 transition-all duration-200 flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div :class="activeTab === 'user' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700 group-hover:bg-blue-100 group-hover:text-blue-700'"
                                     class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs transition">
                                    02
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Dashboard User (Masyarakat)</h4>
                                    <p class="text-[11px] text-slate-500">Input aspirasi baru & pelacakan status mandiri</p>
                                </div>
                            </div>
                            <span :class="activeTab === 'user' ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-1'"
                                  class="text-blue-600 text-xs font-bold transition-all">
                                Aktif ➔
                            </span>
                        </div>

                        <div @click="activeTab = 'admin'"
                             :class="activeTab === 'admin' ? 'border-blue-600 bg-blue-50/60 shadow-xs ring-1 ring-blue-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'"
                             class="cursor-pointer border rounded-2xl p-3.5 transition-all duration-200 flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div :class="activeTab === 'admin' ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-700 group-hover:bg-blue-100 group-hover:text-blue-700'"
                                     class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs transition">
                                    03
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Admin Panel & Statistik</h4>
                                    <p class="text-[11px] text-slate-500">Rekapitulasi data, filter & grafik analitik</p>
                                </div>
                            </div>
                            <span :class="activeTab === 'admin' ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-1'"
                                  class="text-blue-600 text-xs font-bold transition-all">
                                Aktif ➔
                            </span>
                        </div>

                    </div>

                </div>

                {{-- RIGHT COLUMN: Realistic Browser Window Mockup --}}
                <div class="lg:col-span-7 relative">

                    <div class="hidden sm:flex absolute -top-4 -right-2 z-20 glass-card px-3.5 py-2 rounded-2xl shadow-lg border border-slate-200/90 items-center gap-2.5 animate-float-slow">
                        <div class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></div>
                        <span class="text-xs font-bold text-slate-800">State: Terverifikasi Digital</span>
                    </div>

                    <div class="hidden sm:flex absolute -bottom-4 -left-3 z-20 glass-card px-3.5 py-2 rounded-2xl shadow-lg border border-slate-200/90 items-center gap-2.5 animate-float-reverse">
                        <span class="text-sm">📊</span>
                        <span class="text-xs font-bold text-slate-800">Chart.js Visualisasi Analitik</span>
                    </div>

                    {{-- Main Browser Mockup --}}
                    <div class="bg-slate-900 rounded-3xl p-2 sm:p-2.5 shadow-2xl border border-slate-800 transition-all duration-300 hover:shadow-blue-500/10">

                        <div class="px-4 py-2.5 bg-slate-800/90 rounded-t-2xl border-b border-slate-700/80 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-1.5 flex-shrink-0">
                                <span class="w-3 h-3 rounded-full bg-rose-500 inline-block shadow-xs"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500 inline-block shadow-xs"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block shadow-xs"></span>
                            </div>

                            <div class="bg-slate-950/80 text-slate-300 font-mono text-[11px] px-3.5 py-1.5 rounded-xl border border-slate-800 flex items-center gap-2 w-full max-w-sm truncate justify-center">
                                <svg class="w-3 h-3 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                                <span x-show="activeTab === 'landing'" class="truncate">sipmas.desa-sagalaherang.id</span>
                                <span x-show="activeTab === 'user'" class="truncate">sipmas.desa-sagalaherang.id/masyarakat/dashboard</span>
                                <span x-show="activeTab === 'admin'" class="truncate">sipmas.desa-sagalaherang.id/admin/statistik</span>
                            </div>

                            <button type="button"
                                    @click="
                                        if(activeTab === 'landing') openPreview('{{ asset('images/projects/sipmas/landing-page.jpg') }}', '1. Landing Page — Layanan Pengaduan Online Desa Sagalaherang');
                                        if(activeTab === 'user') openPreview('{{ asset('images/projects/sipmas/dashboard-user.png') }}', '2. Dashboard User — Layanan Masyarakat Digital Desa Sagalaherang');
                                        if(activeTab === 'admin') openPreview('{{ asset('images/projects/sipmas/admin-panel.png') }}', '3. Admin Panel & Statistik — Rekapitulasi Data & Laporan');
                                    "
                                    class="text-[11px] font-semibold text-slate-300 hover:text-white flex items-center gap-1 transition px-2.5 py-1 rounded-lg bg-slate-700/60 hover:bg-slate-700 flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                <span class="hidden sm:inline">Perbesar</span>
                            </button>
                        </div>

                        <div class="relative bg-slate-950 rounded-b-2xl overflow-hidden p-1.5 sm:p-2 min-h-[280px] sm:min-h-[380px] flex items-center justify-center">

                            <div x-show="activeTab === 'landing'"
                                 x-transition:enter="transition-all ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 class="w-full">
                                <img src="{{ asset('images/projects/sipmas/landing-page.jpg') }}"
                                     alt="Landing Page SIPMAS Desa Sagalaherang"
                                     class="w-full h-auto rounded-xl cursor-pointer hover:opacity-95 transition shadow-lg"
                                     @click="openPreview('{{ asset('images/projects/sipmas/landing-page.jpg') }}', '1. Landing Page — Layanan Pengaduan Online Desa Sagalaherang')">
                            </div>

                            <div x-show="activeTab === 'user'"
                                 x-transition:enter="transition-all ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 style="display: none;"
                                 class="w-full">
                                <img src="{{ asset('images/projects/sipmas/dashboard-user.png') }}"
                                     alt="Dashboard User SIPMAS Desa Sagalaherang"
                                     class="w-full h-auto rounded-xl cursor-pointer hover:opacity-95 transition shadow-lg"
                                     @click="openPreview('{{ asset('images/projects/sipmas/dashboard-user.png') }}', '2. Dashboard User — Layanan Masyarakat Digital Desa Sagalaherang')">
                            </div>

                            <div x-show="activeTab === 'admin'"
                                 x-transition:enter="transition-all ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 style="display: none;"
                                 class="w-full">
                                <img src="{{ asset('images/projects/sipmas/admin-panel.png') }}"
                                     alt="Admin Panel Statistik SIPMAS Desa Sagalaherang"
                                     class="w-full h-auto rounded-xl cursor-pointer hover:opacity-95 transition shadow-lg"
                                     @click="openPreview('{{ asset('images/projects/sipmas/admin-panel.png') }}', '3. Admin Panel & Statistik — Rekapitulasi Data & Laporan')">
                            </div>

                        </div>

                    </div>

                    {{-- Interactive Thumbnail Switcher --}}
                    <div class="grid grid-cols-3 gap-3 pt-3">
                        <button @click="activeTab = 'landing'"
                                type="button"
                                :class="activeTab === 'landing' ? 'ring-2 ring-blue-600 opacity-100 scale-[1.02]' : 'opacity-60 hover:opacity-90'"
                                class="rounded-xl overflow-hidden border border-slate-200 transition-all duration-200 text-left bg-slate-50 p-1">
                            <img src="{{ asset('images/projects/sipmas/landing-page.jpg') }}" alt="Thumb Landing" class="w-full h-12 sm:h-14 object-cover rounded-lg mb-1">
                            <span class="text-[10px] font-bold text-slate-800 block truncate px-1">Landing Page</span>
                        </button>

                        <button @click="activeTab = 'user'"
                                type="button"
                                :class="activeTab === 'user' ? 'ring-2 ring-blue-600 opacity-100 scale-[1.02]' : 'opacity-60 hover:opacity-90'"
                                class="rounded-xl overflow-hidden border border-slate-200 transition-all duration-200 text-left bg-slate-50 p-1">
                            <img src="{{ asset('images/projects/sipmas/dashboard-user.png') }}" alt="Thumb User" class="w-full h-12 sm:h-14 object-cover rounded-lg mb-1">
                            <span class="text-[10px] font-bold text-slate-800 block truncate px-1">Dashboard Warga</span>
                        </button>

                        <button @click="activeTab = 'admin'"
                                type="button"
                                :class="activeTab === 'admin' ? 'ring-2 ring-blue-600 opacity-100 scale-[1.02]' : 'opacity-60 hover:opacity-90'"
                                class="rounded-xl overflow-hidden border border-slate-200 transition-all duration-200 text-left bg-slate-50 p-1">
                            <img src="{{ asset('images/projects/sipmas/admin-panel.png') }}" alt="Thumb Admin" class="w-full h-12 sm:h-14 object-cover rounded-lg mb-1">
                            <span class="text-[10px] font-bold text-slate-800 block truncate px-1">Admin & Statistik</span>
                        </button>
                    </div>

                </div>

            </div>

            {{-- 3. In-Depth Bento Architecture & Feature Breakdown --}}
            <div class="pt-6 border-t border-slate-200">
                <div class="mb-4">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">DETAIL ARSITEKTUR & FITUR KUNCI:</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-blue-300 hover:shadow-xs transition duration-200 lift-on-hover">
                        <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center font-bold text-sm mb-3">
                            🔑
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Autentikasi & Hak Akses Bertingkat</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Sistem keamanan memisahkan session warga (akses formulir aduan & riwayat pribadi) dengan session aparatur desa (verifikasi, validasi disposisi, serta pengubahan status laporan).
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-emerald-300 hover:shadow-xs transition duration-200 lift-on-hover">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm mb-3">
                            🔄
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Siklus Laporan Real-Time</h4>
                        <p class="text-xs text-slate-600 leading-relaxed mb-3">
                            Setiap laporan melewati status terstandardisasi demi transparansi:
                        </p>
                        <div class="flex items-center gap-1.5 text-[10px] font-bold">
                            <span class="px-2 py-0.5 rounded bg-amber-100 text-amber-800">Diterima</span>
                            <span>➔</span>
                            <span class="px-2 py-0.5 rounded bg-blue-100 text-blue-800">Diproses</span>
                            <span>➔</span>
                            <span class="px-2 py-0.5 rounded bg-emerald-100 text-emerald-800">Selesai</span>
                        </div>
                    </div>

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-purple-300 hover:shadow-xs transition duration-200 lift-on-hover">
                        <div class="w-9 h-9 rounded-xl bg-purple-100 text-purple-700 flex items-center justify-center font-bold text-sm mb-3">
                            📈
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Analitik & Visualisasi Rekapitulasi</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Integrasi grafik interaktif untuk memetakan sebaran kategori keluhan (Infrastruktur, Keamanan, Layanan Publik, Lingkungan) guna pengambilan keputusan pimpinan desa berbasis data.
                        </p>
                    </div>

                </div>
            </div>

            {{-- 4. Tech Stack & Discussion CTA --}}
            <div class="pt-4 border-t border-slate-200/80 flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Stack Inti:</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Laravel</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Tailwind CSS</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">MySQL</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Chart.js</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Blade Component</span>
                </div>

                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs transition shadow-sm shadow-blue-500/20 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Diskusi Teknis Terkait SIPMAS
                </a>
            </div>

        </div>

        {{-- Lightbox Zoom Modal --}}
        <div x-show="previewModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-3 sm:p-6"
             style="display: none;"
             @keydown.escape.window="previewModal = false">
            <div class="relative bg-slate-900 rounded-3xl max-w-5xl w-full overflow-hidden shadow-2xl border border-slate-700"
                 @click.away="previewModal = false"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100">
                <div class="flex items-center justify-between px-5 py-3.5 bg-slate-800 text-white border-b border-slate-700">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                        <span class="text-xs sm:text-sm font-bold tracking-tight" x-text="previewTitle"></span>
                    </div>
                    <button type="button"
                            @click="previewModal = false"
                            class="text-slate-400 hover:text-white text-base font-bold px-2 py-1 rounded-lg hover:bg-slate-700 transition">
                        ✕ Tutup
                    </button>
                </div>
                <div class="p-3 bg-slate-950 max-h-[82vh] overflow-y-auto flex items-center justify-center">
                    <img :src="previewSrc" :alt="previewTitle" class="w-full h-auto rounded-xl">
                </div>
            </div>
        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- PROYEK 2: SMART DESA SUBANG (SURAT KETERANGAN & TTE KEPALA DESA) --}}
    {{-- ========================================================================= --}}
    <section class="relative bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-8 lg:p-10 shadow-sm overflow-hidden" data-anim="up"
             x-data="{
                 smartTab: 'portal',
                 previewModal: false,
                 previewSrc: '',
                 previewTitle: '',
                 openPreview(src, title) {
                     this.previewSrc = src;
                     this.previewTitle = title;
                     this.previewModal = true;
                 }
             }">

        {{-- Ambient decorative background lights --}}
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-green-200/40 rounded-full blur-3xl pointer-events-none animate-pulse-glow" style="animation-delay: 1s;"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-amber-200/40 rounded-full blur-3xl pointer-events-none animate-pulse-glow" style="animation-delay: 3s;"></div>

        <div class="relative z-10 space-y-10">

            {{-- 1. Top Badges & Meta Info --}}
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-2.5">
                    <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full text-xs font-black bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-xs">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        PROYEK 2 · E-GOVERNMENT SISTEM DESA
                    </span>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-green-50 text-green-800 border border-green-200">
                        <span class="w-2 h-2 rounded-full bg-green-600 animate-pulse"></span>
                        Pemerintah Daerah Kabupaten Subang
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                        Layanan Publik Desa Terintegrasi
                    </span>
                </div>

                <div class="text-xs font-mono text-slate-400 font-medium">
                    Hierarchical Approval Pipeline · TTE Kades
                </div>
            </div>

            {{-- 2. 2-Column Showcase Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">

                {{-- LEFT COLUMN: Narration, Approval Workflow, and Interactive Tab Cards --}}
                <div class="lg:col-span-5 space-y-6">

                    <div>
                        <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight leading-tight mb-2">
                            Smart Desa — Sistem Pelayanan Surat Keterangan (SK) Digital
                        </h2>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                            Aplikasi digitalisasi administrasi persuratan desa se-Kabupaten Subang. Memangkas antrean manual pembuatan berbagai Surat Keterangan (SKTM, SK Domisili, SK Usaha, dll.) dengan alur validasi bertingkat yang diakhiri <strong class="text-slate-800 font-bold">Tanda Tangan Elektronik (TTE) Kepala Desa</strong>.
                        </p>
                    </div>

                    {{-- Visualisasi Alur Approval Berjenjang (Hierarchical Workflow) --}}
                    <div class="bg-gradient-to-br from-green-50/70 to-emerald-50/50 border border-green-200/80 rounded-2xl p-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-green-950 flex items-center gap-1.5">
                                <span>⚡</span> Alur Validasi & TTE Digital Berjenjang:
                            </span>
                            <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-green-200/60 text-green-800">5 Tahap</span>
                        </div>

                        {{-- Step-by-Step Flow Badges --}}
                        <div class="grid grid-cols-1 gap-2 text-xs">
                            <div class="flex items-center gap-2 bg-white/90 border border-green-200/80 rounded-xl px-3 py-2 shadow-2xs">
                                <span class="w-5 h-5 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold text-[10px]">1</span>
                                <div class="flex-1">
                                    <span class="font-bold text-slate-900">Masyarakat:</span>
                                    <span class="text-slate-600 text-[11px]"> Mengajukan permohonan SK online & upload berkas syarat.</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 bg-white/90 border border-green-200/80 rounded-xl px-3 py-2 shadow-2xs">
                                <span class="w-5 h-5 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold text-[10px]">2</span>
                                <div class="flex-1">
                                    <span class="font-bold text-slate-900">Operator Desa:</span>
                                    <span class="text-slate-600 text-[11px]"> Verifikasi kelengkapan data NIK & berkas identitas awal.</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 bg-white/90 border border-green-200/80 rounded-xl px-3 py-2 shadow-2xs">
                                <span class="w-5 h-5 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold text-[10px]">3</span>
                                <div class="flex-1">
                                    <span class="font-bold text-slate-900">Kasi (Kepala Seksi):</span>
                                    <span class="text-slate-600 text-[11px]"> Peninjauan substansi teknis sesuai bidang permohonan surat.</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 bg-white/90 border border-green-200/80 rounded-xl px-3 py-2 shadow-2xs">
                                <span class="w-5 h-5 rounded-lg bg-green-600 text-white flex items-center justify-center font-bold text-[10px]">4</span>
                                <div class="flex-1">
                                    <span class="font-bold text-slate-900">Sekdes (Sekretaris Desa):</span>
                                    <span class="text-slate-600 text-[11px]"> Review administratif final dan paraf persetujuan draf SK.</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-2 bg-emerald-600 text-white rounded-xl px-3 py-2 shadow-xs">
                                <span class="w-5 h-5 rounded-lg bg-white text-emerald-700 flex items-center justify-center font-bold text-[10px]">5</span>
                                <div class="flex-1">
                                    <span class="font-bold">Kepala Desa (TTE):</span>
                                    <span class="text-emerald-100 text-[11px]"> Pengesahan akhir Tanda Tangan Elektronik sah; SK terbit!</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Interactive Tab Triggers --}}
                    <div class="space-y-2.5 pt-1">
                        <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block">
                            PRATINJAU ANTARMUKA SISTEM (KLIK):
                        </span>

                        <div @click="smartTab = 'portal'"
                             :class="smartTab === 'portal' ? 'border-green-600 bg-green-50/60 shadow-xs ring-1 ring-green-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'"
                             class="cursor-pointer border rounded-2xl p-3.5 transition-all duration-200 flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div :class="smartTab === 'portal' ? 'bg-green-700 text-white' : 'bg-slate-100 text-slate-700 group-hover:bg-green-100 group-hover:text-green-700'"
                                     class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs transition">
                                    01
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Portal Utama Kabupaten Subang</h4>
                                    <p class="text-[11px] text-slate-500">Pusat informasi desa, berita, & gerbang SK</p>
                                </div>
                            </div>
                            <span :class="smartTab === 'portal' ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-1'"
                                  class="text-green-700 text-xs font-bold transition-all">
                                Aktif ➔
                            </span>
                        </div>

                        <div @click="smartTab = 'program'"
                             :class="smartTab === 'program' ? 'border-green-600 bg-green-50/60 shadow-xs ring-1 ring-green-500/20' : 'border-slate-200 hover:border-slate-300 bg-white'"
                             class="cursor-pointer border rounded-2xl p-3.5 transition-all duration-200 flex items-center justify-between group">
                            <div class="flex items-center gap-3">
                                <div :class="smartTab === 'program' ? 'bg-green-700 text-white' : 'bg-slate-100 text-slate-700 group-hover:bg-green-100 group-hover:text-green-700'"
                                     class="w-8 h-8 rounded-xl flex items-center justify-center font-bold text-xs transition">
                                    02
                                </div>
                                <div>
                                    <h4 class="text-xs font-bold text-slate-900">Modul Program & Potensi Desa</h4>
                                    <p class="text-[11px] text-slate-500">Dokumentasi Pokdarwis, BUMDes, & Agrowisata</p>
                                </div>
                            </div>
                            <span :class="smartTab === 'program' ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-1'"
                                  class="text-green-700 text-xs font-bold transition-all">
                                Aktif ➔
                            </span>
                        </div>

                    </div>

                </div>

                {{-- RIGHT COLUMN: Realistic Browser Window Mockup --}}
                <div class="lg:col-span-7 relative">

                    <div class="hidden sm:flex absolute -top-4 -right-2 z-20 glass-card px-3.5 py-2 rounded-2xl shadow-lg border border-slate-200/90 items-center gap-2.5 animate-float-slow">
                        <span class="text-sm">✍️</span>
                        <span class="text-xs font-bold text-slate-800">TTE Digital Kades Terverifikasi</span>
                    </div>

                    <div class="hidden sm:flex absolute -bottom-4 -left-3 z-20 glass-card px-3.5 py-2 rounded-2xl shadow-lg border border-slate-200/90 items-center gap-2.5 animate-float-reverse">
                        <span class="text-sm">⚡</span>
                        <span class="text-xs font-bold text-slate-800">Layanan SK Cepat & Transparan</span>
                    </div>

                    {{-- Main Browser Mockup --}}
                    <div class="bg-slate-900 rounded-3xl p-2 sm:p-2.5 shadow-2xl border border-slate-800 transition-all duration-300 hover:shadow-green-500/10">

                        <div class="px-4 py-2.5 bg-slate-800/90 rounded-t-2xl border-b border-slate-700/80 flex items-center justify-between gap-3">
                            <div class="flex items-center gap-1.5 flex-shrink-0">
                                <span class="w-3 h-3 rounded-full bg-rose-500 inline-block shadow-xs"></span>
                                <span class="w-3 h-3 rounded-full bg-amber-500 inline-block shadow-xs"></span>
                                <span class="w-3 h-3 rounded-full bg-emerald-500 inline-block shadow-xs"></span>
                            </div>

                            <div class="bg-slate-950/80 text-slate-300 font-mono text-[11px] px-3.5 py-1.5 rounded-xl border border-slate-800 flex items-center gap-2 w-full max-w-sm truncate justify-center">
                                <svg class="w-3 h-3 text-emerald-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                                <span x-show="smartTab === 'portal'" class="truncate">smartdesa.subang.go.id</span>
                                <span x-show="smartTab === 'program'" class="truncate">smartdesa.subang.go.id/program-desa/pokdarwis</span>
                            </div>

                            <button type="button"
                                    @click="
                                        if(smartTab === 'portal') openPreview('{{ asset('images/projects/smartdesa/home-portal.jpg') }}', '1. Portal Utama — Smart Desa Pemerintah Daerah Kabupaten Subang');
                                        if(smartTab === 'program') openPreview('{{ asset('images/projects/smartdesa/program-desa.jpg') }}', '2. Modul Program Desa — Pembinaan Pokdarwis & Pariwisata Lokal');
                                    "
                                    class="text-[11px] font-semibold text-slate-300 hover:text-white flex items-center gap-1 transition px-2.5 py-1 rounded-lg bg-slate-700/60 hover:bg-slate-700 flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                                <span class="hidden sm:inline">Perbesar</span>
                            </button>
                        </div>

                        <div class="relative bg-slate-950 rounded-b-2xl overflow-hidden p-1.5 sm:p-2 min-h-[280px] sm:min-h-[380px] flex items-center justify-center">

                            <div x-show="smartTab === 'portal'"
                                 x-transition:enter="transition-all ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 class="w-full">
                                <img src="{{ asset('images/projects/smartdesa/home-portal.jpg') }}"
                                     alt="Portal Utama Smart Desa Subang"
                                     class="w-full h-auto rounded-xl cursor-pointer hover:opacity-95 transition shadow-lg"
                                     @click="openPreview('{{ asset('images/projects/smartdesa/home-portal.jpg') }}', '1. Portal Utama — Smart Desa Pemerintah Daerah Kabupaten Subang')">
                            </div>

                            <div x-show="smartTab === 'program'"
                                 x-transition:enter="transition-all ease-out duration-300 transform"
                                 x-transition:enter-start="opacity-0 scale-95 translate-y-2"
                                 x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                                 style="display: none;"
                                 class="w-full">
                                <img src="{{ asset('images/projects/smartdesa/program-desa.jpg') }}"
                                     alt="Modul Program Desa Pokdarwis"
                                     class="w-full h-auto rounded-xl cursor-pointer hover:opacity-95 transition shadow-lg"
                                     @click="openPreview('{{ asset('images/projects/smartdesa/program-desa.jpg') }}', '2. Modul Program Desa — Pembinaan Pokdarwis & Pariwisata Lokal')">
                            </div>

                        </div>

                    </div>

                    {{-- Interactive Thumbnail Switcher --}}
                    <div class="grid grid-cols-2 gap-3 pt-3">
                        <button @click="smartTab = 'portal'"
                                type="button"
                                :class="smartTab === 'portal' ? 'ring-2 ring-green-600 opacity-100 scale-[1.02]' : 'opacity-60 hover:opacity-90'"
                                class="rounded-xl overflow-hidden border border-slate-200 transition-all duration-200 text-left bg-slate-50 p-1">
                            <img src="{{ asset('images/projects/smartdesa/home-portal.jpg') }}" alt="Thumb Portal" class="w-full h-14 sm:h-16 object-cover rounded-lg mb-1">
                            <span class="text-[10px] font-bold text-slate-800 block truncate px-1">1. Portal Utama Desa</span>
                        </button>

                        <button @click="smartTab = 'program'"
                                type="button"
                                :class="smartTab === 'program' ? 'ring-2 ring-green-600 opacity-100 scale-[1.02]' : 'opacity-60 hover:opacity-90'"
                                class="rounded-xl overflow-hidden border border-slate-200 transition-all duration-200 text-left bg-slate-50 p-1">
                            <img src="{{ asset('images/projects/smartdesa/program-desa.jpg') }}" alt="Thumb Program" class="w-full h-14 sm:h-16 object-cover rounded-lg mb-1">
                            <span class="text-[10px] font-bold text-slate-800 block truncate px-1">2. Modul Program Desa</span>
                        </button>
                    </div>

                </div>

            </div>

            {{-- 3. In-Depth Bento Architecture & Feature Breakdown --}}
            <div class="pt-6 border-t border-slate-200">
                <div class="mb-4">
                    <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">PILAR ARSITEKTUR & KAPABILITAS SISTEM:</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-green-300 hover:shadow-xs transition duration-200">
                        <div class="w-9 h-9 rounded-xl bg-green-100 text-green-700 flex items-center justify-center font-bold text-sm mb-3">
                            📜
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Penerbitan Surat Keterangan (SK) Digital</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Otomasi pembuatan template persuratan resmi (SKTM, SK Domisili, SK Usaha, SK Kelakuan Baik) langsung dari data formulir tanpa pengetikan ulang manual.
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-emerald-300 hover:shadow-xs transition duration-200 lift-on-hover">
                        <div class="w-9 h-9 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-sm mb-3">
                            ✍️
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Integrasi TTE (Tanda Tangan Elektronik)</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Dokumen SK yang telah diverifikasi Sekdes secara otomatis diajukan ke Kepala Desa untuk dibubuhi Tanda Tangan Elektronik bersertifikat digital anti-pemalsuan.
                        </p>
                    </div>

                    <div class="bg-gradient-to-b from-slate-50 to-white border border-slate-200/90 rounded-2xl p-5 hover:border-teal-300 hover:shadow-xs transition duration-200 lift-on-hover">
                        <div class="w-9 h-9 rounded-xl bg-teal-100 text-teal-700 flex items-center justify-center font-bold text-sm mb-3">
                            🏛️
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1.5">Pusat Informasi & Potensi Daerah</h4>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            Dilengkapi etalase publikasi potensi desa, struktur pemerintahan, agenda pembangunan desa, serta pembinaan kelompok sadar wisata (Pokdarwis) dan BUMDes.
                        </p>
                    </div>

                </div>
            </div>

            {{-- 4. Tech Stack & Discussion CTA --}}
            <div class="pt-4 border-t border-slate-200/80 flex flex-wrap items-center justify-between gap-4">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mr-1">Stack Inti:</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Laravel / PHP</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Digital Signature (TTE)</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Multi-Level Workflow</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">MySQL Database</span>
                    <span class="px-3 py-1 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">Tailwind CSS</span>
                </div>

                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-700 hover:bg-green-800 text-white font-bold text-xs transition shadow-sm shadow-green-600/20 active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    Diskusi Teknis Terkait Smart Desa
                </a>
            </div>

        </div>

        {{-- Lightbox Zoom Modal --}}
        <div x-show="previewModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 bg-black/85 backdrop-blur-md flex items-center justify-center p-3 sm:p-6"
             style="display: none;"
             @keydown.escape.window="previewModal = false">
            <div class="relative bg-slate-900 rounded-3xl max-w-5xl w-full overflow-hidden shadow-2xl border border-slate-700"
                 @click.away="previewModal = false"
                 x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100">
                <div class="flex items-center justify-between px-5 py-3.5 bg-slate-800 text-white border-b border-slate-700">
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
                        <span class="text-xs sm:text-sm font-bold tracking-tight" x-text="previewTitle"></span>
                    </div>
                    <button type="button"
                            @click="previewModal = false"
                            class="text-slate-400 hover:text-white text-base font-bold px-2 py-1 rounded-lg hover:bg-slate-700 transition">
                        ✕ Tutup
                    </button>
                </div>
                <div class="p-3 bg-slate-950 max-h-[82vh] overflow-y-auto flex items-center justify-center">
                    <img :src="previewSrc" :alt="previewTitle" class="w-full h-auto rounded-xl">
                </div>
            </div>
        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- SECTION: PROYEK REKAYASA LAINNYA --}}
    {{-- ========================================================================= --}}
    <div class="space-y-6 pt-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-slate-900 tracking-tight">Eksplorasi Proyek Lainnya</h2>
            <p class="text-xs sm:text-sm text-slate-500">Riset arsitektur microservices, performa rendering web, dan integrasi API.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @php
            $projects = [
                [
                    'title' => 'EduSync — LMS & Collaborative Canvas',
                    'desc' => 'Platform LMS tersinkronisasi tinggi dengan WebSocket real-time, live collaborative whiteboard, dan adaptive task manager.',
                    'tags' => ['Next.js 14', 'WebSockets', 'PostgreSQL', 'Docker'],
                    'metrics' => 'P99 < 42ms · 150k+ User',
                    'featured' => false,
                    'status' => 'v1.0.4 · Production',
                ],
                [
                    'title' => 'Core Web Performance Lab',
                    'desc' => 'Toolkit optimasi aset web, SSR caching presisi, dan audit Core Web Vitals otomatis dengan skor Lighthouse 99+.',
                    'tags' => ['TypeScript', 'Vite', 'Tailwind CSS', 'Redis'],
                    'metrics' => 'Lighthouse 99+ · 0 Cumulative Layout Shift',
                    'featured' => false,
                    'status' => 'Open Source',
                ],
                [
                    'title' => 'Distributed Micro-API Gateway',
                    'desc' => 'Gateway API modular dengan autentikasi stateless JWT, rate limiter adaptif berbasis sliding-window, dan tracing gRPC.',
                    'tags' => ['Go', 'gRPC', 'Docker', 'PostgreSQL'],
                    'metrics' => 'Throughput 12,000 req/s',
                    'featured' => false,
                    'status' => 'v2.1 · Stable',
                ],
            ];
            @endphp

            @foreach($projects as $item)
            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 shadow-xs hover:border-blue-300 hover:shadow-md transition group flex flex-col justify-between">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] font-mono text-slate-400 font-medium">{{ $item['status'] }}</span>
                        @if($item['featured'])
                        <span class="text-[11px] font-bold bg-amber-50 text-amber-800 border border-amber-200 px-2 py-0.5 rounded-full">★ Featured</span>
                        @endif
                    </div>

                    <div>
                        <h3 class="text-base font-bold text-slate-900 group-hover:text-blue-600 transition mb-2">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-xs text-slate-600 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>
                    </div>

                    {{-- Metric Pill --}}
                    <div class="bg-slate-50 border border-slate-200/80 rounded-xl p-2.5 text-[11px] text-slate-700 font-semibold flex items-center gap-2">
                        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        {{ $item['metrics'] }}
                    </div>

                    {{-- Tags --}}
                    <div class="flex flex-wrap gap-1.5 pt-1">
                        @foreach($item['tags'] as $tag)
                        <span class="text-[11px] font-medium bg-slate-100 text-slate-700 px-2.5 py-0.5 rounded-md border border-slate-200/60">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="pt-6 mt-6 border-t border-slate-100 flex items-center justify-between text-xs">
                    <a href="{{ route('contact') }}" class="font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1 group-hover:gap-1.5 transition-all">
                        Diskusi Arsitektur
                        <span>→</span>
                    </a>
                    <span class="text-slate-400 font-mono text-[11px]">Git / Docs</span>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>

@endsection
