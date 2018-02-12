# WindyCOYS Wordpress Theme

A modern Wordpress theme written for [WindyCOYS.com](http://windycoys.com).

Built using:

* [PostCSS](https://postcss.org)
* [Rollup.js](https://rollupjs.org) & [Babel](https://babeljs.io/)

## Requirements

* Docker + Docker Compose
* Node.js

## Building

The CSS and JavaScript is built with the following command:

```
npm run build
```

*Note: Files will only be minified if NODE_ENV='production'*

## Developing

Use `docker-compose` to start the Wordpress and MySQL containers:

```
docker-compose -up
```

To build and watch the theme files for changes, run:

```
npm start
```

*Note: You will either need to set up a host file entry to point
`windycoys.local` to the container's IP or update `.browser-sync.json` to the
container's IP*

## Linting

### CSS

CSS is linted with [stylelint](https://stylelint.io) using
[stylelint-selector-bem-pattern](https://github.com/simonsmith/stylelint-selector-bem-pattern)

```
npm run css:lint
```

### JavaScript

JavaScript is linted with [eslint](https://eslint.org/) using
[Airbnb's base config](https://github.com/airbnb/javascript/tree/master/packages/eslint-config-airbnb-base)

```
npm run js:lint
```

## License

The WindyCOYS theme is licensed under the [MIT license](http://opensource.org/licenses/MIT)
