import Lenis from 'lenis';
import 'lenis/dist/lenis.css';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Smooth scroll, driven by the GSAP ticker so ScrollTrigger stays in sync.
// Off when the visitor prefers reduced motion, then the page scrolls natively.
gsap.registerPlugin(ScrollTrigger);

export const lenis = window.matchMedia('(prefers-reduced-motion: reduce)').matches
	? null
	: new Lenis({ autoRaf: false, anchors: true, lerp: 0.1 });

if (lenis) {
	lenis.on('scroll', ScrollTrigger.update);
	gsap.ticker.add(time => lenis.raf(time * 1000));
	gsap.ticker.lagSmoothing(0);
}
