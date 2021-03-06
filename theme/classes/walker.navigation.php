<?php

class Windycoys_Walker_Navigation extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $output .= '<ul class="nav__list" role="menu">';
  }

  function end_lvl(&$output, $depth = 0, $args = Array()) {
    $output .= '</ul>';
  }

  function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0) {
    $title = $item->title;
    $url = $item->url;
    if ($title && $url) {
      $output .= '<li class="nav__list-item" role="none">';
      $output .= sprintf('<a class="nav__link" href="%s" role="menuitem">', $url);
      $output .= $title;
      $output .= '</a>';
    }
  }

  function end_el(&$output, $item, $depth = 0, $args = Array()) {
    $output .= '</li>';
  }
}

?>
