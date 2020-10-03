/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function ( $ ) {
	'use strict';

	var $togglerSearch, $togglerMenu, $navSearch, $navMenu,
		// Create hidden links enabling tabbed focusing of mobile nav links when clicking mobile nav toggle.
		// An edgy case but still desirable for accessibility.
		$hiddenLinkSearch = $( '<a href="#" class="hidden-link visually-hidden"></a>' ),
		$hiddenLinkMenu = $( '<a href="#" class="hidden-link visually-hidden"></a>' );

	$hiddenLinkSearch.focus( function () {
		if ( ! $togglerSearch.hasClass( 'focused' ) ) {
			$togglerSearch.addClass( 'focused' );
		}
	} );

	$hiddenLinkMenu.focus( function () {
		if ( ! $togglerMenu.hasClass( 'focused' ) ) {
			$togglerMenu.addClass( 'focused' );
		}
	} );

	$hiddenLinkSearch.keydown( function ( e ) {
		if ( e.keyCode === 13 ) { // If the Enter key is hit.
			$togglerSearch.click();
		}
	} );

	$hiddenLinkMenu.keydown( function ( e ) {
		if ( e.keyCode === 13 ) { // If the Enter key is hit.
			$togglerMenu.click();
		}
	} );

	$hiddenLinkSearch.blur( function () {
		$togglerSearch.removeClass( 'focused' );
	} );

	$hiddenLinkMenu.blur( function () {
		$togglerMenu.removeClass( 'focused' );
	} );

	function mobileNavToggle( $toggler, $toggled ) {
		var $hiddenLink;

		if ( ! $toggler.length || ! $toggled.length ) {
			return;
		}

		$hiddenLink = $toggled.find( '.hidden-link' );

		if ( ! $hiddenLink.length ) {
			if ( $toggler.hasClass( 'nav-toggle-search' ) ) {
				$hiddenLinkSearch.prependTo( $toggled );
			} else if ( $toggler.hasClass( 'nav-toggle-menu' ) ) {
				$hiddenLinkMenu.prependTo( $toggled );
			}

			$hiddenLink = $toggled.find( '.hidden-link' );
		}

		$toggler.click( function ( e ) {
			var cssTop;

			e.preventDefault();
			$toggled.toggleClass( 'toggle-open' );

			if ( $toggled.hasClass( 'toggle-open' ) ) {
				cssTop = 'calc(' + $( 'body' ).css( 'padding-top' ) + ' + ' +
					( $( '.nav-toggle' ).last().position().top + $toggler.outerHeight() ) + 'px)';

				$toggled.css( 'top', cssTop );

				// Focus on hidden link, now previous to 1st nav link, so when users tab, they highlight 1st nav link.
				$hiddenLink.focus();
			} else {
				$toggled.css( 'top', '' );
				$toggler.blur();
			}
		} );
	}

	$( document ).ready( function () {
		var $headerContainer = $( '.header-container' ),
			$widgetArea = $( '#widget-area' ),
			headerBgImg = $widgetArea.css( 'background-image' );

		function resetFooterHeight() {
			var $body = $( 'body' ),
				$footer = $( 'footer[role="contentinfo"]' ),
				footerHeight = $footer.length ? $footer.outerHeight() + 'px' : '',
				htmlMarginTop = $( 'html' ).css( 'margin-top' ),
				offsetHeight = $body.css( 'top' );

			$footer.css( 'height', 'auto' );

			if ( $body.hasClass( 'admin-bar' ) ) {
				htmlMarginTop = $( 'html' ).css( 'margin-top' );
				offsetHeight = $body.css( 'top' );

				if ( parseInt( htmlMarginTop, 10 ) ) {
					$body.css( 'min-height', 'calc(100vh - ' + htmlMarginTop + ')' );
				} else {
					$body.css( 'min-height', '' );
				}

				if ( parseInt( offsetHeight, 10 ) ) {
					$body.css( 'padding-bottom', '' );
					$footer.css( 'bottom', offsetHeight );
				} else {
					$body.css( 'padding-bottom', footerHeight );
					$footer.css( 'bottom', '' );
				}
			} else {
				$body.css( 'min-height', '' );
				$body.css( 'padding-bottom', footerHeight );
				$footer.css( 'bottom', '' );
			}
		}

		$headerContainer = $( '.header-container' );
		$widgetArea = $( '#widget-area' );
		headerBgImg = $widgetArea.css( 'background-image' );

		if ( headerBgImg ) {
			$headerContainer.css( 'background', headerBgImg + ' 0 0 / cover no-repeat fixed' );
			$widgetArea.css( 'background-image', '' );
		}

		resetFooterHeight();

		$togglerSearch = $( '.nav-toggle-search' );
		$togglerMenu = $( '.nav-toggle-menu' );

		$navSearch = $( '#header .search-form' );
		$navMenu = $( '#header div.nav, #header div[class^="menu-"]' );

		mobileNavToggle( $togglerSearch, $navSearch );
		mobileNavToggle( $togglerMenu, $navMenu );

		$( window ).resize( function () {
			if ( $navSearch.length && $navSearch.hasClass( 'toggle-open' ) ) {
				$navSearch.removeClass( 'toggle-open' );
				$navSearch.css( 'top', '' );
				$togglerSearch.removeClass( 'focused' );
			}

			if ( $navMenu.length && $navMenu.hasClass( 'toggle-open' ) ) {
				$navMenu.removeClass( 'toggle-open' );
				$navMenu.css( 'top', '' );
				$togglerMenu.removeClass( 'focused' );
			}

			resetFooterHeight();
		} );

		// On wider mobile viewports (phablets and tablets), touching ".expanded" links will expand nested menus.
		// The following listener removes the focus from those links, thereby closing their expanded menus.
		$( 'body' ).click( function () {} );
	} );
} )( jQuery );
