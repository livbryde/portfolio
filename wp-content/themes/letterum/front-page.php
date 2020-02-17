<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */
get_header();
?>

<?php
/**
 * Returns css style for section of the frontpage
 * getting value from customizer
 */
function letterum_element_style( $element ) {

	$element = $element . '_margin';
	
	if ( letterum( $element ) ) {

		// Get style from Customizer
		$style = 'style="margin-bottom: ' . esc_attr( letterum( $element ) ) . 'px;"';
		
		// Print style
		echo $style;
	}
}
?>

	<div id="primary" class="content-area front-page-content">
		<main id="main" class="site-main">
		
			<?php
			// Get elements from customizer
			$elements = letterum_front_elements_positioning();

			// Loop through elements
			foreach ( $elements as $element ) {

				// Featured Post
				if ( 'featured_post' == $element ) {
				?>
					<section id="front-featured-post"<?php letterum_element_style( $element ); ?>>
						<?php get_template_part( 'template-parts/front-page/featured', 'post' ); ?>
					</section>
			<?php
				}
				// Page Content
				if ( 'page_content' == $element ) {
				?>			
					<section id="front-page-content"<?php letterum_element_style( $element ); ?>>
						<?php get_template_part( 'template-parts/front-page/content', 'layout' ); ?>
					</section>
			<?php
				}
				// Blog Section List style
				if ( 'front_blog' == $element ) {
				?>					
					<section id="front-recent-post"<?php letterum_element_style( $element ); ?>>
						<?php
						if ( letterum( 'frontpage_posts_title' ) ) {
							echo '<div class="section-header"><h1 class="section-title align-center">';
							echo esc_html( letterum( 'frontpage_posts_title' ) );
							echo '</h1></div>';
						}
						?>
						<?php get_template_part( 'template-parts/front-page/recent-post' ); ?>
					</section>
			<?php
				}
				// Portfolio Section
				if ( 'front_portfolio' == $element ) {
				?>
					<section id="front-portfolio"<?php letterum_element_style( $element ); ?>>
						<?php
						if ( letterum( 'frontpage_portfolio_title' ) ) {
							echo '<div class="section-header"><h1 class="section-title align-center">';
							echo esc_html( letterum( 'frontpage_portfolio_title' ) );
							echo '</h1></div>';
						}
						?>
						<?php get_template_part( 'template-parts/front-page/portfolio' ); ?>
					</section>
			<?php
				}

			} ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();