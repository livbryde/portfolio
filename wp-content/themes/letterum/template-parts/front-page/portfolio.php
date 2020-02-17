<?php
/**
 * Template part for displaying recent posts.
 * @package Letterum
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	if ( get_theme_mod( 'frontpage_portfolio_columns' ) == 'two' ) {
			$classes = 'entries-grid grid-two-cols';
	}
	else {
			$classes = 'entries-grid grid-three-cols';
	}
?>

<div id="portfolio-grid" class="<?php echo esc_attr( $classes ); ?>">
	<?php
			$number = esc_attr( letterum( 'portfolio_posts_number' ) );
			// Getting posts portfolio type
			$args = array(
				'posts_per_page' => $number,
				'post_type' => 'portfolio',
			);
			$query = new WP_Query( $args );
				while ( $query->have_posts() ) :		
					$query->the_post();
					get_template_part( 'template-parts/portfolio', 'preview' );
				endwhile;
			// Reset $post
			wp_reset_postdata();
		?>
</div>