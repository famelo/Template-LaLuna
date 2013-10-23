<?php
global $_product;
global $cart_item_key;
global $values;
global $woocommerce;
echo apply_filters( 'woocommerce_cart_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $cart_item_key );
?>