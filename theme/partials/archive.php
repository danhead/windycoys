<?php
$posts = get_posts(array(
  numberposts => -1,
  order => 'ASC',
));
$archive = array();

foreach ($posts as $post) {
  $date = strtotime($post->post_date);
  $year = date('Y', $date);
  $month = date('F', $date);
  $day = date('jS', $date);
  $url = get_permalink($post->ID);
  $comments = $post->comment_count === '1' ? '1 comment' : $post->comment_count . ' comments';
  if ($post->post_status === 'publish') {
    $archive[$year][$month][] = array(
      title => $post->post_title,
      slug => $post->post_name,
      author => $post->post_author,
      day => $day,
      url => $url,
      comments => $comments,
    );
  }
}

?>
<div class="archive">
  <ol class="archive__list">
    <?php foreach ($archive as $year => $yearData) : ?>
      <li class="archive__item">
        <h2 class="archive__heading">
          <?php echo $year ?>
        </h2>
        <ol class="archive__list archive__list--sub-list">
          <?php foreach ($yearData as $month => $monthData) : ?>
            <li class="archive__item">
              <h3 class="archive__subheading">
                <?php echo $month ?>
              </h3>
              <ol class="archive__list archive__list--sub-list">
                <?php foreach ($monthData as $post) : ?>
                  <li class="archive__item">
                    <span class="archive__date">
                      <?php echo $post['day'] ?>
                    </span>
                    <a class="link" href="<?php echo $post['url'] ?>">
                      <?php echo $post['title'] ?>
                    </a>
                    <span class="archive__comments">
                      (<?php echo $post['comments'] ?>)
                    </span>
                  </li>
                <?php endforeach; ?>
              </ol>
            </li>
          <?php endforeach; ?>
        </ol>
      </li>
    <?php endforeach; ?>
  </ol>
</div>
