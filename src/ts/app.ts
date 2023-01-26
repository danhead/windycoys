import { Image } from "./image";
import { Menu } from "./menu";
import { Navigation } from "./navigation";
import { ReplyToComment } from "./reply-to-comment";

export class App {
  menu: Menu;
  navigation: Navigation;

  constructor() {
    Array.from(document.querySelectorAll("img")).forEach((image) =>
      new Image(image).start()
    );
    this.menu = new Menu(document.querySelector("#menu"), window);
    this.navigation = new Navigation(document.querySelector(".nav"));
    new ReplyToComment();
    this.attachEvents();
    this.attachKeyEvents();
  }

  attachEvents(): void {
    const { menu, navigation } = this;
    menu.btn.addEventListener("click", (e) => {
      e.preventDefault();
      this.showNav();
    });
    navigation.container.addEventListener("click", (e) => {
      if (navigation.container === e.target) {
        this.hideNav();
      }
    });
    navigation.container
      .querySelector(".nav__close")
      .addEventListener("click", () => {
        this.hideNav();
      });
  }

  attachKeyEvents() {
    const { navigation } = this;
    const first = navigation.container.querySelector(
      ".nav__link"
    ) as HTMLElement;
    const last = navigation.container.querySelector(
      ".nav__close"
    ) as HTMLElement;
    navigation.container.addEventListener("keydown", (e) => {
      if (e.code === "Escape") {
        this.hideNav();
      }
    });
    first.addEventListener("keydown", (e) => {
      if (e.shiftKey && e.code === "Tab") {
        e.preventDefault();
        last.focus();
      }
    });
    last.addEventListener("keydown", (e) => {
      if (!e.shiftKey && e.code === "Tab") {
        e.preventDefault();
        first.focus();
      }
    });
  }

  showNav(): void {
    this.menu.hide();
    this.navigation.show();
  }

  hideNav(): void {
    this.menu.show();
    this.navigation.hide();
  }
}
