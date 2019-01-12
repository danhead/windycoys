import Menu from './menu';
import Navigation from './navigation';
import Image from './image';
import ReplyToComment from './reply-to-comment';

const windy = {
  images: [],
};

export default function init() {
  Array.prototype.slice.call(document.querySelectorAll('img'))
    .forEach((image) => {
      const img = new Image(image);
      img.start();
      windy.images.push(img);
    });
  windy.menu = new Menu({
    container: document.querySelector('.menu'),
  });
  windy.navigation = new Navigation({
    container: document.querySelector('.nav'),
    menu: windy.menu,
  });
  windy.menu.init();
  windy.navigation.init();
  windy.comments = new ReplyToComment({
    form: document.querySelector('.comments__foot'),
    links: document.querySelectorAll('.comment__reply'),
  });
}
