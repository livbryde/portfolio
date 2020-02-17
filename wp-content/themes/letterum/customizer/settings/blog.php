<?php
/**
 * @package Letterum
 */
function letterum_customizer_blog_posts( $options ) {
	/**
	 *	Add Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'blog_post_settings',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Posts Options', 'letterum' ),
		  'description' => esc_html__( 'The posts options on an archives page and singular.', 'letterum' ),
		  'priority'    => 109,
	);

	/**
	 * Section
	 *--------------------------------------------------------------*/
	# Blog Page.
	$options[] = array(
		  'slug'        => 'blog_page',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Posts Page & Archives', 'letterum' ),
		 // 'description' => esc_html__( '....', 'letterum' ),
		  'panel'       => 'blog_post_settings',
	);

	# Blog Page Title.
	$options[] = array(
		  'slug'        => 'blog_page_title',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Posts page Title', 'letterum' ),
		  'default'     => '',
		  'section'     => 'blog_page',
		  'transport'   => 'refresh',
	);

	# Blog Intro text.
	$options[] = array(
		  'slug'        => 'blog_page_description',
		  'opt_type'    => 'textarea',
		  'name'        => esc_html__( 'Posts page Description', 'letterum' ),
		  'default'     => '',
		  'section'     => 'blog_page',
		  'transport'   => 'refresh',
	);
	
	# Blog layout.
	$options[] = array(
		  'slug'        => 'blog_layout',
		  'opt_type'    => 'radio',
		  'section'     => 'blog_page',
		  'default'     => 'two',
		  'name'        => esc_html__( 'Posts Layout', 'letterum' ),
		  'choices'     => array(
				'one'     => esc_html__( '1 Column - List', 'letterum' ),
				'two'     => esc_html__( '2 Columns - Masonry grid', 'letterum' ),
				'three'   => esc_html__( '3 Columns - Masonry grid', 'letterum' ),
			)
	);
	
	# Single Post Options.
	$post_settings = array(
		  'entry_date'      => esc_html__( 'Hide Date', 'letterum' ),
		  'entry_author'    => esc_html__( 'Hide Author', 'letterum' ),
		  'entry_cat'      	=> esc_html__( 'Hide Category', 'letterum' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => '',
			  'section'     => 'blog_page',
		);
	}
	
	# Featured Image Height.
	$options[] = array(
		  'slug'        => 'crop_blog_featured_image',
		  'opt_type'    => 'text_radio_button',
		  'choices'		=> array(
							'crop' => esc_html__( 'Cropped', 'letterum' ),
							'full' => esc_html__( 'Full', 'letterum' )
						),
		  'name'        => esc_html__( 'Featured Image: Cropping', 'letterum' ),
		  'default'     => 'crop',
		  'section'     => 'blog_page',
		  'transport'   => 'refresh',
		  'sanitize_cb' => 'letterum_text_sanitization',
	);

	/**
	 * Section
	 *--------------------------------------------------------------*/
	# Single Post.
	$options[] = array(
		  'slug'        => 'single_post_options',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Single Post', 'letterum' ),
		  'panel'       => 'blog_post_settings',
	);

	# Single Post Options.
	$post_settings = array(
		  'post_date'      => esc_html__( 'Hide Date', 'letterum' ),
		  'post_author'    => esc_html__( 'Hide Author', 'letterum' ),
		  'post_tags'      => esc_html__( 'Hide Tags', 'letterum' ),
		  'post_cats'      => esc_html__( 'Hide Category', 'letterum' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => '',
			  'section'     => 'single_post_options',
		);
	}
	
	# Featured Image.
	$options[] = array(
		  'slug'        => 'single_featured_image',
		  'opt_type'    => 'text_radio_button',
		  'choices'		=> array(
							'display' 	=> esc_html__( 'Show', 'letterum' ),
							'hidden' 	=> esc_html__( 'Hide', 'letterum' )
						),
		  'name'        => esc_html__( 'Featured Image', 'letterum' ),
		  'default'     => 'display',
		  'section'     => 'single_post_options',
		  'transport'   => 'refresh',
		  'sanitize_cb' => 'letterum_text_sanitization',
	);
	
	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_blog_posts' );