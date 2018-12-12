<?php
global $wp_query;
get_header();
?>
<main class="page">
  <section class="page__logo">
    <?php get_template_part('partials/logo') ?>
  </section>
  <section class="page__content">
    <div class="content">
      <h1 class="title">
        <?php
          $query = $_GET['s'];
          echo $wp_query->found_posts.' results matching "' . $query . '" found.';
        ?>
      </h1>
      <ol class="search-results">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
      <?php $username = get_the_author_meta('nickname') ?>
      <?php $date = get_the_date('jS F, Y', $id).' at '.get_the_date('H:i', $id) ?>
        <li class="search-results__content">
          <div class="search-result">
            <div class="search-result__head">
              <div class="search-result__title">
                <a class="link" href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </div>
            </div>
            <div class="search-result__body">
              <?php echo the_excerpt() ?>
            </div>
            <div class="search-result__foot">
              <p class="search-result__metadata">
                <span class="search-result__icon">
                  <svg class="icon icon--extra-small" aria-hidden="true">
                    <use href="#icon-profile"></use>
                  </svg>
                </span>
                <span class="search-result__text"><?php echo $username ?></span>
                <span class="search-result__icon">
                  <svg class="icon icon--extra-small" aria-hidden="true">
                    <use href="#icon-calendar"></use>
                  </svg>
                </span>
                <span class="search-result__text"><?php echo $date ?></span>
              </p>
            </div>
          </div>
        </li>
      <?php endwhile; ?>
      </ol>
    </div>
  </section>
  <section class="page__pagination">
    <?php get_template_part('partials/pagination') ?>
  </section>
  <?php else: ?>
  <section class="page__article">
    <article class="article">
      <h1 class="article__title">Sorry, no results found.</h1>
      <div class="article__content">
        <a class="link" href="<?php echo get_site_url() ?>/">Go back home</a>
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
