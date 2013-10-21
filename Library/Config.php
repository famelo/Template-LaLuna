<?php
/**
 * Generel configuration
 */
function famelo_config() {
  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Hauptmenü', 'roots'),
    'service_menu' => __('Service Menü', 'roots'),
    'footer_menu' => __('Fußzeilen Menü', 'roots'),
    'user_menu' => __('Benutzer Menü', 'roots'),
  ));

  register_sidebar(array(
    'name'          => __('Sidebar', 'roots'),
    'id'            => 'sidebar',
    'before_widget' => '<section class="widget %1$s %2$s"><div class="widget-inner">',
    'after_widget'  => '</div></section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  // set_post_thumbnail_size(150, 150, false);
  add_image_size('category-thumbnail', 300, 190);
  add_image_size('slider-cropped', 970, 451, TRUE);

  add_image_size('column-4', 294, 300, TRUE);
  add_image_size('column-8', 617, 300, TRUE);
  add_image_size('column-6', 455, 300, TRUE);

  // Tell the TinyMCE editor to use a custom stylesheet
  // add_editor_style('/Assets/Styles/Editor.css');

  ini_set('display_errors', 1);
}
add_action('after_setup_theme', 'famelo_config');