export class Navigation {
  container: HTMLElement;
  title: HTMLElement;
  lastActiveElement: HTMLElement;

  constructor(container: HTMLElement) {
    this.container = container;
    this.title = container.querySelector(".nav__title-link") as HTMLElement;
    this.container.setAttribute("aria-hidden", "true");
  }

  show() {
    this.lastActiveElement = document.activeElement as HTMLElement;
    this.container.classList.add("is-open");
    this.container.setAttribute("aria-hidden", "false");
    this.title.focus();
  }

  hide() {
    this.container.classList.remove("is-open");
    this.container.setAttribute("aria-hidden", "true");
    if (this.lastActiveElement) {
      this.lastActiveElement.focus();
    }
  }
}
