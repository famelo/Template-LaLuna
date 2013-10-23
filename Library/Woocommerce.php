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

	class Famelo_WooCommerce {
		public static function getBestSellers($limit = 8) {
			global $woocommerce;
			$query_args = array(
				'posts_per_page' => $limit,
				'post_status' 	 => 'publish',
				'post_type' 	 => 'product',
				'meta_key' 		 => 'total_sales',
				'orderby' 		 => 'meta_value_num',
				'no_found_rows'  => 1,
			);
			$query_args['meta_query'] = $woocommerce->query->get_meta_query();

			$query = new WP_Query($query_args);
			return self::convertPostsToProducts($query->get_posts());
		}

		public static function convertPostsToProducts($posts) {
			foreach ($posts as $key => $post) {
				$post = new WC_Product_Simple($post);
				$posts[$key] = $post;
			}
			return $posts;
		}

		public static function getProductTeaser() {
			$image = get_field('produkbilder');
			if (isset($image[0])) {
				return $image[0]['produktbild'];
			}
			return 'http://p204488.webspaceconfig.de/wp-content/themes/template/assets/Media/dummy.png';
		}
	}
?>