export default class Image {
  constructor(image) {
    this.image = image;
  }

  fadeIn() {
    this.image.style.opacity = 1;
  }

  start() {
    this.image.style.opacity = 0;
    if (this.image.complete) {
      this.fadeIn();
    } else {
      this.attachLoadedEvent();
    }
  }

  attachLoadedEvent() {
    this.image.addEventListener('load', () => this.fadeIn());
  }
}
