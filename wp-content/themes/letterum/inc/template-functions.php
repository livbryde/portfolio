<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Letterum
 */

/**
 * Adds a condition to verify when the default template is used.
 * @return true or false
 */ 
function letterum_default_template() { 
	$page_template = get_page_template_slug( get_queried_object_id() );
	if ( ! $page_template && ! is_front_page() ) {
		return true;
	}
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function letterum_body_classes( $classes ) {
    /* using mobile browser */
    if ( wp_is_mobile() ){
        $classes[] = 'wp-is-mobile';
    }
    else{
        $classes[] = 'wp-is-not-mobile';
    }
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class the grid mode for portfolio archive
	if ( is_post_type_archive( 'portfolio' ) ) { // ! is_singular() && ! is_search()
		$classes[] = esc_html( letterum( 'portfolio_posts_columns' ) ) . '-columns-grid';
	}
	
	// Adds a class if the front-page
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}
	
	// Adds a class if the customizer preview
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}
	
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	
	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	
	// Adds a class related to home/archives sidebar.
	if ( is_home() || is_archive() ) :
		if ( ! is_active_sidebar( 'sidebar' ) || get_theme_mod( 'sidebar_position' ) == 'none' ) {
			$classes[] = 'no-sidebar';
		} else {
			$classes[] = 'sidebar-on';
		}
		// Adds a class of no-sidebar to sites without active sidebar.
		if ( is_active_sidebar( 'sidebar' ) && get_theme_mod( 'sidebar_position' ) == 'left' ) {
			$classes[] = 'sidebar-left';
		}
	endif;
	
	// Adds a class related to page sidebar.
	if ( is_page() && letterum_default_template() ) :
		if ( ! is_active_sidebar( 'sidebar-page' ) || get_theme_mod( 'sidebar_position' ) == 'none' ) {
			$classes[] = 'no-sidebar';
		} else {
			$classes[] = 'sidebar-on';
		}
		// Adds a class of no-sidebar to sites without active sidebar.
		if ( is_active_sidebar( 'sidebar-page' ) && get_theme_mod( 'sidebar_position' ) == 'left' ) {
			$classes[] = 'sidebar-left';
		}
	endif;
	
	//  Adds a class related to post sidebar.
	if ( is_single() ) :
		if ( ! is_active_sidebar( 'sidebar-single' ) || get_theme_mod( 'sidebar_position' ) == 'none' ) {
			$classes[] = 'no-sidebar';
		} else {
			$classes[] = 'sidebar-on';
		}
		// Adds a class of no-sidebar to sites without active sidebar.
		if ( is_active_sidebar( 'sidebar-single' ) && get_theme_mod( 'sidebar_position' ) == 'left' ) {
			$classes[] = 'sidebar-left';
		}
	endif;

	// Add short class to body if wide page template
	if ( is_page_template( 'templates/wide-page-template.php' ) ) {
		$classes[] = 'wide-page';
	}	

	return $classes;
}
add_filter( 'body_class', 'letterum_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the article element.
 * @return array
 */
function letterum_post_classes( $classes ) {
	$classes[] = ( has_post_thumbnail() ? 'has-thumbnail' : 'no-thumbnail' );
	
	// Adds a class for blog layout
	if ( get_post_type() == 'post' && ( is_home() || is_archive() ) ) {
			$classes[] = 'entry-list';
	}
	
	// Adds a class for portfolio layout
	if ( get_post_type() == 'portfolio' && !is_search() && !is_singular( 'portfolio' ) ) {
		$classes[] = 'post-preview';
	}
	
	return $classes;
}
add_action( 'post_class', 'letterum_post_classes' );

/**
 * Prints the classes for a div of the main content.
 *
 * @param string|array $class
 * One or more classes to add to the class list.
 */
function letterum_content_class( $classes = '' ) {
	if ( ! letterum_set_content_class( $classes ) ) {
		return;
	} else {
		// Separates classes with a single space
		echo ' ' . join( ' ', letterum_set_content_class( $classes ) );
	}
}

/**
 * Helper function
 * @see letterum_content_class
 * @param array $classes Classes for the div element.
 * @return array
 */
function letterum_set_content_class( $class = '' ) {

	// Define classes array
	$classes = array();

	// Blog Layout classes
	if ( is_home() || is_archive() ) {
		if ( get_theme_mod( 'blog_layout' ) == 'one' ) {
			$classes[] = 'list';
		}
		elseif ( get_theme_mod( 'blog_layout' ) != 'one' ) {
			$classes[] = 'grid';
		}
		else {
			$classes[] = 'grid';
		}
	}
	
	$classes = array_map( 'esc_attr', $classes );

	// Apply filters
	$classes = apply_filters( 'letterum_set_content_class', $classes );

	// Classes array
	return array_unique( $classes );
}

/**
 * Prints the classes for a div wrap of the posts layout.
 *
 * @param string|array $class
 * One or more classes to add to the class list.
 */
function letterum_layout_class( $classes = '' ) {
	// Separates classes with a single space
	echo 'class="' . join( ' ', letterum_set_layout_class( $classes ) ) . '"';
}

/**
 * Helper function
 * @see letterum_layout_class
 * Adds custom classes to the array of layout classes.
 *
 * @param array $classes Classes for the div element.
 * @return array
 */
function letterum_set_layout_class( $class = '' ) {

	// Define classes array
	$classes = array();

	// Blog Layout classes
	if ( ( is_home() || is_archive() ) && ! is_post_type_archive( 'portfolio' ) ) {
		if ( get_theme_mod( 'blog_layout' ) == 'one' ) {
			$classes[] = 'entries-list';
		}
		elseif ( get_theme_mod( 'blog_layout' ) == 'three' ) {
			$classes[] = 'entries-grid grid-three-cols';
		}
		elseif ( get_theme_mod( 'blog_layout' ) == 'two' ) {
			$classes[] = 'entries-grid grid-two-cols';
		}
		else {
			$classes[] = 'entries-grid grid-three-cols';
		}
	}
	
	// Portfolio Layout classes
	if ( is_post_type_archive( 'portfolio' ) ) {
		if ( get_theme_mod( 'portfolio_posts_columns' ) == 'three' ) {
			$classes[] = 'entries-grid grid-three-cols';
		}
		elseif ( get_theme_mod( 'portfolio_posts_columns' ) == 'two' ) {
			$classes[] = 'entries-grid grid-two-cols';
		}
		else {
			$classes[] = 'entries-grid grid-three-cols';
		}
	}
	
	// Search Results Page Layout classes
	if ( is_search() ) {
			$classes[] = 'entries-list';
	}
	
	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming
	$classes = apply_filters( 'letterum_set_layout_class', $classes );

	// Classes array
	return array_unique( $classes );
}

/**
 * Helper function
 * Extracting the first's image of post
 * @see letterum_hover_bg()
 * @see letterum_hover_class()
 */
if ( ! function_exists( 'letterum_catch_image' ) ) :
	function letterum_catch_image() {
  		global $post, $posts;
  		ob_start();
  		ob_end_clean();
		$first_img = '';
  		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

			if ( 0 != $output ) {
				$first_img = $matches [1][0];
			}

   		return $first_img;
	}
endif;

/**
 * Helper function
 * @see letterum_hover_class
 * Post preview background image
 */
if ( ! function_exists( 'letterum_hover_bg' ) ) :
	function letterum_hover_bg() {
		if ( letterum_catch_image() && has_post_thumbnail() && has_post_format('image') ) {
			echo ' ';
			echo 'style="background-image: url(' . esc_url( letterum_catch_image() ) . ' );"';
		}
	}
endif;

/**
 * Adds custom classes to the array of post classes.
 * For to change images when hover
 * Post preview background image
 */
function letterum_hover_class( $classes ) {		
	if ( letterum_catch_image() && has_post_thumbnail() && has_post_format('image') && ! is_single() ) {
		$classes[] = 'hover-bg';
	}
	return $classes;
}
add_action( 'post_class', 'letterum_hover_class' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function letterum_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'letterum_pingback_header' );

/**
 * The frontpage or not.
 */
function letterum_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return an alternative title, without prefix
 * for every type used in the get_the_archive_title().
 */
function letterum_remove_archive_title_prefix( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '#', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( 'Y' );
    } elseif ( is_month() ) {
        $title = get_the_date( 'F Y' );
    } elseif ( is_day() ) {
        $title = get_the_date( get_option( 'date_format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = esc_html( _x( 'Asides', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = esc_html( _x( 'Galleries', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = esc_html( _x( 'Images', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = esc_html( _x( 'Videos', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = esc_html( _x( 'Quotes', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = esc_html( _x( 'Links', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = esc_html( _x( 'Statuses', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = esc_html( _x( 'Audio', 'post format archive title', 'letterum' ) );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = esc_html( _x( 'Chats', 'post format archive title', 'letterum' ) );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives', 'letterum' );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'letterum_remove_archive_title_prefix' );

/**
 * Custom style more link
 */
function letterum_read_more_link() {
    return '<a class="link-more button" href="' . get_permalink() . '">' . esc_html__( 'Read More', 'letterum' ) . '</a>';
}
//add_filter( 'the_content_more_link', 'letterum_read_more_link' );
//add_filter( 'excerpt_more', 'letterum_read_more_link' );


/**
 * Append a search icon to the primary menu
 * This is a sample function to show how to append an icon to the menu based on the customizer search option
 * The search icon wont actually do anything
 */
if ( ! function_exists( 'letterum_add_search_menu_item' ) ) {
	function letterum_add_search_menu_item( $items, $args ) {

		if( get_theme_mod( 'search_menu_icon' ) == true ) {
			if( $args->theme_location == 'primary' ) {
				$items .= '<li class="menu-item menu-item-search"><a href="#" class="nav-search"><i class="fa fa-search"></i></a></li>';
			}
		}
		return $items;
	}
}
add_filter( 'wp_nav_menu_items', 'letterum_add_search_menu_item', 10, 2 );