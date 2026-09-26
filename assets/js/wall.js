import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const $wall = document.querySelector('.b-wall');

if ($wall && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
	gsap.registerPlugin(ScrollTrigger);

	gsap.utils.toArray('.js-wall-tile').forEach(($tile) => {
		const $image = $tile.querySelector('img');

		gsap.timeline({
			scrollTrigger: { trigger: $tile, start: 'top 92%', once: true },
		})
			.from($tile, { clipPath: 'inset(100% 0 0 0)', duration: 1.2, ease: 'power3.out' })
			.from($image, { scale: 1.15, duration: 1.6, ease: 'power3.out' }, 0);
	});

	gsap.matchMedia().add('(min-width: 768px)', () => {
		gsap.utils.toArray('.js-wall-column').forEach(($column) => {
			const speed = parseFloat($column.dataset.speed) || 0;
			if (!speed) return;

			gsap.to($column, {
				y: () => speed * window.innerHeight,
				ease: 'none',
				scrollTrigger: { trigger: $wall, start: 'top bottom', end: 'bottom top', scrub: true, invalidateOnRefresh: true },
			});
		});
	});
}
