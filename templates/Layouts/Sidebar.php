<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
<body <?php body_class(); ?>>
  <?php get_template_part('templates/Partials/Header'); ?>
  <div class="wrap container" role="document">
    <div class="content row">
      <div class="main col-md-8 col-sm-8 col-xs-12" role="main">
        <?php Famelo_Layout::content(); ?>
      </div>
      <div class="sidebar col-md-4 col-sm-4 hidden-xs">
      	<?php dynamic_sidebar('sidebar'); ?>
        <?php get_partial('BestSellers'); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('templates/Partials/Footer'); ?>
</body>
</html>