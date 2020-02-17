/** Main js */
(function( $ ) {
    'use strict';
	
	// Variables and DOM Caching.
	var $body = $( 'body' );
		
	/**
	 * Test if an iOS device.
	 */
	function checkiOS() {
		return /iPad|iPhone|iPod/.test(navigator.userAgent) && ! window.MSStream;
	}
	
	/**
	 * Test if background-attachment: fixed is supported.
	 * @link http://stackoverflow.com/questions/14115080/detect-support-for-background-attachment-fixed
	 */
	function supportsFixedBackground() {
		var el = document.createElement('div'),
			isSupported;

		try {
			if ( ! ( 'backgroundAttachment' in el.style ) || checkiOS() ) {
				return false;
			}
			el.style.backgroundAttachment = 'fixed';
			isSupported = ( 'fixed' === el.style.backgroundAttachment );
			return isSupported;
		}
		catch (e) {
			return false;
		}
	}
	
	/**
	 * Test if inline SVGs are supported.
	 * @link https://github.com/Modernizr/Modernizr/
	 */
	function supportsInlineSVG() {
		var div = document.createElement( 'div' );
		div.innerHTML = '<svg/>';
		return 'http://www.w3.org/2000/svg' === ( 'undefined' !== typeof SVGRect && div.firstChild && div.firstChild.namespaceURI );
	}
	
	// Fire on document ready.
	$( document ).ready( function() {
		if ( true === supportsFixedBackground() ) {
			document.documentElement.className += ' background-fixed-supported';
		}
		if ( true === supportsInlineSVG() ) {
			document.documentElement.className = document.documentElement.className.replace( /(\s*)no-svg(\s*)/, '$1svg$2' );
		}
	});
	
	// Add header video class after the video is loaded.
	$( document ).on( 'wp-custom-header-video-loaded', function() {
		$body.addClass( 'has-header-video' );
	});
	
	/**
	 * Masonry Layout + Jetpack Infinite Scroll.
	 */
	var $container;

	function nsc_trigger_masonry() {
		// don't proceed if $grid has not been selected
		if ( !$container ) {
			return;
		}
		// init Masonry
		$container.imagesLoaded(function(){
			$container.masonry({
				// options
				itemSelector: '.cell',
				columnWidth: '.cell',
				percentPosition: true,
				gutter: 0,
			});
		});
	}

	$(window).load(function(){
		$container = $('.entries-grid'); // this is the grid container

		nsc_trigger_masonry();

		// Triggers re-layout on infinite scroll
		$( document.body ).on( 'post-load', function () {
        
			// I removed the infinite_count code
			var $selector = $('.infinite-wrap');
			var $elements = $selector.find('.cell');
			
			if( $selector.children().length > 0 ) {
				$container.append( $elements ).masonry( 'appended', $elements, true );
				nsc_trigger_masonry();
			}
        
		});
	});

	/**
	 * Toggled.
	 */	
    $(".search-btn").on("click", function() {
        $(this).toggleClass('active');
        $(".site-search").slideToggle("fast");
    });
	
	/**
	 * Back to Top.
	 */	
    if ($('.back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = $( window ).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('.back-to-top').addClass('show');
                } else {
                    $('.back-to-top').removeClass('show');
                }
            };
        backToTop();

        $(window).on('scroll', function() {
            backToTop();
        });

        $('.back-to-top').on('click', function(e) {
            e.preventDefault();
            $('html,body').animate( {
                scrollTop: 0
            }, 800);
        });
	}

})( jQuery );