const STATES = {
  visible: 'is-visible',
  minimized: 'is-minimized',
};

export default class Menu {
  constructor(cfg = {}) {
    if (!cfg.container) return false;
    this.container = cfg.container;
    this.state = 'visible';
    this.lastKnownScrollPosition = 0;
  }

  init() {
    if (!this.state) return false;
    this.container.setAttribute('aria-haspopup', true);
    this.container.setAttribute('aria-expanded', false);
    this.attachEvents();
    setTimeout(() => {
      this.showMenu();
    }, 1000);
    return true;
  }

  attachEvents() {
    window.addEventListener('scroll', () => {
      this.updateState(this.lastKnownScrollPosition, window.scrollY);
      this.lastKnownScrollPosition = window.scrollY;
    });
  }

  updateState(lastY = 0, currentY) {
    if (this.state !== 'hidden') {
      if (this.state !== 'visible' && currentY < lastY) {
        this.showMenu();
      } else if (this.state !== 'minimized' && currentY
        > lastY) {
        this.minimizeMenu();
      }
    }
  }

  showMenu() {
    this.state = 'visible';
    this.container.setAttribute('aria-expanded', false);
    this.container.classList.add(STATES.visible);
    this.container.classList.remove(STATES.minimized);
  }

  minimizeMenu() {
    this.state = 'minimized';
    this.container.classList.add(STATES.minimized);
  }

  hideMenu() {
    this.state = 'hidden';
    this.container.setAttribute('aria-expanded', true);
    this.container.classList.remove(STATES.visible);
  }
}
