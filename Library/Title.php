<?php

/**
 * Manage output of wp_title()
 */
function famelo_wp_title($title) {
  if (is_feed()) {
    return $title;
  }

  $title .= get_bloginfo('name');

  return $title;
}
add_filter('wp_title', 'famelo_wp_title', 10);

?>