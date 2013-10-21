<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<?php
  $category = get_queried_object();
  $teaser = get_field('teaser', 'product_cat_' . $category->term_id);
  $name = $category->name;

  if ($category->parent === '0' ) {
    echo '

      <div class="teaserimg ">
          <hr />
          <div class="categoryteaser" style="background:url(' . $teaser . ') repeat-x;">
            <div class="gold">
              <h1>' . $name . ' </h1>
            </div>
          </div>
      </div>
    ';
      woocommerce_breadcrumb();
  }
  elseif ($name) {
    woocommerce_breadcrumb();
  }
  else {
    echo '<hr />';
  }
?>

<?php
  // get Category Introtext
  $catSlug = $category->description;
  $templatePath = site_url();
  $headline = get_field('ueberschrift', 'product_cat_' . $category->term_id);
    if ($headline) {
      echo '
        <div class="catslug">
          <h2 class="dotted">
            <span>'. $headline .'</span>
          </h2>
          <p class="serif">'. $catSlug .'</p>
          <div class="divider">
            <img src="'. $templatePath .'/Media/ornament.png" alt="la luna doro">
          </div>
        </div>
      ';
    }
?>

<?php if ( have_posts() ) : ?>
	<?php echo '<div class="wrapper">'; ?>
	<?php
		/**
		 * woocommerce_before_shop_loop hook
		 *
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action( 'woocommerce_before_shop_loop' );
	?>
	<?php echo '</div>'; ?>
	<?php echo '<div class="row products">';?>

		<?php woocommerce_product_subcategories(); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php echo '</div>';?>

	<?php
		/**
		 * woocommerce_after_shop_loop hook
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action( 'woocommerce_after_shop_loop' );
	?>

<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

	<?php woocommerce_get_template( 'loop/no-products-found.php' ); ?>

<?php endif; ?>

<?php
/**
 * woocommerce_after_main_content hook
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');
?>