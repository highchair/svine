/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 *
 * note: This was originally intended to apply to a single menu in the DOM for
 * both mobile and desktop, but these elements were later split. Much of the
 * below was duplicated, rather than consolidated, to apply to the desktop
 * nav. It could at some point be cleaned up.
 */
( function() {
	var container, button, menu, menu_desktop, links, links_desktop, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = document.getElementById( 'mobile-nav' );
	menu_desktop = document.getElementById( 'desktop-nav' );

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName( 'a' );
	links_desktop = menu_desktop.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}
	for ( i = 0, len = links_desktop.length; i < len; i++ ) {
		links_desktop[i].addEventListener( 'focus', toggleFocusDesktop, true );
		links_desktop[i].addEventListener( 'blur', toggleFocusDesktop, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	function toggleFocusDesktop() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'desktop-nav' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

jQuery(document).ready( function($) {

	// Change a body class to prove that JS is loaded and running
	$('html').removeClass('no-js').addClass('js');

	/**
	 * Make the Main Menu for Desktop more accessible.
	 * Add some attributes that we can not easily add via WP menu functions
	 */
	$('.desktop-nav .menu-item-has-children > a').each( function( index ) {
		$(this).attr('id', 'menu-' + index).attr('role', 'button').attr('aria-haspopup', 'true').attr('aria-expanded', 'false');
		$(this).siblings('.sub-menu').attr('aria-labelledby', 'menu-' + index);
	});

	/**
	 * Now, make those child anchors into a toggle for the submenus
	 */
	$('.desktop-nav .menu-item-has-children > a').on( "click", function( e ) {
		// Now open the one that was clicked
		var expanded = $(this).attr('aria-expanded');
		if (expanded == 'false') {
			// Close all other menus
			$('.desktop-nav .menu-item-has-children > a').each( function() {
				$(this).attr('aria-expanded', 'false');
			});
			// Its currently closed, the click should open this one
			$(this).attr('aria-expanded', 'true');
		}
		if (expanded == 'true') {
			// Close all other menus
			$('#primary-menu .menu-item-has-children > a').each( function() {
				$(this).attr('aria-expanded', 'false');
			});
			// Its currently open, the click should close this one
			$(this).attr('aria-expanded', 'false');
		}
		e.preventDefault();
	});
} );
