const { writeFile } = require('fs');
const { resolve } = require('path');
const imagemin = require('imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminGifsicle = require('imagemin-gifsicle');
const imageminJpegtran = require('imagemin-jpegtran');

imagemin(['images/*.{png,jpg,gif}'], 'theme/images', {
  plugins: [
    imageminPngquant({
      quality: [0.65, 0.8],
    }),
    imageminGifsicle({
      optimizationLevel: 3,
    }),
    imageminJpegtran(),
  ],
})
  .then((files) => {
    files.forEach((file) => {
      const path = resolve(__dirname, '../', file.path);
      writeFile(path, file.data, (error) => {
        if (error) {
          process.stdout.write(`${error}\n`);
          process.exit(1);
        }
        process.stdout.write(`File written: ${path}\n`);
      });
    });
  })
  .catch((error) => {
    process.stderr.write(`${error}\n`);
    process.exit(1);
  });
