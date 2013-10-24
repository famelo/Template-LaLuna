<?php

/**
*
*/
class Famelo_Social {
	public static function facebookLike($options = array()) {
		$defaultOptions = array(
			'baseUrl' => '//www.facebook.com/plugins/like.php',
			'appId' => '385015441576593',
			'action' => 'like',
			'colorscheme' => 'light',
			'href' => get_permalink(),
			'layout' => 'standard',
			'ref' => 'Website',
			'show_faces' => false,
			'width' => '350',
			'height' => '25'
		);

		$options = array_merge($defaultOptions, $options);

		$baseUrl = $options['baseUrl'];
		unset($options['baseUrl']);

		$url = $baseUrl . '?' . http_build_query($options);
		echo '<iframe src="//' . $url . '" scrolling="no" frameborder="0" class="facebook" style="border:none; overflow:hidden; width:' . $options['width'] . 'px; height:' . $options['height'] . 'px;" allowTransparency="true"></iframe>';
	}
}