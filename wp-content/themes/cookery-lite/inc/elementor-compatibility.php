<?php 
/**
 * Elementor activation
 */

function cookery_lite_elementor_support(){
	update_option( 'elementor_cpt_support', array( 'blossom-portfolio', 'post','page', 'recipe' ) );
	update_option( 'elementor_default_generic_fonts', 'Noto Serif' );
}
add_action( 'after_switch_theme', 'cookery_lite_elementor_support' );

/**
 * Filter to alter Default Font and Default Color
 */
function cookery_lite_elementor_defaults( $config ) {

	$primary_font    = get_theme_mod( 'primary_font', 'Questrial' );
	$secondary_font  = get_theme_mod( 'secondary_font', 'Noto Serif' );
	$primary_color   = get_theme_mod( 'primary_color', '#2db68d' ); 
	$secondary_color = get_theme_mod( 'secondary_color', '#e84e3b' ); 
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );
	

	$config['default_schemes']['color']['items'] = [
		'1' => $primary_color,
		'2' => $secondary_color,
		'3' => '#171717',
		'4' => $accent_color_1,
		'5' => $accent_color_2,
	];

	$config['default_schemes']['typography']['items'] = [
		'1' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'2' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'3' => array(
			'font_family' => $primary_font,
	        'font_weight' => '400',
		),
		'4' => array(
			'font_family' => $secondary_font,
	        'font_weight' => '600',
		)];

	$config['i18n']['global_colors'] = __( 'Cookery Lite Color', 'cookery-lite' );
	$config['i18n']['global_fonts']  = __( 'Cookery Lite Fonts', 'cookery-lite' );

	return $config;
}
add_filter('elementor/editor/localize_settings', 'cookery_lite_elementor_defaults', 99 );


if( ! function_exists( 'cookery_lite_add_theme_colors' ) ) :
/**
 * Travel Monster Pro Theme Colors
 *
 * @param [type] $response
 * @param [type] $handler
 * @param [type] $request
 * @return void
 */
function cookery_lite_add_theme_colors( $response, $handler, $request ){
	$route = $request->get_route();

	if ( '/elementor/v1/globals' != $route ) {
		return $response;
	}

	$data = $response->get_data();
	
	$primary_color   = get_theme_mod('primary_color', '#2db68d');
	$secondary_color = get_theme_mod( 'secondary_color', '#e84e3b' ); 
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );

	$data['colors']['primary_color'] = array(
		'id'    => 'primary_color',
		'title' => __( 'Primary Theme Color', 'cookery-lite' ),
		'value' => $primary_color
	);

	$data['colors']['secondary_color'] = array(
		'id'    => 'secondary_color',
		'title' => __( 'Secondary Theme Color', 'cookery-lite' ),
		'value' => $secondary_color
	);

	$data['colors']['accent_color_one'] = array(
		'id'    => 'accent_color_one',
		'title' => __( 'Accent Color One', 'cookery-lite' ),
		'value' => $accent_color_1
	);

	$data['colors']['accent_color_two'] = array(
		'id'    => 'accent_color_two',
		'title' => __( 'Accent Color Two', 'cookery-lite' ),
		'value' => $accent_color_2
	);

	$response->set_data( $data );

	return $response;
}
endif;
add_action( 'rest_request_after_callbacks', 'cookery_lite_add_theme_colors', 999, 3 );
		
if( ! function_exists( 'cookery_lite_display_global_colors_elementor' ) ) :
/**
 * Displays frontend Elementor colors function
 *
 * @param [type] $response
 * @param [type] $handler
 * @param [type] $request
 * @return void
 */
function cookery_lite_display_global_colors_elementor( $response, $handler, $request ) {
	$route = $request->get_route();

	if ( 0 !== strpos( $route, '/elementor/v1/globals' ) ) {
		return $response;
	}

	$slug_map = array();

	$slug_map['primary_color']    = 0;
	$slug_map['secondary_color']  = 1;
	$slug_map['accent_color_one'] = 2;
	$slug_map['accent_color_two'] = 3;

	$rest_id = substr( $route, strrpos( $route, '/' ) + 1 );

	if ( ! in_array( $rest_id, array_keys( $slug_map ), true ) ) {
		return $response;
	}

	$primary_color   = get_theme_mod('primary_color', '#2db68d');
	$secondary_color = get_theme_mod('secondary_color', '#e84e3b');
	$accent_color_1  = get_theme_mod( 'accent_color_one', '#fbedff' );
	$accent_color_2  = get_theme_mod( 'accent_color_two', '#f6f4f0' );
	$response = rest_ensure_response(
		array(
			'id'    => 'primary_color',
			'title' => 'primary_color',
			'value' => $primary_color,
		),
		array(
			'id'    => 'secondary_color',
			'title' => 'secondary_color',
			'value' => $secondary_color,
		),
		array(
			'id'    => 'accent_color_one',
			'title' => 'accent_color_one',
			'value' => $accent_color_1,
		),
		array(
			'id'    => 'accent_color_two',
			'title' => 'accent_color_two',
			'value' => $accent_color_2,
		)
	);
	return $response;
}
endif;
add_action( 'rest_request_after_callbacks', 'cookery_lite_display_global_colors_elementor', 999, 3 );