export default function hamburger() {
	const burger = document.getElementById("hamburger");
	const mainMenu = document.getElementById("menu_main");
	const htmlElement = document.querySelector("html");
	burger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("hidden_mobile");
		burger.classList.toggle("is-active");

		// prevent content scrolling
		htmlElement.classList.toggle("noscroll");
	});
}
