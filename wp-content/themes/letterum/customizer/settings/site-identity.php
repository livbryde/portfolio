<?php
/**
 * @package Letterum
 */

function letterum_customizer_site_title( $options ) {
	/**
	 *	Add Options.
	 *--------------------------------------------------------------*/
	 
	# Logo Image Size.
	$options[] = array(
		  'slug'        => 'site_logo_size',
		  'opt_type'    => 'slider_control',
		  'name'        => esc_html__( 'Site Logo Size', 'letterum' ),
		  'description' => esc_html__( 'Set the height of the logotype image.', 'letterum' ),
		  'input_attrs' => array(
					'min' => 20,
					'max' => 46,
					'step' => 1,
					),
		  'default'     => 46,
		  'section'     => 'title_tagline',
		  'priority' => 9,
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array( 
					'class' => '.site-branding img',
					'style' => 'max-height',
					'mix' => 'px'
				         )
				)
	);
	
	$options[] = array(
		  'slug'        => 'site_title_hide',
		  'opt_type'    => 'toogle_switch',
		  'name'        => esc_html__( 'Display Site Title', 'letterum' ),
		  'default'     => 1,
		  'section'     => 'title_tagline',
		  'priority' => 10,
		  'transport'   => 'refresh',
	);

	$options[] = array(
		  'slug'        => 'site_tagline_hide',
		  'opt_type'    => 'toogle_switch',
		  'name'        => esc_html__( 'Display Tagline', 'letterum' ),
		  'default'     => 1,
		  'section'     => 'title_tagline',
		  'priority' => 11,
		  'transport'   => 'refresh',
	);

	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_site_title' );