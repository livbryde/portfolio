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

<div class="cell">
	<div class="cell-inner">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		if ( has_post_thumbnail() && ! has_post_format( 'image' ) && get_post_type() != 'portfolio' ) {
		?>
		<a class="preview-featured-image-link" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<div class="preview-featured-image">
				<?php
						// Show first Letter in the Post Title
						$title_first_letter = substr( get_the_title(), 0, 1 );
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
							the_post_thumbnail( 'letterum-preview-image' );
						} else {
							the_post_thumbnail( 'letterum-preview-image-crop' );
						}
						?>
				</figure>
			</div>
		</a>
	<?php } ?>

	<?php
		if ( has_post_format( 'image' ) || get_post_type() == 'portfolio' ) {
			if ( ! has_post_thumbnail() ) {
	?>
				<a class="preview-featured-image-link" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
					<div class="preview-featured-image">
						<figure>
							<img width="600" src="<?php echo esc_url( letterum_catch_image() ); ?>" />
						</figure>
					</div>
				</a>
	<?php
			} else {
			?>
				<a class="preview-featured-image-link" href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
					<div class="preview-featured-image"<?php letterum_hover_bg(); ?>>
						<figure>
							<?php the_post_thumbnail( 'letterum-preview-image' ); ?>
						</figure>
					</div>
				</a>
	<?php
			}
		} ?>
	
		<?php
				if ( is_sticky() && ( is_front_page() || is_home() && ! is_paged() ) ) :
			?>
					<span class="sticky-post"></span>
		<?php
				endif;
				
				if ( ! is_sticky() && letterum( 'entry_cat' ) != 1 ) :
			?>
					<span class="entry-meta-category"><?php letterum_entry_category(); ?></span>
		<?php
				endif;

				if ( get_the_title() ) {
					the_title( sprintf( '<h2 class="title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				} else {
				?>
					<h2 class="title">
						<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php esc_html_e( 'Untitled', 'letterum' ); ?>
						</a>
					</h2>
		<?php
				}
				
			// Entry Summary
			if ( ! has_post_format( 'image' ) && get_post_type() != 'portfolio' ) {
				?>
				
				<div class="entry-meta">
						<?php letterum_posted_on(); ?>
				</div>
				
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
				if ( ! has_post_thumbnail() && ! has_excerpt() ) {
					$content = wp_trim_words( get_the_content(), 68, '...' );
					echo '<p>' . wp_kses_post( $content ) . '</p>';
				}
				if ( has_excerpt() ) {
					the_excerpt();
				}
				if ( has_post_thumbnail() && ! has_excerpt() ) {
					$content = wp_trim_words( get_the_excerpt(), 18, '...' );
					echo '<p>' . wp_kses_post( $content ) . '</p>';
				}
			}
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'letterum' ),
				'after'  => '</div>',
			) );
		?>
		</div>
		<?php
			} // Entry Meta - Comments
			if ( ! has_post_format( 'image' ) && get_post_type() != 'portfolio' ) {
				?>
					<div class="entry-meta">
						<?php letterum_entry_comment(); ?>
					</div>
		<?php
				}
				?>
	</article>
	</div>
</div>