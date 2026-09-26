const $contact = document.querySelector('.js-contact');

if ($contact) {
	const $tabs = [...$contact.querySelectorAll('.js-contact-tab')];
	const $panels = [...$contact.querySelectorAll('.js-contact-panel')];

	const select = ($tab) => {
		$tabs.forEach(($item, index) => {
			const active = $item === $tab;
			$item.setAttribute('aria-selected', active);
			$item.tabIndex = active ? 0 : -1;
			$panels[index].hidden = !active;
		});
	};

	$tabs.forEach(($tab, index) => {
		$tab.addEventListener('click', () => {
			select($tab);
			history.replaceState(null, '', `#${$panels[index].id}`);
		});

		$tab.addEventListener('keydown', (event) => {
			const step = { ArrowRight: 1, ArrowLeft: -1 }[event.key];
			if (!step) return;
			event.preventDefault();
			const $next = $tabs[(index + step + $tabs.length) % $tabs.length];
			$next.click();
			$next.focus();
		});
	});

	// Open the panel named in the url (/contact#offerte), or the one that holds
	// the anchor Gravity Forms jumps to after a submit
	const openFromHash = () => {
		if (!location.hash) return;
		const $target = document.getElementById(location.hash.slice(1));
		const $panel = $target?.closest('.js-contact-panel');
		if ($panel) select($tabs[$panels.indexOf($panel)]);
	};

	openFromHash();
	window.addEventListener('hashchange', openFromHash);
}
