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
	
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<div class="portfolio-preview-image">
				<?php the_post_thumbnail( 'letterum-preview-image' ); ?>
			</div>
		</a>
	<?php } ?>
	
		<?php
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
				?>
	</div>
</div>