<?php
/**
 * Template part for displaying featured post.
 * @package Letterum
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<?php

	$featured_tag = esc_attr( letterum( 'featured_post_tag' ) );
	
	if ( ! $featured_tag ) {
		return;
	}

	// Getting posts which have tag
	$query = new WP_Query( 'tag=' . $featured_tag . '&posts_per_page=1' );
		while ( $query->have_posts() ) :					
			$query->the_post();
?>
			<div class="featured-post-wrapper">
				<div class="featured-post">
					<?php
							
							if ( has_post_thumbnail() ) :
								echo '<div class="featured-post-image">';
								echo get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'aligncenter' ) );
								echo '</div>';
							endif;
					?>
					<div class="featured-post-heading">
					<?php
						if ( letterum( 'featured_post_hide_name_tag' ) != 1 ) {
							printf( '<a href="%1$s/tag/%2$s" class="featured-meta">#%2$s</a>', esc_url( home_url() ), esc_html( $featured_tag ) );
						}
						the_title( sprintf( '<a href="%s" class="featured-title" rel="bookmark">', esc_url( get_permalink( $post->ID ) ) ), '</a>' );
					?>
					</div>
				</div>
			</div>
<?php
		endwhile;
	// Reset $post
	wp_reset_postdata();
?>