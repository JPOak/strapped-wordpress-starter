/************** JS HERE ***************
 *********************************************/

// import local dependencies
import Router from "./util/Router";
import common from "./routes/common";
import home from "./routes/home";
import about from "./routes/about";

/** Populate Router instance with DOM routes */
const routes = new Router({
	// All pages
	common,
	// Home page
	home,
	// About page
	about,
});

document.addEventListener("DOMContentLoaded", function (event) {
	routes.loadEvents();
});
