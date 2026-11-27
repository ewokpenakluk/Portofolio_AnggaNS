import { gsap } from 'gsap';

const prefersReducedMotion = () => window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * Animated project screenshot slider.
 *
 * Registered as an Alpine data component so any number of sliders can live on
 * the page. GSAP owns the transition: the outgoing shot slides out and fades
 * while the incoming one glides in with a slight overshoot of scale, giving the
 * screenshots a physical, layered feel instead of a hard cut.
 */
export function registerProjectSlider() {
    window.Alpine.data('projectSlider', (config = {}) => ({
        slides: config.slides ?? [],
        index: 0,
        interval: config.interval ?? 4500,
        isAnimating: false,
        isPaused: false,
        progressTween: null,

        init() {
            if (this.slides.length === 0) {
                return;
            }

            this.$nextTick(() => {
                this.setInitialState();
                this.restartAutoplay();
            });
        },

        destroy() {
            this.killProgress();

            gsap.killTweensOf(this.slideElements);
        },

        get slideElements() {
            if (!this.$root) {
                return [];
            }

            return Array.from(this.$root.querySelectorAll('[data-slide]'));
        },

        setInitialState() {
            const slides = this.slideElements;

            slides.forEach((slide, i) => {
                gsap.set(slide, {
                    autoAlpha: i === 0 ? 1 : 0,
                    xPercent: 0,
                    scale: 1,
                    zIndex: i === 0 ? 3 : 1,
                });
            });
        },

        goTo(target) {
            const total = this.slides.length;

            if (total < 2) {
                return;
            }

            const next = ((target % total) + total) % total;

            if (this.isAnimating || next === this.index) {
                return;
            }

            const slides = this.slideElements;
            const current = slides[this.index];
            const incoming = slides[next];

            if (!current || !incoming) {
                return;
            }

            // Direction is derived from where we are heading, so the motion
            // always reads as "moving forward" or "moving back".
            const forward = ((next - this.index + total) % total) <= total / 2;
            const direction = forward ? 1 : -1;

            this.isAnimating = true;
            this.killProgress();

            if (prefersReducedMotion()) {
                gsap.set(current, { autoAlpha: 0, zIndex: 1 });
                gsap.set(incoming, { autoAlpha: 1, zIndex: 3 });

                this.finishTransition(next);

                return;
            }

            gsap.set(incoming, {
                autoAlpha: 1,
                zIndex: 3,
                xPercent: direction * 16,
                scale: 1.05,
            });
            gsap.set(current, { zIndex: 1 });

            gsap
                .timeline({
                    defaults: { ease: 'power3.out' },
                    onComplete: () => this.finishTransition(next),
                })
                .to(
                    current,
                    {
                        autoAlpha: 0,
                        xPercent: -direction * 12,
                        scale: 0.97,
                        duration: 0.55,
                        ease: 'power2.inOut',
                    },
                    0,
                )
                .to(
                    incoming,
                    {
                        xPercent: 0,
                        scale: 1,
                        duration: 0.75,
                    },
                    0,
                );
        },

        finishTransition(next) {
            this.index = next;
            this.isAnimating = false;
            this.restartAutoplay();
        },

        next() {
            this.goTo(this.index + 1);
        },

        prev() {
            this.goTo(this.index - 1);
        },

        pause() {
            this.isPaused = true;

            if (this.progressTween) {
                this.progressTween.pause();
            }
        },

        resume() {
            this.isPaused = false;

            const inFlight = this.progressTween
                && this.progressTween.progress() > 0
                && this.progressTween.progress() < 1;

            if (inFlight) {
                this.progressTween.resume();

                return;
            }

            this.restartAutoplay();
        },

        restartAutoplay() {
            this.killProgress();

            if (this.isPaused || this.slides.length < 2) {
                this.resetProgressBar();

                return;
            }

            const seconds = this.interval / 1000;
            const bar = this.$refs.progressBar;

            if (prefersReducedMotion() || !bar) {
                // Reduced motion: advance quietly without drawing a bar.
                this.progressTween = gsap.to({}, {
                    duration: seconds,
                    onComplete: () => this.next(),
                });

                return;
            }

            this.progressTween = gsap.fromTo(
                bar,
                { scaleX: 0 },
                {
                    scaleX: 1,
                    duration: seconds,
                    ease: 'none',
                    onComplete: () => this.next(),
                },
            );
        },

        resetProgressBar() {
            if (this.$refs.progressBar) {
                gsap.set(this.$refs.progressBar, { scaleX: 0 });
            }
        },

        killProgress() {
            if (this.progressTween) {
                this.progressTween.kill();
                this.progressTween = null;
            }
        },
    }));
}
