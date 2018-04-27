<nav class="Nav" aria-label="Main Navigation">
  <button class="Menu">
    <span class="Menu-line"></span>
    <span class="Menu-line"></span>
    <span class="Menu-line"></span>
    <span class="Menu-text">Open menu</span>
  </button>
  <div class="Nav-content">
    <h2 class="Nav-title">WindyCOYS</h2>
    <ul class="Nav-list">
      <li class="Nav-listItem">
        <a class="Nav-link" href="<?php get_site_url() ?>/">Home</a>
        <?php windycoys_nav() ?>
      </li>
    </ul>
    <button class="Nav-close">
      <span class="Nav-closeBar"></span>
      <span class="Nav-closeBar"></span>
      <span class="Nav-closeText">Close menu</span>
    </button>
    <div class="Nav-social">
      <a class="Nav-socialLink" href="https://www.facebook.com/WindyCOYS/">
        <svg class="Icon Icon--large">
          <use href="#icon-facebook"></use>
        </svg>
      </a>
      <a class="Nav-socialLink" href="https://twitter.com/windycoys/">
        <svg class="Icon Icon--large">
          <use href="#icon-twitter"></use>
        </svg>
      </a>
    </div>
    <div class="Nav-search">
      <?php get_search_form() ?>
    </div>
  </div>
  <button class="Nav-close">
    <span class="Nav-closeBar"></span>
    <span class="Nav-closeBar"></span>
    <span class="Nav-closeText">Close menu</span>
  </button>
</nav>
