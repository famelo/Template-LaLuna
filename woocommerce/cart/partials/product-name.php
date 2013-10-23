<?php
global $_product;
if ( ! $_product->is_visible() || ( ! empty( $_product->variation_id ) && ! $_product->parent_is_visible() ) )
	echo apply_filters( 'woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key );
else
	printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), apply_filters('woocommerce_in_cart_product_title', $_product->get_title(), $values, $cart_item_key ) );

// Meta data
echo $woocommerce->cart->get_item_data( $values );

	// Backorder notification
	if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $values['quantity'] ) )
		echo '<p class="backorder_notification">' . __( 'Available on backorder', 'woocommerce' ) . '</p>';
?>