<?php
/**
 * Template part for displaying single post and page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */

?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php
			/*
			 * If a single post, show here the featured image.
			 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
			 */		
			if ( is_singular() && has_post_thumbnail( get_queried_object_id() ) && letterum( 'single_featured_image' ) != 'hidden' && letterum( 'single_featured_image_style' ) != 'overlay' ) {
				echo '<div class="single-featured-image-header">' . get_the_post_thumbnail( get_queried_object_id(), 'letterum-featured-image-crop' ) . '</div>';
			}
		?>

	<?php
		if ( has_post_thumbnail() && letterum( 'single_featured_image' ) != 'hidden' && letterum( 'single_featured_image_style' ) == 'overlay' ) {
		?>
		<div id="single-header" class="single-header-bg"<?php //letterum_single_header_bg(); ?>>
	<?php
		}
		?>
			<header class="page-header">
				<div>
				<?php
					the_title( '<h1 class="entry-title">', '</h1>' );

					if ( 'post' === get_post_type() && ( letterum( 'hide_post_date' ) != 1 || letterum( 'hide_post_author' ) != 1 ) ) : ?>
						<div class="entry-meta">
							<?php letterum_posted_on(); ?>
						</div>
				<?php
					endif;
				?>
				</div>
			</header>
	<?php
		if ( has_post_thumbnail() && letterum( 'single_featured_image' ) != 'hidden' && letterum( 'single_featured_image_style' ) == 'overlay' ) {
		?>
			<span class="overlay-header"></span>
			<div class="header-bg-image"<?php letterum_single_header_bg(); ?>></div>
		</div><!--#single-header-->
	<?php
		}
		?>

		<div class="entry-content">
				<?php
					if ( has_excerpt() ) {
						echo '<div class="content-excerpt">';
							the_excerpt();
						echo '</div>';
					}
				?>
				<?php
					the_content( sprintf(
							/* translators: %s: Name of current post. Only visible to screen readers */
							esc_html__( 'Continue reading%s', 'letterum' ),
							'<span class="screen-reader-text">' . get_the_title() . '</span>'
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'letterum' ),
						'after'  => '</div>',
					) );
				?>
		</div>

	<footer class="entry-footer">
		<?php
			if ( get_post_type() == 'portfolio' ) :
				letterum_portfolio_tax();
			endif;
			letterum_entry_footer();
		?>
	</footer>
</article>