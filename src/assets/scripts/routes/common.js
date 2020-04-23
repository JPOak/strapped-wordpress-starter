import smoothscroll from "smoothscroll-polyfill";
import hamburger from "./../part/hamburger";

export default {
	init() {
		// JavaScript to be fired on all pages

		// kick off the polyfill!
		smoothscroll.polyfill();

		// Hamburger event listener
		hamburger();
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
