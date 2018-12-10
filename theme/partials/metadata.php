<section class="metadata">
  <div class="metadata__date">
    <svg class="icon">
      <use href="#icon-calendar"></use>
    </svg>
    <span class="metadata__date-text">
      <?php the_time(get_option('date_format')) ?>
    </span>
  </div>
  <?php if (is_user_logged_in()): ?>
  <div class="metadata__editor">
    <a class="metadata__editor-link" href="<?php echo get_edit_post_link() ?>">
      <svg class="icon">
        <use href="#icon-edit"></use>
      </svg>
      <span class="metadata__editor-text">
        Edit post
      </span>
    </a>
  </div>
  <?php endif; ?>
  <div class="metadata__comments">
    <a class="metadata__comments-link" href="<?php the_permalink() ?>#comments">
      <svg class="icon">
        <use href="#icon-comments"></use>
      </svg>
      <span class="metadata__comments-text">
        <?php comments_number(); ?>
      </span>
    </a>
  </div>
  <div class="metadata__categories">
    <svg class="icon">
      <use href="#icon-hash"></use>
    </svg>
    <span class="metadata__categories-text">
      <?php windycoys_the_tags() ?>
    </span>
  </div>
  <div class="metadata__share">
    <a class="metadata__share-link" href="#" aria-label="Facebook">
      <svg class="icon icon--facebook">
        <use href="#icon-facebook"></use>
      </svg>
    </a>
    <a class="metadata__share-link" href="<?php windycoys_share_twitter_url() ?>" aria-label="Twitter">
      <svg class="icon icon--twitter">
        <use href="#icon-twitter"></use>
      </svg>
    </a>
  </div>
</section>
