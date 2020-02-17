<?php
/**
 * Template part for displaying content of the wide page template
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			if ( has_post_thumbnail( get_queried_object_id() ) ) :
				echo '<div class="single-featured-image-header">' . get_the_post_thumbnail( get_queried_object_id(), 'letterum-featured-image' ) . '</div>';
			endif;
		?>

		<header class="page-header">
			<div>
				<?php
						the_title( '<h1 class="entry-title">', '</h1>' );
						if( has_excerpt() ):
							the_excerpt();
						endif;
						?>
			</div>
		</header>

		<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'letterum' ),
						'after'  => '</div>',
					) );
				?>
		</div>
	
</article>