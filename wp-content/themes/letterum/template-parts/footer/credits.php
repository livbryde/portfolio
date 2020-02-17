<?php
/**
 * Template part for displaying the Theme credits.
 * @package Letterum
 */

?>
<a href="<?php echo esc_url( 'http://wordpress.org/' ); ?>">
	<?php
		/* translators: Theme CMS name. */
		esc_html_e( 'WordPress', 'letterum' );
	?>
</a>
	<?php echo esc_html_e( 'theme by', 'letterum' ); ?>
<a href="<?php echo esc_url( 'http://dinevthemes.com/' ); ?>">
	<?php
		/* translators: Theme developer name. */
		esc_html_e( 'DinevThemes', 'letterum' );
	?>
</a>