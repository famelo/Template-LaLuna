<?php
/**
 * Custom functions
 */

/**
 * Hide editor for specific page templates.
 *
 */
function hide_editor() {
    // Get the Post ID.
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
    if( !isset( $post_id ) ) return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);
    if ($template_file == 'page-content.php') {
      remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'hide_editor');
