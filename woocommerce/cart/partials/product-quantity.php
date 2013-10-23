<?php
global $_product;
global $cart_item_key;
global $values;
if ( $_product->is_sold_individually() ) {
	$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
} else {

	$step	= apply_filters( 'woocommerce_quantity_input_step', '1', $_product );
	$min 	= apply_filters( 'woocommerce_quantity_input_min', '', $_product );
	$max 	= apply_filters( 'woocommerce_quantity_input_max', $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(), $_product );

	$product_quantity = sprintf( '<div class="quantity"><input type="number" name="cart[%s][qty]" step="%s" min="%s" max="%s" value="%s" size="4" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="input-text qty text" maxlength="12" /></div>', $cart_item_key, $step, $min, $max, esc_attr( $values['quantity'] ) );
}

echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
?>