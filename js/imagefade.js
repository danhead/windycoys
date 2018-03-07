export default class ImageFade {
  constructor() {
    this.images = Array.prototype.slice.call(document.querySelectorAll('img'));
    this.images.forEach((image) => {
      this.prepareImage(image);
      this.setEvent(image);
    });
  }

  prepareImage(image) {
    image.style.opacity = 0;
  }

  setEvent(image) {
    image.addEventListener('load', () => {
      image.style.opacity = 1;
    });
  }
}
