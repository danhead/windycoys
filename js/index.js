import Menu from './menu';
import Nav from './nav';

document.addEventListener('DOMContentLoaded', () => {
  const menu = new Menu({
    el: document.querySelector('.Menu'),
  });
  new Nav({
    el: document.querySelector('.Nav'),
    menu,
  });
});
