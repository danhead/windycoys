<?php get_header() ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <?php while ( have_posts() ) : the_post(); $index++; ?>
  <section class="page__article<?php echo ($index === 1 ? ' is-first' : '') ?>">
    <article class="article">
      <div class="article__date">
        <svg class="icon">
          <use href="#icon-calendar"></use>
        </svg>
        <span class="article__date-text">
          <?php the_time(get_option('date_format')) ?>
        </span>
      </div>
      <div class="article__content">
        <h1 class="title">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h1>
        <div class="content">
          <?php the_content(__('Continue reading <span class="meta-nav">&raquo;</span>', 'windycoys')); ?>
        </div>
      </div>
    </article>
  </section>
  <section class="page__metadata">
    <?php get_template_part('partials/metadata') ?>
  </section>
  <?php endwhile; ?>
  <section class="page__pagination">
    <?php get_template_part('partials/pagination') ?>
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
