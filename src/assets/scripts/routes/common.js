import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";

export default {
	init() {
		// JavaScript to be fired on all pages

		// kick off the polyfill!
		smoothscroll.polyfill();
		// Hamburger event listener
		hamburger();
		// Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
		const lazyObserver = lozad(".lozad", {
			load: function (el) {
				el.src = el.dataset.src;
				// On load add fade class (animation to be written)
				// el.onload = function() {
				// 	el.classList.add('fade')
				// }
			},
		}); // lazy loads elements with default selector as '.lozad'
		observer.lazyObserver();

		const coolImage = document.querySelector(".lazy");
		// ... trigger the load of a image before it appears on the viewport
		observer.triggerLoad(coolImage);
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
