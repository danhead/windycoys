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
    <?php comment_form(array(
      'class_form' => 'foo-bar'
    )) ?>
  </div>
</div>
