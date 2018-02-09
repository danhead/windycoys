<section class="Metadata">
  <div class="Metadata-date">
    <svg class="Icon">
      <use href="#icon-calendar"></use>
    </svg>
    <span class="Metadata-dateText">
      <?php the_time(get_option('date_format')) ?>
    </span>
  </div>
  <div class="Metadata-comments">
    <a class="Metadata-commentsLink" href="<?php the_permalink() ?>">
      <?php comments_number(); ?>
    </a>
  </div>
  <div class="Metadata-categories">
    <svg class="Icon">
      <use href="#icon-hash"></use>
    </svg>
    <span class="Metadata-categoriesText">
      <?php windycoys_the_tags() ?>
    </span>
  </div>
  <div class="Metadata-share">
    <a class="Metadata-shareLink" href="#">
      <svg class="Icon Icon--facebook">
        <use href="#icon-facebook"></use>
      </svg>
    </a>
    <a class="Metadata-shareLink" href="<?php windycoys_share_twitter_url() ?>">
      <svg class="Icon Icon--twitter">
        <use href="#icon-twitter"></use>
      </svg>
    </a>
  </div>
</section>

