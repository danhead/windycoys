const STATES = {
  open: "is-open",
};

export default class Navigation {
  constructor(cfg = {}) {
    if (!cfg.container) return false;
    if (!cfg.menu) return false;
    this.state = "hidden";
    this.container = cfg.container;
    this.menu = cfg.menu;
  }

  init() {
    if (!this.state) return false;
    this.container.setAttribute("aria-hidden", true);
    this.attachClickEvents();
    this.attachKeyEvents();
    return true;
  }

  attachClickEvents() {
    this.container.addEventListener("click", e => {
      if (this.container === e.target) {
        this.closeNav();
      }
    });
    this.menu.container.addEventListener("click", () => {
      this.openNav();
    });
    this.container
      .querySelector(".nav__close")
      .addEventListener("click", () => {
        this.closeNav();
      });
  }

  attachKeyEvents() {
    const first = this.container.querySelector(".nav__link");
    const last = this.container.querySelector(".nav__close");
    this.container.addEventListener("keydown", e => {
      if (e.keyCode === 27) {
        this.closeNav();
      }
    });
    first.addEventListener("keydown", e => {
      if (e.shiftKey && e.keyCode === 9) {
        e.preventDefault();
        last.focus();
      }
    });
    last.addEventListener("keydown", e => {
      if (!e.shiftKey && e.keyCode === 9) {
        e.preventDefault();
        first.focus();
      }
    });
  }

  openNav() {
    this.lastActiveElement = document.activeElement;
    this.state = "visible";
    this.menu.hideMenu();
    this.container.classList.add(STATES.open);
    this.container.setAttribute("aria-hidden", false);
    this.container.querySelector(".nav__title-link").focus();
  }

  closeNav() {
    this.state = "hidden";
    this.menu.showMenu();
    this.container.classList.remove(STATES.open);
    this.container.setAttribute("aria-hidden", true);
    if (this.lastActiveElement) {
      this.lastActiveElement.focus();
    }
  }
}
