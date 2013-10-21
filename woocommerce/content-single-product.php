<?php
/**
 * Start / Shop / Kategorie / Subkategorie / Produkt
 * The template for displaying product content in the single-product.php template
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	$images = get_field('produkbilder');
	$name = get_the_title();

	if (count($images) > 1) {
		echo '
			<div class="row productteaser hidden-xs" >
				<div class="col-md-6">
					<div class="imagewrapper">
					<img src="'. $images[0]['produktbild'] .'" class=" img-responsive" alt="'. $name .'" />
					</div>
				</div>
				<div class="col-md-6">
					<div class="imagewrapper">
						<img src="'. $images[1]['produktbild'] .'" class="img-responsive" alt="'. $name .'" />
					</div>
				</div>
			</div>
			<div class="divider">
				<img src="'. $templatePath .'/Media/ornament.png" alt="la luna doro">
			</div>			
				';
	} else {
		echo '
			<div class="spacer"></div>
		';		
	}

?>

<section class="row product">
	<article class="productdesc">
		<div class="col-md-4">
				<?php
					echo '
					<img src="'. $images[0]['produktbild'] .'" alt="'. $name .'"  class="img-responsive"/>
					';
				?>
			</div>
			<div class="col-md-7 col-md-offset-1">
				<?php global $post, $product;
					$attributes = getProductAttributes($product);
					$sublineAttributes = array();

					foreach (array('pa_material', 'pa_farbe', 'pa_größe') as $key) {
						if (isset($attributes[$key])) {
							$sublineAttributes[$key] = $attributes[$key]['value'];
						}
					}
				?>
				<article>
					<h2><?php echo the_title ();?></h2>
					<p class="subline"><?php echo implode(', ', $sublineAttributes); ?></p>
					<div class="content">
						<?php echo the_content();?>
					</div>
					<div class="addtocart">
						<form action="/shop/accesoires/testprodukt/?add-to-cart=175" class="cart" method="post" enctype="multipart/form-data">
							<div class="quantity buttons_added">
						 		<input type="button" value="-" class="minus">
						 		<input type="number" step="1" min="1" name="quantity" value="1" title="Anz." class="input-text qty text">
						 		<input type="button" value="+" class="plus">
						 	</div>
							<div class="pricebox">
								<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<p itemprop="price" class="price"><?php WGM_Template::woocommerce_de_price_with_tax_hint_single(); ?></p>
									<meta itemprop="priceCurrency" content="<?php echo get_woocommerce_currency(); ?>" />
									<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
								</div>
							</div>
							<div class="addcart">
							 	<button type="submit" class="single_add_to_cart_button alt">In den Warenkorb</button>
							</div>
						</form>
					</div>

				</article>
				<?php
					/**
					 * woocommerce_single_product_summary hook
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 */
					// do_action( 'woocommerce_single_product_summary' );
				?>
		</div>
	</article>
	<article class="additionalinformation">
		<div class="col-md-5">
			<h3>Pflegehinweise</h3>

			<?php
				$materials = woocommerce_get_product_terms($product->id, 'pa_material');
				foreach ($materials as $material) {
					$url = get_field('detailseite', 'pa_material_' . $material->term_id);
					$icon = get_field('icon', 'pa_material_' . $material->term_id);
					echo '<a href="' . $url . '" title="' . $material->name . '" data-toggle="tooltip"><img src="' . $icon['sizes']['shop_thumbnail'] . '"  alt="' . $material->name . '" /></a>';
				}
			?>
		</div>
		<div class="col-md-7">
			<h3>Daten</h3>
			<?php $product->list_attributes(); ?>
		</div>
	</article>
	<article class="support">
		<div class="col-md-7">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, qui, voluptatem sint ipsam cupiditate earum minima cumque odit officia distinctio enim impedit doloribus illum perspiciatis quis nobis sed soluta molestiae.</p>
		</div>
		<div class="col-md-5"></div>
	</article>
</section>


<section class="row related">
<h3>Das könnte Sie auch interessieren</h3>
	<?php foreach (getRelatedProducts($product) as $relatedProduct) { ?>
		<div class="col-md-3 singleproduct">
			<a href="<?php echo get_permalink($relatedProduct->ID); ?>" title="<?php echo get_the_title();?>">
				<div class="imgwrapper">
					<?php 
						$image = get_field('produkbilder');
						$firstImage = $image[0];
						$name = get_the_title();
						
						echo '<img src="'. $firstImage['produktbild'] .'" class="img-responsive" alt="'. $name .'" />';
					?>
				</div>
				<div class="datawrapper">
					<div class=""><h5><?php echo $relatedProduct->get_title(); ?></h5></div>
				</div>
			</a>
		</div>
	<?php } ?>
</section>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>


