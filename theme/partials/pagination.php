<?php
$base_url = get_site_url().'/page/';
$current = get_query_var('paged');
$total = $wp_query->max_num_pages;
$links = paginate_links(array(
  type => 'array',
  prev_next => false,
  current => $current,
  end_size => 2,
));

function get_previous_url($base_url, $page) {
  $qs = $_SERVER['QUERY_STRING'];
  $url = $base_url . ($page - 1);
  if ($qs) {
    $url .= '/?' . $qs;
  }
  return $url;
}

function get_next_url($base_url, $page) {
  $qs = $_SERVER['QUERY_STRING'];
  $url = $base_url;
  if ($page === 0) {
    $url .= '2';
  } else {
    $url .= ($page + 1);
  }
  if ($qs) {
    $url .= '/?' . $qs;
  }
  return $url;
}
function format_link($link) {
  if (strpos($link, 'page-numbers dots')) {
    return '<span class="pagination__dots"><svg class="icon icon--extra-small"><use xlink:href="#icon-ellipsis"></use></svg></span>';
  }
  $link = str_replace('page-numbers current', 'pagination__current', $link);
  $link = str_replace('page-numbers', 'link', $link);
  return $link;
}

if (count($links) > 1) :
?>
<div class="pagination">
  <?php if ($current > 1) : ?>
    <div class="pagination__previous">
      <a class="pagination__link" href="<?php echo get_previous_url($base_url, $current) ?>" aria-label="Previous page">
        <svg class="icon icon--small">
          <use xlink:href="#icon-chevron-left"></use>
        </svg>
      </a>
    </div>
  <?php endif; ?>
  <nav class="pagination__content" role="navigation" aria-label="Pagination navigation">
    <ul class="pagination__list">
      <?php foreach($links as $link) { ?>
        <li class="pagination__item">
          <?php echo $key ?>
          <?php echo format_link($link) ?>
        </li>
      <?php } ?>
    </ul>
  </nav>
  <?php if ($current < $total) : ?>
    <div class="pagination__next">
      <a class="pagination__link" href="<?php echo get_next_url($base_url, $current) ?>" aria-label="Next page">
        <svg class="icon icon--small">
          <use xlink:href="#icon-chevron-right"></use>
        </svg>
      </a>
    </div>
  <?php endif; ?>
</div>
<?php endif; ?>
