<?php
/**
 * Template part for displaying content header
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */
?>
<?php
		if ( is_home() ) : ?>

			<header class="headline page-header<?php if ( ! letterum( 'blog_page_title' ) && ! letterum( 'blog_page_description' ) ) { ?> screen-reader-text<?php } ?>">
				<div>
					<h1 class="page-title">
						<?php echo esc_html( letterum( 'blog_page_title' ) ); ?>
					</h1>
					<?php if ( letterum( 'blog_page_description' ) ) { ?>
						<p><?php echo wp_kses( letterum( 'blog_page_description' ), 'post' ); ?></p>
					<?php } ?>
				</div>
			</header>
<?php
		endif;
		
		if ( is_archive() && ! is_post_type_archive( 'portfolio' ) ) : ?>
			
			<header class="headline page-header">
				<div>
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
				</div>
			</header>
<?php
		endif;
		
		if ( is_post_type_archive( 'portfolio' ) ) : ?>
			
			<header class="headline page-header<?php if ( ! letterum( 'portfolio_page_title' ) && ! letterum( 'portfolio_page_description' ) ) { ?> screen-reader-text<?php } ?>">
				<div>
					<h1 class="page-title">
						<?php echo esc_html( letterum( 'portfolio_page_title' ) ); ?>
					</h1>
					<?php if ( letterum( 'portfolio_page_description' ) ) { ?>
						<p><?php echo wp_kses( letterum( 'portfolio_page_description' ), 'post' ); ?></p>
					<?php } ?>
				</div>
			</header>
<?php
		endif;
		
		if ( is_search() && have_posts() ) : ?>
			
			<header class="page-header">
				<div>
					<h1 class="page-title">
					<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'letterum' ), '<span>' . get_search_query() . '</span>' );
					?>
					</h1>
				</div>
			</header>
			
<?php
		endif;
		
		if ( is_search() && ! have_posts() ) : ?>
			
			<header class="headline page-header">
				<div>
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'letterum' ); ?></h1>
				</div>
			</header>
			
<?php
		endif; ?>