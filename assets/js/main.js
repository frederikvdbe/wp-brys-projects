import '../scss/main.scss';

if (import.meta.hot) {
	document.getElementById('vite-dev-styles-css')?.remove();
}

import './site-header.js';
import './menu.js';
import './hero.js';
import './wall.js';
import './index-preview.js';
import './contact.js';
