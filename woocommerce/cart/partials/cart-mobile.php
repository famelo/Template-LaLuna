<?php
global $_product;
global $cart_item_key;
global $values;
global $woocommerce;
?>
<form action="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>" method="post" class="cart hidden-xs">

<?php do_action( 'woocommerce_before_cart_table' ); ?>

<?php do_action( 'woocommerce_before_cart_contents' ); ?>

<?php
if ( sizeof( $woocommerce->cart->get_cart() ) > 0 ) {
	foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
		if ( $_product->exists() && $values['quantity'] > 0 ) {
			?>
			<div class="media">
				<a class="pull-left" href="#">
					<?php
						$image = get_field('produkbilder', $_product->id);
						$firstImage = $image[0];
						if ($image) {
							echo '<img src="'. $firstImage['produktbild'] .'" width="60" class="img-responsive" alt="'. $name .'" />';
						}
						else {
							echo '<img src="http://p204488.webspaceconfig.de/wp-content/themes/template/assets/Media/dummy.png" class="img-responsive" />';
						}
					?>
				</a>
				<div class="media-body">
					<h4 class="media-heading">
						<?php woocommerce_get_template('cart/partials/product-name.php'); ?>
					</h4>

					<table>
						<tr>
							<th><?php _e( 'Price', 'woocommerce' ); ?></th>
							<td><?php woocommerce_get_template('cart/partials/product-price.php'); ?></td>
						</tr>
						<tr>
							<th><?php _e( 'Total', 'woocommerce' ); ?></th>
							<td><?php woocommerce_get_template('cart/partials/product-subtotal.php'); ?></td>
						</tr>
						<tr>
							<th><?php _e( 'Quantity', 'woocommerce' ); ?></th>
							<td><?php woocommerce_get_template('cart/partials/product-quantity.php'); ?></td>
						</tr>
						<tr>
							<th>Entfernen</th>
							<td><?php woocommerce_get_template('cart/partials/product-remove.php'); ?></td>
						</tr>
					</table>
				</div>
			</div>
			<?php
		}
	}
}
?>

<div class="moreinformation">
<?php do_action( 'woocommerce_cart_contents' ); ?>
<input type="submit" class="button" name="update_cart" value="<?php _e( 'Update Cart', 'woocommerce' ); ?>" />
</div>

<?php do_action( 'woocommerce_after_cart_contents' ); ?>
<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>