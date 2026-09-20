const createElem = (tag, classes) => {
	let $elem = document.createElement(tag);
	$elem.classList.add(classes);

	return $elem;
}

const createBackdrop = () => {
	const $backdrop = createElem('div', 'c-backdrop');

	return $backdrop;
}

const createMobileNav = () =>  {
	const $mobileNav = createElem('div', 'c-mobile-nav');
	const $menu = document.querySelector('.c-site-header__menu').cloneNode(true);
	const $menuItems = $menu ? $menu.querySelectorAll('.c-site-header__menu-item') : [];
	const $menuLinks = $menu ? $menu.querySelectorAll('.c-site-header__menu-link') : [];
	const $closeButton = document.querySelector('.c-site-header__toggle').cloneNode(true);

	if(!$menu) return;

	$menu.removeAttribute('id');

	$menu.classList.replace('c-site-header__menu', 'c-mobile-nav__menu');
	$closeButton.classList.replace('c-site-header__toggle', 'c-mobile-nav__toggle');
	$closeButton.classList.add('is-active');

	if($menuItems.length) $menuItems.forEach($menuItem => $menuItem.classList.replace('c-site-header__menu-item', 'c-mobile-nav__menu-item'));
	if($menuLinks.length) $menuLinks.forEach($menuLink => $menuLink.classList.replace('c-site-header__menu-link', 'c-mobile-nav__menu-link'));

	$mobileNav.append($menu);
	$mobileNav.append($closeButton);

	return $mobileNav;
}

export { createElem, createBackdrop, createMobileNav }
