<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' &laquo; '; } ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#4b88b6">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans|Raleway:700" rel="stylesheet">
  </head>
  <body>
    <header>
      <?php get_template_part('icons') ?>
    </header>
