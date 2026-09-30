// Hides the scroll hint when the element it points to is already fully in view,
// so there is nothing to scroll to.
const $hint = document.querySelector('[data-scroll-hint]');
const $next = document.querySelector($hint?.dataset.scrollHint);

if ($hint && $next) {
	const update = () => {
		const bottom = $next.getBoundingClientRect().bottom + window.scrollY;
		$hint.classList.toggle('is-hidden', bottom <= window.innerHeight);
	};

	update();
	window.addEventListener('resize', update);
}
