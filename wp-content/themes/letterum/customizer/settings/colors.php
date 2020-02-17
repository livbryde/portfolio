<?php
/**
 * @package Letterum
 */
function letterum_customizer_add_colors( $options ) {

	/**
	 *	Options.
	 *---------------------------------------------------------*/
	 
	# Body Color.
	$options[] = array(
		  'slug'        => 'primary_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Body color', 'letterum' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'colors',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
				array( 
					'class' => 'body, mark, label, body a, .main-navigation a, .search-icon:before,
					.no-thumbnail .title, .no-thumbnail .sticky-post, blockquote p, .gallery-caption,
					input, select, textarea, h1, h2, h3, h4, h5, h6, .page-numbers a, .page-numbers span,
					.dropdown-toggle, .dropdown-toggle',
					'style' => 'color'
				         ),
				array( 
					'class' => 'span.sticky-post, .entry-meta-category',
					'style' => 'background-color'
				         ),
				array( 
					'class' => '.single-post .nav-links, .entry-content a',
					'style' => 'border-color'
				         )
				)
	);
	
	# Accent Color.
	$options[] = array(
		  'slug'        => 'accent_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Link text color', 'letterum' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'colors',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.entry-content a, .edit-link a, .infinite-scroll #infinite-handle button',
				  'style' => 'color'
			),
			array(
				  'class' => '.entry-content a',
				  'style' => 'border-color'
			)
		)
	);

	# Hover Color.
	$options[] = array(
		  'slug'        => 'hover_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Link text color on hover', 'letterum' ),
		  'default'     => '#000',
		  'section'     => 'colors',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.entry-content a:hover, .edit-link a:hover, .infinite-scroll #infinite-handle button:hover,
				  .infinite-scroll #infinite-handle button:focus, .main-navigation a:hover, .main-navigation a:focus,
				  .dropdown-toggle:hover, .dropdown-toggle:focus',
				  'style' => 'color'
			),
			array(
				  'class' => '.entry-content a:hover',
				  'style' => 'border-color'
			)
		)
	);
	
	# Secondary Color.
	$options[] = array(
		  'slug'        => 'secondary_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Secondary color', 'letterum' ),
		  'description' => esc_html__( 'Is applied to the to the secondary design elements, and meta text about the publication, such as date, author, etc..', 'letterum' ),
		  'default'     => '#687179',
		  'section'     => 'colors',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.entry-meta *, .entry-footer *, .comment-metadata time, .site-info, .site-info a, .meta-nav, .main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a, .wp-caption-text',
				  'style' => 'color'
			)
		)
	);
	
	# Primary menu.
	$options[] = array(
		  'slug'        => 'submenu_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Main Menu: dropdown bg', 'letterum' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'colors',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.main-navigation ul ul li',
				  'style' => 'background-color'
			),
			array(
				  'class' => '.main-navigation ul ul:before',
				  'style' => 'border-bottom-color'
			)
		)
	);
	
	# Buttons color.
	$options[] = array(
		  'slug'        => 'button_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Primary Button', 'letterum' ),
		  'default'     => '#2c2c2c',
		  'section'     => 'colors',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'button, input[type="button"], input[type="submit"], .button,
				  .page-numbers span.current, .social-navigation a:hover, .menu-toggle:hover,
				  .menu-toggle:focus, .dark-mode .menu-toggle:hover, .cell .format-image .title',
				  'style' => 'background-color'
			),
			array(
				  'class' => '.menu-toggle',
				  'style' => 'color'
			),
			array(
				  'class' => '.social-navigation a',
				  'style' => 'fill'
			),
			array(
				  'class' => '.page-numbers span.current',
				  'style' => 'border-color'
			)
		)
	);
	
	# Button color on hover.
	$options[] = array(
		  'slug'        => 'button_hover_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Primary Button: hover', 'letterum' ),
		  'default'     => '#687179',
		  'section'     => 'colors',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'button:hover, input[type="button"]:hover, input[type="submit"]:hover, .button:hover',
				  'style' => 'background-color'
			)
		)
	);
	
	# Secondary Button color.
	$options[] = array(
		  'slug'        => 'secondary_button_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Secondary Button', 'letterum' ),
		  'default'     => '#ddd',
		  'section'     => 'colors',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'button.secondary, input[type="reset"], input[type="button"].secondary, input[type="reset"].secondary, input[type="submit"].secondary',
				  'style' => 'background-color'
			)
		)
	);
	
	# Secondary Button on hover.
	$options[] = array(
		  'slug'        => 'secondary_button_hover_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Secondary Button: hover', 'letterum' ),
		  'default'     => '#ccc',
		  'section'     => 'colors',
		  'transport'   => 'refresh',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'button.secondary:hover, button.secondary:focus, input[type="reset"]:hover,
				  input[type="reset"]:focus, input[type="button"].secondary:hover,
				  input[type="button"].secondary:focus, input[type="reset"].secondary:hover,
				  input[type="reset"].secondary:focus, input[type="submit"].secondary:hover,
				  input[type="submit"].secondary:focus',
				  'style' => 'background-color'
			)
		)
	);
	

	# Highlighter color.
	$options[] = array(
		  'slug'        => 'highlighter_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Highlighter color', 'letterum' ),
		  'description' => esc_html__( 'Applies to some additional design elements, eg marked text,
		  code highlighting, table row.', 'letterum' ),
		  'default'     => '#f3f5f7',
		  'section'     => 'colors',
		  //'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => 'tbody > tr:nth-child(odd), pre, mark, ins, code',
				  'style' => 'background-color'
			)
		)
	);
	
	# Additional Color.
	$options[] = array(
		  'slug'        => 'additional_color',
		  'opt_type'    => 'color',
		  'name'        => esc_html__( 'Additional Color', 'letterum' ),
		  'description' => esc_html__( 'Applies to the background fill of some additional design elements, eg numeric navigation, comment reply button, the background of the icons social links etc.', 'letterum' ),
		  'default'     => '#f3f5f7',
		  'section'     => 'colors',
		  'transport'   => 'postMessage',
		  'js_mod'      => 'css_output',
		  'css_output'  => array(
			array(
				  'class' => '.widget-area, .page-numbers a, .page-numbers span, .comment-reply-link,
				  .edit-link, .single-portfolio .cat-links, .social-navigation a',
				  'style' => 'background-color'
			),
			array(
				  'class' => '.page-numbers a, fieldset',
				  'style' => 'border-color'
			)
		)
	);

	return $options;
}
add_filter( 'letterum_settings_input', 'letterum_customizer_add_colors' );