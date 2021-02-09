<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php print_external_scripts('header'); ?>
    <?php wp_head(); ?>
    <link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/assets/img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <?php $homepage_background_image = get_field('background_image','options'); ?>
  <body <?php body_class(); ?><?php if(is_front_page()) { ?> style="background-image:url(<?php echo $homepage_background_image['url']; ?>);"<?php } ?>>
    <?php get_template_part( 'partials/global', 'navigation' ); ?>