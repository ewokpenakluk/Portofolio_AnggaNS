@extends('layouts.app')

@section('title', 'Angga Nugraha Sofyan — Full-Stack Developer & UI/UX Specialist')
@section('description', 'Membangun produk digital yang menarik, terukur, dan berpusat pada pengalaman pengguna yang intuitif.')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 sm:pt-14 space-y-24 sm:space-y-32"
     x-data="{
         previewModal: false,
         previewSrc: '',
         previewTitle: '',
         openPreview(src, title) {
             this.previewSrc = src;
             this.previewTitle = title;
             this.previewModal = true;
         }
     }"
     @open-preview.window="openPreview($event.detail.src, $event.detail.title)">

    {{-- ========================================================================= --}}
    {{-- 1. HERO SECTION (2 COLUMNS) --}}
    {{-- ========================================================================= --}}
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center pt-2 sm:pt-6" data-hero>

        {{-- Left Column: Bio & Calls to Action --}}
        <div class="lg:col-span-7 space-y-6 sm:space-y-7 text-left">

            {{-- Top Open to Work Pill --}}
            <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold bg-blue-50/90 text-blue-700 border border-blue-200/70 shadow-2xs" data-hero-anim="copy">
                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                <span>TERBUKA UNTUK PROYEK BARU</span>
            </div>

            {{-- Main Headline --}}
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-slate-900 tracking-tight leading-[1.12]" data-hero="title">
                Halo, Saya <span class="text-blue-600">Angga</span><br>
                Nugraha Sofyan 👋
            </h1>

            {{-- Role Sub-headline --}}
            <p class="text-base sm:text-lg font-bold text-slate-800" data-hero-anim="copy">
                 Full-Stack   <span class="text-[#ea580c] font-black">Developer</span>
            </p>

            {{-- Value Proposition Description --}}
            <p class="text-sm sm:text-base text-slate-600 max-w-xl leading-relaxed font-normal" data-hero-anim="copy">
                Membangun website dan aplikasi digital yang menarik, terukur, dan berpusat pada kemudahan pengguna. Menggabungkan kode yang rapi dengan tampilan visual yang ramah dan nyaman digunakan.
            </p>

            {{-- Action Buttons --}}
            <div class="flex flex-wrap items-center gap-3.5 pt-2" data-hero-anim="copy">
                <a href="#proyek"
                   data-magnetic
                   class="btn-terracotta inline-flex items-center gap-2 px-6 py-3.5 rounded-xl font-bold text-xs sm:text-sm transition">
                    <span>Jelajahi Proyek</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7V17"/>
                    </svg>
                </a>

                <a href="{{ route('cv.view') }}"
                   target="_blank"
                   rel="noopener"
                   data-magnetic
                   title="Buka CV di tab baru untuk dilihat dan diunduh"
                   class="inline-flex items-center gap-2 px-6 py-3.5 rounded-xl bg-white hover:bg-slate-50 text-slate-700 font-bold text-xs sm:text-sm border border-slate-200/90 transition shadow-xs hover:border-slate-300">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    <span>Lihat &amp; Unduh CV</span>
                </a>
            </div>

            {{-- Social Profiles --}}
            @php
                $socialLinks = collect([
                    ['label' => 'LinkedIn', 'icon' => 'linkedin', 'url' => config('portfolio.social.linkedin')],
                    ['label' => 'GitHub', 'icon' => 'github', 'url' => config('portfolio.social.github')],
                ])->filter(fn (array $link): bool => filled($link['url']));
            @endphp

            @if ($socialLinks->isNotEmpty())
                <div class="flex flex-wrap items-center gap-2.5 pt-1" data-hero-anim="copy">
                    <span class="text-[10px] font-black uppercase tracking-[0.14em] text-slate-500">Temukan Saya</span>
                    <span class="h-px w-5 bg-slate-300"></span>

                    @foreach ($socialLinks as $link)
                        <a href="{{ $link['url'] }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           aria-label="{{ $link['label'] }}"
                           class="group inline-flex items-center gap-2 px-3.5 py-2 rounded-full bg-white border border-slate-200/90 text-[11px] font-bold text-slate-600 hover:text-blue-700 hover:border-blue-300 hover:shadow-2xs transition">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                @if ($link['icon'] === 'linkedin')
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                @else
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                @endif
                            </svg>
                            {{ $link['label'] }}
                        </a>
                    @endforeach
                </div>
            @endif

        </div>

        {{-- Right Column: Portrait Card with Floating Glass Badge --}}
        <div class="lg:col-span-5 relative flex justify-center lg:justify-end" data-hero-anim="media">

            {{-- Ambient Glow --}}
            <div class="absolute -inset-4 bg-gradient-to-tr from-blue-400/20 via-sky-300/20 to-orange-400/10 rounded-3xl blur-2xl opacity-70 pointer-events-none" data-parallax="36"></div>

            <div class="relative w-full max-w-sm sm:max-w-md">

                {{-- Photo Frame --}}
                <div class="relative rounded-3xl overflow-hidden bg-slate-100 border border-slate-200/90 shadow-xl aspect-[4/5] flex items-center justify-center lift-on-hover">
                    <img src="{{ asset('images/profile/angga.jpg') }}"
                         alt="Angga Nugraha Sofyan"
                         class="w-full h-full object-cover object-top hover:scale-105 transition-transform duration-500">
                </div>

                {{-- Top Floating Badge (Experience) --}}
                <div class="absolute -top-3 sm:-top-5 -left-3 sm:-left-5 glass-card px-4 py-2.5 rounded-2xl shadow-lg border border-slate-200/90 flex items-center gap-3 animate-float-slow" data-hero-anim="badge">
                    <div class="w-9 h-9 rounded-xl bg-blue-100/90 text-blue-600 flex items-center justify-center font-bold text-base flex-shrink-0">
                        💼
                    </div>
                    <div>
                        <div class="text-xs font-black text-slate-900 leading-tight">3+ Tahun</div>
                        <div class="text-[11px] text-slate-500 font-medium">Pengalaman Web</div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- 1b. TECH RIBBON — continuous motion between hero and story --}}
    {{-- ========================================================================= --}}
    @php
        // Two calm, monochrome rows. The earlier version mixed a dark row with
        // a rainbow of dot colours, which fought the light page palette.
        $techRowPrimary = [
            'Laravel',
            'Tailwind CSS',
            'Alpine.js',
            'Blade',
            'PHP 8.4',
            'MySQL',
            'Vue.js',
            'JavaScript',
        ];

        $techRowSecondary = [
            'Figma',
            'REST API',
            'Git & GitHub',
            'TypeScript',
            'UI/UX Design',
            'Responsive',
            'Vite',
            'Livewire',
        ];
    @endphp

    <div class="marquee-band -mt-6 sm:-mt-10 py-4">
        {{-- Row 1: scrolls left --}}
        <div class="marquee-row mb-3" style="--marquee-duration: 52s;">
            @foreach ([false, true] as $isClone)
                @foreach ($techRowPrimary as $tech)
                    <span @if ($isClone) aria-hidden="true" @endif
                          class="marquee-item mx-1.5 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white border border-slate-200/80 text-[13px] font-semibold text-slate-700 shadow-2xs whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                        {{ $tech }}
                    </span>
                @endforeach
            @endforeach
        </div>

        {{-- Row 2: scrolls right, slightly slower --}}
        <div class="marquee-row marquee-row--reverse" style="--marquee-duration-reverse: 62s;">
            @foreach ([false, true] as $isClone)
                @foreach ($techRowSecondary as $tech)
                    <span @if ($isClone) aria-hidden="true" @endif
                          class="marquee-item mx-1.5 inline-flex items-center gap-2 px-4 py-2 rounded-full bg-blue-50/70 border border-blue-100 text-[13px] font-semibold text-blue-900/80 whitespace-nowrap">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                        {{ $tech }}
                    </span>
                @endforeach
            @endforeach
        </div>
    </div>

    {{-- ========================================================================= --}}
    {{-- 2. TENTANG SAYA SECTION (#tentang) --}}
    {{-- ========================================================================= --}}
    <section id="tentang" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">

        {{-- Left: Human-friendly Story & Badges --}}
        <div class="lg:col-span-7 space-y-6" data-anim="left">

            <div class="space-y-2">
                <span class="text-xs font-black tracking-widest text-blue-600 uppercase">PROFIL SINGKAT</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                    <span class="inline-block relative pb-2.5">
                        Tentang
                        <span class="absolute bottom-0 left-0 w-full h-1.5 bg-slate-900 rounded-full" data-underline></span>
                    </span>
                    Saya
                </h2>
            </div>

            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                Halo! Saya <strong class="text-slate-900 font-bold">Angga Nugraha Sofyan</strong>, lulusan Teknik Informatika yang fokus mendalami dunia pembuatan website. Bagi saya, website yang baik bukan hanya tentang kode yang berjalan di balik layar, tapi juga tentang bagaimana tampilan dan fungsinya terasa mudah, nyaman, dan ramah saat digunakan oleh siapa saja.
            </p>

            <p class="text-sm sm:text-base text-slate-600 leading-relaxed font-normal">
                Saya terbiasa membuat website dari awal sampai jadi—mulai dari mendesain tampilan depan (frontend) yang enak dilihat di HP maupun laptop, hingga mengatur sistem dan data di balik layar (backend) agar berjalan cepat dan aman. Proyek yang saya kembangkan berfokus pada manfaat nyata bagi masyarakat, seperti sistem pengaduan aspirasi warga desa (SIPMAS) dan sistem pelayanan surat digital (Smart Desa Subang).
            </p>

            {{-- Info Chips --}}
            <div class="flex flex-wrap items-center gap-2.5 pt-2">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white border border-slate-200/90 text-slate-700 shadow-2xs">
                    <span>🎓</span> S1 Teknik Informatika (Mahasiswa)
                </span>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white border border-slate-200/90 text-slate-700 shadow-2xs">
                    <span>📍</span> Subang / Bandung, Jawa Barat
                </span>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-white border border-slate-200/90 text-slate-700 shadow-2xs">
                    <span>✉️</span> Siap Magang & Kerja Sama Proyek
                </span>
            </div>

        </div>

        {{-- Right: 3 Metric Bento Cards Stack --}}
        <div class="lg:col-span-5 space-y-3.5">

            {{-- Stat 1 --}}
            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-5 flex items-center justify-between hover:border-blue-300 transition duration-200 shadow-2xs lift-on-hover" data-anim="right" data-anim-delay="0">
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-blue-600 tracking-tight">3+</div>
                    <div class="text-sm font-bold text-slate-900 mt-0.5">Tahun Pengalaman</div>
                    <p class="text-xs text-slate-500 mt-0.5">Fokus belajar & membangun aplikasi web secara mandiri.</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>

            {{-- Stat 2 --}}
            <div class="bg-orange-50/50 border border-orange-100 rounded-2xl p-5 flex items-center justify-between hover:border-orange-300 transition duration-200 shadow-2xs lift-on-hover" data-anim="right" data-anim-delay="0.09">
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-[#ea580c] tracking-tight">2</div>
                    <div class="text-sm font-bold text-slate-900 mt-0.5">Proyek Utama Selesai</div>
                    <p class="text-xs text-slate-500 mt-0.5">Sistem nyata siap pakai: SIPMAS & Smart Desa Subang.</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#ea580c] flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>

            {{-- Stat 3 --}}
            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-5 flex items-center justify-between hover:border-blue-300 transition duration-200 shadow-2xs lift-on-hover" data-anim="right" data-anim-delay="0.18">
                <div>
                    <div class="text-3xl sm:text-4xl font-black text-blue-600 tracking-tight">3.52<span class="text-xs text-slate-400 font-semibold"> / 4.00</span></div>
                    <div class="text-sm font-bold text-slate-900 mt-0.5">IPK Akademik</div>
                    <p class="text-xs text-slate-500 mt-0.5">Bukti komitmen belajar di bidang Teknik Informatika.</p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5"/>
                    </svg>
                </div>
            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- 3. KEAHLIAN & TECH STACK SECTION (#keahlian) --}}
    {{-- ========================================================================= --}}
    <section id="keahlian" class="space-y-10 sm:space-y-12">

        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto space-y-2" data-anim="up">
            <span class="text-xs font-black tracking-widest text-blue-600 uppercase">KOMPETENSI INTI</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Keahlian & Tech Stack
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                Alat dan teknologi yang saya gunakan sehari-hari untuk mewujudkan website yang rapi, cepat, dan mudah digunakan.
            </p>
        </div>

        {{-- 3 Column Stack Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Card 1: Frontend Development --}}
            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-7 shadow-xs hover:border-blue-300 hover:shadow-md transition duration-200 flex flex-col justify-between lift-on-hover" data-anim="up" data-anim-delay="0">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-100 text-blue-600 flex items-center justify-center font-bold text-xl">
                        💻
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1.5">Frontend Development</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Membangun tampilan website yang rapi, responsif, dan nyaman dibuka dari layar HP maupun komputer.
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-1.5 pt-6 mt-6 border-t border-slate-100" data-pop-group>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Tailwind CSS</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Alpine.js</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Blade</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">TypeScript</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Vue.js</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">HTML5 / CSS3</span>
                </div>
            </div>

            {{-- Card 2: Backend & Database (tanpa Docker sesuai permintaan) --}}
            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-7 shadow-xs hover:border-purple-300 hover:shadow-md transition duration-200 flex flex-col justify-between lift-on-hover" data-anim="up" data-anim-delay="0.11">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-purple-50 border border-purple-100 text-purple-600 flex items-center justify-center font-bold text-xl">
                        ⚙️
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1.5">Backend & Database</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Mengatur pengolahan data, alur keamanan sistem, hak akses pengguna, serta komunikasi data (API) yang andal.
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-1.5 pt-6 mt-6 border-t border-slate-100" data-pop-group>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Laravel</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">PHP 8.4</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">MySQL</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">RESTful API</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Git & GitHub</span>
                </div>
            </div>

            {{-- Card 3: Design & User Flow --}}
            <div class="bg-white border border-slate-200/90 rounded-3xl p-6 sm:p-7 shadow-xs hover:border-orange-300 hover:shadow-md transition duration-200 flex flex-col justify-between lift-on-hover" data-anim="up" data-anim-delay="0.22">
                <div class="space-y-4">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 border border-orange-100 text-[#ea580c] flex items-center justify-center font-bold text-xl">
                        🎨
                    </div>
                    <div>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900 mb-1.5">Design & User Flow</h3>
                        <p class="text-xs text-slate-500 leading-relaxed">
                            Merancang tampilan antarmuka dan alur pengguna agar setiap langkah terasa alami, jelas, dan mudah dipahami.
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-1.5 pt-6 mt-6 border-t border-slate-100" data-pop-group>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Figma</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">UI/UX Design</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Design System</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Prototyping</span>
                    <span class="text-[11px] font-semibold bg-slate-100 text-slate-700 px-3 py-1 rounded-lg border border-slate-200/70">Responsive UI</span>
                </div>
            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- 4. PROYEK PILIHAN SECTION (#proyek) - HANYA 2 PROYEK UTAMA SESUAI PERMINTAAN --}}
    {{-- ========================================================================= --}}
    <section id="proyek" class="space-y-10">

        {{-- Section Header --}}
        <div class="space-y-1.5 max-w-2xl" data-anim="up">
            <span class="text-xs font-black tracking-widest text-[#ea580c] uppercase">PORTOFOLIO KARYA NYATA</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Proyek Pilihan
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                Dua aplikasi web utama yang telah berhasil dirancang dan diimplementasikan untuk kebutuhan digitalisasi layanan masyarakat.
            </p>
        </div>

        {{-- 2 Cards Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- 1. SIPMAS --}}
            <div class="spotlight-card project-card bg-white border border-slate-200/90 rounded-3xl overflow-hidden shadow-xs hover:border-blue-300 flex flex-col justify-between group"
                 style="--spot-rgb: 37 99 235;"
                 data-spotlight
                 data-project-card>
                <div>
                    <x-project-slider
                        :images="[
                            ['src' => 'images/projects/sipmas/landing-page.jpg', 'label' => 'Landing Page'],
                            ['src' => 'images/projects/sipmas/dashboard-user.png', 'label' => 'Dashboard Warga'],
                            ['src' => 'images/projects/sipmas/admin-dashboard.png', 'label' => 'Dashboard Admin'],
                            ['src' => 'images/projects/sipmas/verifikasi-laporan.png', 'label' => 'Verifikasi Laporan'],
                            ['src' => 'images/projects/sipmas/admin-panel.png', 'label' => 'Rekapitulasi & Statistik'],
                        ]"
                        url="sipmas.desa-sagalaherang.id"
                        year="2026"
                        accent="blue"
                        title="SIPMAS — Sistem Informasi Pengaduan Masyarakat"
                    />

                    {{-- Card Info --}}
                    <div class="p-6 sm:p-7 space-y-3.5">
                        <div class="flex flex-wrap items-center gap-2 text-xs font-semibold text-slate-500" data-project-part>
                            <span class="px-2.5 py-0.5 rounded-md bg-blue-50 text-blue-700 font-bold">Laravel</span>
                            <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">Tailwind CSS</span>
                            <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">MySQL</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-blue-600 transition" data-project-part>
                            SIPMAS — Sistem Informasi Pengaduan Masyarakat
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal" data-project-part>
                            Platform digitalisasi penampungan aspirasi dan pengaduan warga Desa Sagalaherang. Memudahkan warga melapor keluhan fasilitas umum secara online serta memantau proses tindak lanjut perangkat desa secara langsung dan transparan.
                        </p>
                    </div>
                </div>

                <div class="project-cta px-6 sm:px-7 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between" data-project-part>
                    <button type="button"
                            @click="openPreview('{{ asset('images/projects/sipmas/landing-page.jpg') }}', 'SIPMAS — Sistem Informasi Pengaduan Masyarakat')"
                            class="text-xs sm:text-sm font-bold text-blue-600 hover:text-blue-700 flex items-center gap-1.5 whitespace-nowrap transition-colors">
                    </button>
                    <span class="text-[11px] font-mono text-slate-400 font-medium whitespace-nowrap shrink-0">Desa Sagalaherang</span>
                </div>
            </div>

            {{-- 2. Smart Desa Subang --}}
            <div class="spotlight-card project-card bg-white border border-slate-200/90 rounded-3xl overflow-hidden shadow-xs hover:border-green-300 flex flex-col justify-between group"
                 style="--spot-rgb: 22 163 74;"
                 data-spotlight
                 data-project-card>
                <div>
                    <x-project-slider
                        :images="[
                            ['src' => 'images/projects/smartdesa/home-portal.jpg', 'label' => 'Portal Beranda'],
                            ['src' => 'images/projects/smartdesa/berita-desa.jpg', 'label' => 'Berita Desa'],
                            ['src' => 'images/projects/smartdesa/program-desa.jpg', 'label' => 'Program Desa'],
                        ]"
                        url="smartdesa.subang.go.id"
                        year="2025"
                        accent="green"
                        title="Smart Desa Subang — Layanan Surat & TTE Digital Kades"
                    />

                    {{-- Card Info --}}
                    <div class="p-6 sm:p-7 space-y-3.5">
                        <div class="flex flex-wrap items-center gap-2 text-xs font-semibold text-slate-500" data-project-part>
                            <span class="px-2.5 py-0.5 rounded-md bg-green-50 text-green-700 font-bold">Laravel</span>
                            <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">TTE Digital</span>
                            <span class="px-2.5 py-0.5 rounded-md bg-slate-100 text-slate-700">Multi-Role</span>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold text-slate-900 group-hover:text-green-600 transition" data-project-part>
                            Smart Desa — Layanan Surat & TTE Digital
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal" data-project-part>
                            Aplikasi pelayanan administrasi persuratan desa se-Kabupaten Subang. Warga dapat mengajukan surat keterangan secara mandiri yang divalidasi bertingkat dan disahkan melalui Tanda Tangan Elektronik resmi Kepala Desa.
                        </p>
                    </div>
                </div>

                <div class="project-cta px-6 sm:px-7 pb-6 pt-3 border-t border-slate-100 flex items-center justify-between" data-project-part>
                    <button type="button"
                            @click="openPreview('{{ asset('images/projects/smartdesa/home-portal.jpg') }}', 'Smart Desa Subang — Layanan SK & TTE Digital Kades')"
                            class="text-xs sm:text-sm font-bold text-green-600 hover:text-green-700 flex items-center gap-1.5 whitespace-nowrap transition-colors">
                    </button>
                    <span class="text-[11px] font-mono text-slate-400 font-medium whitespace-nowrap shrink-0">Pemda Subang</span>
                </div>
            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- 5. RIWAYAT PENGALAMAN KERJA SECTION (#pengalaman) - PISAHKAN 2026 & 2025 --}}
    {{-- ========================================================================= --}}
    <section id="pengalaman" class="space-y-12">

        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto space-y-2" data-anim="up">
            <span class="text-xs font-black tracking-widest text-blue-600 uppercase">JEJAK PENGALAMAN</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 tracking-tight">
                Riwayat Pengalaman Kerja
            </h2>
            <p class="text-xs sm:text-sm text-slate-500 leading-relaxed">
                Jejak pembuatan proyek aplikasi nyata yang telah saya kerjakan dari tahun ke tahun.
            </p>
        </div>

        {{-- Vertical Timeline with Center Line --}}
        <div class="relative max-w-4xl mx-auto">

            {{-- Center Line (inner element is scaled by GSAP ScrollTrigger) --}}
            <div class="absolute left-1/2 -translate-x-1/2 top-4 bottom-4 w-0.5 hidden md:block">
                <div class="h-full w-full bg-blue-100 rounded-full" data-timeline-line></div>
            </div>

            <div class="space-y-10 md:space-y-14">

                {{-- Item 1: Left Card (Tahun 2026 - SIPMAS) --}}
                <div class="relative flex flex-col md:flex-row items-center" data-anim="left">
                    <div class="md:w-1/2 md:pr-10 text-center md:text-right space-y-2">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                            Tahun 2026
                        </span>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900">SIPMAS — Sistem Informasi Pengaduan Masyarakat</h3>
                        <p class="text-xs font-semibold text-blue-600">Tugas Akhir · Desa Sagalaherang, Kabupaten Subang</p>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                            Merancang dan membangun aplikasi web pengaduan online untuk warga Desa Sagalaherang. Memudahkan warga menyampaikan keluhan dan usulan langsung dari smartphone tanpa perlu datang ke kantor desa, serta alur penanganan laporan dapat dipantau bersama secara transparan hingga tuntas.
                        </p>
                    </div>

                    {{-- Milestone Node --}}
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-blue-600 ring-4 ring-blue-100 hidden md:block"></div>

                    <div class="md:w-1/2 md:pl-10 hidden md:block"></div>
                </div>

                {{-- Item 2: Right Card (Tahun 2025 - SMART DESA) --}}
                <div class="relative flex flex-col md:flex-row items-center" data-anim="right">
                    <div class="md:w-1/2 md:pr-10 hidden md:block"></div>

                    {{-- Milestone Node --}}
                    <div class="absolute left-1/2 -translate-x-1/2 w-4 h-4 rounded-full bg-[#ea580c] ring-4 ring-orange-100 hidden md:block"></div>

                    <div class="md:w-1/2 md:pl-10 text-center md:text-left space-y-2">
                        <span class="inline-flex items-center px-3.5 py-1 rounded-full text-xs font-bold bg-orange-50 text-[#ea580c] border border-orange-200">
                            Tahun 2025
                        </span>
                        <h3 class="text-base sm:text-lg font-bold text-slate-900">Smart Desa Subang — Layanan Surat & TTE Digital</h3>
                        <p class="text-xs font-semibold text-[#ea580c]">Web Developer · Pemerintah Daerah Kabupaten Subang</p>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed font-normal">
                            Mengembangkan sistem digitalisasi permohonan berbagai surat keterangan desa (seperti SKTM, SK Domisili, dll.). Warga dapat mengajukan permohonan secara online dari rumah, diverifikasi berjenjang oleh perangkat desa, dan disahkan dengan Tanda Tangan Elektronik (TTE) resmi Kepala Desa.
                        </p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- 6. MARI MULAI BEKERJA SAMA / KONTAK SECTION (#kontak) --}}
    {{-- ========================================================================= --}}
    <section id="kontak" class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 text-white p-6 sm:p-10 lg:p-14 shadow-2xl" data-anim="scale">

        {{-- Background Ambient Patterns --}}
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-white/10 rounded-full blur-3xl pointer-events-none" data-parallax="-70"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-400/20 rounded-full blur-3xl pointer-events-none" data-parallax="70"></div>

        <div class="relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">

            {{-- Left Side: Contact Pitch & Coordinates --}}
            <div class="lg:col-span-5 space-y-6">

                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-bold bg-white/15 text-blue-100 border border-white/20 backdrop-blur-xs">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    KONSULTASI & KOLABORASI
                </span>

                <div class="space-y-2">
                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight leading-tight">
                        Mari Mulai Bekerja Sama
                    </h2>
                    <p class="text-xs sm:text-sm text-blue-100/90 leading-relaxed font-normal">
                        Punya ide proyek menarik, membutuhkan website untuk instansi/usaha, atau ingin berdiskusi? Jangan ragu untuk menghubungi saya!
                    </p>
                </div>

                {{-- Contact Coordinates --}}
                @php
                    $ownerEmail = config('mail.owner.address');
                    $ownerPhone = (string) config('mail.owner.phone');
                    $ownerPhoneDisplay = trim(chunk_split($ownerPhone, 4, ' '));
                    $ownerPhoneIntl = '62'.ltrim($ownerPhone, '0');
                @endphp

                <div class="space-y-3 pt-2 text-xs">

                    <a href="mailto:{{ $ownerEmail }}" class="flex items-center gap-3.5 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl p-3.5 transition group">
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center font-bold text-white flex-shrink-0 group-hover:scale-105 transition">
                            ✉️
                        </div>
                        <div class="min-w-0">
                            <div class="text-[10px] uppercase font-bold text-blue-200">Email Resmi</div>
                            <div class="font-bold text-white break-all">{{ $ownerEmail }}</div>
                        </div>
                    </a>

                    <a href="https://wa.me/{{ $ownerPhoneIntl }}" target="_blank" rel="noopener" class="flex items-center gap-3.5 bg-white/10 hover:bg-white/20 border border-white/10 rounded-2xl p-3.5 transition group">
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center font-bold text-white flex-shrink-0 group-hover:scale-105 transition">
                            📱
                        </div>
                        <div class="min-w-0">
                            <div class="text-[10px] uppercase font-bold text-blue-200">WhatsApp / Telepon</div>
                            <div class="font-bold text-white whitespace-nowrap">{{ $ownerPhoneDisplay }}</div>
                        </div>
                    </a>

                    <div class="flex items-center gap-3.5 bg-white/10 border border-white/10 rounded-2xl p-3.5">
                        <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center font-bold text-white flex-shrink-0">
                            📍
                        </div>
                        <div>
                            <div class="text-[10px] uppercase font-bold text-blue-200">Domisili</div>
                            <div class="font-bold text-white">Subang / Bandung, Jawa Barat</div>
                        </div>
                    </div>

                </div>

                {{-- Social Icons --}}
                <div class="pt-2 flex items-center gap-3">
                    @if (filled(config('portfolio.social.github')))
                        <a href="{{ config('portfolio.social.github') }}" target="_blank" rel="noopener noreferrer" aria-label="GitHub" title="GitHub" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 flex items-center justify-center text-white transition hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    @endif
                    @if (filled(config('portfolio.social.linkedin')))
                        <a href="{{ config('portfolio.social.linkedin') }}" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn" title="LinkedIn" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 border border-white/10 flex items-center justify-center text-white transition hover:scale-105">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                    @endif
                </div>

            </div>

            {{-- Right Side: Integrated Direct Contact Form Card --}}
            <div class="lg:col-span-7 bg-white text-slate-900 rounded-3xl p-6 sm:p-8 shadow-2xl">

                <div class="mb-5 space-y-1">
                    <h3 class="text-xl font-bold text-slate-900">Kirim Pesan Langsung</h3>
                    <p class="text-xs text-slate-500">Respon biasa diberikan dalam waktu kurang dari 24 jam kerja.</p>
                </div>

                {{-- Success Flash --}}
                @if(session('success'))
                <div class="mb-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-3.5 text-xs flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span>✅</span>
                        <span class="font-bold">{{ session('success') }}</span>
                    </div>
                </div>
                @endif

                {{-- Failure Flash --}}
                @if(session('error'))
                <div class="mb-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl p-3.5 text-xs flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span>⚠️</span>
                        <span class="font-bold">{{ session('error') }}</span>
                    </div>
                </div>
                @endif

                {{-- Form Element --}}
                <form action="{{ route('contact.send') }}" method="POST"
                      x-data="{ submitting: false }"
                      @submit="submitting = true"
                      class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Nama Anda"
                               required
                               class="w-full bg-slate-50 border @error('name') border-rose-300 @else border-slate-200 @enderror
                                      text-slate-900 text-xs sm:text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                      focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                        @error('name')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Alamat Email</label>
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="email@anda.com"
                               required
                               class="w-full bg-slate-50 border @error('email') border-rose-300 @else border-slate-200 @enderror
                                      text-slate-900 text-xs sm:text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                      focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                        @error('email')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <input type="hidden" name="subject" value="Pesan dari Portofolio Web">

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1.5 uppercase tracking-wider">Pesan / Detail Proyek</label>
                        <textarea name="message"
                                  rows="3"
                                  placeholder="Tuliskan pesan atau kebutuhan proyek Anda di sini..."
                                  required
                                  class="w-full bg-slate-50 border @error('message') border-rose-300 @else border-slate-200 @enderror
                                         text-slate-900 text-xs sm:text-sm placeholder-slate-400 rounded-xl px-4 py-3
                                         focus:bg-white focus:outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition resize-none">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-xs text-rose-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Terracotta Button --}}
                    <button type="submit"
                            :disabled="submitting"
                            class="btn-terracotta w-full flex items-center justify-center gap-2 font-bold py-3.5 px-6 rounded-xl text-xs sm:text-sm active:scale-95 disabled:opacity-60 transition">
                        <span x-show="!submitting">Kirim Pesan Sekarang ↗</span>
                        <span x-show="submitting" class="flex items-center gap-2">
                            <svg class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                            Mengirim...
                        </span>
                    </button>

                </form>

            </div>

        </div>

    </section>

    {{-- ========================================================================= --}}
    {{-- LIGHTBOX PREVIEW MODAL --}}
    {{-- ========================================================================= --}}
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

</div>

@endsection
