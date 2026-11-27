import Alpine from 'alpinejs';

import { initAnimations } from './animations';
import { registerProjectSlider } from './slider';

window.Alpine = Alpine;

// Alpine components must be registered before Alpine boots.
registerProjectSlider();

Alpine.start();

// GSAP takes over the entrance/scroll motion once the DOM is parsed.
initAnimations();
