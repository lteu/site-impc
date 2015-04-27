( function( $ ) {
	var body    = $( 'body' ),
		_window = $( window );
		
// Enable menu toggle for small screens.
	( function() {
		var nav = $( '#primary-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.compose', function() {
			nav.toggleClass( 'toggled-on' );
		} );
	} )();
	} )( jQuery );

// Compose Specific jQuery + JavaScript

//	- November, 2014
//		. v0.1
//		. v0.2 - added CSS class to select dropdown

	// Basic FitVids
	jQuery(".container").fitVids();
	
	// Basic FitVids
	jQuery(".container-fluid").fitVids();
	
	// Bootstrap Tooltip - This activates all tooltips with the placement at the top
	jQuery('[data-toggle="tooltip"]').tooltip();
	
	// Bootstrap Popover
	jQuery('[data-toggle="popover"]').popover({trigger: 'click'});
	
	// Add CSS class to <select> dropdowns
	jQuery(document).ready(function() {
		jQuery('select').addClass('form-control');
	});
	
	// Start Carousel
	jQuery('.carousel').carousel()