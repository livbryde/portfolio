<?php
/**
 * Template part for displaying post preview for Home and Archive page
 * Using post_class() here to add special class 'post-preview'
 * @see letterum_post_classes()
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( has_post_thumbnail() ) : ?>
		<div class="preview-featured-image">
			<a class="preview-featured-image-link" href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
				<?php
						$title_first_letter = substr( get_the_title(), 0, 1 ); // View Post
						if ( ! empty( $title_first_letter ) ) :
					?>
						<span class="thumbnail-letter">
							<?php echo esc_html( $title_first_letter ); ?>
						</span>
				<?php
						endif;
					?>
				<figure>
					<?php
						if ( letterum( 'crop_blog_featured_image' ) == 'full' ) {
							the_post_thumbnail( 'letterum-featured-image' );
						} else {
							the_post_thumbnail( 'letterum-featured-image-crop' );
						}
						?>
				</figure>
			</a>
		</div>
    <?php endif; ?>

	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
				<span class="sticky-post"></span>
		<?php endif; ?>
		<?php if ( ! is_sticky() ) : ?>
					<span class="entry-meta-category"><?php letterum_entry_category(); ?></span>
		<?php endif;
				// Post Title
				if ( get_the_title() ) {
					the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				} else { ?>
					<h2 class="title">
						<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php esc_html_e( 'Untitled', 'letterum' ); ?>
						</a>
					</h2>
		<?php
				} ?>
		<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php letterum_posted_on(); ?>
				</div>
		<?php endif; ?>
	</header>
	
	<?php if ( 'post' === get_post_type() ) : ?>
		
		<div class="entry-summary">
			<?php
				$has_more = strpos( $post->post_content, '<!--more' );
				if ( $has_more ) {
					the_content( sprintf(
							/* translators: %s: Name of current post. Only visible to screen readers */
							esc_html__( 'Continue reading%s', 'letterum' ),
							'<span class="screen-reader-text">' . get_the_title() . '</span>'
					) );
				} else {
					the_excerpt();
				}
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'letterum' ),
					'after'  => '</div>',
				) );
			?>
		</div>
	
	<?php endif; ?>
		
</article>