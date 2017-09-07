/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {

	function mobileNavToggle( toggler, toggled ) {
		var $toggler = $( toggler );

		$toggler.click( function( e ) {
			e.preventDefault();

			$( toggled ).toggleClass( 'toggle-open' );

			if ( toggler === '.nav-toggle-search' ) {
				$( '.header .search-field' ).focus();

			} else if ( toggler === '.nav-toggle-menu' ) {
				var $header = $( '.header' );
				var $headerLinks = $header.find( 'a' );
				var indexOf1stNavLink;

				$header.toggleClass( 'menu-open' );

				// Not using jQuery .each() because we don't want to determine indexOf1stNavLink within a callback.
				for ( var i = 0; i < $headerLinks.length; i++ ) {
					if ( $( $headerLinks[i] ).closest( '.nav' ).length ) {
						indexOf1stNavLink = i;
						break;
					}
				}

				// Focus on the header link previous to 1st nav link, so when users tab, they highlight 1st nav link.
				$( $headerLinks[indexOf1stNavLink - 1] ).focus();
				// Scroll back to top of page to offset the scrolling caused by the focus.
				$( window ).scrollTop( 0 );
				// Blur the focus so the styling side-effects of the focus aren't apparent.
				$( $headerLinks[indexOf1stNavLink - 1] ).blur();
			}
		});
	}

	$( document ).ready( function() {
		var BP_SM_MAX = 767;

		// When the nav menu is scrolled to the top of the page, fix it to the top.
		$( window ).scroll( function() {
			var $header = $( '.header' );

			var $main = $( '#main' );
			var mainHeight = $main.height();
			var mainInnerHeight = $main.innerHeight();
			var mainPaddingTop = mainInnerHeight - mainHeight;

			var $nav = $( '#widget-area + div.nav, #widget-area + div[class^="menu-"]' );
			var navOuterHeight = $nav.outerHeight();

			var $widgets = $( '#widget-area' );
			var widgetsRect = $widgets[0].getBoundingClientRect();

			// Only for larger viewports.
			if ( window.innerWidth > BP_SM_MAX ) {
				if ( widgetsRect.bottom < 0 ) {
					if ( ! $nav.hasClass( 'fixed' ) ) {
						$nav.addClass( 'fixed' );
						$main.css( 'padding-top', ( mainPaddingTop + navOuterHeight ) + 'px' );
					}
				} else {
					if ( $nav.hasClass( 'fixed' ) ) {
						$nav.removeClass( 'fixed' );
						$( '#main' ).css( 'padding-top', '' );
					}
				}
			}
		} );

		mobileNavToggle( '.nav-toggle-search', '.header .search-form' );
		mobileNavToggle( '.nav-toggle-menu', '.header div.nav, .header div[class^="menu-"]' );
	} );

} )( jQuery );
