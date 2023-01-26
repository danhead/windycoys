<?php get_header(); ?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part("partials/logo"); ?>
  </section>
  <?php if (have_posts()):
    while (have_posts()):
      the_post(); ?>
  <section class="page__content">
    <h1 class="title">
      <?php the_title(); ?>
    </h1>
    <div class="content">
      <?php the_content(); ?>
    </div>
  </section>
  <?php
    endwhile; ?>
  <?php
  else:
     ?>
  <section class="page__content">
    <h1 class="title">Sorry, there is no article to display</h1>
    <a class="link" href="<?php echo get_site_url(); ?>/">Go back home</a>
  </section>
  <?php
  endif; ?>
  <section class="page__banner">
    <?php get_template_part("partials/banner"); ?>
  </section>
  <section class="page__footer">
    <?php get_template_part("partials/footer"); ?>
  </section>
</main>
<?php get_template_part("partials/navigation"); ?>
<?php get_footer(); ?>
