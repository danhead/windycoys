<section class="metadata">
  <div class="metadata__item metadata__item--light">
    <span class="metadata__icon">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-calendar"></use>
      </svg>
    </span>
    <span class="metadata__text">
      <?php the_time(get_option('date_format')) ?>
    </span>
  </div>
  <?php if (is_user_logged_in()): ?>
  <div class="metadata__item">
    <a class="metadata__link" href="<?php echo get_edit_post_link() ?>">
      <span class="metadata__icon">
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-edit"></use>
        </svg>
      </span>
      <span class="metadata__text">
        Edit post
      </span>
    </a>
  </div>
  <?php endif; ?>
  <div class="metadata__item">
    <a class="metadata__link" href="<?php the_permalink() ?>#comments">
      <span class="metadata__icon">
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-comments"></use>
        </svg>
      </span>
      <span class="metadata__text">
        <?php comments_number(); ?>
      </span>
    </a>
  </div>
  <div class="metadata__item">
    <span class="metadata__icon">
      <svg class="icon" aria-hidden="true">
        <use xlink:href="#icon-hash"></use>
      </svg>
    </span>
    <span class="metadata__text">
      <?php windycoys_the_tags() ?>
    </span>
  </div>
  <div class="metadata__item">
    <a class="metadata__share-link" href="#" aria-label="Facebook">
      <svg class="icon icon--facebook" aria-hidden="true">
        <use xlink:href="#icon-facebook"></use>
      </svg>
    </a>
    <a class="metadata__share-link" href="<?php windycoys_share_twitter_url() ?>" aria-label="Twitter">
      <svg class="icon icon--twitter" aria-hidden="true">
        <use xlink:href="#icon-twitter"></use>
      </svg>
    </a>
  </div>
</section>
