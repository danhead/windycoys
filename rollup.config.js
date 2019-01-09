const { resolve } = require('path');
const babel = require('rollup-plugin-babel');
const uglify = require('rollup-plugin-uglify');
const pkg = require('./package.json');

const year = new Date().getFullYear();

const production = process.env.NODE_ENV === 'production';

module.exports = {
  input: resolve(__dirname, 'js/index.js'),
  output: {
    file: resolve(__dirname, 'theme/bundle.js'),
    format: 'umd',
    name: 'windy',
    sourcemap: !production && 'inline',
    banner: `/**!
 * Theme Name: WindyCOYS
* Theme URI: https://github.com/danhead/windycoys/
 * Author: ${pkg.author}
 * Author URI: https://danielhead.com
 * Description: Theme for windycoys.com
 * Version: ${pkg.version}
 * Copyright: (c) ${year} ${pkg.author}
 * License: MIT
 * License URI: https://choosealicense.com/licenses/mit/
 */`,
  },
  plugins: [
    babel({
      exclude: 'node_modules/**',
    }),
    production && uglify(),
  ].filter(Boolean),
};
