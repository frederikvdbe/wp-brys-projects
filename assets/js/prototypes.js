import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Motion for the CTA prototypes
gsap.registerPlugin(ScrollTrigger);

// Zwevende knop: shows once the visitor scrolls past the header, hides near the footer
const $float = document.querySelector('.js-cta-float');

if ($float) {
	ScrollTrigger.create({
		start: 400,
		end: () => ScrollTrigger.maxScroll(window) - window.innerHeight * 0.6,
		onToggle: ({ isActive }) => $float.classList.toggle('is-visible', isActive),
	});
}


// Navigatie: Menuknop. The small button appears once the header has scrolled out of view
const $navButton = document.querySelector('.js-navproto-button');
const $siteHeader = document.querySelector('.c-site-header');

if ($navButton && $siteHeader) {
	const $toggle = $navButton.querySelector('.js-navproto-open');
	const setVisible = visible => {
		$navButton.classList.toggle('is-visible', visible);
		$toggle.tabIndex = visible ? 0 : -1;
	};

	ScrollTrigger.create({
		trigger: $siteHeader,
		start: 'bottom top',
		onEnter: () => setVisible(true),
		onLeaveBack: () => setVisible(false),
	});

	$toggle.addEventListener('click', () => document.querySelector('.js-menu-open')?.click());
}
