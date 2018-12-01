# Wordpress Starter Theme with BS4, Underscores, and Webpack 4 (with SASS)

This is a Wordpress Starter Theme initially based on Underscores, packaged with Bootstrap 4 (with SASS), and built with Webpack 4.

### Prerequisites

You will need an updated version of Node.js (https://nodejs.org/) to get started.

### Prerequisites

From your projects root run:

```
npm install
```

### Building

```
npm run dist
```

Will compile scss and js with sourcemaps and copy from "src" to "dist." 

```
npm run start
```

Will launch browsersync and watch changes in php, scss and js files. Note: If you are running a local dev server be sure to add you URL to src/build/webpack.config.js on line 80.

```
npm run build
```

Will minify all the files and remove sourcemaps and copy to the "dist" directory. Images in assets will be optimized. Note: Depending on how many images you have it may take awhile on first run.

## Built With

* Underscores (https://underscores.me/) - Initial Kickstart
* Bootstrap (https://getbootstrap.com/) - Front-end framework
* Webpack (https://webpack.js.org/) - Asset bundling

## Inspired By

Inpspired by other starter themes out there such as Roots.io (http://roots.io/) and FoundationPress (https://foundationpress.olefredrik.com/). It may be inspired by other open source projects down the road. In the spirit of open source, if you find this project useful, do with it what you will.
