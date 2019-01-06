<?php
global $podcast;
?>
<div class="excerpt">
  <div class="excerpt__head">
    <h3 class="excerpt__title">
      <a class="link" href="<?php echo $podcast['podcast_episodes'] ?>">
        <?php echo $podcast['podcast_title'] ?>
      </a>
    </h3>
    <h4 class="excerpt__subtitle">
      <a class="link" href="<?php echo $podcast['url'] ?>">
        <?php echo $podcast['title'] ?>
      </a>
    </h4>
  </div>
  <div class="excerpt__body">
    <?php echo $podcast['description'] ?>
  </div>
  <div class="excerpt__foot">
    <audio class="excerpt__audio" src="<?php echo $podcast['audio'] ?>" controls="true">
      Your browser does not support the <code>audio</code> element.
    </audio>
    <p class="excerpt__metadata">
      <a
        class="link"
        href="<?php echo $podcast['audio'] ?>"
        title="Download the MP3">
        Download MP3
      </a> |
      <a class="link" href="<?php echo $podcast['podcast_episodes'] ?>">
        More episodes
      </a>
    </p>
    <p class="excerpt__metadata">
      <span class="excerpt__icon">
        <svg class="icon icon--extra-small" aria-hidden="true">
          <use xlink:href="#icon-calendar"></use>
        </svg>
      </span>
      <span class="excerpt__text"><?php echo $podcast['date'] ?></span>
    </p>
  </div>
</div>
