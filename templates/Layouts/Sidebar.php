<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico?foo=1" />
<!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

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