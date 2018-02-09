module.exports = ctx => ({
  map: ctx.env !== 'production',
  plugins: {
    'postcss-import': {},
    'postcss-custom-media': {},
    'postcss-custom-properties': {},
    'autoprefixer': {},
    'cssnano': ctx.env === 'production' ? {} : false,
  },
});
