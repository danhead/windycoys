import Navigation from './navigation';

const navHtml = `<nav class="Nav">
  <button class="Menu">Menu</button>
  <div class="Nav-content">
    <h2 class="Nav-title">WindyCOYS</h2>
    <ul class="Nav-list">
      <li class="Nav-listItem">
        <a class="Nav-link" href="/">Home</a>
      </li>
      <li class="Nav-listItem">
        <a class="Nav-link" href="/about">About</a>
      </li>
    </ul>
  </div>
  <button class="Nav-close">close</button>
</nav>`;

let nav;

beforeEach(() => {
  document.body.innerHTML = navHtml;
  // Mock Menu
  const menu = {
    container: document.querySelector('.Menu'),
    showMenu: jest.fn(),
    hideMenu: jest.fn(),
  };
  nav = new Navigation({
    container: document.querySelector('.Nav'),
    menu,
  });
});

describe('Navigation', () => {
  it('Should initialise', () => {
    nav.init();
    expect(nav).toMatchObject({});
  });

  it('Should fail to initialise if container is missing', () => {
    nav.init();
    expect((new Navigation()).state).toBeUndefined();
  });

  it('Should be hidden by default', () => {
    nav.init();
    expect(nav.container.classList.contains('is-open')).toBe(false);
  });

  it('Should have initial ARIA attributes', () => {
    nav.init();
    expect(nav.container.getAttribute('aria-hidden')).toBe('true');
  });

  it('Should update the ARIA attributes when visible', () => {
    nav.init();
    nav.openNav();
    expect(nav.container.getAttribute('aria-hidden')).toBe('false');
  });

  it('Should update the ARIA attributes when hidden', () => {
    nav.init();
    nav.openNav();
    nav.closeNav();
    expect(nav.container.getAttribute('aria-hidden')).toBe('true');
  });
});

describe('Navigation list', () => {
  it('Should have initial ARIA attributes', () => {
    nav.init();
    const ul = nav.container.querySelector('.Nav-list');
    expect(ul.getAttribute('role')).toBe('menubar');
  });
});

describe('Navigation list items', () => {
  it('Should have initial ARIA attributes', () => {
    nav.init();
    const lis = nav.container.querySelectorAll('.Nav-listItem');
    lis.forEach((li) => {
      expect(li.getAttribute('role')).toBe('none');
    });
  });
});

describe('Navigation links', () => {
  it('Should have initial ARIA attributes', () => {
    nav.init();
    const links = nav.container.querySelectorAll('.Nav-link');
    links.forEach((link) => {
      expect(link.getAttribute('role')).toBe('menuitem');
    });
  });
});
