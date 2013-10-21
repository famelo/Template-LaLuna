<?php

function option_shortcode($atts) {
	// extract attributs
	extract( shortcode_atts( array(
		'field' => "",
	), $atts ) );

	// $field is requird
	if( !$field || $field == "" ) {
		return "";
	}

	// get value and return it
	$value = get_field( $field, 'option' );

	if( is_array($value) ) {
		$value = @implode( ', ',$value );
	}

	return $value;
}
add_shortcode('option', 'option_shortcode');