<?php get_header(); ?>
<main>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <article>
      <h1><?php the_title(); ?></h1>
    </article>
  <?php endwhile; ?>

  <?php else: ?>
    <article>
      <h1>Sorry, nothing to display</h1>
    </article>
  <?php endif; ?>
</main>
