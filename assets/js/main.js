import '../scss/main.scss';

if (import.meta.hot) {
	document.getElementById('vite-dev-styles-css')?.remove();
}

import './smooth-scroll.js';
import './site-header.js';
import './scroll-hint.js';
import './menu.js';
import './reveal.js';
import './wall.js';
import './contact.js';
import './prototypes.js';
