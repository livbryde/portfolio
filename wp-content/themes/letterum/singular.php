<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Letterum
 */

get_header();

if ( ( is_active_sidebar( 'sidebar-single' ) || is_active_sidebar( 'sidebar-page' ) ) && get_theme_mod( 'sidebar_position' ) != 'none' ) {
	$add_content_class = 'content-area flex-container';
	$add_main_class = 'site-main flex-item-main';
} else {
	$add_content_class = 'content-area';
	$add_main_class = 'site-main';
}
?>

	<div id="primary" class="<?php echo esc_attr( $add_content_class ); ?>">
		<main id="main" class="<?php echo esc_attr( $add_main_class ); ?>">

		<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
			
				if ( is_singular( array( 'post', 'page', 'portfolio' ) ) ) {
					get_template_part( 'template-parts/content-singular', get_post_format() );
				} else {
					get_template_part( 'template-parts/content', get_post_type() );
				}
				
				if ( get_post_type() == 'post' || get_post_type() == 'portfolio' ) :
					// Previous/next post navigation.
					the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'letterum' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'letterum' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'letterum' ) . '</span> ' .
							'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'letterum' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				endif;
			
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>

		</main><!-- #main -->
		<?php
		if( is_singular( array( 'post', 'portfolio' ) ) ) {
			get_sidebar( 'single' );
		}
		if( get_post_type() == 'page' ) {
			get_sidebar( 'page' );
		}
		?>
	</div><!-- #primary -->

<?php
get_footer();