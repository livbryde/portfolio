<?php

$letterum_theme = wp_get_theme();
$active_tab = isset( $_GET['tab'] ) ? sanitize_text_field( wp_unslash( $_GET['tab'] ) ) : 'getting_started';

// Links that are used on this page.
$dashboard_links = array(
    'demo' => 'http://demo.dinevthemes.com/letterum/',
    'docs' => 'http://dinevthemes.com/documentation-category/letterum-theme-docs/',
    'premium' => 'http://dinevthemes.com/themes/letterum-pro/',
);

?>

<div class="wrap letterum-dashboard">

    <div class="page-header wp-clearfix">
        <div class="theme-info">
            <div class="inner">
                <h1><?php esc_html_e( 'Welcome to Letterum!', 'letterum' ) ?></h1>
                <?php printf( '<p class="ver">%1$s %2$s</p>', esc_html__( 'Version:', 'letterum' ), esc_html( $letterum_theme->Version ) ); ?>
                <p class="theme-description"><?php echo esc_html( $letterum_theme->Description ); ?></p>
                <p class="theme-promo"><?php esc_html_e( 'More features and one-on-one support you will get with the premium version of the theme.', 'letterum' ); ?></p>
                <p>
                <?php
                    // Display link to the Premium.
                    printf( '<a href="%1$s"  class="button button-primary" target="_blank">%2$s</a>', esc_url( $dashboard_links['premium'] ), esc_html__( 'Get Premium', 'letterum' ) );
                    ?>
                </p>
            </div><!-- .inner -->
        </div><!-- .theme-info -->

        <div class="theme-screenshot">
            <img src="<?php echo esc_url( LETTERUM_DIR_URI . '/screenshot.png' ); ?>" alt="<?php echo esc_attr( $letterum_theme->Name ); ?>" />
        </div><!-- .theme-screenshot -->
    </div><!-- .page-header -->

    <h2 class="nav-tab-wrapper wp-clearfix">
        <?php Letterum_Welcome_Screen::get_dashboard_page_tabs( $active_tab ); ?>
    </h2><!-- .nav-tab-wrapper -->

    <div class="tab-content wp-clearfix">
        <div class="tab-primary">
            <div class="inner">
                <?php Letterum_Welcome_Screen::get_dashboard_page_tab_content( $active_tab ); ?>
            </div><!-- .inner -->
        </div><!-- .tab-primary -->

        <div class="tab-secondary">
            <div class="inner">
                <?php require_once LETTERUM_DIR . '/inc/admin/partials/theme-dashboard-sidebar.php'; ?>
            </div><!-- .inner -->
        </div><!-- .tab-secondary -->
    </div><!-- .tab-content -->
</div><!-- .wrap.about-wrap -->
