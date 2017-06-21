/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title .super-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );
        
        // Default Template (Tucson) Year & Dates
        wp.customize ( 'jgm_tucson_year', function( value ) {
            value.bind( function( to ){
                $( '.jgm-show-year' ).text( to );
            });
        });
        wp.customize( 'jgm_tucson_start', function( value ) {
		value.bind( function( to ) {
			$( '.jgm-show-start' ).text( to );
		} );
	} );
	wp.customize( 'jgm_tucson_end', function( value ) {
		value.bind( function( to ) {
			$( '.jgm-show-end' ).text( to );
		} );
	} );
        
        // Denver Template Year & Dates
        wp.customize ( 'jgm_denver_year', function( value ) {
            value.bind( function( to ){
                $( '.jgm-show-year' ).text( to );
            });
        });
        wp.customize( 'jgm_denver_start', function( value ) {
		value.bind( function( to ) {
			$( '.jgm-show-start' ).text( to );
		} );
	} );
	wp.customize( 'jgm_denver_end', function( value ) {
		value.bind( function( to ) {
			$( '.jgm-show-end' ).text( to );
		} );
	} );
        
} )( jQuery );
