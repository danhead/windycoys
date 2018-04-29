export default class Image {
  constructor(image) {
    this.image = image;
  }

  showImage() {
    this.image.style.opacity = 1;
  }

  fadeIn() {
    this.image.style.opacity = 0;
    this.attachLoadedEvent();
  }

  attachLoadedEvent() {
    this.image.addEventListener('load', () => this.showImage());
  }
}
