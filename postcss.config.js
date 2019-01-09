const { resolve } = require('path');

const pkg = require(resolve(__dirname, 'package.json'));
const year = new Date().getFullYear();

const banner = `Theme Name: WindyCOYS
Theme URI: https://github.com/danhead/windycoys/
Author: ${pkg.author}
Author URI: https://danielhead.com
Description: Theme for windycoys.com
Version: ${pkg.version}
Copyright: (c) ${year} ${pkg.author}
License: MIT
License URI: https://choosealicense.com/licenses/mit/`;


module.exports = ctx => ({
  map: ctx.env !== 'production',
  plugins: {
    'postcss-import': {},
    'postcss-normalize': {},
    'postcss-preset-env': {
      stage: 0,
      features: {
        'custom-properties': {
          preserve: false,
        },
      },
    },
    cssnano: ctx.env === 'production' ? {} : false,
    'postcss-banner': {
      banner,
      important: true,
    },
  },
});
