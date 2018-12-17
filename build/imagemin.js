const { writeFile } = require('fs');
const { resolve } = require('path');
const imagemin = require('imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminGifsicle = require('imagemin-gifsicle');
const imageminJpegtran = require('imagemin-jpegtran');

imagemin(['images/*.{png,jpg,gif}'], 'theme/images', {
  plugins: [
    imageminPngquant({
      quality: '65-80',
    }),
    imageminGifsicle({
      optimizationLevel: 3,
    }),
    imageminJpegtran(),
  ],
}).then((files) => {
  files.forEach((file) => {
    const path = resolve(__dirname, '../', file.path);
    writeFile(path, file.data, (error) => {
      if (error) {
        console.error(error);
        process.exit(1);
      }
      console.log(`File written: ${path}`);
    });
  });
}).catch((error) => {
  console.error(error);
  process.exit(1);
});
