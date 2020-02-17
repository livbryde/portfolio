<?php
/**
 * Letterum functions and definitions
 * PHP 5.6 or greater
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Letterum
 */
 
// Theme Constants.
define( 'LETTERUM_DIR', get_template_directory() );
define( 'LETTERUM_DIR_URI', get_template_directory_uri() );
define( 'LETTERUM_VERSION', '1.0.0' );
define( 'LETTERUM_WP_REQUIRES', '4.8' );

if ( ! function_exists( 'letterum_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function letterum_setup() {
		
		// Set the default content width.
		$GLOBALS['content_width'] = 700;
		
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Letterum, use a find and replace
		 * to change 'letterum' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'letterum', get_template_directory() . '/languages' );
		
		$locale_file = get_template_directory() . "/languages/" . get_locale();
    
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		
		// Custom Image Sizes
		add_image_size( 'letterum-preview-image', 900, 9999 );
		add_image_size( 'letterum-preview-image-crop', 900, 700, true ); //crop
		add_image_size( 'letterum-featured-image', 1140, 9999 );
		add_image_size( 'letterum-featured-image-crop', 1140, 650, true ); //crop
		add_image_size( 'letterum-avatar', 100, 100, true ); //crop

		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' 	=> esc_html__( 'Primary', 'letterum' ),
			'social' 	=> esc_html__( 'Social Links', 'letterum' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'letterum_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 180,
			'width'       => 650,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		/*
		 * Add support for Post Formats.
		 * See https://developer.wordpress.org/themes/functionality/post-formats/
		 */
		add_theme_support( 'post-formats', array(
			'image',
		) );
		
		/**
		 * Add support for Excerpts to pages.
		 */
		add_post_type_support( 'page', array( 'excerpt' ) );	
		
		/**
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors...
		 */
		// Add support for editor styles.
		add_editor_style( array( 'assets/css/editor-style.css', letterum_fonts_url() ) );
	
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );		
		
		// Add wide image support
		add_theme_support( 'align-wide' );
		
	} // letterum_setup()
