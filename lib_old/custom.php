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
    if (isset($_GET['post'])) {
        $postId = $_GET['post'];
    }
    if (isset($_POST['post_ID'])) {
        $postId = $_POST['post_ID'];
    }

    if( !isset( $postId ) ) return;

    // Get the name of the Page Template file.
    $templateFile = get_post_meta($postId, '_wp_page_template', true);
    if (file_exists(__DIR__ . '/../' . $templateFile)) {
        $template = file_get_contents(__DIR__ . '/../' . $templateFile);

        $configuration = array('Remove' => '');
        $headers = array_keys($configuration);
        foreach (get_file_data(__DIR__ . '/../' . $templateFile, $headers) as $key => $value) {
        	$configuration[$headers[$key]] = $value;
        }

        $features = explode(',', $configuration['Remove']);
        foreach ($features as $feature) {
        	remove_post_type_support('page', trim($feature));
        }
    }
}
add_action('admin_init', 'hide_editor');

