<?php get_header(); ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <section class="page__article">
    <article class="article">
      <h1 class="article__title">
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </h1>
      <div class="article__content">
        <?php the_content(__('Continue reading <span class="meta-nav">&raquo;</span>', 'windycoys')); ?>
      </div>
    </article>
  </section>
  <?php endwhile; ?>
  <?php else: ?>
  <section class="page__article">
    <article class="article">
      <h1 class="article__title">Sorry, there is no article to display</h1>
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
