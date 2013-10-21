<?php

function famelo_assets() {
  wp_enqueue_style('template_css', get_template_directory_uri() . '/assets/Styles/Main.less');

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/Components/bootstrap/dist/js/bootstrap.min.js');
  wp_enqueue_script('template_js', get_template_directory_uri() . '/assets/Scripts/Main.js');
}
add_action('wp_enqueue_scripts', 'famelo_assets', 100);