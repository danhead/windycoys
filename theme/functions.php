<?php

class Windycoys_Walker_Comment extends Walker_Comment {
  function start_el(&$output, $comment, $depth = 0) {
    $id = $comment->comment_ID;
    $post_id = $comment->comment_post_ID;
    $reply_link = get_permalink($post_id) . '?replytocom='.$id.'#respond';
    $author_email = $comment->comment_author_email;
    $author = $comment->comment_author;
    $avatar = get_avatar($comment, 128);
    $date = get_comment_date('jS F, Y', $id).' at '.get_comment_date('H:i', $id);
    $content = $comment->comment_content;
    $comment_depth = $depth > 0 ? ' comments__item--depth-'.$depth : '';
    $output .= '<li class="comments__item'.$comment_depth.'">';
    $output .= '<div class="comment">';
    $output .= '<div class="comment__head">';
    $output .= '<div class="comment__avatar">'.$avatar.'</div>';
    $output .= '<div class="comment__metadata">';
    $output .= '<span class="comment__author">'.$author.'</span>';
    $output .= '<span class="comment__date">'.$date.'</span>';
    $output .= '</div></div>';
    $output .= '<div class="comment__body">'.$content.'</div>';
    $output .= '<div class="comment__foot">';
    $output .= '<a class="comment__reply" data-comment-author="'.$author.'" data-comment-id="'.$id.'" href="'.$reply_link.'">';
    $output .= '<span class="comment__reply-icon">';
    $output .= '<svg class="icon icon--extra-small"><use href="#icon-reply"></use></svg></span>';
    $output .= '<span class="comment__reply-text">Reply</span></a>';
    $output .= '<div class="comment__inline-reply"></div>';
    $output .= '</div></div></li>';
  }
}

class Windycoys_Walker_Nav extends Walker_Nav_Menu {
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
    'walker' => new Windycoys_Walker_Nav()
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
      echo '<a class="metadata__tag-link" href="' .
        home_url() . '/tag/' . $tag->name . '" rel="tag">' .
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

function windycoys_search_posts_per_page($query) {
  if ($query->is_search) {
    $query->set( 'posts_per_page', '10' );
  }
  return $query;
}
add_filter('pre_get_posts', 'windycoys_search_posts_per_page');
