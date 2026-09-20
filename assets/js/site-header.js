import Headroom from "headroom.js";

const $siteHeader = document.querySelector('.c-site-header');

var headroom  = new Headroom($siteHeader, {
	offset: {
		up: 100,
		down: 50
	},
	tolerance : {
		up : 5,
		down : 0
	},
	classes : {
		// when element is initialised
		initial : "c-site-header--fixed",
		// when scrolling up
		pinned : "c-site-header--pinned",
		// when scrolling down
		unpinned : "c-site-header--unpinned",
		// when above offset
		top : "c-site-header--top",
		// when below offset
		notTop : "c-site-header--not-top",
		// when at bottom of scroll area
		bottom : "c-site-header--bottom",
		// when not at bottom of scroll area
		notBottom : "c-site-header--not-bottom",
		// when frozen method has been called
		frozen: "c-site-header--frozen",
	},
});

headroom.init();
