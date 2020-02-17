<?php
/**
 * @package Letterum
 */
function letterum_customizer_google_fonts_options( $options ) {
	/**
	 *	Add Panel.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_panel',
		  'opt_type'    => 'panel',
		  'name'        => esc_html__( 'Fonts', 'letterum' ),
		  'priority'    => 84,
	);

	/**
	 *	Add Section General Font.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_main',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'General Font', 'letterum' ),
		  'description' => esc_html__( 'General font which is used in the body of the site. Default: Roboto', 'letterum' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'main_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'letterum' ),
		  'description' => esc_html__( 'Choose a font name. Default: Roboto', 'letterum' ),
		  'default'     => 'Roboto',
		  'section'     => 'font_main',
		  'transport'   => 'refresh',
		  'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'body', 'style' => 'font-family' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'main_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 18px', 'letterum' ),
		  'choices'     => letterum_content_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_main',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'body', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	/**
	 *	Add Section Site Title.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_site_title',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Site Title & Tagline', 'letterum' ),
		  'description' => esc_html__( 'Font size that used for Site Title and Tagline (look at the section called Site Identity).', 'letterum' ),
		  'panel'       => 'font_panel',
	);
	
	# Site Title Font size.
	$options[] = array(
		  'slug'        => 'site_title_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size for Site Title', 'letterum' ),
		  'description' => esc_html__( 'Font size that used for Site Title. Default: 22px', 'letterum' ),
		  'choices'     => letterum_content_font_size_list(),
		  'default'     => '22',
		  'section'     => 'font_site_title',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.site-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	# Tagline Font size.
	$options[] = array(
		  'slug'        => 'site_tagline_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size for Tagline', 'letterum' ),
		  'description' => esc_html__( 'Font size that used for Site Tagline. Default: 18px', 'letterum' ),
		  'choices'     => letterum_content_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_site_title',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.site-description', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	/**
	 *	Add Section Main Menu.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_menu',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Main Menu', 'letterum' ),
		  'description' => esc_html__( 'Used for main menu.', 'letterum' ),
		  'panel'       => 'font_panel',
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'menu_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 18px', 'letterum' ),
		  'choices'     => letterum_menu_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_menu',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.main-navigation', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Headings.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_heading',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Headings', 'letterum' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'heading_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'letterum' ),
		  'description' => esc_html__( 'Choose a font name. Default: Roboto', 'letterum' ),
		  'default'     => 'Roboto',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'h1,h2,h3,h4,h5,h6', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'letterum' ),
		  'description' => esc_html__( 'Set font-weight. Default: 900/Ultra Bold. Important: Not all fonts support every font-weight.', 'letterum' ),
		  'default'     => '900',
		  'choices'     => letterum_customizer_font_weight_list(),
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h1,h2,h3,h4,h5,h6', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'heading_one_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'H1 Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 40px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '40',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h1', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'heading_two_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'H2 Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 32px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '32',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h2', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'heading_three_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'H3 Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 24px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '24',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h3', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'heading_four_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'H4 Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 18px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_heading',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'h4', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	/**
	 *	Add Section Post Preview Heading.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'preview_heading_font',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Preview Heading', 'letterum' ),
		  'description' => esc_html__( 'Applied for post titles on the blog page.', 'letterum' ),
		  'panel'       => 'font_panel',
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'preview_heading_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'letterum' ),
		  'description' => esc_html__( 'Set font-weight. Default: 300/Book. Important: Not all fonts support every font-weight.', 'letterum' ),
		  'default'     => '300',
		  'choices'     => letterum_customizer_font_weight_list(),
		  'section'     => 'preview_heading_font',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-list .title', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'preview_heading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 40px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '40',
		  'section'     => 'preview_heading_font',
		  'transport'   => 'refresh',
		 // 'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-list .title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	/**
	 *	Add Section Page Title.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_page_title',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Page Title', 'letterum' ),
		  'description' => esc_html__( 'Used for title of the single post/page.', 'letterum' ),
		  'panel'       => 'font_panel',
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'page_title_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 40px', 'letterum' ),
		  'choices'     => letterum_heading_font_size_list(),
		  'default'     => '40',
		  'section'     => 'font_page_title',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.page-title, .page-header .entry-title', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	/**
	 *	Add Section Subheading.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_subheading',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Excerpt', 'letterum' ),
		  'description' => esc_html__( 'Applies to the excerpt of the post/page when displaying a single post or page.', 'letterum' ),
		  'panel'       => 'font_panel',
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'subheading_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size (em). Default: 1.2', 'letterum' ),
		  'choices'     => array(
		  	'1'       => esc_html__( '1', 'letterum' ),
		  	'1.2'     => esc_html__( '1.2', 'letterum' ),
		  	'1.25'    => esc_html__( '1.25', 'letterum' ),
		  	'1.3'     => esc_html__( '1.3', 'letterum' ),
		  	'1.4'     => esc_html__( '1.4', 'letterum' ),
		  	'1.5'     => esc_html__( '1.5', 'letterum' ),
		  	'1.6'     => esc_html__( '1.6', 'letterum' ),
							),
		  'default'     => '1.2',
		  'section'     => 'font_subheading',
		  'transport'   => 'refresh',
		  'css_output'  => array( array( 'class' => '.content-excerpt', 'style' => 'font-size', 'mix' => 'em' ) ),
	);
	
	/**
	 *	Add Section Paragraph.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_paragraph',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Paragraph', 'letterum' ),
		  'description' => esc_html__( 'Used for content text, tables, and lists.', 'letterum' ),
		  'panel'       => 'font_panel',
	);

	# Font Name.
	$options[] = array(
		  'slug'        => 'paragraph_font_name',
		  'opt_type'    => 'google_fonts',
		  'name'        => esc_html__( 'Google Font Name', 'letterum' ),
		  'description' => esc_html__( 'Choose a font name. Default: Roboto', 'letterum' ),
		  'default'     => 'Roboto',
		  'section'     => 'font_paragraph',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'google_fonts',
		  'css_output'  => array( array( 'class' => 'p,.entry-content li,.entry-content td', 'style' => 'font-family' ) ),
	);

	# Font Weight.
	$options[] = array(
		  'slug'        => 'paragraph_font_w',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Weight', 'letterum' ),
		  'description' => esc_html__( 'Set font-weight. Default: 400/Regular. Important: Not all fonts support every font-weight.', 'letterum' ),
		  'default'     => '400',
		  'choices'     => letterum_customizer_font_weight_list(),
		  'section'     => 'font_paragraph',
		  'transport'   => 'refresh',
		  //'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'p,.entry-content li,.entry-content td', 'style' => 'font-weight' ) ),
	);

	# Font size.
	$options[] = array(
		  'slug'        => 'paragraph_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 18px', 'letterum' ),
		  'choices'     => letterum_content_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_paragraph',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => 'p,.entry-content li,.entry-content td', 'style' => 'font-size', 'mix' => 'px' ) ),
	);
	
	# Paragraph Line Height.
	$options[] = array(
		  'slug'        => 'paragraph_line_height',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Line Height', 'letterum' ),
		  'description' => esc_html__( 'Set line-height. Default: 1.75', 'letterum' ),
		  'choices'     => letterum_line_height(),
		  'default'     => '1.75',
		  'section'     => 'font_paragraph',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-content p', 'style' => 'line-height' ) ),
	);
	
	/**
	 *	Add Section Post Meta.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'font_meta',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Post meta', 'letterum' ),
		  'description' => esc_html__( 'Used for meta-text of the single post: author, date, categories etc.', 'letterum' ),
		  'panel'       => 'font_panel',
	);
	
	# Font size.
	$options[] = array(
		  'slug'        => 'meta_font_size',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Font Size', 'letterum' ),
		  'description' => esc_html__( 'Set font-size. Default: 18px', 'letterum' ),
		  'choices'     => letterum_element_font_size_list(),
		  'default'     => '18',
		  'section'     => 'font_meta',
		  'transport'   => 'refresh',
		//  'js_mod'      => 'css_output',
		  'css_output'  => array( array( 'class' => '.entry-meta, .entry-footer', 'style' => 'font-size', 'mix' => 'px' ) ),
	);

	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_google_fonts_options' );