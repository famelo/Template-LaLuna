// <?php

// /**
// *
// */
// class Famelo_Navigation {
// 	$fields = array(
// 		array(
// 			'label' => 'Type',
// 			'type' => 'select',
// 			'options' => array('', 'Divider')
// 		),
// 		array(
// 			'label' => 'Type',
// 			'type' => 'select',
// 			'options' => array('', 'Divider')
// 		)
// 	);

// 	public function __construct() {

// 	}

// 	*
// 	 * Add custom fields to $item nav object
// 	 * in order to be used in custom Walker
// 	 *
// 	 * @access      public
// 	 * @since       1.0
// 	 * @return      void

// 	public function rc_scm_add_custom_nav_fields($menuItem) {
// 	    $menuItem->subtitle = get_post_meta($menuItem->ID, '_menu_item_subtitle', true);
// 	    return $menuItem;
// 	}

// }

// new Famelo_Navigation();