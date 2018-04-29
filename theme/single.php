<?php get_header(); ?>
<main class="Grid">
  <section class="Grid-logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <section class="Grid-article">
    <article class="Article">
      <div class="Article-date">
        <svg class="Icon">
          <use href="#icon-calendar"></use>
        </svg>
        <span class="Article-dateText">
          <?php the_time(get_option('date_format')) ?>
        </span>
      </div>
      <h1 class="Article-title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
      <div class="Article-content">
        <?php the_content( __( 'Continue reading <span class="meta-nav">&raquo;</span>', 'windycoys' )  ); ?>
      </div>
    </article>
  </section>
  <section class="Grid-metadata is-first">
    <?php get_template_part('partials/metadata') ?>
  </section>
  <?php endwhile; ?>
  <?php else: ?>
  <section class="Grid-article">
    <article class="Article">
      <h1 class="Article-title">Sorry, there is no article to display</h1>
      <div class="Article-content">
        <a class="Link" href="<?php get_site_url() ?>/">Go back home</a>
      </div>
    </article>
  </section>
  <?php endif; ?>
  <section class="Grid-banner">
    <?php get_template_part('partials/banner') ?>
  </section>
  <section class="Grid-footer">
    <?php get_template_part('partials/footer') ?>
  </section>
</main>
<?php get_template_part('partials/navigation') ?>
<?php get_footer() ?>
