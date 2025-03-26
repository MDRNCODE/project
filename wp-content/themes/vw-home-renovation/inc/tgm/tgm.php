<?php

require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function vw_home_renovation_register_recommended_plugins() {
	$plugins = array(
		
		array(
			'name'             => __( 'Woocommerce', 'vw-home-renovation' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'vw_home_renovation_register_recommended_plugins' );