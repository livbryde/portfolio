<?php
/**
 * Helper/Sanitize functions for custom customizer controls
 */

	/**
	 * 	Helper/Sanitize for sortable multi-check boxes custom control.
	 * 	choice items
	 */
	// Returns front-page sections for the customizer
	if ( ! function_exists( 'letterum_front_elements' ) ) {

		function letterum_front_elements() {

			// Default elements
			$elements = apply_filters( 'letterum_front_elements', array(
				'featured_post'    => esc_html__( 'Featured Post', 'letterum' ),
				'page_content'       		=> esc_html__( 'Page Content', 'letterum' ),
				'front_blog' 				=> esc_html__( 'Blog Posts', 'letterum' ),
				'front_portfolio' 			=> esc_html__( 'Portfolio Posts', 'letterum' ),
			) );

			// Return elements
			return $elements;

		}

	}

	// Returns front-page sections positioning
	if ( ! function_exists( 'letterum_front_elements_positioning' ) ) {

		function letterum_front_elements_positioning() {

			// Default sections
			$sections = array( 'featured_post', 'page_content', 'front_blog', 'front_portfolio' );

			// Get sections from Customizer
			$sections = get_theme_mod( 'front_sortable', $sections );

			// Turn into array if string
			if ( $sections && ! is_array( $sections ) ) {
				$sections = explode( ',', $sections );
			}

			// Apply filters for easy modification
			$sections = apply_filters( 'front_sortable', $sections );

			// Return sections
			return $sections;

		}

	}

	// Returns blog entry elements for the customizer
	if ( ! function_exists( 'letterum_entry_elements' ) ) {

		function letterum_entry_elements() {

			// Default elements
			$elements = apply_filters( 'letterum_entry_elements', array(
				'featured_image'    => esc_html__( 'Featured Image', 'letterum' ),
				'title'       		=> esc_html__( 'Title', 'letterum' ),
				'meta' 				=> esc_html__( 'Meta', 'letterum' ),
				'content' 			=> esc_html__( 'Content', 'letterum' ),
				'read_more'   		=> esc_html__( 'Read More', 'letterum' ),
			) );

			// Return elements
			return $elements;

		}

	}

	// Returns blog entry elements positioning
	if ( ! function_exists( 'letterum_entry_elements_positioning' ) ) {

		function letterum_entry_elements_positioning() {

			// Default sections
			$sections = array( 'featured_image', 'title', 'meta', 'content', 'read_more' );

			// Get sections from Customizer
			$sections = get_theme_mod( 'sample_letterum_sortable', $sections );

			// Turn into array if string
			if ( $sections && ! is_array( $sections ) ) {
				$sections = explode( ',', $sections );
			}

			// Apply filters for easy modification
			$sections = apply_filters( 'sample_letterum_sortable', $sections );

			// Return sections
			return $sections;

		}

	}

	/**
	 * Switch sanitization
	 *
	 * @param  string		Switch value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'letterum_switch_sanitization' ) ) {
		function letterum_switch_sanitization( $input ) {
			if ( true === $input ) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Radio Button and Select sanitization
	 *
	 * @since Ephemeris 1.0
	 *
	 * @param  string		Radio Button value
	 * @return integer	Sanitized value
	 */
	if ( ! function_exists( 'letterum_radio_sanitization' ) ) {
		function letterum_radio_sanitization( $input, $setting ) {
			//get the list of possible radio box or select options
         $choices = $setting->manager->get_control( $setting->id )->choices;

			if ( array_key_exists( $input, $choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		}
	}

	/**
	 * Integer sanitization
	 *
	 * @param  string		Input value to check
	 * @return integer	Returned integer value
	 */
	if ( ! function_exists( 'letterum_sanitize_integer' ) ) {
		function letterum_sanitize_integer( $input ) {
			return (int) $input;
		}
	}

	/**
	 * Text sanitization
	 *
	 * @param  string	Input to be sanitized (either a string containing a single string or multiple, separated by commas)
	 * @return string	Sanitized input
	 */
	if ( ! function_exists( 'letterum_text_sanitization' ) ) {
		function letterum_text_sanitization( $input ) {
			if ( strpos( $input, ',' ) !== false) {
				$input = explode( ',', $input );
			}
			if( is_array( $input ) ) {
				foreach ( $input as $key => $value ) {
					$input[$key] = sanitize_text_field( $value );
				}
				$input = implode( ',', $input );
			}
			else {
				$input = sanitize_text_field( $input );
			}
			return $input;
		}
	}

	/**
	 * Only allow values between a certain minimum & maxmium range
	 *
	 * @param  number	Input to be sanitized
	 * @return number	Sanitized input
	 */
	if ( ! function_exists( 'letterum_in_range' ) ) {
		function letterum_in_range( $input, $min, $max ){
			if ( $input < $min ) {
				$input = $min;
			}
			if ( $input > $max ) {
				$input = $max;
			}
		    return $input;
		}
	}