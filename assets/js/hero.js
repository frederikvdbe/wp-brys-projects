import { gsap } from 'gsap';

// The image fades in and slowly zooms out, played once on load.
// It starts hidden in _hero.scss, so it never flashes before this runs.
const $image = document.querySelector('.js-hero-image img');

if ($image && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
	gsap.timeline({ delay: 0.15 })
		.fromTo($image, { opacity: 0 }, { opacity: 1, duration: 1.4, ease: 'power2.out' })
		.fromTo($image, { scale: 1.08 }, { scale: 1, duration: 2.2, ease: 'power3.out' }, 0);
}
