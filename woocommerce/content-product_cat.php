<?php
/**
 * Start / Shop / Kategorie **LOOP**
 * The template for displaying product category thumbnails within loops.
 * Override this template by copying it to yourtheme/woocommerce/content-product_cat.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;
// Increase loop count
$woocommerce_loop['loop']++;
?>

<div class="col-md-4 col-sm-4 col-s-6">
	<a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" title="<?php echo $category->name ?>">
		<?php
		    $thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
		    $image = wp_get_attachment_image_src($thumbnail_id, 'category-thumbnail');
		    $name = $category->name;
			if (isset($image[0])) {
			    echo '<div class="bgimage" style="background: url(' . $image[0] . ') repeat-x;">';
			} else {
			    echo '<div class="bgimage">';
			}
		?>
			<div class="gold">
				<h3><?php echo $name ?></h3>
			</div>
		</div>
	</a>
</div>

