<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blog_Personal
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blog_personal_body_classes( $classes ) {
    global $post;
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    // Add class for Slidebar layout.
    $sidebar_layout = blog_personal_get_option( 'sidebar_layout' ); 
    $sidebar_layout = apply_filters( 'blog_personal_filter_theme_global_layout', $sidebar_layout );
    
    if ( is_page() || is_single() ){
        $layout = get_post_meta( $post->ID, 'blog_personal_meta', true );
        // If individual layout is set.
        if ( ! empty( $layout ) ) {
            $classes[] = 'global-layout-' . esc_attr( $layout );     
        } else {
            // if individual layout is not set add global one.
            $classes[] = 'global-layout-' . esc_attr( $sidebar_layout );     
        }
    } else{
         $classes[] =  'global-layout-' . esc_attr( $sidebar_layout );   
    }
     

	return $classes;
}
add_filter( 'body_class', 'blog_personal_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blog_personal_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'blog_personal_pingback_header' );

if ( ! function_exists( 'blog_personal_the_excerpt' ) ) :

    /**
     * Generate excerpt.
     *
     * @since 1.0.0
     *
     * @param int     $length Excerpt length in words.
     * @param WP_Post $post_obj WP_Post instance (Optional).
     * @return string Excerpt.
     */
    function blog_personal_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }

endif;

/**
 *  Blog Personal Breadcrumb
 *
 *
 */
if ( ! function_exists( 'blog_personal_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function blog_personal_breadcrumb( $args = array() ) {
        // Bail if Home Page.
        if ( is_front_page() || is_home() ) {
            return;
        }

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once trailingslashit(get_template_directory()) . '/inc/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;