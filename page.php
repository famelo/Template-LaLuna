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
	$rows = get_field('information');
	if (is_array($rows)) {
		echo '<div class="opener row">';
		foreach($rows as $row) {
			$active = get_field($slider ['aktiv'] [$key] ['kategorie'], 'product_cat');
			echo '
			<div class="col-md-4 col-sm-4" >
				<a href="' . $row['link']. '" title="' . $row['headline'] . '" >
					<div class="bgimage" style="background:url(' . $row['bild'] . ') repeat-x;">
						<div class="gold">
							<h3>' . $row['headline'] . ' </h3>
							<p ><small>' . $row['subline'] . '</small></p>
						</div>
					</div>
				</a>
			</div>';
		}
		echo '</div>';	
	}
	?>
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