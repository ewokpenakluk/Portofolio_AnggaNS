{{--
    Animated project screenshot slider.

    Usage:
        <x-project-slider
            :images="[
                ['src' => 'images/projects/sipmas/landing-page.jpg', 'label' => 'Landing Page', 'alt' => '...'],
                ['src' => 'images/projects/sipmas/admin-panel.png',  'label' => 'Admin Panel',  'alt' => '...'],
            ]"
            url="sipmas.desa-sagalaherang.id"
            year="2026"
            accent="blue"
            title="SIPMAS — Sistem Informasi Pengaduan Masyarakat"
        />

    Slides are animated with GSAP (see resources/js/slider.js). Without JS the
    first screenshot is still shown, so the card never appears broken.
--}}
@props([
    'images' => [],
    'url' => '',
    'year' => '',
    'title' => '',
    'accent' => 'blue',
    'interval' => 4500,
])

@php
    $slides = collect($images)->values()->map(fn ($image) => [
        'src' => asset($image['src']),
        'label' => $image['label'] ?? '',
        'alt' => $image['alt'] ?? ($image['label'] ?? ''),
    ])->all();

    $accents = [
        'blue' => [
            'dot' => 'bg-blue-600',
            'dotIdle' => 'bg-slate-300 hover:bg-slate-400',
            'arrow' => 'hover:bg-blue-600 hover:border-blue-600',
            'badge' => 'text-blue-700 bg-blue-50 border-blue-200/70',
            'progress' => 'bg-blue-600',
            'caption' => 'text-blue-700',
        ],
        'green' => [
            'dot' => 'bg-green-600',
            'dotIdle' => 'bg-slate-300 hover:bg-slate-400',
            'arrow' => 'hover:bg-green-700 hover:border-green-700',
            'badge' => 'text-emerald-700 bg-emerald-50 border-emerald-200/70',
            'progress' => 'bg-green-600',
            'caption' => 'text-green-700',
        ],
    ];

    $theme = $accents[$accent] ?? $accents['blue'];
    $count = count($slides);
@endphp

<div class="border-b border-slate-200/80 bg-slate-50/90 select-none"
     data-project-part
     x-data="projectSlider({
         slides: @js($slides),
         interval: {{ (int) $interval }},
     })"
     @mouseenter="pause()"
     @mouseleave="resume()"
     @focusin="pause()"
     @focusout="if (! $el.contains($event.relatedTarget)) resume()">

    {{-- Browser address bar --}}
    <div class="px-4 py-2.5 bg-slate-100/90 border-b border-slate-200/70 flex items-center justify-between gap-2">
        <div class="flex items-center gap-1.5 flex-shrink-0">
            <span class="w-2.5 h-2.5 rounded-full bg-rose-400"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
        </div>

        <div class="text-[11px] font-mono text-slate-500 bg-white px-3 py-0.5 rounded-md border border-slate-200 truncate max-w-[200px] sm:max-w-xs shadow-2xs">
            {{ $url }}
        </div>

        <span class="text-[10px] font-bold {{ $theme['badge'] }} px-2 py-0.5 rounded-md border flex-shrink-0">
            {{ $year }}
        </span>
    </div>

    {{-- Slide viewport --}}
    <div class="relative group/slider">
        <div class="project-media relative p-3 sm:p-4 bg-slate-50 flex items-center justify-center aspect-[2/1]"
             tabindex="0"
             @keydown.arrow-left.prevent="prev()"
             @keydown.arrow-right.prevent="next()"
             role="group"
             aria-roledescription="carousel"
             aria-label="{{ $title ?: 'Pratinjau tangkapan layar' }}">

            @foreach ($slides as $i => $slide)
                <img src="{{ $slide['src'] }}"
                     alt="{{ $slide['alt'] }}"
                     data-slide
                     draggable="false"
                     @if ($i > 0) style="visibility: hidden; opacity: 0;" @endif
                     class="absolute inset-0 m-auto max-h-[calc(100%-1.5rem)] max-w-[calc(100%-1.5rem)] w-auto h-auto object-contain rounded-xl shadow-xs border border-slate-200/80 cursor-zoom-in"
                     @click="$dispatch('open-preview', { src: '{{ $slide['src'] }}', title: '{{ $slide['label'] ? $slide['label'] . ' — ' : '' }}{{ $title }}' })">
            @endforeach

            {{-- Prev / Next --}}
            @if ($count > 1)
                <button type="button"
                        @click.stop="prev()"
                        aria-label="Foto sebelumnya"
                        class="absolute left-2 sm:left-3 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full
                               bg-white/90 backdrop-blur border border-slate-200 text-slate-700
                               flex items-center justify-center shadow-md transition
                               opacity-100 sm:opacity-0 sm:group-hover/slider:opacity-100 focus:opacity-100
                               {{ $theme['arrow'] }} hover:text-white active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>

                <button type="button"
                        @click.stop="next()"
                        aria-label="Foto berikutnya"
                        class="absolute right-2 sm:right-3 top-1/2 -translate-y-1/2 z-20 w-8 h-8 rounded-full
                               bg-white/90 backdrop-blur border border-slate-200 text-slate-700
                               flex items-center justify-center shadow-md transition
                               opacity-100 sm:opacity-0 sm:group-hover/slider:opacity-100 focus:opacity-100
                               {{ $theme['arrow'] }} hover:text-white active:scale-95">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            @endif

            {{-- Slide counter --}}
            @if ($count > 1)
                <span class="absolute top-2.5 right-2.5 z-20 text-[10px] font-bold text-slate-600 bg-white/90 backdrop-blur border border-slate-200 px-2 py-0.5 rounded-md shadow-2xs">
                    <span x-text="index + 1">{{ $count ? 1 : 0 }}</span> / {{ $count }}
                </span>
            @endif

            {{-- Autoplay progress --}}
            @if ($count > 1)
                <div class="absolute bottom-0 left-0 right-0 h-0.5 bg-slate-200/70 z-20 overflow-hidden">
                    <div x-ref="progressBar"
                         class="h-full w-full origin-left {{ $theme['progress'] }}"
                         style="transform: scaleX(0);"></div>
                </div>
            @endif
        </div>

        {{-- Caption + dots --}}
        @if ($count > 1)
            <div class="px-3 sm:px-4 pb-3 flex items-center justify-between gap-3">
                <span class="text-[11px] font-semibold {{ $theme['caption'] }} truncate"
                      x-text="slides[index] ? slides[index].label : ''">
                    {{ $slides[0]['label'] ?? '' }}
                </span>

                <div class="flex items-center gap-1.5 flex-shrink-0">
                    @foreach ($slides as $i => $slide)
                        <button type="button"
                                @click.stop="goTo({{ $i }})"
                                aria-label="Tampilkan {{ $slide['label'] ?: 'foto ' . ($i + 1) }}"
                                :aria-current="index === {{ $i }} ? 'true' : 'false'"
                                :class="index === {{ $i }} ? '{{ $theme['dot'] }} w-4' : '{{ $theme['dotIdle'] }} w-1.5'"
                                class="h-1.5 rounded-full transition-all duration-300"></button>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
