import Navigation from "./navigation";

const navHtml = `<a href="/test">Test link</a>
<nav class="nav">
  <button class="menu">Menu</button>
  <div class="nav__content">
    <h2 class="nav__title">
      <a class="nav__title-link" href="/">WindyCOYS</a>
    </h2>
    <ul class="nav__list">
      <li class="nav__list-item">
        <a class="nav__link" href="/">Home</a>
      </li>
      <li class="nav__list-item">
        <a class="nav__link" href="/about">About</a>
      </li>
    </ul>
  </div>
  <button class="nav__close">close</button>
</nav>
<a href="/another-test">Another test link</a>`;

let nav;

beforeEach(() => {
  document.body.innerHTML = navHtml;
  // Mock Menu
  const menu = {
    container: document.querySelector(".menu"),
    showMenu: jest.fn(),
    hideMenu: jest.fn(),
  };
  nav = new Navigation({
    container: document.querySelector(".nav"),
    menu,
  });
});

describe("Navigation", () => {
  it("Should initialise", () => {
    nav.init();
    expect(nav).toMatchObject({});
  });

  it("Should fail to initialise if container is missing", () => {
    nav.init();
    expect(new Navigation().state).toBeUndefined();
  });

  it("Should fail to initialise if the menu is not provided", () => {
    const noMenu = new Navigation({
      container: document.querySelector(".nav"),
    });
    noMenu.init();
    expect(noMenu.state).toBeUndefined();
  });

  it("Should be hidden by default", () => {
    nav.init();
    expect(nav.container.classList.contains("is-open")).toBe(false);
  });

  it("Should close when the .nav element is clicked", () => {
    nav.init();
    nav.openNav();
    const event = new Event("click");
    nav.container.dispatchEvent(event);
    expect(nav.state).toBe("hidden");
  });

  it("Should close when the user presses ESC", () => {
    nav.init();
    nav.openNav();
    const event = new Event("keydown");
    event.keyCode = 27;
    nav.container.dispatchEvent(event);
    expect(nav.state).toBe("hidden");
  });

  it("Should not close when the .nav__content element is clicked", () => {
    nav.init();
    nav.openNav();
    const event = new Event("click");
    nav.container.querySelector(".nav__content").dispatchEvent(event);
    expect(nav.state).toBe("visible");
  });

  it("Should have initial ARIA attributes", () => {
    nav.init();
    expect(nav.container.getAttribute("aria-hidden")).toBe("true");
  });

  it("Should update the ARIA attributes when visible", () => {
    nav.init();
    nav.openNav();
    expect(nav.container.getAttribute("aria-hidden")).toBe("false");
  });

  it("Should update the ARIA attributes when hidden", () => {
    nav.init();
    nav.openNav();
    nav.closeNav();
    expect(nav.container.getAttribute("aria-hidden")).toBe("true");
  });
});

describe("Navigation menu button", () => {
  it("Should open the Navigation when clicked", () => {
    nav.init();
    const event = new Event("click");
    nav.menu.container.dispatchEvent(event);
    expect(nav.state).toBe("visible");
  });
});

describe("Navigation close button", () => {
  it("Should close the Navigation when clicked", () => {
    nav.init();
    nav.openNav();
    const event = new Event("click");
    nav.container.querySelector(".nav__close").dispatchEvent(event);
    expect(nav.state).toBe("hidden");
  });
});

describe("Navigation focus behaviour", () => {
  let first;
  let last;
  let menu;

  beforeEach(() => {
    menu = nav.container.querySelector(".menu");
    first = nav.container.querySelector(".nav__link");
    last = nav.container.querySelector(".nav__close");
    menu.focus();
    nav.init();
    nav.openNav();
  });

  it("Should apply focus to .nav__title-link when opened", () => {
    const link = nav.container.querySelector(".nav__title-link");
    expect(document.activeElement).toBe(link);
  });

  test("Focus moves to first element when TAB pressed on last", () => {
    last.focus();
    const event = new Event("keydown");
    event.keyCode = 9;
    last.dispatchEvent(event);
    expect(document.activeElement).toBe(first);
  });

  test("Focus moves to last element when SHIFT + TAB pressed on first", () => {
    first.focus();
    const event = new Event("keydown");
    event.shiftKey = true;
    event.keyCode = 9;
    first.dispatchEvent(event);
    expect(document.activeElement).toBe(last);
  });

  test("Focus is restored to last active element when Navigation is closed", () => {
    first.focus();
    nav.closeNav();
    expect(document.activeElement).toBe(menu);
  });
});
