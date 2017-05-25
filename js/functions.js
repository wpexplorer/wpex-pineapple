 /**
 * Theme functions
 * Initialize all scripts and adds custom js
 *
 * @since 1.0.0
 *
 */

( function( $ ) {

	'use strict';

	var wpexFunctions = {

		/**
		 * Define cache var
		 *
		 * @since 1.0.0
		 */
		cache: {},

		/**
		 * Main Function
		 *
		 * @since 1.0.0
		 */
		init: function() {
			this.cacheElements();
			this.bindEvents();
		},

		/**
		 * Cache Elements
		 *
		 * @since 1.0.0
		 */
		cacheElements: function() {
			this.cache = {
				$window   : $( window ),
				$document : $( document )
			};
		},

		/**
		 * Bind Events
		 *
		 * @since 1.0.0
		 */
		bindEvents: function() {

			// Get sef
			var self = this;

			// Run on document ready
			self.cache.$document.on( 'ready', function() {
				self.coreFunctions();
				self.scrollTop();
			} );

		},

		/**
		 * Main theme functions
		 *
		 * @since 1.0.0
		 */
		coreFunctions: function() {

			var self = this;
		   
			// Add class to last pingback for styling purposes
			$( ".commentlist li.pingback" ).last().addClass( 'last' );

			// Responsive videos
			$( '.wpex-responsive-embed' ).fitVids( {
				ignore: '.wpex-fitvids-ignore'
			} );
			$( '.wpex-responsive-embed' ).addClass( 'wpex-show' );

		},

		/**
		 * Scroll top function
		 *
		 * @since 1.0.0
		 */
		scrollTop: function() {

			var $scrollTopLink = $( 'a.wpex-site-scroll-top' );

			this.cache.$window.scroll(function () {
				if ( $( this ).scrollTop() > 100 ) {
					$scrollTopLink.addClass( 'show' );
				} else {
					$scrollTopLink.removeClass( 'show' );
				}
			} );

			$scrollTopLink.on( 'click', function() {
				$( 'html, body' ).animate( {
					scrollTop : 0
				}, 400 );
				return false;
			} );

		}

	}; // END wpexFunctions

	// Get things going
	wpexFunctions.init();

} ) ( jQuery );