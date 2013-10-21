<?php
/**
 * Template Name: Seite mit Sidebar
 * Layout: Sidebar
 */
?>
<!--page-sidebar.php-->

<?php while (have_posts()) : the_post(); ?>
  <?php the_content(); ?>
  <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>

<?php
while (the_flexible_field('content')) {
	$layout = get_row_layout();
	$layout = ucfirst(str_replace('/', '_', $layout));
	$template = 'Partials/' . $layout;
	$templatePath = __DIR__ . '/templates/' . $template . '.php';

	if (!file_exists($templatePath)) {
		file_put_contents($templatePath, '<strong>New empty Layout: ' . $template . '.php</strong>');
	}

	get_template_part('templates/' . $template);
}
?>