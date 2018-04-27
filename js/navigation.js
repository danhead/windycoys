const STATES = {
  open: 'is-open',
};

export default class Navigation {
  constructor(cfg = {}) {
    if (!cfg.container) return false;
    if (!cfg.menu) return false;
    this.state = 'hidden';
    this.container = cfg.container;
    this.menu = cfg.menu;
  }

  init() {
    this.container.setAttribute('aria-hidden', true);
    this.container.querySelector('.Nav-list').setAttribute('role', 'menubar');
    this.container.querySelectorAll('.Nav-listItem').forEach((item) => {
      // Override implied listitem role
      item.setAttribute('role', 'none');
    });
    this.container.querySelectorAll('.Nav-link').forEach((link) => {
      link.setAttribute('role', 'menuitem');
    });
    this.attachEvents();
  }

  attachEvents() {
    this.menu.container.addEventListener('click', () => {
      this.openNav();
    });
    this.container.querySelector('.Nav-close').addEventListener('click', () => {
      this.closeNav();
    });
  }

  openNav() {
    this.state = 'visible';
    this.menu.hideMenu();
    this.container.classList.add(STATES.open);
    this.container.setAttribute('aria-hidden', false);
  }

  closeNav() {
    this.state = 'hidden';
    this.menu.showMenu();
    this.container.classList.remove(STATES.open);
    this.container.setAttribute('aria-hidden', true);
  }
}
