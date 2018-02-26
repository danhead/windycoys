import Article from './article';
import Menu from './menu';
import Nav from './nav';

document.addEventListener('DOMContentLoaded', () => {
  const site = {};
  site.menu = new Menu({
    el: document.querySelector('.Menu'),
  });
  site.nav = new Nav({
    el: document.querySelector('.Nav'),
    menu: site.menu,
  });

  site.articles = [].slice.call(document.querySelectorAll('.Article'))
    .map((article, index) => new Article({
      article,
      metadata: document.querySelectorAll('.Metadata')[index],
    }));
});
