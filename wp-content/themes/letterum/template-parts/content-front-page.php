<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */

?>



<?php
	// Adds custom class to the array of post_class.
	function letterum_frontpage_wide_class( $classes ) {
		if ( is_page_template( 'templates/wide-page-template.php' ) ) {
			$classes[] = 'wide-page';
		}
			//$classes[] = 'wide-page';
			return $classes;
	}
	//add_filter('post_class', 'letterum_frontpage_wide_class');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ( letterum ( 'hide_frontpage_header' ) != 1 ) {
	?>
	<header class="page-header">
		<div>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php
				if( has_excerpt() ):
					the_excerpt();
				endif;
			?>
		</div>
	</header>
<?php
	}
	?>
	
	<?php
		if ( has_post_thumbnail( get_queried_object_id() ) ) :
			echo '<div class="single-featured-image-header">' . get_the_post_thumbnail( get_queried_object_id(), 'letterum-featured-image' ) . '</div>';
		endif; ?>

	<?php if ( '' != get_the_content() ) : ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'letterum' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
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
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
