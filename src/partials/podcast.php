<?php
global $podcast;
$artwork = get_template_directory_uri() . "/images/" . $podcast["id"] . ".png";
?>
<div class="excerpt">
  <div class="excerpt__head">
    <img
      class="excerpt__image"
      title="<?php echo $podcast["podcast_title"]; ?>"
      src="<?php echo $artwork; ?>">
    <h3 class="excerpt__title">
      <a class="link" href="<?php echo $podcast["url"]; ?>">
        <?php echo $podcast["title"]; ?>
      </a>
    </h3>
  </div>
  <div class="excerpt__body">
    <?php echo $podcast["description"]; ?>
  </div>
  <div class="excerpt__foot">
    <audio class="excerpt__audio" src="<?php echo $podcast[
      "audio"
    ]; ?>" controls="true">
      Your browser does not support the <code>audio</code> element.
    </audio>
    <ul class="excerpt__links">
      <li class="excerpt__link">
        <a
          class="link"
          href="<?php echo $podcast["audio"]; ?>"
          title="Download the MP3">
          Download MP3
        </a>
      </li>
      <li class="excerpt__link">
        <a class="link" href="<?php echo $podcast["podcast_episodes"]; ?>">
          More episodes
        </a>
      </li>
    </ul>
    <ul class="excerpt__list">
      <li class="excerpt__list-item">
        <span class="excerpt__icon">
          <svg class="icon icon--extra-small" aria-hidden="true">
            <use href="#icon-calendar"></use>
          </svg>
        </span>
        <span class="excerpt__text"><?php echo $podcast["date"]; ?></span>
      </li>
    </ul>
  </div>
</div>
