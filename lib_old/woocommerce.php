<?php
	function getProductAttributes($product) {
		$attributes = array();
		global $woocommerce;

		foreach ($product->get_attributes() as $attribute) {
			$attribute['label'] = $woocommerce->attribute_label($attribute['name']);
			if ( $attribute['is_taxonomy'] ) {
				$values = woocommerce_get_product_terms( $product->id, $attribute['name'], 'names' );
				$attribute['value'] = apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );

			} else {
				// Convert pipes to commas and display values
				$values = array_map( 'trim', explode( '|', $attribute['value'] ) );
				$attribute['value'] = apply_filters( 'woocommerce_attribute', wpautop( wptexturize( implode( ', ', $values ) ) ), $attribute, $values );
			}
			$attribute['value'] = trim(strip_tags($attribute['value']));

			$attributes[$attribute['name']] = $attribute;
		}

		return $attributes;
	}

	function getRelatedProducts($product, $limit = 4, $offset = 0) {
		global $product, $woocommerce_loop;

		$related = $product->get_related();

		if ( sizeof( $related ) == 0 ) return;

		$args = apply_filters('woocommerce_related_products_args', array(
			'post_type'				=> 'product',
			'ignore_sticky_posts'	=> 1,
			'no_found_rows' 		=> 1,
			'posts_per_page' 		=> $posts_per_page,
			'orderby' 				=> $orderby,
			'post__in' 				=> $related,
			'post__not_in'			=> array($product->id)
		) );

		$query = new WP_Query( $args );
		$products = $query->get_posts();
		shuffle($products);
		$products = array_slice($products, $offset, $limit);
		foreach ($products as $key => $product) {
			$product = new WC_Product_Simple($product);
			$products[$key] = $product;
		}
		return $products;
	}
?>