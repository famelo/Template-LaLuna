<?php
/**
 * Change password form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;
?>

<?php $woocommerce->show_messages(); ?>

<form action="<?php echo esc_url( get_permalink(woocommerce_get_page_id('change_password')) ); ?>" method="post">

	<div class="form-group">
		<label for="password_1" class="col-lg-2 control-label"><?php _e( 'New password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<div class="col-lg-10">
			<input type="password" class="form-control" name="password_1" id="password_1" />
		</div>
	</div>
	<div class="form-group">
		<label for="password_2" class="col-lg-2 control-label"><?php _e( 'Re-enter new password', 'woocommerce' ); ?> <span class="required">*</span></label>
		<div class="col-lg-10">
			<input type="password" class="form-control" name="password_2" id="password_2" />
		</div>
	</div>

	<div class="form-group">
    	<div class="col-lg-offset-2 col-lg-10">
			<input type="submit" class="button" name="change_password" value="<?php _e( 'Save', 'woocommerce' ); ?>" />
    	</div>
  	</div>

	<?php $woocommerce->nonce_field('change_password')?>
	<input type="hidden" name="action" value="change_password" />

</form>