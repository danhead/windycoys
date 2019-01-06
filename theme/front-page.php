<?php get_header() ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <section class="page__content page__content--2col">
    <div class="page__content-item page__content-item--full-width">
      <h2 class="title">Latest articles</h2>
    </div>
    <?php
      $posts = get_posts(array(
        numberposts => 4,
      ));
      foreach ($posts as $post) {
        $date = strtotime($post->post_date);
        $year = date('Y', $date);
        $month = date('F', $date);
        $day = date('jS', $date);
        $date = get_the_date('jS F, Y', $post->ID).' at '.get_the_date('H:i', $post->ID);
        $excerpt = array(
          title => $post->post_title,
          url => get_permalink($post->ID),
          content => $post->post_excerpt,
          author => get_the_author_meta('nickname', $post->post_author),
          comments => $post->comment_count,
          date => $date,
        );
        echo '<div class="page__content-item">';
        get_template_part('partials/excerpt');
        echo '</div>';
      }
    ?>
  </section>
  <section class="page__banner">
    <?php get_template_part('partials/banner') ?>
  </section>
  <section class="page__footer">
    <?php get_template_part('partials/footer') ?>
  </section>
</main>
<?php get_template_part('partials/navigation') ?>
<?php get_footer() ?>
