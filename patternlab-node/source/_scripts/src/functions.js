/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {

	function mobileNavToggle( toggler, toggled ) {
		$( toggler ).click( function() {
			$( toggled ).toggleClass( 'toggle-open' );
		});
	}

	$( document ).ready( function() {
		mobileNavToggle( '.nav-toggle-search', '.search-form');
		mobileNavToggle( '.nav-toggle-menu', '.nav');
	} );

} )( jQuery );
