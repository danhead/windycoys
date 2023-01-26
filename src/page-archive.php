<?php get_header();
the_post();
?>
<main class="page">
  <section class="page__logo is-fixed">
    <?php get_template_part("partials/logo"); ?>
  </section>
  <section class="page__content">
    <h1 class="title">
      <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
      </a>
    </h1>
    <div class="content">
      <?php the_content(); ?>
    </div>
    <?php get_template_part("partials/archive"); ?>
  </section>
  <section class="page__banner">
    <?php get_template_part("partials/banner"); ?>
  </section>
  <section class="page__footer">
    <?php get_template_part("partials/footer"); ?>
  </section>
</main>
<?php get_template_part("partials/navigation"); ?>
<?php get_footer(); ?>
