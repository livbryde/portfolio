<?php
/**
 * Outputs numeric pagination
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) {
		return;
	}
		// Pagination.
		the_posts_pagination( array(
			'show_all'     => False,
			'end_size'     => 1,
			'mid_size'     => 1,
			'prev_next'    => True,
			'prev_text'    => esc_html__( 'Previous', 'letterum' ),
			'next_text'    => esc_html__( 'Next', 'letterum' ),
			'add_args'     => False,
			'add_fragment' => '',
			'screen_reader_text' => esc_html__( 'Posts navigation', 'letterum' ),
			'type' => 'list',
		) );