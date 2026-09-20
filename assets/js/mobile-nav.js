import { disableBodyScroll, enableBodyScroll, clearAllBodyScrollLocks } from 'body-scroll-lock';
import { gsap } from "gsap";
import { createBackdrop, createMobileNav } from "./helpers/factory.js";
import { mediaQueries } from "./helpers/media-queries.js";

const bodyScrollOptions = { reserveScrollBarGap: true };
const $button = document.querySelector('.js-mobile-nav-toggle');

let isOpen = false;

const menuTimeline = gsap.timeline({
	paused: true,
	defaults: {
		ease: "power4.inOut",
	},
	onStart: () => disableBodyScroll('body', bodyScrollOptions),
	onReverseComplete: () => enableBodyScroll('body', bodyScrollOptions)
});

const openNav = () => {
	const $backdrop = createBackdrop();
	const $mobileNav = createMobileNav();
	const $navMenuItems = $mobileNav ? $mobileNav.querySelectorAll('.c-mobile-nav__menu-item') : [];
	const $closeButton = $mobileNav.querySelector('.c-mobile-nav__toggle');

	isOpen = true;
	$button.classList.add('is-active');

	document.body.append($backdrop);
	document.body.append($mobileNav);

	$backdrop.addEventListener('click', () => closeNav());
	if($closeButton) $closeButton.addEventListener('click', () => closeNav());

	gsap.set($mobileNav, { xPercent: 100 });

	gsap.fromTo($backdrop, {
		autoAlpha: 0,
	}, {
		duration: 1,
		ease: "power4.inOut",
		autoAlpha: 1,
	});

	menuTimeline.to($mobileNav, {
		duration: 1,
		xPercent: 0
	}, 0).fromTo($navMenuItems, {
		xPercent: 40,
		autoAlpha: 0
	}, {
		duration: 1,
		xPercent: 0,
		autoAlpha: 1,
		stagger: .05
	}, 0);

	menuTimeline.play();

}

const closeNav = () => {
	const $backdrop = document.querySelector('.c-backdrop');
	const $mobileNav = document.querySelector('.c-mobile-nav');

	isOpen = false;

	if($backdrop) {

		gsap.to($backdrop, {
			ease: "power4.inOut",
			duration: 1,
			autoAlpha: 0,
			onComplete: () => {
				$backdrop.remove();
				$mobileNav.remove();
				$button.classList.remove('is-active');
			}
		})

	}

	menuTimeline.reverse();
}

const toggleNav = () => !isOpen ? openNav() : closeNav();

mediaQueries.large.addEventListener('change', () => {
	if(mediaQueries.large.matches && isOpen) closeNav();
})

document.addEventListener('DOMContentLoaded', () => {
	if ($button) {
		$button.addEventListener('click', clickEvent => {
			clickEvent.preventDefault();
			toggleNav();
		})
	}
});
