<?php
/**
 * The main template file
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */

get_header();

if ( ( is_home() || is_archive() ) && ( is_active_sidebar( 'sidebar' ) && get_theme_mod( 'sidebar_position' ) != 'none' ) ) {
	$add_content_class = 'content-area flex-container';
	$add_main_class = 'site-main flex-item-main';
} else {
	$add_content_class = 'content-area';
	$add_main_class = 'site-main';
}
?>

	<div id="primary" class="<?php echo esc_attr( $add_content_class ); letterum_content_class(); ?>">
		<main id="main" class="<?php echo esc_attr( $add_main_class ); ?>">

		<?php
			get_template_part( 'template-parts/content', 'header' );
			
			if ( have_posts() ) : ?>
			
			<div id="entry-grid"<?php letterum_layout_class(); ?>>
			
				<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content' );
					endwhile;
				?>
				
			</div>
		<?php
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif; ?>
			
		</main>
		<?php get_sidebar(); ?>
	</div><!-- #primary -->

<?php
get_template_part( 'template-parts/navigation/pagination' );
get_footer();