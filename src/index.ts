import { App } from "./ts";

document.addEventListener("DOMContentLoaded", () => new App());
/*
import { Image, Menu, Navigation, ReplyToComment } from "./ts";

document.addEventListener("DOMContentLoaded", () => {
  Array.from(document.querySelectorAll("img")).forEach((image) => {
    new Image(image).start();
  });
  const menu = document.querySelector("#menu") as HTMLButtonElement;
  const navigation = document.querySelector(".nav") as HTMLElement;
  const form = document.querySelector("#respond") as HTMLDivElement;
  const links = Array.from(
    document.querySelectorAll(".comment__reply")
  ) as HTMLLinkElement[];
  const btn = new Menu(document.querySelector("#menu"), window);
  btn.init();
  new Navigation(navigation, btn).init();
  new ReplyToComment(form, links).init();
});
*/
