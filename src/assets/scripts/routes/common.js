import hamburger from "./../part/hamburger";

export default {
	init() {
		// JavaScript to be fired on all pages

		// Hamburger event listener
		hamburger();
	},
	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
