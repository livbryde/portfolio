<?php
/**
 * @package Letterum
 */
function letterum_customizer_top_bar( $options ) {
	/**
	 *	Add section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'top_bar',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Top Bar', 'letterum' ),
		  'priority'    => 101,
	);

	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	# Search icon.
	$options[] = array(
		  'slug'        => 'search_display',
		  'opt_type'    => 'toogle_switch',
		  //'choices'	   => $choices,
		  'name'        => esc_html__( 'Add search icon', 'letterum' ),
		  //'description' => esc_html__( '....', 'letterum' ),
		  'default'     => 0,
		  'section'     => 'top_bar',
		  'transport'   => 'refresh',
		  //'sanitize_cb' => 'letterum_text_sanitization',
	);
	
	# Blog layout.
	$options[] = array(
		  'slug'        => 'topbar_layout',
		  'opt_type'    => 'simple_notice',
		  'section'     => 'top_bar',
		  'default'     => '',
		  'name'        => esc_html__( 'Top bar Layout', 'letterum' ),
		  'description' => esc_html__( 'The Pro version of this Theme includes three layout options for the top panel.', 'letterum' ),
	);

	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_top_bar' );