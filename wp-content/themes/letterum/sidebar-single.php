<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Letterum
 */

if ( ! is_active_sidebar( 'sidebar-single' ) || get_theme_mod( 'sidebar_position' ) == 'none' ) {
	return;
}
?>

<aside id="sidebar" class="sidebar widget-area">
	<?php dynamic_sidebar( 'sidebar-single' ); ?>
</aside><!-- #secondary -->
