<?php

class Windycoys_Walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $title = $item->post_title;
    $uri = get_site_url() . '/' . $item->post_name;

    $output .= '<li class="nav__item" role="none">';
    $output .= '<a class="nav__link" href="' . $uri .'" role="menuitem">';
    $output .= $title . '</a></li>';
  }
}

function windycoys_nav() {
  wp_nav_menu(array(
    'container' => 'ul',
    'menu_class' => 'nav__list nav__list--sub-list',
    'walker' => new Windycoys_Walker()
  ));
}

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
      echo '<a class="metadata__categories-link" href="' .
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
