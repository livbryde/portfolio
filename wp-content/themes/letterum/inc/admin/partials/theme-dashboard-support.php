<?php

// Define support links.
$general_questions_link = '<a href="https://wordpress.org/support/forum/how-to-and-troubleshooting/" target="_blank">' . esc_html__( 'forum', 'letterum' ) . '</a>';
$customization_link = '<a href="https://wordpress.org/support/theme/letterum/" target="_blank">' . esc_html__( 'Letterum forum', 'letterum' ) . '</a>';
$documentation_link = '<a href="http://dinevthemes.com/themes-docs/" target="_blank">' . esc_html__( 'documentation', 'letterum' ) . '</a>';
$review_link = '<a href="https://wordpress.org/support/theme/letterum/reviews/#new-post" target="_blank">' . esc_html__( 'review', 'letterum' ) . '</a>';
?>

<div class="tab-section">
    <h3 class="section-title"><?php esc_html_e( 'Looking for help?', 'letterum' ); ?></h3>

    <p><?php esc_html_e( 'Is here collected some resources that you may find helpful:', 'letterum' ); ?></p>

    <ul>
        <li>
        <?php
            /* translators: %s is a placeholder that will be replaced by a variable passed as an argument. */
            printf( esc_html__( 'If you have a general question related to WordPress, please post it on WordPress.org %s.', 'letterum' ), $general_questions_link ); // WPCS: XSS OK.
        ?>
        </li>

        <li>
        <?php
            /* translators: %s is a placeholder that will be replaced by a variable passed as an argument. */
            printf( esc_html__( 'If you have a theme specific question, please post it on %s.', 'letterum' ), $customization_link ); // WPCS: XSS OK.
        ?>
        </li>

        <li>
        <?php
            /* translators: %s is a placeholders that will be replaced by variables passed as an argument. */
            printf( esc_html__( 'Before panic, please visit our %s pages.', 'letterum' ), $documentation_link ); // WPCS: XSS OK.
        ?>
        </li>
    </ul>

    <p>
	    <?php
            /* translators: %s is a placeholders that will be replaced by variables passed as an argument. */
            printf( esc_html__( 'If this theme is useful to you then leave your %s, please. Thank you!', 'letterum' ), $review_link ); // WPCS: XSS OK.
        ?>
	</p>
</div><!-- .tab-section -->
