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
    <div
      class="fb-share-button"
      data-href="<?php echo get_the_permalink() ?>"
      data-layout="box_count"
      data-size="small"
      data-mobile-iframe="false"
    >
      <a
        target="_blank"
        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
        class="fb-xfbml-parse-ignore"
      >
        Share
      </a>
    </div>
  </div>
  <div class="metadata__item">
    <a
      class="twitter-share-button"
      href="<?php echo windycoys_get_twitter_share_url() ?>"
      data-url="<?php echo get_the_permalink() ?>"
    >
      Tweet
    </a>
  </div>
</section>
