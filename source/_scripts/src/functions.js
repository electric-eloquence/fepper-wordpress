/**
 * Theme functions file.
 *
 * Contains handlers for navigation and widget area.
 */

( function () {
	'use strict';

	var body, togglerSearch, togglerMenu, navSearch, navMenu, hiddenLinkSearch, hiddenLinkMenu;

	body = document.body;

	// Create hidden links enabling tabbed focusing of mobile nav links when clicking mobile nav toggle.
	// An edgy case but still desirable for accessibility.
	hiddenLinkSearch = document.createElement( 'a' );
	hiddenLinkMenu = document.createElement( 'a' );
	hiddenLinkSearch.className = "hidden-link visually-hidden";
	hiddenLinkMenu.className = "hidden-link visually-hidden";
	hiddenLinkSearch.href = "#";
	hiddenLinkMenu.href = "#";

	hiddenLinkSearch.addEventListener( 'focus', function () {
		togglerSearch.classList.add( 'focused' );
	} );

	hiddenLinkMenu.addEventListener( 'focus', function () {
		togglerMenu.classList.add( 'focused' );
	} );

	hiddenLinkSearch.addEventListener( 'keydown', function ( e ) {
		if ( e.keyCode === 13 ) { // If the Enter key is hit.
			togglerSearch.dispatchEvent( 'click' );
		}
	} );

	hiddenLinkMenu.addEventListener( 'keydown', function ( e ) {
		if ( e.keyCode === 13 ) { // If the Enter key is hit.
			togglerMenu.dispatchEvent( 'click' );
		}
	} );

	hiddenLinkSearch.addEventListener( 'blur', function () {
		togglerSearch.classList.remove( 'focused' );
	} );

	hiddenLinkMenu.addEventListener( 'blur', function () {
		togglerMenu.classList.remove( 'focused' );
	} );

	function mobileNavToggle( toggler, toggled ) {
		var hiddenLink;

		if ( ! toggler || ! toggled ) {
			return;
		}

		hiddenLink = toggled.querySelector( '.hidden-link' );

		if ( ! hiddenLink ) {
			if ( toggler.classList.contains( 'nav-toggle-search' ) ) {
				toggled.insertBefore( hiddenLinkSearch, toggled.querySelector( 'label' ) );
			} else if ( toggler.classList.contains( 'nav-toggle-menu' ) ) {
				toggled.insertBefore( hiddenLinkMenu, toggled.querySelector( 'ul' ) );
			}

			hiddenLink = toggled.querySelector( '.hidden-link' );
		}

		toggler.addEventListener( 'click', function ( e ) {
			var bodyPaddingTop, cssTop, navToggles, navToggleTop, togglerHeight;

			e.preventDefault();
			toggled.classList.toggle( 'toggle-open' );

			if ( toggled.classList.contains( 'toggle-open' ) ) {
				bodyPaddingTop = parseInt( getComputedStyle( document.body ).paddingTop, 10 );
				navToggles = document.getElementsByClassName( 'nav-toggle' );
				navToggleTop = parseInt( getComputedStyle( navToggles[ navToggles.length - 1 ].parentElement ).paddingTop, 10 );
				togglerHeight = toggler.getBoundingClientRect().height;
				cssTop = ( bodyPaddingTop + navToggleTop + togglerHeight ) + 'px';
				toggled.style.top = cssTop;

				// Focus on hidden link, now previous to 1st nav link, so when users tab, they highlight 1st nav link.
				hiddenLink.focus();
			} else {
				toggled.style.top = '';
				toggler.blur();
			}
		} );
	}

	document.addEventListener( 'DOMContentLoaded', function () {
		var headerContainer, widgetArea, headerBgImg;

		function resetFooterHeight() {
			var footer = document.querySelector( 'footer[role="contentinfo"]' ),
				footerHeight = footer ? footer.getBoundingClientRect().height + 'px' : '',
				htmlMarginTop = getComputedStyle( document.documentElement ).marginTop,
				offsetHeight = getComputedStyle( body ).top;

			footer.style.height = 'auto';

			if ( body.classList.contains( 'admin-bar' ) ) {
				if ( parseInt( htmlMarginTop, 10 ) ) {
					body.style.minHeight = 'calc(100vh - ' + htmlMarginTop + ')';
				} else {
					body.style.minHeight = '';
				}

				if ( parseInt( offsetHeight, 10 ) ) {
					body.style.paddingBottom = '';
					footer.style.bottom = offsetHeight;
				} else {
					body.style.paddingBottom = footerHeight;
					footer.style.bottom = '';
				}
			} else {
				body.style.minHeight = '';
				body.style.paddingBottom = footerHeight;
				footer.style.bottom = '';
			}
		}

		headerContainer = document.querySelector( '.header-container' );
		widgetArea = document.querySelector( '#widget-area' );
		headerBgImg = getComputedStyle( widgetArea ).backgroundImage;

		if ( headerBgImg ) {
			headerContainer.style.background = headerBgImg + ' 0 0 / cover no-repeat fixed';
			widgetArea.style.backgroundImage = '';
		}

		resetFooterHeight();

		togglerSearch = document.querySelector( '.nav-toggle-search' );
		togglerMenu = document.querySelector( '.nav-toggle-menu' );

		navSearch = document.querySelector( '#header .search-form' );
		navMenu = document.querySelector( '#header div.nav, #header div[class^="menu-"]' );

		mobileNavToggle( togglerSearch, navSearch );
		mobileNavToggle( togglerMenu, navMenu );

		window.addEventListener( 'resize', function () {
			if ( navSearch && navSearch.classList.contains( 'toggle-open' ) ) {
				navSearch.classList.remove( 'toggle-open' );
				navSearch.style.top = '';
				togglerSearch.classList.remove( 'focused' );
			}

			if ( navMenu && navMenu.classList.contains( 'toggle-open' ) ) {
				navMenu.classList.remove( 'toggle-open' );
				navMenu.style.top = '';
				togglerMenu.classList.remove( 'focused' );
			}

			resetFooterHeight();
		} );

		// On wider mobile viewports (phablets and tablets), touching ".expanded" links will expand nested menus.
		// The following listener removes the focus from those links, thereby closing their expanded menus.
		body.addEventListener( 'click', function () {} );
	} );
} )();
