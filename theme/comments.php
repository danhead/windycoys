<?php
$form_settings = array(
  class_form => 'comment-respond__form',
  class_submit => 'comment-respond__submit',
  comment_field => '<label class="comment-respond__label" for="comment">Comment</label><textarea class="comment-respond__input" id="comment" name="comment" cols="25" rows="8" aria-required="true"></textarea></p>',
  logged_in_as => '<p class="comment-respond__text">' . sprintf( __( 'Logged in as <a class="link" href="%1$s">%2$s</a>. <a class="link" href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
  title_reply_before => '<h3 id="reply-title" class="comment-respond__title">',
  comment_notes_before => '<p class="comment-respond__notes">' . __( 'Your email address will not be published.' ) . ( $req ? $required_text : '' ) . '</p>',
  fields => array(
    author => '<div class="comment-respond__item"><label class="comment-respond__label" for="author">' . __( 'Name', 'domainreference' ) . ( $req ? '<span class="comment-respond__required">*</span>' : '' ) . '</label>' . '<input class="comment-respond__input" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
    email => '<div class="comment-respond__item"><label class="comment-respond__label" for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="comment-respond__required">*</span>' : '' ) . '</label>' . '<input class="comment-respond__input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
    url => '<div class="comment-respond__item"><label class="comment-respond__label" for="url">' . __( 'Website', 'domainreference' ) . '</label>' . '<input class="comment-respond__input" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
  ),
);
?>
<div class="comments" id="comments">
  <div class="comments__head">
    <h2 class="comments__title">
      <?php
        if (comments_open()) :
          if (have_comments()) :
            echo 'Join the conversation';
          else:
            echo 'Leave a comment';
          endif;
        else:
          echo 'Comments are closed';
        endif;
      ?>
    </h2>
  </div>
  <div class="comments__body">
    <ol class="comments__list">
      <?php
        wp_list_comments(
          array(
            'walker' => new Windycoys_Walker_Comment(),
            'style' => 'ol',
          )
        );
      ?>
    </ol>
  </div>
  <div class="comments__foot">
    <?php comment_form($form_settings) ?>
  </div>
</div>
