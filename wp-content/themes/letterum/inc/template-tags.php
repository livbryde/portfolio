<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Letterum
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */ 
if ( ! function_exists( 'letterum_posted_on' ) ) :
	function letterum_posted_on() {
	
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date updated" datetime="%3$s">%4$s</time><time class="entry-date published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$posted_on = sprintf(
				/* translators: %s: post update. */
				esc_html_x( 'Updated on %s', 'post update', 'letterum' ),
				$time_string
			);
		} else {
			$posted_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'letterum' ),
				$time_string
			);
		}

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'letterum' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		if ( is_single() ) {		
			if ( get_theme_mod( 'post_date' ) != 1 ) {
				echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
			}
			if ( get_theme_mod( 'post_author' ) != 1 ) {
				echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			}
		}
		if ( ! is_single() ) {
			if ( get_theme_mod( 'entry_date' ) != 1 ) {
				echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
			}
			if ( get_theme_mod( 'entry_author' ) != 1 ) {
				echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			}
		}

	}
endif;

/**
 * Print comments count and link.
 */ 
if ( ! function_exists( 'letterum_entry_comment' ) ) : 
	function letterum_entry_comment() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link();
			//comments_number();
			echo '</span>';
		}
	}
endif;

/**
 * Background image of a Post Header
 * @see letterum_catch_image in the template-functions.php
 */
if ( ! function_exists( 'letterum_single_header_bg' ) ) :
	function letterum_single_header_bg() {
		if ( has_post_thumbnail() ) {
			echo ' ';
			echo 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( get_queried_object_id(), 'full' ) ) . ' );"';
		} // 'letterum-featured-image'
	}
endif;

/**
 * Print link to first category of the post
 */
if ( ! function_exists( 'letterum_entry_category' ) ) :
	function letterum_entry_category() {
		$categories = get_the_category(); 
		if( $categories[0] ) {
			echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">'. esc_html( $categories[0]->name ) .'</a>';
		}
	}
endif;

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'letterum_entry_footer' ) ) :
	function letterum_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'letterum' ) );
			if ( $categories_list && letterum( 'post_cats' ) != 1 ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in: %1$s.', 'letterum' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'letterum' ) );
			if ( $tags_list && letterum( 'post_tags' ) != 1 ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged: %1$s.', 'letterum' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'letterum' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'letterum' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'letterum_gallery' ) ) :
/**
 * Return the portfolio and post galleries.
 * 
 * Checks if there are images uploaded to the post or portfolio post and outputs them.
 * Create your own letterum_gallery() to override in a child theme.
 */
function letterum_gallery($postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) {
	$thumb_ID = get_post_thumbnail_id( $postid );
	$image_ids_raw = get_post_meta($postid, '_letterum_image_ids', true);

	//Post meta
	$embed = get_post_meta($postid, '_letterum_portfolio_embed_code', true);
	$embed2 = get_post_meta($postid, '_letterum_portfolio_embed_code_2', true);
	$embed3 = get_post_meta($postid, '_letterum_portfolio_embed_code_3', true);
	$embed4 = get_post_meta($postid, '_letterum_portfolio_embed_code_4', true);
	$video_shortcodes = get_post_meta($postid, '_letterum_portfolio_video_shortcodes', true);

	wp_reset_postdata();

	if( $image_ids_raw != '' )
	{
		$image_ids = explode(',', $image_ids_raw);
		$post_parent = null;
	} else {
		$image_ids = '';
		$post_parent = $postid;
	}

	$i = 1;

	//Pull in the image assets
	$args = array(
		'exclude' => $thumb_ID,
		'include' => $image_ids,
		'numberposts' => -1,
		'orderby' => 'post__in',
		'order' => 'ASC',
		'post_type' => 'attachment',
		'post_parent' => $post_parent,
		'post_mime_type' => 'image',
		'post_status' => null,
		);
	$attachments = get_posts($args); ?>
        
    <div class="project-assets">

		<div itemscope itemtype="http://schema.org/ImageGallery">
			
			<?php
			if( !empty($attachments) ) { 	
				
                if ( !post_password_required() ) {
					
                    foreach( $attachments as $attachment ) {

						$caption = $attachment->post_excerpt;
						$caption = ($caption) ? "$caption" : '';
						$alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;		    			
						$src = wp_get_attachment_image_src( $attachment->ID, $imagesize ); 
						?>

						<figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
							
							<?php
                            echo '<img src="'. esc_url( $src[0] ) .'"/>';

							if ($caption) { echo '<div class="project-caption">'. esc_html( htmlspecialchars($caption) ) .'</div>'; } ?>
					
						</figure>

						<?php
				    }
			    }
            }     

    echo '</div>';

} // END function letterum_gallery
endif;

if ( ! function_exists( 'letterum_portfolio_tax' ) ) :
/**
 * Print HTML with category and tags for current post.
 * Create your own letterum_portfolio_tax() to override in a child theme.
 */
function letterum_portfolio_tax() {
		// Display categories for project.
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_term_list( get_the_ID(), 'portfolio_category', '', esc_html__( ', ', 'letterum' ) );
		if ( $categories_list ) {
			echo '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
		}

		// Display tags for project.
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_term_list( get_the_ID(), 'portfolio_tag', '', esc_html__( ' #', 'letterum' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links">' . $tags_list . '</span>'; // WPCS: XSS OK.
		}
} // END function letterum_portfolio_tax
endif;