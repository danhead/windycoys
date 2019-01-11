<?php

class Windycoys_Walker_Comments extends Walker_Comment {
  function start_lvl(&$output, $depth = 0, $args = Array()) {
    $output .= '<ol class="comments__list comments__list--sub-list">';
  }

  function end_lvl(&$output, $depth = 0, $args = Array()) {
    $output .= '</ol>';
  }

  function start_el(&$output, $comment, $depth = 0 , $args = Array(), $id = 0) {
    $id = $comment->comment_ID;
    $post_id = $comment->comment_post_ID;
    $reply_link = get_permalink($post_id) . '?replytocom='.$id.'#respond';
    $author_email = $comment->comment_author_email;
    $author = $comment->comment_author;
    $avatar = get_avatar($comment, 128);
    $date = get_comment_date('jS F, Y', $id).' at '.get_comment_date('H:i', $id);
    $content = $comment->comment_content;
    $output .= '<li class="comments__item">';
    $output .= '<div class="comment">';
    $output .= '<div class="comment__head">';
    $output .= sprintf('<div class="comment__avatar">%s</div>', $avatar);
    $output .= '<div class="comment__metadata">';
    $output .= sprintf('<span class="comment__author">%s</span>', $author);
    $output .= sprintf('<span class="comment__date">%s</span>', $date);
    $output .= '</div></div>';
    $output .= sprintf('<div class="comment__body">%s</div>', $content);
    $output .= '<div class="comment__foot">';
    $output .= sprintf('<a class="comment__reply" data-comment-author="%s" ' .
      'data-comment-id="%s" href="%s">',
      $author,
      $id,
      $reply_link
    );
    $output .= '<span class="comment__reply-icon">';
    $output .= '<svg class="icon icon--extra-small"><use xlink:href="#icon-reply"></use></svg></span>';
    $output .= '<span class="comment__reply-text">Reply</span></a>';
    $output .= '<div class="comment__inline-reply"></div>';
    $output .= '</div></div>';
  }

  function end_el(&$output, $comment, $depth = 0, $args = Array()) {
    $output .= '</li>';
  }
}

?>
