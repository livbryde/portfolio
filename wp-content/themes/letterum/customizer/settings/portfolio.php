<?php
/**
 * @package Letterum
 */
function letterum_portfolio_posts( $options ) {
	/**
	 *	Add Section.
	 *--------------------------------------------------------------*/	
	$options[] = array(
		  'slug'        => 'portfolio_posts',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Portfolio Posts', 'letterum' ),
		  'description' => esc_html__( 'Note please: For applies portfolio options requires the presence of posts of portfolio type.', 'letterum' ),
		  'priority'    => 109,
	);
	
	/**
	 * Options.
	 *--------------------------------------------------------------*/

	# Title.
	$options[] = array(
		  'slug'        => 'portfolio_page_title',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Portfolio page Title', 'letterum' ),
		  'default'     => '',
		  'section'     => 'portfolio_posts',
		  'transport'   => 'refresh',
	);

	# Intro text.
	$options[] = array(
		  'slug'        => 'portfolio_page_description',
		  'opt_type'    => 'textarea',
		  'name'        => esc_html__( 'Portfolio page Description', 'letterum' ),
		  'default'     => '',
		  'section'     => 'portfolio_posts',
		  'transport'   => 'refresh',
	);
	
	# Portfolio grid.
	$options[] = array(
		  'slug'        => 'portfolio_posts_columns',
		  'opt_type'    => 'radio',
		  'section'     => 'portfolio_posts',
		  'default'     => 'two',
		  'name'        => esc_html__( 'Grid Columns', 'letterum' ),
		  'choices'     => array(
			  'two'           => esc_html__( '2 Columns', 'letterum' ),
			  'three'       => esc_html__( '3 Columns', 'letterum' ),
		)
	);
	
	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_portfolio_posts' );