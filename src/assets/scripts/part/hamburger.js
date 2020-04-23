export default function hamburger() {
	let hamburger = document.getElementById("hamburger");
	let mainMenu = document.getElementById("menu_main");
	let htmlElement = document.querySelector("html");
	hamburger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("hidden_mobile");
		hamburger.classList.toggle("is-active");

		// prevent content scrolling
		htmlElement.classList.toggle("noscroll");
	});
}
