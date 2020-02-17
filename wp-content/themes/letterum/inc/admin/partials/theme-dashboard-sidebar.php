<?php

/**
 * This file is used to markup the sidebar on the dashboard page.
 * @package Letterum
 */

// Links that are used on this page.
$sidebar_links = array(
    'demo' => 'http://demos.dinevthemes.com/letterum/',
    'docs' => 'http://dinevthemes.com/documentation-category/letterum-theme-docs/',
	'premium' => 'http://dinevthemes.com/themes/letterum-pro/',
);

?>

<div class="tab-section">
    <h4 class="section-title"><?php esc_html_e( 'Demo Website', 'letterum' ); ?></h4>

    <p><?php esc_html_e( 'You can look live theme on the demo website. There you will also find a description of the main features of the theme.', 'letterum' ); ?></p>

    <p>
    <?php
        // Display a link to the demo website.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $sidebar_links['demo'] ), esc_html__( 'View Demo', 'letterum' ) );
    ?>
    </p>
</div><!-- .tab-section -->

<div class="tab-section">
    <h4 class="section-title"><?php esc_html_e( 'Theme Docs', 'letterum' ); ?></h4>

    <p><?php esc_html_e( 'Need installation help? See the Pro version documentation. There you will find some tips that can be applied to the Lite version.', 'letterum' ); ?></p>

    <p>
    <?php
        // Display a link to the theme docs.
        printf( '<a href="%1$s" target="_blank">%2$s</a>', esc_url( $sidebar_links['docs'] ), esc_html__( 'Get Help', 'letterum' ) );
    ?>
    </p>
</div><!-- .tab-section -->

<div class="tab-section">
    <h4 class="section-title"><?php esc_html_e( 'Get Much More', 'letterum' ); ?></h4>

    <p><?php esc_html_e( 'More features and one-on-one support you will get with the premium version of the theme.', 'letterum' ); ?></p>

    <p>
    <?php
        // Display link to the Premium.
        printf( '<a href="%1$s"  class="button button-primary" target="_blank">%2$s</a>', esc_url( $sidebar_links['premium'] ), esc_html__( 'Get Premium', 'letterum' ) );
    ?>
    </p>
</div><!-- .tab-section -->
