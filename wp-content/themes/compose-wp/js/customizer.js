/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 * Things like site title and description changes.
 */

( function( $ ) {
	// Site title and description.
	// wp.customize( 'blogname', function( value ) {
		// value.bind( function( to ) {
			// $( '.site-title' ).text( to );
		// } );
	// } );
	// wp.customize( 'blogdescription', function( value ) {
		// value.bind( function( to ) {
			// $( '.site-description' ).text( to );
		// } );
	// } );
	
	wp.customize( 'compose_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to );
        } );
    });
	
	wp.customize( 'compose_link_hover_color', function( value ) {
        value.bind( function( to ) {
            $( 'a:hover, .btn-link:hover' ).css( 'color', to );
        } );
    });
	
	wp.customize( 'compose_navbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.navbar' ).css( 'background-color', to );
        } );
    });
	
	wp.customize( 'compose_navbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.navbar' ).css( 'border-color', to );
        } );
    });
	
	wp.customize( 'compose_navbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.primary-navigation ul ul, .primary-navigation li:hover' ).css( 'background-color', to );
        } );
    });
	
	
	wp.customize( 'compose_navbghover_color', function( value ) {
        value.bind( function( to ) {
            $( '.nav > li > a:hover, .primary-navigation li:hover, .primary-navigation li .current-menu-item li a, .primary-navigation li .current-menu-item a, .primary-navigation .current-menu-item a, .navbar-inverse .navbar-nav>.active>a,.navbar-inverse .navbar-nav>.active>a:hover,.navbar-inverse .navbar-nav>.active>a:focus' ).css( 'background', to );
        } );
    });
	
	wp.customize( 'compose_navbglink_color', function( value ) {
        value.bind( function( to ) {
            $( '.navbar .nav > li > a, .primary-navigation a' ).css( 'color', to );
        } );
    });
	
	wp.customize( 'compose_frbg_color', function( value ) {
        value.bind( function( to ) {
            $( '.compose-footer' ).css( 'background', to );
        } );
    });	
	
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' == to ) {
				if ( 'remove-header' == _wpCustomizeSettings.values.header_image )
					$( '.home-link' ).css( 'min-height', '0' );
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.home-link' ).css( 'min-height', '230px' );
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	
} )( jQuery );