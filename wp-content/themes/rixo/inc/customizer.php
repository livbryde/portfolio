<?php
/**
 * rixo Theme Customizer
 *
 * @package rixo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rixo_customize_register( $wp_customize ) {

	global $rixoPostsPagesArray, $rixoYesNo, $rixoSliderType, $rixoServiceLayouts, $rixoAvailableCats;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rixo_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rixo_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'rixo_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'rixo'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'rixo_general';
	$wp_customize->get_section( 'background_image' )->panel = 'rixo_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'rixo');
	$wp_customize->get_section( 'header_image' )->panel = 'rixo_general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'rixo');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'rixo' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'rixo'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'rixo_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new rixo_Customize_Control_Upgrade(
		$wp_customize,
		'rixo_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'rixo' ),
			'settings'   => 'rixo_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'rixo'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'rixo_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new rixo_Customize_Control_Guide(
		$wp_customize,
		'rixo_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'rixo' ),
			'settings'   => 'rixo_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'rixo'),
		'active_callback' => '',
	) );

	/* Header options */	
	$wp_customize->add_section( 'business_page_header', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header Settings', 'rixo'),
		'active_callback' => 'rixo_front_page_sections',
		'panel'  => 'business_page',
	) );		
	$wp_customize->add_setting( 'rixo_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_show_slider',
		array(
			'label'      => __( 'Show header?', 'rixo' ),
			'settings'   => 'rixo_show_slider',
			'priority'   => 10,
			'section'    => 'business_page_header',
			'type'    => 'select',
			'choices' => $rixoYesNo,
		)
	) );
	
	$wp_customize->add_section( 'business_page_welcome', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Welcome Section Settings', 'rixo'),
		'active_callback' => 'rixo_front_page_sections',
		'panel'  => 'business_page',
	) );	
	
	$wp_customize->add_setting( 'rixo_show_welcome',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_show_welcome',
		array(
			'label'      => __( 'Show welcome?', 'rixo' ),
			'settings'   => 'rixo_show_welcome',
			'priority'   => 10,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $rixoYesNo,
		)
	) );
	$wp_customize->add_setting( 'rixo_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_welcome_post',
		array(
			'label'      => __( 'Select post', 'rixo' ),
			'description' => __( 'Select a post/page you want to show in welcome section', 'rixo' ),
			'settings'   => 'rixo_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_welcome',
			'type'    => 'select',
			'choices' => $rixoPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_products', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Products Section Settings', 'rixo'),
		'active_callback' => 'rixo_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'rixo_products_title',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_products_title',
		array(
			'label'      => __( 'Title for left column?', 'rixo' ),
			'settings'   => 'rixo_products_title',
			'priority'   => 15,
			'section'    => 'business_page_products',
			'type'    => 'text',
		)
	) );	
	$wp_customize->add_setting( 'rixo_products_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_products_cat',
		array(
			'label'      => __( 'Select category for left column?', 'rixo' ),
			'settings'   => 'rixo_products_cat',
			'priority'   => 16,
			'section'    => 'business_page_products',
			'type'    => 'select',
			'choices' => $rixoAvailableCats,
		)
	) );	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Section Settings', 'rixo'),
		'active_callback' => 'rixo_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'rixo_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_show_quote',
		array(
			'label'      => __( 'Show quote?', 'rixo' ),
			'settings'   => 'rixo_show_quote',
			'priority'   => 50,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $rixoYesNo,
		)
	) );		
	$wp_customize->add_setting( 'rixo_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_quote_post',
		array(
			'label'      => __( 'Quote', 'rixo' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'rixo' ),
			'settings'   => 'rixo_quote_post',
			'priority'   => 51,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $rixoPostsPagesArray,
		)
	) );

	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'rixo'),
		'active_callback' => 'rixo_front_page_sections',
		'panel'  => 'business_page',
	) );	
	$wp_customize->add_setting( 'rixo_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'rixo_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'rixo_show_social',
		array(
			'label'      => __( 'Show social?', 'rixo' ),
			'settings'   => 'rixo_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $rixoYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'rixo' ),
	  'description' => __( 'Enter your facebook url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'rixo' ),
	  'description' => __( 'Enter your flickr url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'rixo' ),
	  'description' => __( 'Enter your gplus url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'rixo' ),
	  'description' => __( 'Enter your linkedin url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'rixo' ),
	  'description' => __( 'Enter your reddit url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'rixo' ),
	  'description' => __( 'Enter your stumble url.', 'rixo' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'rixo' ),
	  'description' => __( 'Enter your twitter url.', 'rixo' ),
	) );	
	
}
add_action( 'customize_register', 'rixo_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rixo_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rixo_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rixo_customize_preview_js() {
	wp_enqueue_script( 'rixo-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rixo_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function rixo_sanitize_yes_no_setting( $value ){
	global $rixoYesNo;
    if ( ! array_key_exists( $value, $rixoYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function rixo_sanitize_post_selection( $value ){
	global $rixoPostsPagesArray;
    if ( ! array_key_exists( $value, $rixoPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function rixo_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function rixo_sanitize_slider_type_setting( $value ){

	global $rixoSliderType;
    if ( ! array_key_exists( $value, $rixoSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function rixo_sanitize_cat_setting( $value ){
	
	global $rixoAvailableCats;
	
	if( ! array_key_exists( $value, $rixoAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'rixo_load_customize_classes', 0 );
function rixo_load_customize_classes( $wp_customize ) {
	
	class rixo_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'rixo-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="rixo-upgrade-container" class="rixo-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .rixo-upgrade-container -->
			
		<?php }	
		
	}
	
	class rixo_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'rixo-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="rixo-upgrade-container" class="rixo-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .rixo-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'rixo_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'rixo_Customize_Control_Guide' );
	
	
}