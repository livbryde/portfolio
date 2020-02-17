<?php

/**
 * This file is used to markup the "Getting Started" section on the dashboard page.
 *
 * @package Letterum
 */

// Links that are used on this page.
$getting_started_links = array(
    'demo' => 'http://demo.dinevthemes.com/letterum/',
    'docs' => 'http://dinevthemes.com/documentation-category/letterum-theme-doc/',
	'premium' => 'http://dinevthemes.com/themes/letterum-pro/',
	'wpforms' => 'https://wordpress.org/plugins/wpforms-lite/',
	'atomic_blocks' => 'https://wordpress.org/plugins/atomic-blocks/',
	'coblocks' => 'https://wordpress.org/plugins/coblocks/',
	'portfolio' => admin_url( 'plugin-install.php?tab=plugin-information&plugin=portfolio-post-type&section=installation' )
);

?>

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Recommended plugins', 'letterum' ); ?></h3>
	
<ul>
	<li>
	<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['wpforms'] ), esc_html__( 'Contact Form by WPForms', 'letterum' ) );
    ?>
	</li>
	<li>
	<?php
		// Display link to plugin page.
		printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['portfolio'] ), esc_html__( 'Portfolio Post Type', 'letterum' ) );
	?>	
	</li>

</ul>

    <p><?php esc_html_e( 'This theme comes with basic Gutenberg editor support and also supports plugins with additional Gutenberg editor blocks:', 'letterum' ); ?></p>
<ul>
	<li>
		<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['atomic_blocks'] ), esc_html__( 'Atomic Blocks', 'letterum' ) );
		?>
	</li>
	<li>
		<?php
        // Display link to plugin page.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $getting_started_links['coblocks'] ), esc_html__( 'CoBlocks', 'letterum' ) );
		?>
	</li>
</ul>
</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Front Page Setup', 'letterum' ); ?></h3>

    <p><?php esc_html_e( 'Create a new by going to Pages > Add New. Give your page a name (Title field).', 'letterum' ); ?></p>
	<p><?php esc_html_e( 'In the same way create a blank page for the Blog Page.', 'letterum' ); ?></p>
	<p><?php esc_html_e( 'Now you can go to Appearance > Customize > Static Front Page and choose your new created Page as your Front Page.', 'letterum' ); ?></p>

</div><!-- .tab-section -->

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Theme Options', 'letterum' ); ?></h3>

    <p><?php esc_html_e( 'You can use of the Customizer to provide you with the theme options. Press the button below to open the Customizer and start making changes.', 'letterum' ); ?></p>

    <p><a href="<?php echo wp_customize_url(); // WPCS: XSS OK. ?>" class="button" target="_blank"><?php esc_html_e( 'Customize Theme', 'letterum' ); ?></a></p>
</div><!-- .tab-section -->
