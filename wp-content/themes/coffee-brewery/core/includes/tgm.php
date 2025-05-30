<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function coffee_brewery_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'coffee-brewery' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'coffee-brewery' ),
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	coffee_brewery_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'coffee_brewery_register_recommended_plugins' );