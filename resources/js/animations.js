import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

gsap.registerPlugin(ScrollTrigger, SplitText);

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/** Shared easing so every section feels like one motion system. */
const EASE = 'power3.out';

/**
 * Direction presets used by `[data-anim]`.
 */
const VARIANTS = {
    up: { y: 44, opacity: 0 },
    down: { y: -32, opacity: 0 },
    left: { x: -56, opacity: 0 },
    right: { x: 56, opacity: 0 },
    scale: { scale: 0.94, opacity: 0 },
    fade: { opacity: 0 },
};

/**
 * GSAP must own the properties it animates. Several nodes also carry Tailwind
 * `transition` utilities, which would otherwise re-smooth every frame GSAP
 * writes. `clearProps: 'all'` on the tweens restores them afterwards.
 */
function suspendCssTransitions(targets) {
    if (!targets || (targets instanceof NodeList && targets.length === 0)) {
        return;
    }

    gsap.set(targets, { transition: 'none' });
}

/**
 * Hero timeline: plays on load and is intentionally the richest moment
 * on the page (masked headline, staggered copy, portrait reveal).
 */
function initHero() {
    const hero = document.querySelector('[data-hero]');

    if (!hero) {
        return;
    }

    const title = hero.querySelector('[data-hero="title"]');
    const copy = hero.querySelectorAll('[data-hero-anim="copy"]');
    const media = hero.querySelector('[data-hero-anim="media"]');
    const badge = hero.querySelector('[data-hero-anim="badge"]');

    suspendCssTransitions(copy);
    suspendCssTransitions(media);
    suspendCssTransitions(badge);

    const tl = gsap.timeline({
        defaults: { ease: EASE, duration: 0.9 },
        delay: 0.1,
    });

    if (title) {
        // SplitText re-splits itself once the webfonts finish loading so the
        // masked lines always match the final typography.
        SplitText.create(title, {
            type: 'lines',
            mask: 'lines',
            linesClass: 'split-line',
            autoSplit: true,
            onSplit: (self) =>
                gsap.from(self.lines, {
                    yPercent: 115,
                    opacity: 0,
                    duration: 1.15,
                    stagger: 0.09,
                    ease: 'power4.out',
                }),
        });
    }

    tl.from(copy, {
        y: 26,
        opacity: 0,
        duration: 0.85,
        stagger: 0.09,
        clearProps: 'all',
    });

    if (media) {
        tl.from(
            media,
            {
                y: 40,
                scale: 0.96,
                opacity: 0,
                duration: 1.15,
                clearProps: 'all',
            },
            '-=0.65',
        );
    }

    if (badge) {
        tl.from(
            badge,
            {
                y: 18,
                scale: 0.9,
                opacity: 0,
                duration: 0.7,
                ease: 'back.out(1.6)',
                clearProps: 'all',
            },
            '-=0.5',
        );
    }
}

/**
 * Featured project cards: the browser frame lands first, then the
 * screenshot, tech chips, title, description and footer unfold in
 * sequence — so the block never appears all at once.
 */
function initProjectCards() {
    const cards = gsap.utils.toArray('[data-project-card]');

    cards.forEach((card, index) => {
        const parts = card.querySelectorAll('[data-project-part]');
        const media = card.querySelector('.project-media img:not([data-slide])');

        suspendCssTransitions(card);
        suspendCssTransitions(parts);
        suspendCssTransitions(media);

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none none',
            },
            delay: index * 0.18,
        });

        tl.from(card, {
            y: 64,
            opacity: 0,
            duration: 1,
            ease: EASE,
            clearProps: 'all',
        });

        if (parts.length) {
            tl.from(
                parts,
                {
                    y: 26,
                    opacity: 0,
                    duration: 0.8,
                    stagger: 0.1,
                    ease: 'power2.out',
                    clearProps: 'all',
                },
                '-=0.72',
            );
        }

        if (media) {
            tl.from(
                media,
                {
                    scale: 1.08,
                    opacity: 0,
                    duration: 1,
                    ease: EASE,
                    clearProps: 'all',
                },
                '-=0.85',
            );
        }
    });
}

