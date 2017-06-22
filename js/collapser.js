/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


( function( $ ) {
    // console.log("Collapser Module Active.");
	$( '.collapser-container' )
		.each( function() {
                    
                    var $this = $( this );
                    
                    /* Collapse collapser */
                    $this.find('.collapser').hide();
                    
                    /* Capture title */
                    var $title = $this.find( '.collapser-title' );
                    
                    /* Create showhide button from title text */
                    var $button   = $( '<button />', { 'class': 'collapser-toggle', 'aria-expanded': false, text: $title.text()+" " })
                    .append( $( '<span />', { 'class': 'collapser-symbol', text: "chevron_right" }) );
                    
                    /* Replace title text with button */
                    $title.empty();
                    $title.append($button);
                    
                    $button.on( 'click', function( event ) {
                        var $this = $( event.currentTarget );
                        var $symbol = $this.find( '.collapser-symbol' );
                        var $collapser = $this.parent().siblings( '.collapser' );
                        
                        
                        $symbol.text( $symbol.text() === 'expand_more' ? 'chevron_right' : 'expand_more' );
                        
                        if ( ! $this.is( '.open' ) ) {
                            $this.parent().parent().siblings( '.collpase-container' ).find( 'open' ).toggleClass( 'open' ).attr( 'aria-expanded', false ).next( '.collapser' ).slideToggle( 200 );
                        }
                        
                        $this.toggleClass( 'open' ).attr( 'aria-expanded', function( index, attribute ) {
                            return 'true' !== attribute;    // toggle aria-expanded attribute
                        } );
                        
                        $collapser.slideToggle( 200 );
                    });
                    
		} );
} )( jQuery );