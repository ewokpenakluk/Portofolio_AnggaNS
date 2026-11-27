<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Angga Nugraha Sofyan — Full-Stack Developer & UI/UX')</title>
    <meta name="description" content="@yield('description', 'Membangun produk digital yang menarik, terukur, dan berpusat pada pengalaman pengguna yang intuitif.')">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Hide animated nodes until GSAP sets its initial states (avoids a flash).
         The timeout is a safety net so content never stays hidden if the
         bundle fails to load. --}}
    <script>
        (function () {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                return;
            }

            var root = document.documentElement;
            root.classList.add('gsap-pending');

            // Last-resort safety net: if the bundle never initialises, show the
            // content instead of leaving the page blank.
            window.setTimeout(function () {
                root.classList.remove('gsap-pending');
            }, 2500);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#F8FAFC] text-slate-900 min-h-screen font-['Plus_Jakarta_Sans','Inter',sans-serif] antialiased selection:bg-blue-600 selection:text-white"
      x-data="{
          mobileMenu: false,
          activeSection: 'tentang',
          init() {
              const sections = ['tentang', 'keahlian', 'proyek', 'pengalaman', 'kontak'];
              const observer = new IntersectionObserver((entries) => {
                  entries.forEach(entry => {
                      if (entry.isIntersecting) {
                          this.activeSection = entry.target.id;
                      }
                  });
              }, { rootMargin: '-20% 0px -60% 0px' });

              sections.forEach(id => {
                  const el = document.getElementById(id);
                  if (el) observer.observe(el);
              });
          }
      }">

    {{-- Scroll Progress Indicator --}}
    <div class="scroll-progress" aria-hidden="true"></div>

    {{-- ===== NAVBAR ===== --}}
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200/80 transition-all duration-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">

                {{-- Left: Clean Brand Logo --}}
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="flex items-center gap-2.5 group">
                        <div class="w-9 h-9 rounded-xl bg-blue-600 text-white flex items-center justify-center font-black text-base shadow-sm group-hover:scale-105 transition-transform duration-200">
                            <span>A</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-black text-slate-900 text-sm tracking-widest uppercase group-hover:text-blue-600 transition">PORTFOLIO</span>
                        </div>
                    </a>
                </div>

                {{-- Center: Desktop Pill Nav Links --}}
                <nav class="hidden md:flex items-center gap-1.5 p-1.5 bg-slate-100/80 border border-slate-200/80 rounded-full text-xs font-semibold text-slate-600 shadow-2xs">
                    <a href="{{ request()->routeIs('home') ? '#tentang' : route('home') . '#tentang' }}"
                       :class="activeSection === 'tentang' ? 'bg-white text-blue-600 shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                       class="px-4 py-1.5 rounded-full transition-all duration-200">
                        Tentang
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#keahlian' : route('home') . '#keahlian' }}"
                       :class="activeSection === 'keahlian' ? 'bg-white text-blue-600 shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                       class="px-4 py-1.5 rounded-full transition-all duration-200">
                        Keahlian
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#proyek' : route('home') . '#proyek' }}"
                       :class="activeSection === 'proyek' ? 'bg-white text-blue-600 shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                       class="px-4 py-1.5 rounded-full transition-all duration-200">
                        Proyek
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#pengalaman' : route('home') . '#pengalaman' }}"
                       :class="activeSection === 'pengalaman' ? 'bg-white text-blue-600 shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                       class="px-4 py-1.5 rounded-full transition-all duration-200">
                        Pengalaman
                    </a>
                    <a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}"
                       :class="activeSection === 'kontak' ? 'bg-white text-blue-600 shadow-xs' : 'text-slate-600 hover:text-slate-900'"
                       class="px-4 py-1.5 rounded-full transition-all duration-200">
                        Kontak
                    </a>
                </nav>

                {{-- Right: Terracotta CTA --}}
                <div class="hidden sm:flex items-center">
                    <a href="{{ request()->routeIs('home') ? '#kontak' : route('home') . '#kontak' }}"
                       class="btn-terracotta inline-flex items-center gap-1.5 px-5 py-2.5 rounded-full text-xs font-bold transition shadow-sm active:scale-95">
                        <span>Hubungi Saya</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 17L17 7M17 7H7M17 7V17"/>
                        </svg>
                    </a>
                </div>

                {{-- Mobile Hamburger --}}
                <div class="flex md:hidden">
                    <button @click="mobileMenu = !mobileMenu"
                            type="button"
                            class="p-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus:outline-none transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>

            {{-- Mobile Dropdown Menu --}}
            <div x-show="mobileMenu"
                 x-cloak
                 x-transition:enter="transition-all ease-out duration-300 overflow-hidden"
                 x-transition:enter-start="max-h-0 opacity-0 -translate-y-1"
                 x-transition:enter-end="max-h-96 opacity-100 translate-y-0"
                 x-transition:leave="transition-all ease-in duration-200 overflow-hidden"
                 x-transition:leave-start="max-h-96 opacity-100 translate-y-0"
                 x-transition:leave-end="max-h-0 opacity-0 -translate-y-1"
                 class="md:hidden border-t border-slate-200/80 py-4 space-y-2">
                <a @click="mobileMenu = false" href="#tentang" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">Tentang</a>
                <a @click="mobileMenu = false" href="#keahlian" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">Keahlian</a>
                <a @click="mobileMenu = false" href="#proyek" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">Proyek</a>
                <a @click="mobileMenu = false" href="#pengalaman" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">Pengalaman</a>
                <a @click="mobileMenu = false" href="#kontak" class="block px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-100">Kontak</a>
                <div class="pt-3 border-t border-slate-200">
                    <a @click="mobileMenu = false" href="#kontak" class="btn-terracotta block text-center py-2.5 text-xs font-bold rounded-full">
                        Hubungi Saya ↗
                    </a>
                </div>
            </div>

        </div>
    </header>

    {{-- ===== MAIN CONTENT ===== --}}
    <main>
        @yield('content')
    </main>

    {{-- ===== FOOTER ===== --}}
    <footer class="border-t border-slate-200/90 bg-white mt-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

            {{-- Top Row: Copyright & Back to Top --}}
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500 border-b border-slate-100 pb-6">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>© {{ date('Y') }} <strong>Angga Nugraha Sofyan</strong>. Seluruh Hak Cipta Dilindungi.</span>
                </div>
                <a href="#" class="inline-flex items-center gap-1.5 font-bold text-slate-700 hover:text-blue-600 transition">
                    <span>Kembali ke Atas</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
                    </svg>
                </a>
            </div>

            {{-- Bottom Row: Brand, Quick Links, Rationale --}}
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                {{-- Left: Brand --}}
                <div class="flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-blue-600 text-white flex items-center justify-center font-black text-xs">
                        <span>A</span>
                    </div>
                    <span class="font-black text-slate-900 text-xs tracking-widest uppercase">PORTFOLIO</span>
                </div>

                {{-- Center Links --}}
                <div class="flex items-center gap-6 text-xs font-semibold text-slate-600">
                    <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                    <a href="#proyek" class="hover:text-blue-600 transition">Proyek</a>
                    <a href="#pengalaman" class="hover:text-blue-600 transition">Pengalaman</a>
                    <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
                </div>

                {{-- Right Caption --}}
                <div class="text-xs text-slate-400 font-medium text-center md:text-right">
                    Dirancang & dibangun dengan standar rekayasa presisi.
                </div>

            </div>

        </div>
    </footer>

</body>
</html>
