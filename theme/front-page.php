<?php get_header() ?>
<main class="page">
  <section class="page__logo is-fixed">
    <?php get_template_part('partials/logo') ?>
  </section>
  <section class="page__content page__content--centered-md">
    <h1 class="title">Latest articles</h1>
    <div class="page__columns">
    <?php
      $posts = get_posts(array(
        numberposts => 4,
      ));
      foreach ($posts as $post) {
        $date = strtotime($post->post_date);
        $year = date('Y', $date);
        $month = date('F', $date);
        $day = date('jS', $date);
        $date = get_the_date(get_option('date_format'), $post->ID).' at '.get_the_date(get_option('time_format'), $post->ID);
        $content = (strlen($post->post_excerpt) === 0) ?
          strip_tags(substr($post->post_content, 0, 200)).' [...]' :
          $post->post_excerpt;
        $words = count(explode(" ", $post->post_content));
        $excerpt = array(
          title => $post->post_title,
          url => get_permalink($post->ID),
          content => $content,
          author => get_the_author_meta('nickname', $post->post_author),
          comments => $post->comment_count,
          words => $words,
          date => $date,
        );
        echo '<div class="page__cell">';
        get_template_part('partials/excerpt');
        echo '</div>';
      }
    ?>
    </div>
    <h2 class="title">Podcasts</h2>
    <div class="page__columns">
      <div class="page__cell">
        <?php $podcast = windycoys_get_podcast_meta('xin') ?>
        <?php get_template_part('partials/podcast') ?>
      </div>
      <div class="page__cell">
        <?php $podcast = windycoys_get_podcast_meta('tfc') ?>
        <?php get_template_part('partials/podcast') ?>
      </div>
    </div>
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
