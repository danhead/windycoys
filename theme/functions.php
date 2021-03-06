<?php

function windycoys_the_tags() {
  $tags = get_the_tags();
  if (!$tags) return false;
  // Suppress NewsNow tag
  foreach($tags as $key=>$tag) {
    if($tag->name === "newsnow") {
      unset($tags[$key]);
    }
  }
  if ($tags) {
    foreach($tags as $key=>$tag) {
      echo '<a class="metadata__tag-link" href="' .
        home_url() . '/tag/' . $tag->name . '" rel="tag">' .
        $tag->name . '</a>';
      if ($key < count($tags) - 1) {
        echo ', ';
      }
    }
  }
}

function windycoys_get_twitter_share_url() {
  $url = 'https://twitter.com/intent/tweet?text=';
  $title = get_the_title();
  $link = get_the_permalink();
  return $url . urlencode($title . ' : ' . $link);
}

function windycoys_search_posts_per_page($query) {
  if ($query->is_search) {
    $query->set( 'posts_per_page', '10' );
  }
  return $query;
}
add_filter('pre_get_posts', 'windycoys_search_posts_per_page');

function windycoys_get_deploy_timestamp() {
  if (file_exists(__DIR__ . '/.timestamp')) {
    $timestamp = file_get_contents(__DIR__ . '/.timestamp');
    return $timestamp;
  }
  return false;
}

function windycoys_create_podcasts_table() {
  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE windycoys_podcasts (
    id int(2) NOT NULL AUTO_INCREMENT,
    podcast_id varchar(3) DEFAULT '' NOT NULL,
    last_update bigint(10) DEFAULT 0 NOT NULL,
    content longtext DEFAULT '' NOT NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;";
  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
  $wpdb->insert('windycoys_podcasts', array(
    'podcast_id' => 'tfc',
    'last_update' => 0,
    'content' => '{}'
  ));
  $wpdb->insert('windycoys_podcasts', array(
    'podcast_id' => 'xin',
    'last_update' => 0,
    'content' => '{}'
  ));
}

function windycoys_fetch_podcast_meta($id) {
  global $wpdb;
  $urls = array(
    'tfc' => 'https://rss.acast.com/thefightingcock',
    'xin' => 'https://rss.acast.com/theextrainch',
  );
  $feed = file_get_contents($urls[$id]);
  $feed = str_replace('<media:', '<', $feed);
  $feed = str_replace('</media:', '</', $feed);
  $feed = str_replace('<itunes:', '<', $feed);
  $feed = str_replace('</itunes:', '</', $feed);
  $now = time();
  $wpdb->update("windycoys_podcasts",
    array('last_update' => $now, 'content' => $feed),
    array('podcast_id'=>$id)
  );
  return $feed;
}

function windycoys_refresh_podcast_meta($id) {
  global $wpdb;
  $now = time();
  $res = $wpdb->get_row('SELECT * FROM windycoys_podcasts WHERE
    podcast_id = "' . $id .'"');
  if (!$res) {
    windycoys_create_podcasts_table();
  }
  if ($res->last_update + 300 < $now) {
    return array(
      from_cache => false,
      data => windycoys_fetch_podcast_meta($id),
    );
  }
  return array(
    from_cache => true,
    data => $res->content,
  );
}

function windycoys_get_episodes_url($id) {
  $urls = array(
    'tfc' => 'https://play.acast.com/s/thefightingcock',
    'xin' => 'https://play.acast.com/s/theextrainch',
  );
  return $urls[$id];
}

function windycoys_get_podcast_meta($id) {
  $res = windycoys_refresh_podcast_meta($id);
  $rss = simplexml_load_string($res['data']);
  $item = $rss->channel->item;
  $date = strtotime((String) $item->pubDate);
  return array(
    id => $id,
    from_cache => $res['from_cache'],
    podcast_title => (String) $rss->channel->title,
    podcast_description => (String) $rss->channel->description,
    podcast_episodes => windycoys_get_episodes_url($id),
    artwork_url => (String) $rss->channel->image->url,
    title => (String) $item->title,
    description => (String) $item->description,
    image => (String) $item->image['href'],
    date => date(get_option('date_format'), $date).' at '.date(get_option('time_format'), $date),
    length => (String) $item->duration,
    url => (String) $item->link,
    audio => (String) $item->enclosure['url'],
  );
}

function windycoys_get_read_time($words) {
  $wpm = 250;
  $mins = ceil($words / $wpm);
  return $mins;
}

function windycoys_is_ie() {
  $ua = htmlentities($_SERVER["HTTP_USER_AGENT"], ENT_QUOTES, "UTF-8");
  if (preg_match("~MSIE|Internet Explorer~i", $ua) || (strpos($ua, "Trident/7.0") !== false && strpos($ua, "rv:11.0") !== false)) {
    return true;
  }
  return false;
}

function windycoys_first_sentence($string) {
  $sentence = preg_split( '/(\.|!|\?)\s/', $string, 2, PREG_SPLIT_DELIM_CAPTURE );
  return $sentence['0'] . $sentence['1'];
}

function windycoys_get_description($post_id) {
  if (get_post_type() == "post") {
    $post = get_post($post_id);
    $content = (strlen($post->post_excerpt) === 0) ?
      strip_tags(windycoys_first_sentence($post->post_content)) :
      $post->post_excerpt;
    return $content;
  } else {
    return get_bloginfo('description');
  }
}

function windycoys_jetpack_custom_image($media, $post_id, $args) {
  if ($media) {
    return $media;
  } else {
    $url = get_template_directory_uri() . '/images/icon.png';
    $permalink = get_permalink($post_id);

    return array(
      array(
        'type' => 'image',
        'from' => 'custom_fallback',
        'src' => esc_url($url),
        'href' => $permalink,
      )
    );
  }
}
add_filter('jetpack_images_get_images', 'windycoys_jetpack_custom_image', 10, 3);

function windycoys_strip_scripts(&$scripts) {
  if(!is_admin()){
    $scripts->remove('jquery');
  }
}

add_filter('wp_default_scripts', 'windycoys_strip_scripts');
