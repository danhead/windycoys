<?php get_header() ?>
<main class="page">
  <section class="page__logo is-fixed">
    <?php get_template_part('partials/logo') ?>
  </section>
  <section class="page__content">
    <h1 class="title">
      <span class="title__icon">
        <svg class="icon" aria-hidden="true">
          <use xlink:href="#icon-tag"></use>
        </svg>
      </span>
      <span class="title__text">
        <?php echo single_tag_title() ?>
      </span>
    </h1>
    <ol>
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <li>
        <?php
        $excerpt = array(
          title => get_the_title(),
          url => get_the_permalink(),
          content => get_the_excerpt(),
          author => get_the_author_meta('nickname'),
          comments => get_comments_number(),
          date => get_the_date(get_option('date_format'), $id) . ' at ' . get_the_date(get_option('time_format'), $id),
          words => count(explode(" ", $post->post_content)),
        );
        get_template_part('partials/excerpt');
        ?>
      </li>
    <?php endwhile; ?>
    </ol>
  </section>
  <section class="page__pagination">
    <?php get_template_part('partials/pagination') ?>
  </section>
  <?php else: ?>
  <section class="page__content">
    <h1 class="title">Sorry, no results found.</h1>
    <a class="link" href="<?php echo get_site_url() ?>/">Go back home</a>
  </section>
  <?php endif; ?>
  <section class="page__banner">
    <?php get_template_part('partials/banner') ?>
  </section>
  <section class="page__footer">
    <?php get_template_part('partials/footer') ?>
  </section>
</main>
<?php get_template_part('partials/navigation') ?>
<?php get_footer() ?>
