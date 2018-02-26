const CLS = {
  visible: 'is-visible',
  minimized: 'is-minimized',
};

export default class Menu {
  constructor(cfg) {
    this.el = cfg.el;
    this.state = 'visible';

    this.attachEvents();
    setTimeout(() => {
      this.showMenu();
    }, 1000);
  }

  attachEvents() {
    let lastKnownPosition = 0;
    window.addEventListener('scroll', () => {
      if (this.state !== 'hidden') {
        if (this.state !== 'visible' && window.scrollY < lastKnownPosition) {
          this.showMenu();
        } else if (this.state !== 'minimized' && window.scrollY >
          lastKnownPosition) {
          this.minimizeMenu();
        }
        lastKnownPosition = window.scrollY;
      }
    });
  }

  showMenu() {
    this.state = 'visible';
    this.el.classList.add(CLS.visible);
    this.el.classList.remove(CLS.minimized);
  }

  minimizeMenu() {
    this.state = 'minimized';
    this.el.classList.add(CLS.minimized);
  }

  hideMenu() {
    this.state = 'hidden';
    this.el.classList.remove(CLS.visible);
  }
}
