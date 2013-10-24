<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico?foo=1" />
  <!--[if lt IE 9]>
   <script>
      document.createElement('header');
      document.createElement('nav');
      document.createElement('section');
      document.createElement('article');
      document.createElement('aside');
      document.createElement('footer');
   </script>
<![endif]-->

  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
</head>
<body <?php body_class(); ?>>
  <?php get_template_part('templates/Partials/Header'); ?>
  <div class="wrap container" role="document">
    <div class="content">
      <div class="main" role="main">
        <?php Famelo_Layout::content(); ?>
      </div>
    </div>
  </div>
  <?php get_template_part('templates/Partials/Footer'); ?>
</body>
</html>