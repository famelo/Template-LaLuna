<footer>
	<section class="brown hidden-xs">
		<div class="container">
			<div class="row">
				<?php
				foreach (get_field('fußzeile', 'option') as $column) {
					echo '<div class="col-md-4 col-sm-4">';
					echo '<p><img src="' . $column['bild']['sizes']['thumbnail'] . '"></p>';
					echo $column['text'];
					echo '</div>';
				}
				?>
			</div>
		</div>
	</section>
	<section class="payment">
		<div class="container">
			<img src="/Media/payment.png" alt="Zahlungsmöglichekiten">
			<p>Copyright © <?php the_field('company', 'option'); ?><br /><?php the_field('company', 'option'); ?>: <?php the_field('street', 'option'); ?>, <?php the_field('zip', 'option'); ?> <?php the_field('city', 'option'); ?> <br /> Angemeldet beim <?php the_field('amtsgericht', 'option'); ?> unter der Handelsregisternummer <?php the_field('handelsregisternummer', 'option'); ?>. </p>
			<?php
			if (has_nav_menu('footer_menu')) :
				wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'nav navbar-nav'));
			endif;
			?>
		</div>
	</section>

</footer>

<?php wp_footer(); ?>