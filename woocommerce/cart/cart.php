<?php
/**
 * Cart Page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
global $_product;
global $cart_item_key;
global $values;

$woocommerce->show_messages();
?>

<?php do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<div class="table-responsive">
	<table class="shop_table cart table table-striped" cellspacing="0">
		<thead>
			<tr>
				<th class="product-thumbnail hidden-xs">&nbsp;</th>
				<th class="product-name"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>
				<th class="product-remove">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
				foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
					$_product = $values['data'];
					if ( $_product->exists() && $values['quantity'] > 0 ) {
						?>
						<tr class = "<?php echo esc_attr( apply_filters('woocommerce_cart_table_item_class', 'cart_table_item', $values, $cart_item_key ) ); ?>">
							<!-- The thumbnail -->
							<td class="product-thumbnail hidden-xs">
								<?php woocommerce_get_template('cart/partials/product-thumbnail.php'); ?>
							</td>

							<!-- Product Name -->
							<td class="product-name">
								<?php woocommerce_get_template('cart/partials/product-name.php'); ?>
							</td>

							<!-- Product price -->
							<td class="product-price">
								<?php woocommerce_get_template('cart/partials/product-price.php'); ?>
							</td>

							<!-- Quantity inputs -->
							<td class="product-quantity">
								<?php woocommerce_get_template('cart/partials/product-quantity.php'); ?>
							</td>

							<!-- Product subtotal -->
							<td class="product-subtotal">
								<?php woocommerce_get_template('cart/partials/product-subtotal.php'); ?>
							</td>

							<!-- Remove from cart link -->
							<td class="product-remove">
								<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s"><span class="glyphicon glyphicon-remove-circle"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'woocommerce' ) ), $cart_item_key ); ?>
							</td>
						</tr>
						<?php
					}
				}
			}

			do_action( 'woocommerce_cart_contents' );
			?>
			<tr class="actions">
				<td colspan="6" class="actions">

					<?php if ( $woocommerce->cart->coupons_enabled() ) { ?>
						<div class="coupon">

							<label for="coupon_code"><?php _e( 'Coupon', 'woocommerce' ); ?>:</label> <input name="coupon_code" class="input-text" id="coupon_code" value="" /> <input type="submit" class="button" name="apply_coupon" value="<?php _e( 'Apply Coupon', 'woocommerce' ); ?>" />

							<?php do_action('woocommerce_cart_coupon'); ?>

						</div>
					<?php } ?>

					<input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />
				 	<!-- <input type="submit" class="checkout-button button alt" name="proceed" value="<?php _e( 'Proceed to Checkout &rarr;', 'woocommerce' ); ?>" /> -->

					<?php do_action('woocommerce_proceed_to_checkout'); ?>

					<?php $woocommerce->nonce_field('cart') ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
</div>

<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="cart-collaterals">

	<?php do_action('woocommerce_cart_collaterals'); ?>

	<?php woocommerce_cart_totals(); ?>

	<?php woocommerce_shipping_calculator(); ?>

</div>

<?php do_action( 'woocommerce_after_cart' ); ?>