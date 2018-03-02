<?php get_header() ?>
<main class="Grid">
  <section class="Grid-logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <?php while ( have_posts() ) : the_post(); $index++; ?>
  <section class="Grid-article">
    <article class="Article<?php echo ($index === 1 ? ' is-first' : '') ?>">
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
  <section class="Grid-banner">
    <?php get_template_part('partials/banner') ?>
  </section>
  <section class="Grid-footer">
    <?php get_template_part('partials/footer') ?>
  </section>
</main>
<?php get_template_part('partials/menu') ?>
<?php get_template_part('partials/nav') ?>
<?php get_footer() ?>
