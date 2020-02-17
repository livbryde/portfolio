<?php
/**
 * @package Letterum
 */
function letterum_customizer_frontpage_section( $options ) {
	/**
	 *	Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'front_page_settings',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Front Page Sections', 'letterum' ),
		  'description' => esc_html__( 'As the front page should be assigned a static page with default template. For applies portfolio options requires the presence of posts of portfolio type.', 'letterum' ),
		  'priority'    => 102,
	);
	
	/**
	 *	Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'sections_order',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Visibility & Sorting', 'letterum' ),
		  'description' => esc_html__( 'Note please: For applies portfolio options requires the presence of posts of portfolio type.', 'letterum' ),
		  'panel'       => 'front_page_settings',
	);
	
	# Options.
	$options[] = array(
		  'slug'        => 'front_sortable',
		  'opt_type'    => 'sortable',
		  'choices'	   => letterum_front_elements(),
		  'name'        => esc_html__( 'Set the visibility and order of the sections.', 'letterum' ),
		  'description' => esc_html__( 'Drag and drop to sort sections of the front page. To show or hide the section by clicking on the eye icon.', 'letterum' ),
		  'default'     => array( 'featured_post', 'page_content', 'front_blog', 'front_portfolio' ),
		  'section'     => 'sections_order',
		  'transport'   => 'refresh',
	);

	/**
	 *	Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		'slug'        => 'section_content',
		'opt_type'    => 'section',
		'name'        => esc_html__( 'Page Content', 'letterum' ),
		'description' => esc_html__( 'Here are the settings for displaying the title and content of the page that is assigned as a static front page.', 'letterum' ),
		'panel'       => 'front_page_settings',
	);
	
	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	
	# Page Header.
	$post_settings = array(
		  'hide_frontpage_header'      => esc_html__( 'Hide Page Header', 'letterum' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'section_content',
		);
	}
	
	# Margin Bottom.
	$options[] = array(
		  'slug'        => 'page_content_margin',
		  'opt_type'    => 'slider_control',
		  'name'        => esc_html__( 'Margin bottom (px)', 'letterum' ),
		  'description' => esc_html__( 'Set the height of white space at the bottom after the section.', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 310,
					'step' => 5,
					),
		  'default'     => 0,
		  'section'     => 'section_content',
		  'transport'   => 'refresh',
	);
	
	/**
	 *	Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'section_featured',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Featured Post', 'letterum' ),
		  'description' => esc_html__( 'Featured Post allows users to spotlight post which has the selected tag. The featured post is intended to be displayed on a static front page.', 'letterum' ),
		  'panel'       => 'front_page_settings',
	);
	
	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	 
	# Tag name.
	$options[] = array(
		  'slug'        => 'featured_post_tag',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Tag name', 'letterum' ),
		  'description' => esc_html__( 'Use a tag to feature your post. If the tag name is not defined, and by default: featured.', 'letterum' ),
		  'default'     => esc_html__( 'featured', 'letterum' ),
		  'section'     => 'section_featured',
		  'transport'   => 'refresh',
	);
	
	# Tag display.
	$post_settings = array(
		  'featured_post_hide_name_tag'      => esc_html__( 'Hide Tag Name', 'letterum' ),
	);
	foreach( $post_settings as $key => $name ) {
		$options[] = array(
			  'slug'        => $key,
			  'opt_type'    => 'checkbox',
			  'name'        => $name,
			  'default'     => 0,
			  'section'     => 'section_featured',
		);
	}
	
	# Margin Bottom.
	$options[] = array(
		  'slug'        => 'featured_post_margin',
		  'opt_type'    => 'slider_control',
		  'name'        => esc_html__( 'Margin Bottom', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 310,
					'step' => 5,
					),
		  'default'     => 0,
		  'section'     => 'section_featured',
		  'transport'   => 'refresh',
	);
	
	/**
	 *	Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'section_frontpage_blog',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Blog Section', 'letterum' ),
		  'panel'       => 'front_page_settings',
	);
	
	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	 
	# Section Title
	$options[] = array(
		  'slug'        => 'frontpage_posts_title',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Section Title', 'letterum' ),
		  //'description' => esc_html__( '...', 'letterum' ),
		  'default'     => '',
		  'section'     => 'section_frontpage_blog',
		  'transport'   => 'refresh',
	);
	 
	# Posts Number.
	$options[] = array(
		  'slug'        => 'blog_posts_number',
		  'opt_type'    => 'number',
		  'name'        => esc_html__( 'Posts Number', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 999,
					'step' => 1,
					),
		  'default'     => 6,
		  'section'     => 'section_frontpage_blog',
		  'transport'   => 'refresh',
	);
	 
	# Grid Columns.
	$options[] = array(
		  'slug'        => 'frontpage_posts_columns',
		  'opt_type'    => 'radio',
		  'section'     => 'section_frontpage_blog',
		  'default'     => 'three',
		  'name'        => esc_html__( 'Grid Columns', 'letterum' ),
		  'choices'     => array(
				'two'           => esc_html__( 'Grid 2 Columns', 'letterum' ),
				'three'       => esc_html__( 'Grid 3 Columns', 'letterum' ),
		)
	);

	# Margin Bottom.
	$options[] = array(
		  'slug'        => 'front_blog_margin',
		  'opt_type'    => 'slider_control',
		  'name'        => esc_html__( 'Margin bottom (px)', 'letterum' ),
		  'description' => esc_html__( 'Set the height of white space at the bottom after the section.', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 310,
					'step' => 5,
					),
		  'default'     => 0,
		  'section'     => 'section_frontpage_blog',
		  'transport'   => 'refresh',
	);
	
	/**
	 *	Section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'section_frontpage_portfolio',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Portfolio Section', 'letterum' ),
		  'description' => esc_html__( 'Note please: For applies portfolio options requires the presence of posts of portfolio type.', 'letterum' ),
		  'panel'       => 'front_page_settings',
	);
	
	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	 
	# Section Title
	$options[] = array(
		  'slug'        => 'frontpage_portfolio_title',
		  'opt_type'    => 'text',
		  'name'        => esc_html__( 'Section Title', 'letterum' ),
		  'default'     => '',
		  'section'     => 'section_frontpage_portfolio',
		  'transport'   => 'refresh',
	);
	 
	# Posts Number.
	$options[] = array(
		  'slug'        => 'portfolio_posts_number',
		  'opt_type'    => 'number',
		  'name'        => esc_html__( 'Posts Number', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 999,
					'step' => 1,
					),
		  'default'     => 6,
		  'section'     => 'section_frontpage_portfolio',
		  'transport'   => 'refresh',
	);
 
	# Grid Columns.
	$options[] = array(
		  'slug'        => 'frontpage_portfolio_columns',
		  'opt_type'    => 'radio',
		  'section'     => 'section_frontpage_portfolio',
		  'default'     => 'two',
		  'name'        => esc_html__( 'Grid Columns', 'letterum' ),
		  //'description' => esc_html__( 'Applies to all post type.', 'letterum' ),
		  'choices'     => array(
							'two'		=> esc_html__( '2 Columns', 'letterum' ),
							'three'		=> esc_html__( '3 Columns', 'letterum' ),
							)
	);
	 
	# Margin Bottom.
	$options[] = array(
		  'slug'        => 'front_portfolio_margin',
		  'opt_type'    => 'slider_control',
		  'name'        => esc_html__( 'Margin bottom (px)', 'letterum' ),
		  'description' => esc_html__( 'Set the height of white space at the bottom after the section.', 'letterum' ),
		  'input_attrs' => array(
					'min' => 0,
					'max' => 310,
					'step' => 5,
					),
		  'default'     => 0,
		  'section'     => 'section_frontpage_portfolio',
		  'transport'   => 'refresh',
	);
	
	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_frontpage_section' );