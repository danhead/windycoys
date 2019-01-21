<?php
$css_url = get_template_directory_uri() . '/style.css';
$deploy_timestamp = windycoys_get_deploy_timestamp();
if ($deploy_timestamp) {
  $css_url .= '?t=' . $deploy_timestamp;
}
$manifest = get_template_directory_uri() . '/manifest.json';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' &laquo; '; } ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#201f42">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta property="og:title" content="<?php if(is_single()) { single_post_title(); } else { bloginfo("name"); } ?>"/>
    <meta property="og:type" content="blog"/>
    <meta property="og:url" content="https://<?php echo $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; ?>"/>
    <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/images/icon.png"/>
    <meta property="og:site_name" content="WindyCOYS"/>
    <meta property="fb:admins" content="Windy84"/>
    <meta property="og:description" content="<?php bloginfo('description'); ?>"/>
    <?php wp_head(); ?>
    <link rel="me" href="https://twitter.com/WindyCOYS">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri() ?>/images/icon_48.png">
    <link rel="manifest" href="<?php echo $manifest ?>">
    <link rel="stylesheet" href="<?php echo $css_url ?>">
    <link href="//fonts.googleapis.com/css?family=Open+Sans|Raleway:700" rel="stylesheet">
    <?php if (windycoys_is_ie()) : ?>
    <style type="text/css">.is-fixed .logo,.is-fixed .metadata{position: static;}</style>
    <?php endif; ?>
  </head>
  <body>
