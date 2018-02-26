const CLS = {
  open: 'is-open',
};

export default class Nav {
  constructor(cfg) {
    this.el = cfg.el;
    this.menu = cfg.menu;

    this.attachEvents();
  }

  attachEvents() {
    this.menu.el.addEventListener('click', () => {
      this.menu.hideMenu();
      this.openNav();
    });
    this.el.querySelector('.Nav-close').addEventListener('click', () => {
      this.menu.showMenu();
      this.closeNav();
    });
  }

  openNav() {
    this.el.classList.add(CLS.open);
  }

  closeNav() {
    this.el.classList.remove(CLS.open);
  }
}
