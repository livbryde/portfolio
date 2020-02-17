<?php
/**
 * Template part for displaying recent posts.
 * @package Letterum
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	if ( get_theme_mod( 'frontpage_posts_columns' ) == 'two' ) {
			$classes = 'entries-grid grid-two-cols';
	}
	else {
			$classes = 'entries-grid grid-three-cols';
	}
?>

<div id="recent-post-list" class="<?php echo esc_attr( $classes ); ?>">
	<?php
			$number = esc_attr( letterum( 'blog_posts_number' ) );
			// Getting posts which have tag
			$args = array(
				'posts_per_page' => $number,
				'ignore_sticky_posts' => 0
			);
			$query = new WP_Query( $args );
				while ( $query->have_posts() ) :		
					$query->the_post();
						get_template_part( 'template-parts/content-preview', 'grid' );
				endwhile;
			// Reset $post
			wp_reset_postdata();
	?>
</div>