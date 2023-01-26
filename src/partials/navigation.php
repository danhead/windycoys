<?php
require get_template_directory() . '/classes/walker.navigation.php';

$menu = wp_nav_menu(array(
  'echo' => false,
  'menu' => 'navigation',
  'container_class' => 'nav__menu',
  'menu_class' => 'nav__list',
  'walker' => new Windycoys_Walker_Navigation(),
));

$menu = str_replace(
  'ul id="menu-navigation" class="nav__list"',
  'ul id="menu-navigation" class="nav__list" role="menubar"',
  $menu
);
?>
<button class="menu" id="menu">
  <span class="menu__line"></span>
  <span class="menu__line"></span>
  <span class="menu__line"></span>
  <span class="menu__text">Open menu</span>
</button>
<nav class="nav<?php echo is_user_logged_in() ? ' logged-in' : '' ?>" aria-label="Main Navigation">
  <div class="nav__content">
    <div class="nav__head">
      <h2 class="nav__title">
        <a class="nav__title-link" href="<?php get_site_url() ?>/" aria-label="Back Home" tabindex="-1">
          <span class="nav__title-link-icon">
            <svg class="icon icon--extra-large">
              <use href="#icon-windy"></use>
            </svg>
          </span>
          <img src="<?php echo get_template_directory_uri(); ?>/images/icon.png" alt="WindyCOYS logo" class="nav__title-link-image" data-load-transition="false">
        </a>
      </h2>
    </div>
    <div class="nav__body">
      <?php echo $menu ?>
    </div>
    <div class="nav__foot">
      <div class="nav__social">
        <a class="nav__social-link" href="https://www.facebook.com/WindyCOYS/" aria-label="WindyCOYS on Facebook">
          <svg class="icon icon--large">
            <use href="#icon-facebook"></use>
          </svg>
        </a>
        <a class="nav__social-link" href="https://twitter.com/windycoys/" aria-label="WindyCOYS on Twitter">
          <svg class="icon icon--large">
            <use href="#icon-twitter"></use>
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
  </div>
</nav>
