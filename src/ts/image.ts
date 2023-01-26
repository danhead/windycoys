export class Image {
  image: HTMLImageElement;

  constructor(img: HTMLImageElement) {
    this.image = img;
  }

  fadeIn(): void {
    this.image.style.opacity = "1";
  }

  attachEvents(): void {
    this.image.addEventListener("load", () => this.fadeIn());
  }

  start(): void {
    if (this.image.dataset.loadTransition === "false") {
      return;
    }
    this.image.style.opacity = "0";
    if (this.image.complete) {
      this.fadeIn();
    } else {
      this.attachEvents();
    }
  }
}