/**
 * Generic scroll reveals driven by `[data-anim]` + `[data-anim-child]`.
 */
function initScrollReveals() {
    const elements = gsap.utils.toArray('[data-anim]');

    elements.forEach((element) => {
        const variant = VARIANTS[element.dataset.anim] ?? VARIANTS.up;
        const delay = parseFloat(element.dataset.animDelay ?? '0');
        const children = element.querySelectorAll('[data-anim-child]');
        const step = parseFloat(element.dataset.animChildStep ?? '0.09');

        suspendCssTransitions(element);
        suspendCssTransitions(children);

        const tl = gsap.timeline({
            delay,
            scrollTrigger: {
                trigger: element,
                start: 'top 88%',
                toggleActions: 'play none none none',
            },
        });

        tl.from(element, {
            ...variant,
            duration: 0.95,
            ease: EASE,
            clearProps: 'all',
        });

        if (children.length) {
            tl.from(
                children,
                {
                    y: 24,
                    opacity: 0,
                    duration: 0.75,
                    stagger: step,
                    ease: 'power2.out',
                    clearProps: 'all',
                },
                '-=0.7',
            );
        }
    });
}

/**
 * Experience timeline: the vertical line draws itself while scrolling and
 * each milestone slides in from its own side.
 */
function initTimeline() {
    const line = document.querySelector('[data-timeline-line]');

    if (line) {
        gsap.from(line, {
            scaleY: 0,
            transformOrigin: 'top center',
            ease: 'none',
            scrollTrigger: {
                trigger: line.parentElement,
                start: 'top 75%',
                end: 'bottom 75%',
                scrub: 0.6,
            },
        });
    }
}

/**
 * Skill chips pop into focus: a small upward hop plus a spring
 * overshoot while the blur clears. `play none none none` means the
 * group animates the first time only and never replays on scroll up.
 */
function initChipPop() {
    gsap.utils.toArray('[data-pop-group]').forEach((group) => {
        const items = group.querySelectorAll(':scope > *');

        if (!items.length) {
            return;
        }

        gsap.set(items, { opacity: 0, scale: 0.86, y: 14, filter: 'blur(6px)' });

        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: group,
                start: 'top 92%',
                toggleActions: 'play none none none',
            },
        });

        // Transform and opacity overshoot; the blur is tweened separately so
        // the spring easing never produces a negative blur radius.
        tl.to(items, {
            opacity: 1,
            scale: 1,
            y: 0,
            duration: 0.7,
            ease: 'back.out(1.7)',
            stagger: 0.045,
            clearProps: 'transform',
        }, 0);

        tl.to(items, {
            filter: 'blur(0px)',
            duration: 0.45,
            ease: 'power2.out',
            stagger: 0.045,
            clearProps: 'filter',
        }, 0);
    });
}

/**
 * Soft light that trails the pointer across a card. Only the pointer
 * coordinates are written, as CSS custom properties, so the overlay
 * itself stays `pointer-events: none`.
 */
function initSpotlight() {
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        return;
    }

    gsap.utils.toArray('[data-spotlight]').forEach((card) => {
        card.addEventListener(
            'pointermove',
            (event) => {
                const rect = card.getBoundingClientRect();

                card.style.setProperty('--spot-x', `${event.clientX - rect.left}px`);
                card.style.setProperty('--spot-y', `${event.clientY - rect.top}px`);
            },
            { passive: true },
        );
    });
}

/**
 * Buttons lean towards the cursor and press down on click. Only the
 * translate/scale channels are touched, so the element keeps its layout.
 */
function initMagnetic() {
    if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
        return;
    }

    const pull = 0.22;

    gsap.utils.toArray('[data-magnetic]').forEach((element) => {
        const xTo = gsap.quickTo(element, 'x', { duration: 0.45, ease: 'power3.out' });
        const yTo = gsap.quickTo(element, 'y', { duration: 0.45, ease: 'power3.out' });
        const scaleTo = gsap.quickTo(element, 'scale', { duration: 0.3, ease: 'power2.out' });

        element.addEventListener('pointermove', (event) => {
            const rect = element.getBoundingClientRect();

            xTo((event.clientX - (rect.left + rect.width / 2)) * pull);
            yTo((event.clientY - (rect.top + rect.height / 2)) * pull);
        });

        element.addEventListener('pointerleave', () => {
            xTo(0);
            yTo(0);
            scaleTo(1);
        });

        element.addEventListener('pointerdown', () => scaleTo(0.96));
        element.addEventListener('pointerup', () => scaleTo(1));
    });
}

