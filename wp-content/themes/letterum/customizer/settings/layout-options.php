<?php
/**
 * @package Letterum
 */
function letterum_customizer_layout_options( $options ) {
	/**
	 *	Add section.
	 *--------------------------------------------------------------*/
	$options[] = array(
		  'slug'        => 'layout_options',
		  'opt_type'    => 'section',
		  'name'        => esc_html__( 'Layout Options', 'letterum' ),
		  'priority'    => 101,
	);

	/**
	 *	Options.
	 *--------------------------------------------------------------*/
	# Sidebar Position.
	$options[] = array(
		  'slug'        => 'sidebar_position',
		  'opt_type'    => 'image_radio_button',
		  'choices'		=> array(
					'left' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer/images/sidebar-left.png',
						'name' => esc_html__( 'Left', 'letterum' )
					),
					'right' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer/images/sidebar-right.png',
						'name' => esc_html__( 'Right', 'letterum' )
					),
					'none' => array(
						'image' => trailingslashit( get_template_directory_uri() ) . 'customizer/images/sidebar-none.png',
						'name' => esc_html__( 'None', 'letterum' )
					)
			),
		  'name'        => esc_html__( 'Sidebar Position', 'letterum' ),
		  'description' => esc_html__( 'Note that if there are no active widgets in the sidebar, it will not be displayed. If you select a layout w/o a sidebar, the sidebar will not be displayed even if has active widgets.', 'letterum' ),
		  'default'     => 'none',
		  'section'     => 'layout_options',
		  'transport'   => 'refresh',
	);

	# Featured Image: displaying
	$options[] = array(
		  'slug'        => 'single_featured_image_style',
		  'opt_type'    => 'select',
		  'name'        => esc_html__( 'Featured Image: display mode', 'letterum' ),
		  'description' => esc_html__( 'Choose a way to show a Featured Image when display single post or page. If you select Overlay, you need to upload images larger than 2000px wide.', 'letterum' ),
		  'choices'     => array(
							'overlay' 	=> esc_html__( 'Overlay', 'letterum' ),
							'separate' 	=> esc_html__( 'Separately', 'letterum' )
						),
		  'default'     => 'separate',
		  'section'     => 'layout_options',
		  'transport'   => 'refresh'
	);

	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_layout_options' );