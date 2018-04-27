import Menu from './menu';
import Navigation from './navigation';

const windy = {};

export default function init() {
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
