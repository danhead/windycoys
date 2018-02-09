<?php

function windycoys_the_tags() {
  $tags = get_the_tags();
  if ($tags) {
    foreach($tags as $key=>$tag) {
      echo '<a class="Metadata-categoriesLink" href="' .
        home_url() . '/tags/' . $tag->name . '" rel="tag">' .
        $tag->name . '</a>';
      if ($key < count($tags) - 1) {
        echo ', ';
      }
    }
  }
}

function windycoys_share_twitter_url() {
  $url = 'https://twitter.com/intent/tweet?text=';
  $title = get_the_title();
  $link = get_the_permalink();
  echo $url . urlencode($title . ': ' . $link . ' by @WindyCOYS');
}
