<?php get_header(); ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <section class="page__content">
    <div class="content">
      <h1 class="title">404 - Page not found</h1>
      <a class="link" href="<?php echo get_site_url() ?>/">Go back home</a>
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
