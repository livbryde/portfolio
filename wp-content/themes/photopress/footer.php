<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photopress
 */

?>

	</div><!-- #content -->
<?php 
if ( true == get_theme_mod( 'ig_switch', true ) ) :
do_action('instagram');
else : endif;
?>
	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( true == get_theme_mod( 'sm-footer-switch', true ) ) : do_action('social-media'); else: endif; ?>
		<div class="site-info">
		<?php if (get_theme_mod('footer_text')): ?>
			<p class="copyright"><?php echo get_theme_mod( 'footer_text' ); ?></p>
			<?php  else :?>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'photopress' ), 'photopress', '<a href="https://thepixeltribe.com/downloads/wordpress-free-portfolio-theme/" rel="designer">The Pixel Tribe</a>' ); 
			endif;
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>



