(function( $ ) {

    wp.customize( 'zenlife_logo', function( value ) {
        value.bind( function( to ) {
            $(' .logo img ').attr( 'src', to );
        } );
    });    

    wp.customize( 'zenlife_lg_photo', function( value ) {
        value.bind( function( to ) {
            $( '.lg-homepage-photo img' ).attr( 'src', to );
        } );
    });

        wp.customize( 'zenlifefree_headline_text', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #site-headline ').hide();
            } else {
                $(' #site-headline ').show();
                $(' #site-headline ').text( to );
            }
        } );
    }); 

})( jQuery );