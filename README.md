# WindyCOYS Wordpress Theme

A modern Wordpress theme written for [WindyCOYS.com](http://windycoys.com).

Built using:

* [PostCSS](https://postcss.org)

## Requirements

* Docker + Docker Compose
* Node.js

## Building

At the moment, the only step of the build process is to compile `styles.css`,
this is done by running:

```
npm run css:compile
```

*Note: CSS will only be minified if NODE_ENV='production'*

## Developing

Use `docker-compose` to start the Wordpress and MySQL containers:

```
docker-compose -up
```

To build and watch the theme files for changes, run:

```
npm start
```

## License

The WindyCOYS theme is licensed under the [MIT license](http://opensource.org/licenses/MIT)
