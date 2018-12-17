<nav class="nav<?php echo is_user_logged_in() ? ' logged-in' : '' ?>" aria-label="Main Navigation">
  <button class="menu">
    <span class="menu__line"></span>
    <span class="menu__line"></span>
    <span class="menu__line"></span>
    <span class="menu__text">Open menu</span>
  </button>
  <div class="nav__content">
    <h2 class="nav__title">
      <a class="nav__title-link" href="<?php get_site_url() ?>/" aria-label="Navigation title" tabindex="-1">
        <?php bloginfo('name') ?>
      </a>
    </h2>
    <ul class="nav__list" role="menubar">
      <li class="nav__list-item" role="none">
        <a class="nav__link" href="<?php get_site_url() ?>/" role="menuitem">Home</a>
        <?php windycoys_nav() ?>
      </li>
    </ul>
    <div class="nav__social">
      <a class="nav__social-link" href="https://www.facebook.com/WindyCOYS/">
        <svg class="icon icon--large">
          <use xlink:href="#icon-facebook"></use>
        </svg>
      </a>
      <a class="nav__social-link" href="https://twitter.com/windycoys/">
        <svg class="icon icon--large">
          <use xlink:href="#icon-twitter"></use>
        </svg>
      </a>
    </div>
    <div class="nav__search">
      <?php get_search_form() ?>
    </div>
    <button class="nav__close">
      <span class="nav__close-bar"></span>
      <span class="nav__close-bar"></span>
      <span class="nav__close-text">Close menu</span>
    </button>
  </div>
</nav>
