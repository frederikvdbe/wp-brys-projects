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


// Toepassingen: Strook. Arrows scroll one card, the counter follows the first card in view
document.querySelectorAll('.js-tp-strook').forEach($strook => {
	const $track = $strook.querySelector('.js-tp-strook-track');
	const $cards = [...$track.children];
	const $count = $strook.querySelector('.js-tp-strook-count');
	const $prev = $strook.querySelector('.js-tp-strook-prev');
	const $next = $strook.querySelector('.js-tp-strook-next');

	const step = () => $cards[1].offsetLeft - $cards[0].offsetLeft;

	const update = () => {
		const index = Math.round($track.scrollLeft / step());
		$count.textContent = String(index + 1).padStart(2, '0');
		$prev.disabled = $track.scrollLeft <= 2;
		$next.disabled = $track.scrollLeft >= $track.scrollWidth - $track.clientWidth - 2;
	};

	$prev.addEventListener('click', () => $track.scrollBy({ left: -step(), behavior: 'smooth' }));
	$next.addEventListener('click', () => $track.scrollBy({ left: step(), behavior: 'smooth' }));
	$track.addEventListener('scroll', update, { passive: true });
	update();
});
