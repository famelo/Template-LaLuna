<?php
global $woocommerce;

$query_args = array(
	'posts_per_page' => 5,
	'post_status' 	 => 'publish',
	'post_type' 	 => 'product',
	'meta_key' 		 => 'total_sales',
	'orderby' 		 => 'meta_value_num',
	'no_found_rows'  => 1,
);
$query_args['meta_query'] = $woocommerce->query->get_meta_query();

$query = new WP_Query($query_args);

if ( $query->have_posts() ) {
?>
<div class="woocommerce-best-sellers">
<?php
	while ( $query->have_posts()) {
		$query->the_post();
		global $product;
		?>

		<div class="media woocommerce-best-seller">
  			<a class="pull-left" href="<?php the_permalink(); ?>">
    			<img class="media-object" src="<?php echo Famelo_WooCommerce::getProductTeaser(); ?>" alt="<?php the_title(); ?>" width="100" />
  			</a>
  			<div class="media-body">
  				<a href="<?php the_permalink(); ?>">
    				<h6 class="media-heading"><?php the_title(); ?></h6>
    			</a>
    			<?php echo $product->get_price_html(); ?>
  			</div>
		</div>
		<?php
	}
}
?>
</div>
<?php wp_reset_postdata(); ?>