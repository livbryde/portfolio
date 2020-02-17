<?php
/**
 * Category List.
 */
function letterum_customizer_category_list( $args = array() ) {
	$args = wp_parse_args( $args, array( 'hide_empty' => 1 ) );
	$cats = get_categories( $args );
	$output = array();
	$output[''] = esc_html__( '&mdash; Select &mdash;', 'letterum' );
	foreach( $cats as $cat ) {
		$output[$cat->term_id] = sprintf('%s (%s)', $cat->name, $cat->count );
	}
	return $output;
}

/**
 * Tag List.
 */
function letterum_customizer_tag_list( $args = array() ) {
	$args = wp_parse_args( $args, array( 'hide_empty' => 1 ) );
	$tags = get_tags( $args );
	$output = array();
	$output[''] = esc_html__( '&mdash; Select &mdash;', 'letterum' );
	foreach( $tags as $tag ) {
		$output[$tag->term_id] = sprintf('%s (%s)', $tag->name, $tag->count );
	}
	return $output;
}

/**
 * Font weight list.
 */
function letterum_customizer_font_weight_list() {
	$output = array(
			'100'       => esc_html__( 'Ultra Light', 'letterum' ),
			'200'       => esc_html__( 'Light', 'letterum' ),
			'300'       => esc_html__( 'Book', 'letterum' ),
			'400'       => esc_html__( 'Regular', 'letterum' ),
			'500'       => esc_html__( 'Medium', 'letterum' ),
			'600'       => esc_html__( 'Semi-Bold', 'letterum' ),
			'700'       => esc_html__( 'Bold', 'letterum' ),
			'800'       => esc_html__( 'Extra Bold', 'letterum' ),
			'900'       => esc_html__( 'Ultra Bold', 'letterum' )
	);
	return $output;
}

/**
 * Font size list for main text.
 */
function letterum_content_font_size_list() {
	$output = array(
		  	'12'       => esc_html__( '12px', 'letterum' ),
		  	'14'       => esc_html__( '14px', 'letterum' ),
		  	'16'       => esc_html__( '16px', 'letterum' ),
		  	'18'       => esc_html__( '18px', 'letterum' ),
		  	'20'       => esc_html__( '20px', 'letterum' ),
		  	'22'       => esc_html__( '22px', 'letterum' ),
		  	'24'       => esc_html__( '24px', 'letterum' ),
	);
	return $output;
}

/**
 * Font size list for headings.
 */
function letterum_heading_font_size_list() {
	$output = array(
		  	'18'       => esc_html__( '18px', 'letterum' ),
		  	'20'       => esc_html__( '20px', 'letterum' ),
		  	'22'       => esc_html__( '22px', 'letterum' ),
		  	'24'       => esc_html__( '24px', 'letterum' ),
		  	'28'       => esc_html__( '28px', 'letterum' ),
		  	'30'       => esc_html__( '30px', 'letterum' ),
		  	'32'       => esc_html__( '32px', 'letterum' ),
		  	'34'       => esc_html__( '34px', 'letterum' ),
		  	'36'       => esc_html__( '36px', 'letterum' ),
		  	'38'       => esc_html__( '38px', 'letterum' ),
		  	'40'       => esc_html__( '40px', 'letterum' ),
		  	'42'       => esc_html__( '42px', 'letterum' ),
		  	'46'       => esc_html__( '46px', 'letterum' ),
		  	'48'       => esc_html__( '48px', 'letterum' ),
		  	'50'       => esc_html__( '50px', 'letterum' ),
	);
	return $output;
}

/**
 * Font size list for elements.
 */
function letterum_element_font_size_list() {
	$output = array(
		  	'10'       => esc_html__( '10px', 'letterum' ),
		  	'12'       => esc_html__( '12px', 'letterum' ),
		  	'14'       => esc_html__( '14px', 'letterum' ),
		  	'16'       => esc_html__( '16px', 'letterum' ),
		  	'18'       => esc_html__( '18px', 'letterum' ),
		  	'20'       => esc_html__( '20px', 'letterum' ),
	);
	return $output;
}

/**
 * Font size list for main menu.
 */
function letterum_menu_font_size_list() {
	$output = array(
		  	'14'       => esc_html__( '14px', 'letterum' ),
		  	'16'       => esc_html__( '16px', 'letterum' ),
		  	'18'       => esc_html__( '18px', 'letterum' ),
		  	'20'       => esc_html__( '20px', 'letterum' ),
	);
	return $output;
}

/**
 * Number Line Height.
 */
function letterum_line_height() {
	$output = array(
		  '.5'      => '0.5',
		  '1'       => '1',
		  '1.5'     => '1.5',
		  '1.75'    => '1.75',
	);
	return $output;
}