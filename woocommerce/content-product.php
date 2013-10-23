<?php
/**
 * Start / Shop / Kategorie / Subkategorie **LOOP**
 * The template for displaying product content within loops.*
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop;
// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

// Ensure visibility
if ( ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array('col-md-3 col-sm-4 col-xs-6', 'singleproduct');
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last';
?>

<div <?php post_class( $classes ); ?>>
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<div class="imgwrapper">
			<?php
				$image = get_field('produkbilder');
				$firstImage = $image[0];
				$name = get_the_title();

					if ($image) {
						echo '<img src="'. $firstImage['produktbild'] .'" class="img-responsive" alt="'. $name .'" />';
					}
					else {
						echo '<img src="http://p204488.webspaceconfig.de/wp-content/themes/template/assets/Media/dummy.png" class="img-responsive" />';
					}
			?>
		</div>
		<div class="datawrapper row">
			<div class="col-md-12"><h3><?php the_title(); ?></h3></div>
		</div>

	</a>


</div>