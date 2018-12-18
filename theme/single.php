<?php get_header(); ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <section class="page__article is-first">
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
          <?php the_title(); ?>
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
  <section class="page__comments">
    <?php comments_template() ?>
  </section>
  <?php endwhile; ?>
  <?php else: ?>
  <section class="page__article is-first">
    <article class="article">
      <h1 class="title">Sorry, there is no article to display</h1>
      <div class="article__content">
        <a class="link" href="<?php get_site_url() ?>/">Go back home</a>
      </div>
    </article>
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
