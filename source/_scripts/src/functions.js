/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {

	function mobileNavToggle( toggler, toggled ) {
		var $toggler = $( toggler );

		if ( !$toggler.length ) {
			return;
		}

		var $toggled = $( toggled );

		if ( !$toggled.length ) {
			$toggler.hide();
			return;
		}

		$toggler.click( function( e ) {
			e.preventDefault();

			$toggled.toggleClass( 'toggle-open' );

			var togglerRect = $toggler[0].getBoundingClientRect();

			if ( $toggled.hasClass( 'toggle-open' ) ) {
				$toggled.css( 'top', togglerRect.bottom + 'px');
			}

			if ( toggler === '.nav-toggle-search' ) {
				$( '.header .search-field' ).focus();

			} else if ( toggler === '.nav-toggle-menu' ) {
				var $header = $( '.header' );

				if ( !$header.length ) {
					return;
				}

				var $headerLinks = $header.find( 'a' );

				if ( !$headerLinks.length ) {
					return;
				}

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
		mobileNavToggle( '.nav-toggle-search', '.header .search-form' );
		mobileNavToggle( '.nav-toggle-menu', '.header div.nav, .header div[class^="menu-"]' );

		$( window ).resize( function() {
			var $searchBlock = $( '.header .search-form' );
			var $mainMenuBlock = $( '.header div.nav, .header div[class^="menu-"]' );

			if ( $searchBlock.length && $searchBlock.hasClass( 'toggle-open' ) ) {
				$searchBlock.removeClass( 'toggle-open' );
				$searchBlock.css( 'top', '0' );
			}

			if ( $mainMenuBlock.length && $mainMenuBlock.hasClass( 'toggle-open' ) ) {
				$mainMenuBlock.removeClass( 'toggle-open' );
				$mainMenuBlock.css( 'top', '0' );
			}
		} );
	} );

} )( jQuery );
