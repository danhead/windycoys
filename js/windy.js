import Menu from './menu';
import Navigation from './navigation';
import Image from './image';

const windy = {
  images: [],
};

export default function init() {
  document.querySelectorAll('img').forEach((image) => {
    const img = new Image(image);
    img.start();
    windy.images.push(img);
  });
  windy.menu = new Menu({
    container: document.querySelector('.Menu'),
  });
  windy.navigation = new Navigation({
    container: document.querySelector('.Nav'),
    menu: windy.menu,
  });
  windy.menu.init();
  windy.navigation.init();
}
