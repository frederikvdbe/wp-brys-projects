import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { SplitText } from 'gsap/SplitText';

// Scroll reveals, set per element with a data-reveal attribute:
// - lines: the lines rise out of a mask, like the labels in the menu overlay
// - fade:  fades in and moves up. Elements that enter together come in one by one.
// - image: on the wrapper, the image fades in and slowly zooms out over a dark background
// In a section with data-reveal-sequence, a fade waits until the title of that
// section has mostly landed and the fade itself has scrolled into view.
// _reveal.scss hides the elements until they play, the is-revealed class lifts that.
gsap.registerPlugin(ScrollTrigger, SplitText);

const start = 'top 88%';

const done = $el => {
	$el.classList.add('is-revealed');
};

const fadeIn = $els => gsap.fromTo($els, { autoAlpha: 0, y: 28 }, {
	autoAlpha: 1,
	y: 0,
	duration: 1.2,
	ease: 'power3.out',
	stagger: 0.1,
	onStart: () => $els.forEach(done),
	clearProps: 'opacity,visibility,transform',
});

if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
	// One promise per sequence section, resolved when its title has mostly landed
	const landed = new Map(gsap.utils.toArray('[data-reveal-sequence]').map($section => {
		let resolve;
		const promise = new Promise(r => { resolve = r; });

		return [$section, { promise, resolve }];
	}));

	document.fonts.ready.then(() => {
		gsap.utils.toArray('[data-reveal="lines"]').forEach($el => {
			const sequence = landed.get($el.closest('[data-reveal-sequence]'));

			SplitText.create($el, {
				type: 'lines',
				mask: 'lines',
				linesClass: 'c-reveal-line',
				autoSplit: true,
				onSplit: self => {
					done($el);

					return gsap.from(self.lines, {
						yPercent: 110,
						duration: 1.2,
						ease: 'expo.out',
						stagger: 0.08,
						scrollTrigger: { trigger: $el, start, once: true },
						// The ease makes the title look done well before the tween ends
						onUpdate() {
							if (this.progress() > 0.45) sequence?.resolve();
						},
					});
				},
			});
		});
	});

	ScrollTrigger.batch('[data-reveal="fade"]', {
		start,
		once: true,
		onEnter: $els => {
			const free = $els.filter($el => !$el.closest('[data-reveal-sequence]'));

			if (free.length) fadeIn(free);

			landed.forEach(({ promise }, $section) => {
				const waiting = $els.filter($el => $el.closest('[data-reveal-sequence]') === $section);

				if (waiting.length) promise.then(() => fadeIn(waiting));
			});
		},
	});

	gsap.utils.toArray('[data-reveal="image"]').forEach($el => {
		const $image = $el.querySelector('img');

		gsap.timeline({
			scrollTrigger: { trigger: $el, start, once: true },
			onComplete: () => {
				done($el);
				gsap.set($image, { clearProps: 'opacity,transform' });
			},
		})
			.fromTo($image, { opacity: 0 }, { opacity: 1, duration: 1.4, ease: 'power2.out' })
			.fromTo($image, { scale: 1.08 }, { scale: 1, duration: 2.2, ease: 'power3.out' }, 0);
	});
}
