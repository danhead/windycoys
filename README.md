<p align="center">
  <img src="https://github.com/danhead/windycoys/raw/master/images/icon_144.png" title="WindyCOYS Logo">
</p>

<h1 align="center">Wordpress Theme</h1>

<p align="center">
  <a href="https://windycoys.com" title="WindyCOYS Blog">
    <img src="https://img.shields.io/website-up-down-green-red/https/windycoys.com.svg?label=windycoys.com"></a>
  <a href="https://github.com/danhead/windycoys/releases" title="Theme releases">
    <img src="https://img.shields.io/github/tag/danhead/windycoys.svg?label=version" alt="Latest version"></a>
  <a href="https://circleci.com/gh/danhead/windycoys" title="CircleCI jobs">
    <img src="https://img.shields.io/circleci/project/github/danhead/windycoys.svg?logo=circleci" alt="Latest build status"></a>
  <img src="https://img.shields.io/david/danhead/windycoys.svg" alt="Theme dependencies">
  <a href="https://github.com/danhead/windycoys/issues" title="Github issues">
    <img src="https://img.shields.io/github/issues/danhead/windycoys.svg?logo=github" alt="Theme issues"></a>
  <a href="https://github.com/danhead/windycoys/blob/master/LICENSE" title="Theme license">
    <img src="https://img.shields.io/github/license/danhead/windycoys.svg" alt="Theme license"></a>
</p>

<p align="center">
  <a href="https://twitter.com/intent/follow?screen_name=windycoys" title="Follow WindyCOYS on Twitter">
    <img src="https://img.shields.io/twitter/follow/windycoys.svg?style=social&logo=twitter" alt="Follow WindyCOYS on Twitter"></a>
  <a href="https://twitter.com/intent/follow?screen_name=danhead" title="Follow Dan Head on Twitter">
    <img src="https://img.shields.io/twitter/follow/danhead.svg?style=social&logo=twitter" alt="Follow Dan Head on Twitter"></a>
</p>

## About

A modern Wordpress theme written for [WindyCOYS.com](https://windycoys.com).

Built using:

* [PostCSS](https://postcss.org)
* [Rollup.js](https://rollupjs.org) & [Babel](https://babeljs.io/)

## Requirements

* [Docker](https://www.docker.com/products/docker-desktop/)
* [Docker Compose](https://docs.docker.com/compose/install/)
* [Node.js](https://nodejs.org/)

## Building the theme

The build script runs the following tasks:

* **css:compile** - Process the CSS
* **js:compile** - Compile the JavaScript to ES5
* **images** - Minify images

The CSS and JavaScript will be minified if the environment variable `NODE_ENV='production'`.

```
npm run build
```

## Developing

The `start` script will monitor CSS, JavaScript and images for changes and automatically compile them.

It will also start Docker containers and proxy the connection through browser-sync.

```
npm start
```

### CSS

The CSS is compiled to `theme/style.css` using [postcss-preset-env](https://github.com/csstools/postcss-preset-env) which primarily used to resolve custom properties and add vendor prefixes. It is linted with [stylelint](https://stylelint.io) using [stylelint-selector-bem-pattern](https://github.com/simonsmith/stylelint-selector-bem-pattern).

### JavaScript

The JavaScript is transformed to ES5 and bundled to `theme/bundle.js`. It is linted with [eslint](https://eslint.org/) using [Airbnb's base config](https://github.com/airbnb/javascript/tree/master/packages/eslint-config-airbnb-base).

Tests are written with [Jest](https://jestjs.io/) and run with:

```
npm run jest
```

The tests are written in `*.spec.js` files along side the source code.

To watch the files and automatically re-run the tests, use:

```
npm run jest:watch
```

## License

The WindyCOYS theme is licensed under the [MIT license](http://opensource.org/licenses/MIT)
