export default class Image {
  constructor(image) {
    this.image = image;
    this.dataset = image.dataset;
  }

  fadeIn() {
    this.image.style.opacity = 1;
  }

  start() {
    if (this.dataset.loadTransition === "false") {
      return;
    }
    this.image.style.opacity = 0;
    if (this.image.complete) {
      this.fadeIn();
    } else {
      this.attachLoadedEvent();
    }
  }

  attachLoadedEvent() {
    this.image.addEventListener("load", () => this.fadeIn());
  }
}
