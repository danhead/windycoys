# WindyCOYS Wordpress Theme

A modern Wordpress theme written for [WindyCOYS.com](http://windycoys.com).

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
