/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function( $ ) {

	// To create a hidden link enabling tabbed focusing of mobile nav links when clicking mobile nav toggle.
	// An edgy case but still desirable for accessibility.
	var $hiddenLink = $( '<a href="#" class="hidden-link visually-hidden"></a>' );

	function mobileNavToggle( toggler, toggled ) {
		var $toggler = $( toggler );

		if ( ! $toggler.length ) {
			return;
		}

		var $toggled = $( toggled );

		if ( ! $toggled.length ) {
			$toggler.hide();
			return;
		}

		$toggler.click( function( e ) {
			e.preventDefault();

			$toggled.toggleClass( 'toggle-open' );

			var $body = $( 'body' );
			var cssTop = 'calc(' + $body.css( 'padding-top' ) + ' + ' + $toggler.outerHeight() + 'px)';

			if ( $toggled.hasClass( 'toggle-open' ) ) {
				$toggled.css( 'top', cssTop );
			} else {
				$toggled.css( 'top', '' );
			}

			if ( toggler === '.nav-toggle-search' ) {
				if ( $toggled.hasClass( 'toggle-open' ) ) {
					$( '#header .search-field' ).focus();
				}
			} else if ( toggler === '.nav-toggle-menu' ) {
				var $header = $( '#header' );

				if ( ! $header.length ) {
					return;
				}

				$header.toggleClass( 'menu-open' );

				if ( $toggled.hasClass( 'toggle-open' ) ) {
					if ( ! $toggled.find( '.hidden-link' ).length ) {
						$hiddenLink.prependTo( $toggled );
					}

					// Focus on hidden link, now previous to 1st nav link, so when users tab, they highlight 1st nav link.
					$hiddenLink.focus();
				} else {
					$hiddenLink.detach();
				}
			}
		});
	}

	$( document ).ready( function() {
		function resetFooterHeight() {
			var $body = $( 'body' );
			var $footer = $( 'footer[role="contentinfo"]' );
			var footerHeight = $footer.length ? $footer.outerHeight() + 'px' : '';

			$footer.css( 'height', 'auto' );

			if ( $body.hasClass( 'admin-bar' ) ) {
				var htmlMarginTop = $( 'html' ).css( 'margin-top' );
				var offsetHeight = $body.css( 'top' );

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

		var $headerContainer = $( '.header-container' );
		var $widgetArea = $( '#widget-area' );
		var headerBgImg = $widgetArea.css( 'background-image' );

		if ( headerBgImg ) {
			$headerContainer.css( 'background', headerBgImg + ' 0 0 / cover no-repeat fixed' );
			$widgetArea.css( 'background-image', '' );
		}

		resetFooterHeight();

		mobileNavToggle( '.nav-toggle-search', '#header .search-form' );
		mobileNavToggle( '.nav-toggle-menu', '#header div.nav, #header div[class^="menu-"]' );

		$( window ).resize( function() {
			var $searchBlock = $( '#header .search-form' );
			var $mainMenuBlock = $( '#header div.nav, #header div[class^="menu-"]' );

			if ( $searchBlock.length && $searchBlock.hasClass( 'toggle-open' ) ) {
				$searchBlock.removeClass( 'toggle-open' );
				$searchBlock.css( 'top', '' );
			}

			if ( $mainMenuBlock.length && $mainMenuBlock.hasClass( 'toggle-open' ) ) {
				$mainMenuBlock.removeClass( 'toggle-open' );
				$mainMenuBlock.css( 'top', '' );
			}

			resetFooterHeight();
		} );
	} );

} )( jQuery );
