<?php
/**
 * Template Name: Startseite
 */
?>
<section class="teaser">
	<div id="header-slideshow" class="carousel slide">
		<?php $rows = get_field('slider'); ?>
		<!-- Indicators -->
		<?php if (is_array($rows) && count($rows) > 1): ?>
		<ol class="carousel-indicators">
			<?php foreach($rows as $key => $row): ?>
			<li data-target="#header-slideshow" data-slide-to="<?php echo $key; ?>" <?php if ($key === 0): ?>class="active"<?php endif; ?>></li>
			<?php endforeach; ?>
		</ol>
		<?php endif; ?>
		<!-- Wrapper for slides -->
		<div class="carousel-inner">
			<?php
			if (is_array($rows)) {
				foreach($rows as $key => $row) {
					echo '
					<div class="item ' . ($key === 0 ? 'active' : '') . '">
						<a href="' . $row['link'] . '" title="' . $row['headline'] . '">
							<img src="' . $row['bild']['sizes']['slider-cropped'] . '" alt="' . $row['headline'] . '">
							<div class="carousel-caption">
								<h2>' . $row['headline'] . '</h2>
								<p class="hidden-xs">' . $row['text'] . '</p>
							</div>
						</a>
					</div>';
				}
			}
			?>
		</div>
		<?php if (is_array($rows) && count($rows) > 1): ?>
		<!-- Controls -->
		<a class="left carousel-control" href="#header-slideshow" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#header-slideshow" data-slide="next">
			<span class="icon-next"></span>
		</a>
		<?php endif; ?>
	</div>
	<div class="opener row">
		<?php
		$rows = get_field('information');
		if (is_array($rows)) {
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
		}
		?>
	</div>
</section>

<section class="info">
	<h2 class="dotted"><span><?php the_title(); ?></span></h2>
	<?php the_content(); ?>
	<div class="divider"><img src="Media/ornament.png" alt="la luna d'oro"></div>
</section>

<section class="products">
	<?php
	foreach (get_field('produktkategorien') as $produktkategorie) {
		$cols = explode('/', $produktkategorie['layout']);
		echo '<div class="row">';
		foreach ($cols as $key => $col) {
			$cat = get_term($produktkategorie ['kategorien'] [$key] ['kategorie'], 'product_cat');
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image = wp_get_attachment_image_src($thumbnail_id, 'column-' . $col);
			echo '
			<div class="col-md-' . $col . ' col-sm-' . $col . ' col-s-' . $col . '">
				<a href="produktkategorie/' . $cat->slug . '" title="' . $cat->name . '" >
					<div class="bgimage" style="background:url(' . $image[0] . ') repeat-x;">
						<div class="gold">
							<h3>' . $cat->name . '</h3>
						</div>
					</div>
				</a>
			</div>
			';
		}
		echo '</div>';
	}
	?>
	<div class="row">
		<?php
		$rows = get_field('drei');
		foreach($rows as $row) {
			if (is_array($rows)) {
				echo '
				<div class="col-md-3 col-sm-3">
					<img src="' . $row['links'] . '" alt="facebook" class="brownborder img-responsive"/>
				</div>
				<div class="col-md-6 col-sm-6">
					<img src="' . $row['mitte'] . '" alt="facebook" class="brownborder img-responsive"/>
				</div>
				<div class="col-md-3 col-sm-3">
					<img src="' . $row['rechts'] . '" alt="facebook" class="brownborder img-responsive"/>
				</div>
				';
			}
		}
		?>
	</div>
</section>