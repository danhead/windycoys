<?php
global $excerpt;
?>
<div class="excerpt">
  <div class="excerpt__head">
    <div class="excerpt__title">
      <a class="link" href="<?php echo $excerpt['url'] ?>">
        <?php echo $excerpt['title'] ?>
      </a>
    </div>
  </div>
  <div class="excerpt__body">
    <?php echo $excerpt['content'] ?>
  </div>
  <div class="excerpt__foot">
    <p class="excerpt__metadata">
      <span class="excerpt__icon">
        <svg class="icon icon--extra-small" aria-hidden="true">
          <use xlink:href="#icon-profile"></use>
        </svg>
      </span>
      <span class="excerpt__text"><?php echo $excerpt['author'] ?></span>
      <span class="excerpt__icon">
        <svg class="icon icon--extra-small" aria-hidden="true">
          <use xlink:href="#icon-calendar"></use>
        </svg>
      </span>
      <span class="excerpt__text"><?php echo $excerpt['date'] ?></span>
      <span class="excerpt__icon">
        <svg class="icon icon--extra-small" aria-hidden="true">
          <use xlink:href="#icon-comments"></use>
        </svg>
      </span>
      <span class="excerpt__text">
        <?php
          $number = $excerpt['comments'];
          echo $number === '1' ? '1 comment' : $number . ' comments';
        ?>
      </span>
    </p>
  </div>
</div>
