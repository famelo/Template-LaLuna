<?php
/**
 * Layout: Main
 */
?>
<!--page.php-->

<?php while (have_posts()) : the_post(); ?>
  <article class="post-<?php echo $post->ID; ?>">
  	<?php the_content(); ?>
  </article>
<?php endwhile; ?>

<?php
while (the_flexible_field('content')) {
	$layout = get_row_layout();
	$layout = ucfirst(str_replace('/', '_', $layout));
	$template = 'Partials/' . $layout;
	$templatePath = __DIR__ . '/Templates/' . $template . '.php';

	if (!file_exists($templatePath)) {
		file_put_contents($templatePath, '<strong>New empty Layout: ' . $template . '.php</strong>');
	}

	get_template_part('templates/' . $template);
}
?>