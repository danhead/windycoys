import Menu from "./menu";

jest.useFakeTimers();

const menuHtml = `
<button class="menu">
  <span class="menu__line"></span>
  <span class="menu__line"></span>
  <span class="menu__line"></span>
  <span class="menu__text">Open menu</span>
</button>`;

describe("Menu button", () => {
  let menu;

  beforeEach(() => {
    document.body.innerHTML = menuHtml;
    menu = new Menu({
      container: document.querySelector(".menu"),
    });
  });

  it("Should initialise", () => {
    menu.init();
    expect(menu).toMatchObject({});
  });

  it("Should fail to initialise if container is missing", () => {
    menu.init();
    expect(new Menu().state).toBeUndefined();
  });

  it("Should default to visible state", () => {
    expect(menu.state).toBe("visible");
  });

  it("Should be hidden initially", () => {
    menu.init();
    expect(menu.container.classList.contains("is-visible")).toBe(false);
  });

  it("Should be visible after 1 second", () => {
    menu.init();
    jest.runAllTimers();
    expect(setTimeout).toHaveBeenLastCalledWith(expect.any(Function), 1000);
    expect(menu.container.classList.contains("is-visible")).toBe(true);
  });

  test("Menu can be shown", () => {
    menu.init();
    menu.showMenu();
    expect(menu.state).toBe("visible");
    expect(menu.container.classList.contains("is-visible")).toBe(true);
    expect(menu.container.classList.contains("is-minimized")).toBe(false);
  });

  test("Menu can be hidden", () => {
    menu.init();
    menu.hideMenu();
    expect(menu.state).toBe("hidden");
    expect(menu.container.classList.contains("is-visible")).toBe(false);
    expect(menu.container.classList.contains("is-minimized")).toBe(false);
  });

  test("Menu can be minimized", () => {
    menu.init();
    menu.minimizeMenu();
    expect(menu.state).toBe("minimized");
    expect(menu.container.classList.contains("is-visible")).toBe(false);
    expect(menu.container.classList.contains("is-minimized")).toBe(true);
  });

  test("The state should not change on scroll if it is hidden", () => {
    menu.init();
    menu.hideMenu();
    menu.updateState(10, 0);
    expect(menu.state).toBe("hidden");
    menu.updateState(0, 10);
    expect(menu.state).toBe("hidden");
  });

  test("The state should change to minimized when scrolling down", () => {
    menu.init();
    menu.showMenu();
    menu.updateState(0, 10);
    expect(menu.state).toBe("minimized");
  });

  test("The state should change to visible when scrolling up", () => {
    menu.init();
    menu.minimizeMenu();
    menu.updateState(10, 0);
    expect(menu.state).toBe("visible");
  });

  it("Should have initial ARIA attributes", () => {
    menu.init();
    expect(menu.container.getAttribute("aria-haspopup")).toBe("true");
    expect(menu.container.getAttribute("aria-expanded")).toBe("false");
  });

  it("Should have updated ARIA attribute when menu is opened", () => {
    menu.init();
    menu.showMenu();
    expect(menu.container.getAttribute("aria-expanded")).toBe("false");
  });

  it("Should have updated ARIA attribute when menu is closed", () => {
    menu.init();
    menu.showMenu();
    menu.hideMenu();
    expect(menu.container.getAttribute("aria-expanded")).toBe("true");
  });
});
