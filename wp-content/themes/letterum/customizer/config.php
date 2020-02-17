<?php
/**
 * Main functions Letterum Theme Customizer
 */

function letterum_define_constants() {
	if( ! defined( 'LETTERUM_ADMIN_DIR' ) ) {
		define( 'LETTERUM_ADMIN_DIR', trailingslashit( get_template_directory() . '/customizer' ) );
	}
	if( ! defined( 'LETTERUM_ADMIN_URI' ) ) {
		define( 'LETTERUM_ADMIN_URI', trailingslashit( get_template_directory_uri() . '/customizer/assets' ) );
	}
}
add_action( 'init', 'letterum_define_constants' );

/**
 * 	Modify default sections.
 */
function letterum_customizer_modify_sections( $wp_customize ) {
	$wp_customize->get_section( 'static_front_page' )->priority  	= 100;
	$wp_customize->get_control( 'background_color'  )->section   	= 'background_image';
	$wp_customize->get_section( 'background_image'  )->title     	= esc_html__( 'Site Background', 'letterum' );
}
add_action( 'customize_register', 'letterum_customizer_modify_sections' );

/**
 * 	Register JS control types.
 */
function letterum_js_control_type( $wp_customize ) {
	$wp_customize->register_control_type( 'Letterum_Sortable_Control' );
}
add_action( 'customize_register', 'letterum_js_control_type' );

/**
 * 	Load files.
 */
function letterum_admin_files() {
	// Customizer
	require_once( LETTERUM_ADMIN_DIR . 'customizer.php' );
	
	// Custom Controls
	// Array of controls partials
	$control_files = array(
			'dropdown-list',
			'extra-custom-controls'
	);
	
	// Loop through and include controls files
	foreach ( $control_files as $file ) {
		require_once( LETTERUM_ADMIN_DIR .'/controls/'. $file .'.php' );
	}
	
	// Helper
	// Array of helper partials
	$helper_files = array(
			'extra-custom-controls'
	);

	// Loop through and include helper files
	foreach ( $helper_files as $file ) {
		require_once( LETTERUM_ADMIN_DIR .'/controls/helper/'. $file .'.php' );
	}

	// Settings
	// Array of setting partials
	$setting_files = array(
			'blog',
			'colors',
			'fonts',
			'footer',
			'menu-bar',
			'portfolio',
			'front-page',
			'site-identity',
			'layout-options'
	);

	// Loop through and include setting files
	foreach ( $setting_files as $file ) {
		require_once( LETTERUM_ADMIN_DIR .'/settings/'. $file .'.php' );
	}
}
add_action( 'init', 'letterum_admin_files' );

/**
 * 	Get default values.
 */
function letterum_option_defaults( $key = 'all' ) {
	$defaults = apply_filters( 'letterum_option_defaults', array() );
	if( 'all' != $key ) {
		return isset( $defaults[$key] ) ? $defaults[$key] : NULL;
	}
	return $defaults;
}

/**
 * 	Retrieve and display value.
 * 	Replacement: get_theme_mod( $key ) - letterum( $key )
 */
function letterum( $key = '', $default = null, $echo = false ) {
	$value  = get_theme_mod( $key, $default );
	$output = ( $value != $default ) ? $value : letterum_option_defaults( $key );
	if( $echo ) {
		echo $output;
	}
	else {
		return $output;
	}
}