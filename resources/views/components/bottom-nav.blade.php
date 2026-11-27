{{-- Bottom Navigation Component --}}
<nav class="fixed bottom-0 left-0 right-0 z-50 bg-[#13161D]/95 backdrop-blur-xl border-t border-white/5">
    <div class="max-w-lg mx-auto px-4 py-2">
        <div class="flex items-center justify-around">

            {{-- Home --}}
            <a href="{{ route('home') }}"
               class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all duration-200
                      {{ request()->routeIs('home') ? 'text-[#F59E0B]' : 'text-gray-500 hover:text-gray-300' }}">
                <svg class="w-5 h-5" fill="{{ request()->routeIs('home') ? 'currentColor' : 'none' }}"
                     stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="text-[10px] font-medium">Beranda</span>
            </a>

            {{-- Projects --}}
            <a href="{{ route('projects') }}"
               class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all duration-200
                      {{ request()->routeIs('projects') ? 'text-[#F59E0B]' : 'text-gray-500 hover:text-gray-300' }}">
                <svg class="w-5 h-5" fill="{{ request()->routeIs('projects') ? 'currentColor' : 'none' }}"
                     stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <span class="text-[10px] font-medium">Proyek</span>
            </a>

            {{-- Contact --}}
            <a href="{{ route('contact') }}"
               class="flex flex-col items-center gap-1 px-4 py-2 rounded-xl transition-all duration-200
                      {{ request()->routeIs('contact') ? 'text-[#F59E0B]' : 'text-gray-500 hover:text-gray-300' }}">
                <svg class="w-5 h-5" fill="{{ request()->routeIs('contact') ? 'currentColor' : 'none' }}"
                     stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="text-[10px] font-medium">Kontak</span>
            </a>

        </div>
    </div>
</nav>
