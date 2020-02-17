<?php
/**
 * @package Letterum
 */
function letterum_customizer_footer_settings( $options ) {
	/**
	 *	Add Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'footer_section',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Footer Options', 'letterum' ),
		  'priority'    => 190,
	);

	/**
	 *	Add Options.
	 *--------------------------------------------------------------*/

	# Copyright Text.
	$options[] = array(
		  'slug'        => 'copyright',
		  'opt_type'    => 'textarea',
		  'name'        => esc_html__( 'Copyright Text', 'letterum' ),
		  'default'     => esc_html__( 'All Rights Reserved', 'letterum' ),
		  'section'     => 'footer_section',
		  'transport'   => 'refresh',
	);
	
	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_footer_settings' );