/**
 * Section underline that draws itself from the left.
 */
function initUnderline() {
    gsap.utils.toArray('[data-underline]').forEach((element) => {
        gsap.from(element, {
            scaleX: 0,
            duration: 0.85,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: element,
                start: 'top 92%',
                toggleActions: 'play none none none',
            },
        });
    });
}

/**
 * Slow parallax drift for the decorative glow blobs.
 */
function initAmbientParallax() {
    gsap.utils.toArray('[data-parallax]').forEach((element) => {
        const strength = parseFloat(element.dataset.parallax ?? '40');

        gsap.to(element, {
            y: strength,
            ease: 'none',
            scrollTrigger: {
                trigger: element.closest('section') ?? element,
                start: 'top bottom',
                end: 'bottom top',
                scrub: 0.8,
            },
        });
    });
}

/**
 * Scroll progress bar at the very top of the viewport.
 */
function initScrollProgress() {
    const bar = document.querySelector('.scroll-progress');

    if (!bar) {
        return;
    }

    gsap.to(bar, {
        scaleX: 1,
        ease: 'none',
        scrollTrigger: {
            trigger: document.body,
            start: 'top top',
            end: 'bottom bottom',
            scrub: 0.25,
        },
    });
}

/**
 * A page can open already scrolled — a reload, or a deep link such as
 * `/#proyek`. Reveals whose trigger starts above the viewport would stay at
 * their hidden "from" state until the visitor scrolls past them again, so
 * those are jumped straight to their finished state.
 *
 * Skipped on a normal top-of-page load so the first reveals still play.
 */
function finishRevealsAboveViewport() {
    if (window.scrollY < 40) {
        return;
    }

    const viewportBottom = window.scrollY + window.innerHeight;

    ScrollTrigger.getAll().forEach((trigger) => {
        if (trigger.vars.scrub || !trigger.animation) {
            return;
        }

        if (trigger.start <= viewportBottom) {
            trigger.animation.progress(1);
        }
    });
}

/**
 * Bootstrap every animation. Runs once the document is ready.
 *
 * The `gsap-pending` class is always removed, even if a tween fails to build:
 * a broken animation must never leave the page blank.
 */
export function initAnimations() {
    if (prefersReducedMotion) {
        document.documentElement.classList.remove('gsap-pending');

        return;
    }

    try {
        gsap.defaults({ ease: EASE });

        // One feature must never take the whole page down, so every step is
        // isolated: a single failure cannot leave the rest half-animated.
        const steps = [
            ['hero', initHero],
            ['project cards', initProjectCards],
            ['scroll reveals', initScrollReveals],
            ['timeline', initTimeline],
            ['chip pop', initChipPop],
            ['spotlight', initSpotlight],
            ['magnetic', initMagnetic],
            ['underline', initUnderline],
            ['parallax', initAmbientParallax],
            ['scroll progress', initScrollProgress],
        ];

        steps.forEach(([name, run]) => {
            try {
                run();
            } catch (error) {
                console.error(`[animations] step failed: ${name}`, error);
            }
        });

        finishRevealsAboveViewport();

        // Images change the document height; recompute trigger positions.
        window.addEventListener('load', () => {
            ScrollTrigger.refresh();
            finishRevealsAboveViewport();
        });

        window.__gsapReady = true;
    } catch (error) {
        console.error('[animations] failed to initialise GSAP', error);

        // A half-built timeline can leave inline `opacity: 0` behind, so strip
        // every animation property and let the page render plainly.
        gsap.set(
            '[data-anim], [data-anim-child], [data-hero-anim], [data-hero="title"], [data-project-card], [data-project-part], [data-pop-group] > *',
            { clearProps: 'all' },
        );
    } finally {
        document.documentElement.classList.remove('gsap-pending');
    }
}
