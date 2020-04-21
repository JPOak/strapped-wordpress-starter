//Import all Bootstrap components
// import 'bootstrap';

//Or comment out the above and uncomment individual components below

//import 'bootstrap/js/dist/alert';
// import 'bootstrap/js/dist/button';
//import 'bootstrap/js/dist/carousel';
// import 'bootstrap/js/dist/collapse';
// import 'bootstrap/js/dist/dropdown';
// import 'bootstrap/js/dist/modal';
//import 'bootstrap/js/dist/popover';
//import 'bootstrap/js/dist/scrollspy';
//import 'bootstrap/js/dist/tab';
//import 'bootstrap/js/dist/tooltip';
// import 'bootstrap/js/dist/util';

/************** OTHER JS HERE ***************
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

jQuery(document).ready(() => {
	routes.loadEvents();
});
