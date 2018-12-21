<?php

function windycoys_the_tags() {
  $tags = get_the_tags();
  if (!$tags) return false;
  // Suppress NewsNow tag
  foreach($tags as $key=>$tag) {
    if($tag->name === "newsnow") {
      unset($tags[$key]);
    }
  }
  if ($tags) {
    foreach($tags as $key=>$tag) {
      echo '<a class="metadata__tag-link" href="' .
        home_url() . '/tag/' . $tag->name . '" rel="tag">' .
        $tag->name . '</a>';
      if ($key < count($tags) - 1) {
        echo ', ';
      }
    }
  }
}

function windycoys_get_twitter_share_url() {
  $url = 'https://twitter.com/intent/tweet?text=';
  $title = get_the_title();
  $link = get_the_permalink();
  return $url . urlencode($title . ' : ' . $link);
}

function windycoys_search_posts_per_page($query) {
  if ($query->is_search) {
    $query->set( 'posts_per_page', '10' );
  }
  return $query;
}
add_filter('pre_get_posts', 'windycoys_search_posts_per_page');

function windycoys_get_deploy_timestamp() {
  if (file_exists(__DIR__ . '/.timestamp')) {
    $timestamp = file_get_contents(__DIR__ . '/.timestamp');
    return $timestamp;
  }
  return false;
}
