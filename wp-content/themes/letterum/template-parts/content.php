<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Letterum
 */

?>

<?php
	if ( is_search() ) {
		get_template_part( 'template-parts/content', 'search' );
	}
	elseif ( is_post_type_archive( 'portfolio' ) ) {
		get_template_part( 'template-parts/portfolio', 'preview' );
	}
	else {
		if ( letterum( 'blog_layout' ) == 'one' ) {
			get_template_part( 'template-parts/content-preview' );
		} else {
			get_template_part( 'template-parts/content-preview', 'grid' );
		}
	}