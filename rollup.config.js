const { resolve } = require('path');
const babel = require('rollup-plugin-babel');
const uglify = require('rollup-plugin-uglify');

const production = process.env.NODE_ENV === 'production';

module.exports = {
  input: resolve(__dirname, 'js/index.js'),
  output: {
    file: resolve(__dirname, 'theme/bundle.js'),
    format: 'iife',
    name: 'windycoys',
    sourcemap: !production && 'inline',
  },
  plugins: [
    babel({
      exclude: 'node_modules/**',
    }),
    production && uglify(),
  ].filter(Boolean),
};
