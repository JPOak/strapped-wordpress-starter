# Wordpress Starter Theme with Underscores, Bootstrap 5 (with SASS), and Webpack 5

This is a Wordpress Starter Theme initially based on Underscores, packaged with Bootstrap 5 (with SASS), and built with Webpack 5.

### Prerequisites

Tested with Node 16.8+ and NPM 7.21+

### Prerequisites

From your projects root run:

```
npm install
```

### Config (src/build/config-default.json)

Includes a `config-default.json` file. You can make changes directly to this file. However, if you are working in a team environment you can also duplicate this file and name it `config-local.json`. The `config-local.json` file is ignored by git so that each environment can use a different configuration with the same git repo.

During the build process a check is done to see if a `config-local.json` file exists. If `config-local.json` exists, the configuration will be loaded. If it does not exist, `config-default.json` will be used.

Currently, only the revisioning and local dev server url are configured here.

### Building

```
npm run dev
```

Will compile scss and js with sourcemaps and copy from "src" to "dist." 

```
npm run start
```

Will launch browsersync and watch changes in php, scss and js files. Note: `Be sure to change your local dev url in src/build/config-default.json`

```
npm run build
```

Will minify all the files and remove sourcemaps and copy to the "dist" directory. Images in assets will be optimized. Main.js and Main.css will be asset hashed for cachebusting if set. Note: Depending on how many images you have it may take awhile on first run.

### Revisioning/Cachebusting

By default revisioning/cachebusting is set to false. If you want it go to `src/build/config-default.json' and set to true.`

### Bootstrap Tests

There is a Wordpress page template called "Bootstrap Tests" that you can use with a page that has some basic Bootstap components in it to make sure the build is working.

### Built With

* Underscores (https://underscores.me/) - Initial Kickstart
* Bootstrap (https://getbootstrap.com/) - Front-end framework
* Webpack (https://webpack.js.org/) - Asset bundling
