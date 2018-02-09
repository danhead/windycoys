<?php get_header() ?>
  <main class="Grid">
    <?php get_template_part('partials/logo') ?>
    <?php while ( have_posts() ) : the_post() ?>
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
    <section class="Grid-metadata">
      <?php get_template_part('partials/metadata') ?>
    </section>
    <?php endwhile; ?>
    <section class="Grid-footer">
      <?php get_template_part('partials/footer') ?>
    </section>
