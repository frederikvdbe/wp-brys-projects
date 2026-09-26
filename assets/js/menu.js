import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';
import { gsap } from 'gsap';
import { CustomEase } from 'gsap/CustomEase';

// Full screen menu: a dark panel slides in from the right, the rules draw in
// and the labels rise out of a mask.
gsap.registerPlugin(CustomEase);

// Starts fast and lands soft, used for the panel in both directions
CustomEase.create('menuPanel', '0.55, 0, 0.1, 1');

const $menu = document.querySelector('.js-menu');
const $openButton = document.querySelector('.js-menu-open');

if ($menu && $openButton) {
	const $backdrop = $menu.querySelector('.c-menu__backdrop');
	const $panel = $menu.querySelector('.js-menu-panel');
	const $labels = $menu.querySelectorAll('.js-menu-label');
	const $rules = $menu.querySelectorAll('.js-menu-rule');
	const $close = $menu.querySelector('.c-menu__close');
	const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
	const scrollOptions = { reserveScrollBarGap: true };

	let isOpen = false;
	let timeline = null;

	const setOpenState = open => {
		isOpen = open;
		$openButton.setAttribute('aria-expanded', String(open));
		$menu.setAttribute('aria-hidden', String(!open));
		$menu.toggleAttribute('inert', !open);
	};

	const openMenu = () => {
		if (isOpen) return;

		setOpenState(true);
		timeline?.kill();
		// The scroll lock hides the scrollbar, the CSS adds this width back so Close lines up with Menu
		$menu.style.setProperty('--menu-scrollbar', `${window.innerWidth - document.documentElement.clientWidth}px`);
		disableBodyScroll($panel, scrollOptions);
		$menu.classList.add('is-open');

		if (reducedMotion.matches) {
			gsap.set($panel, { xPercent: 0 });
			gsap.set($labels, { yPercent: 0, rotate: 0 });
			gsap.set($rules, { scaleX: 1 });
			timeline = gsap.timeline().fromTo($menu, { autoAlpha: 0 }, { autoAlpha: 1, duration: .3 });
			gsap.set($backdrop, { opacity: 1 });
			$close.focus();
			return;
		}

		timeline = gsap.timeline({ onComplete: () => $close.focus() })
			.to($backdrop, { opacity: 1, duration: .7, ease: 'power2.out' }, 0)
			.fromTo($panel, { xPercent: 100 }, { xPercent: 0, duration: .8, ease: 'menuPanel' }, 0)
			.fromTo($rules, { scaleX: 0, transformOrigin: 'left center' }, {
				scaleX: 1,
				duration: 1.1,
				ease: 'expo.out',
				stagger: .06,
			}, .32)
			.fromTo($labels, { yPercent: 110, rotate: 4, transformOrigin: '0% 100%' }, {
				yPercent: 0,
				rotate: 0,
				duration: 1,
				ease: 'expo.out',
				stagger: .06,
			}, .36);
	};

	const closeMenu = () => {
		if (!isOpen) return;

		setOpenState(false);
		timeline?.kill();

		const onComplete = () => {
			$menu.classList.remove('is-open');
			gsap.set($menu, { clearProps: 'opacity,visibility' });
			enableBodyScroll($panel);
		};

		$openButton.focus({ preventScroll: true });

		if (reducedMotion.matches) {
			timeline = gsap.timeline({ onComplete }).to($menu, { autoAlpha: 0, duration: .3 });
			gsap.set($backdrop, { opacity: 0 });
			return;
		}

		// Close runs its own, shorter timeline instead of reversing the open one
		timeline = gsap.timeline({ onComplete })
			.to($labels, { yPercent: -110, duration: .4, ease: 'power3.in', stagger: .03 }, 0)
			.to($rules, { scaleX: 0, transformOrigin: 'right center', duration: .45, ease: 'power3.in', stagger: .03 }, 0)
			.to($panel, { xPercent: 100, duration: .7, ease: 'menuPanel' }, .12)
			.to($backdrop, { opacity: 0, duration: .6, ease: 'power2.inOut' }, .2);
	};

	$openButton.setAttribute('aria-controls', $menu.id);
	$openButton.setAttribute('aria-expanded', 'false');
	$openButton.addEventListener('click', openMenu);

	$menu.querySelectorAll('.js-menu-close').forEach($el => $el.addEventListener('click', closeMenu));

	document.addEventListener('keydown', event => {
		if (event.key === 'Escape') closeMenu();
	});
}
