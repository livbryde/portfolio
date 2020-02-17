<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Letterum
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer wrap-inner">
		<div class="site-info">
			<?php
				if ( letterum( 'disable_date_copy' ) != 1 ) {
				?>
				<span class="copywrite"><?php echo '&copy; '. date_i18n( 'Y' ) . '&nbsp;'; ?></span>
			<?php
				}
				if ( letterum( 'copyright' ) ) {
					echo '<span class="copywrite-text">';
					echo esc_attr( letterum( 'copyright' ) );
					echo '.</span> ';
				}
				get_template_part( 'template-parts/footer/credits' );
			?>
		</div>
			<?php get_template_part( 'template-parts/footer/social', 'menu' ); ?>
	</footer><!-- #colophon -->
	<div class="back-to-top show"><?php esc_attr_e( 'Back to Top', 'letterum' ); ?></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
