export class Menu {
  window: Window;
  btn: HTMLButtonElement;
  state: "hidden" | "minimized" | "visible";
  lastScrollPosition: number;

  constructor(button: HTMLButtonElement, window: Window) {
    this.btn = button;
    this.window = window;
    this.state = "visible";
    this.lastScrollPosition = 0;
    this.btn.setAttribute("aria-expanded", "false");
    this.attachEvents();
    setTimeout(() => {
      this.show();
    }, 1000);
  }

  attachEvents(): void {
    this.window.addEventListener("scroll", () => {
      this.updateState(this.lastScrollPosition, window.scrollY);
      this.lastScrollPosition = window.scrollY;
    });
  }

  updateState(lastY = 0, currentY: number): void {
    if (this.state !== "hidden") {
      if (this.state !== "visible" && currentY < lastY) {
        this.show();
      } else if (this.state !== "minimized" && currentY > lastY) {
        this.minimize();
      }
    }
  }

  show(): void {
    this.state = "visible";
    this.btn.setAttribute("aria-expanded", "false");
    this.btn.classList.remove("is-minimized");
    this.btn.classList.add("is-visible");
  }

  minimize(): void {
    this.state = "minimized";
    this.btn.classList.remove("is-visible");
    this.btn.classList.add("is-minimized");
  }

  hide(): void {
    this.state = "hidden";
    this.btn.setAttribute("aria-expanded", "true");
    this.btn.classList.remove("is-visible");
    this.btn.classList.remove("is-minimized");
  }
}
