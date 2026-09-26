import { gsap } from 'gsap';

const $index = document.querySelector('.js-index');

if ($index && window.matchMedia('(hover: hover)').matches) {
	const $preview = $index.querySelector('.js-index-preview');
	const $images = $preview.querySelectorAll('img');
	const $rows = $index.querySelectorAll('.js-index-row');

	gsap.set($preview, { xPercent: -50, yPercent: -50 });

	const xTo = gsap.quickTo($preview, 'x', { duration: 0.7, ease: 'power3' });
	const yTo = gsap.quickTo($preview, 'y', { duration: 0.7, ease: 'power3' });

	let visible = false;

	const show = (event) => {
		if (!visible) {
			gsap.set($preview, { x: event.clientX, y: event.clientY });
			gsap.to($preview, { autoAlpha: 1, duration: 0.4, ease: 'power2.out', overwrite: 'auto' });
			visible = true;
		}
	};

	const hide = () => {
		gsap.to($preview, { autoAlpha: 0, duration: 0.3, ease: 'power2.out', overwrite: 'auto' });
		visible = false;
	};

	$rows.forEach(($row) => {
		$row.addEventListener('pointerenter', (event) => {
			$images.forEach(($image, index) => {
				$image.classList.toggle('is-active', index === Number($row.dataset.index));
			});
			show(event);
		});

		$row.addEventListener('pointermove', (event) => {
			xTo(event.clientX);
			yTo(event.clientY);
		});

		$row.addEventListener('pointerleave', (event) => {
			if (!event.relatedTarget?.closest?.('.js-index-row')) {
				hide();
			}
		});
	});

	window.addEventListener('scroll', () => visible && hide(), { passive: true });
}
