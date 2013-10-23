<?php
global $_product;

$image = get_field('produkbilder', $_product->id);
$firstImage = $image[0];
if ($image) {
	$thumbnail = '<img src="'. $firstImage['produktbild'] .'" width="60" class="img-responsive" alt="'. $name .'" />';
}
else {
	$thumbnail = '<img src="http://p204488.webspaceconfig.de/wp-content/themes/template/assets/Media/dummy.png" class="img-responsive" />';
}
printf('<a href="%s">%s</a>', esc_url( get_permalink( apply_filters('woocommerce_in_cart_product_id', $values['product_id'] ) ) ), $thumbnail );
?>