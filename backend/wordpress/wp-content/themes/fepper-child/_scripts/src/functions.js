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
		mobileNavToggle( '.nav-toggle-search', '.header .search-form' );
		mobileNavToggle( '.nav-toggle-menu', '.header div.nav, .header div[class^="menu-"]' );
	} );

} )( jQuery );