endif;
add_action( 'after_setup_theme', 'letterum_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function letterum_content_width() {

	$content_width = $GLOBALS['content_width'];

	if ( letterum_is_frontpage() ) {
			$content_width = 860;
	}
	if ( is_page() ) {
			$content_width = 700;
	}
	// Check if is wide page template.
	if ( is_page_template( array( 'templates/wide-page-template.php' ) ) ) {
		$content_width = 1200;
	}

	/**
	 * Filter Letterum content width of the theme.
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'letterum_content_width', $content_width );
}
add_action( 'template_redirect', 'letterum_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function letterum_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Home/Archives Sidebar', 'letterum' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Appears in the sidebar of the home/archives posts page.', 'letterum' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Single Post', 'letterum' ),
		'id'            => 'sidebar-single',
		'description'   => esc_html__( 'Appears in the sidebar of the single post.', 'letterum' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Page', 'letterum' ),
		'id'            => 'sidebar-page',
		'description'   => esc_html__( 'Appears in the sidebar of the page.', 'letterum' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'letterum_widgets_init' );


/**
 *	Register Google fonts.
 *-----------------------------------------------------------------*/

function letterum_fonts_url() {
	$fonts_url     = '';
	$_defaults     = array( 'Roboto:300,400,400i,700,900', 'Roboto Slab:400,700' );
	$font_families = apply_filters( 'letterum_font_families', $_defaults );
	$subsets       = apply_filters( 'letterum_font_subsets', 'cyrillic' );

	if ( $font_families ) {
		$font_families = array_unique( $font_families );
		$query_args    = array(
			  'family' => urlencode( implode( '|', $font_families ) ),
			  'subset' => urlencode( $subsets )
		);
		$fonts_url = esc_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
	}

	return $fonts_url;
}

/**
 * Add preconnect for Google Fonts.
 *
 * @param  array  $urls           URLs to print for resource hints.
 * @param  string $relation_type  The relation type the URLs are printed.
 * @return array  $urls           URLs to print for resource hints.
 */
function letterum_resource_hints( $urls, $relation_type ) {
    if ( wp_style_is( 'letterum-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }

    return $urls;
}
add_filter( 'wp_resource_hints', 'letterum_resource_hints', 10, 2 );

/** 
 * Gutenberg Editor Styles 
 */
function letterum_gutenberg_editor_styles() {
	wp_enqueue_style( 'letterum-gutenberg-editor-style', get_template_directory_uri() . '/assets/css/gutenberg-editor-style.css');
	wp_enqueue_style( 'letterum-fonts', letterum_fonts_url(), array(), null );

	$heading_font_name = get_theme_mod( 'heading_font_name' );
	$paragraph_font_name = get_theme_mod( 'paragraph_font_name' );

	$customize_css = '';

	if ( $heading_font_name ) {
		$customize_css .= '.editor-post-title__input, .editor-post-title textarea.editor-post-title__input {
			font-family:"'.$heading_font_name.'", "Helvetica Neue", sans-serif;
		}';		
	}
	if ( $paragraph_font_name ) {
		$customize_css .= '.editor-styles-wrapper, .editor-styles-wrapper p {
		font-family:"'.$paragraph_font_name.'", "Helvetica Neue", sans-serif;
	}';		
	}

	wp_add_inline_style( 'letterum-gutenberg-editor-style', $customize_css );
}
add_action( 'enqueue_block_editor_assets', 'letterum_gutenberg_editor_styles' );

/**
 * Enqueue scripts and styles.
 */
function letterum_scripts() {
	
	wp_enqueue_style( 'letterum-style', get_stylesheet_uri() );
	wp_enqueue_style( 'letterum-fonts', letterum_fonts_url(), array(), null );
	
	// Add Genericons, used in the navigation stylesheet.
	wp_enqueue_style( 'genericons-css', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	wp_enqueue_script( 'letterum-main', get_theme_file_uri( '/assets/js/main.js' ), array( 'jquery', 'imagesloaded', 'masonry' ), LETTERUM_VERSION, true );
	wp_enqueue_script( 'letterum-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array( 'jquery' ), '24022018', true );
	
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	
	wp_enqueue_script( 'letterum-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '24022018', true );
	
	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'letterum_scripts' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function letterum_js_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'letterum_js_detection', 0 );

/**
 * Remove default WP gallery styles.
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function letterum_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'letterum' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'letterum_excerpt_more' );

/**
 * Adding item to main menu
 */
function letterum_extra_menu_link( $items, $args ) {
	if ( $args->theme_location == 'primary' ) {
		if ( get_theme_mod( 'search_display' ) == 1 ) {
			$items .= '<li class="menu-item search-btn"><a href="#" data-toggle="searchBar" class="search-icon"></a></li>';
		}
   	}
   	return $items;
}
add_filter( 'wp_nav_menu_items', 'letterum_extra_menu_link', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function letterum_front_page( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'letterum_front_page' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Theme Customizer.
 */
require get_template_directory() . '/customizer/config.php';

/**
 * Add a filter to the css output of the customizer.
 * @see front-page template
 *-----------------------------------------------------------------*/
function letterum_frontpage_margin( $output ) {

	if( letterum( 'frontpage_margin' ) ) {
		$output .= '#front-page-content.front-page-section { margin-bottom:'. esc_html( letterum( 'frontpage_margin' ) ) .'px; }';
	}

	return $output;
}
//add_filter( 'letterum_customizer_css_output', 'letterum_frontpage_margin' );

/**
 * Helper functions for attachment page.
 */
require_once get_template_directory() . '/inc/attachment.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function letterum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'letterum_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'letterum_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'letterum_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function letterum_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function letterum_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Display upgrade to Pro version button on customizer
 */
require_once get_template_directory() . '/customizer-upsell/class-customize.php';

/**
 * Filter the output of logo without link home
 * when located on the homepage.
 */
function letterum_logo_link() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
	
	if( ! is_front_page() || ( ! is_home() && 'posts' == get_option( 'show_on_front' ) ) ) {
		$html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
	} else {
		$html = sprintf( '%s',
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
	}
	
    return $html;   
}

/**
 * Load Dashboard welcome page.
 */
require_once( get_template_directory() . '/inc/admin/welcome-screen.php' );