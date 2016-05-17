(function( $ ) {

    wp.customize( 'zenlifefree_logo', function( value ) {
        value.bind( function( to ) {
            if( to == '' ) {
                $(' #logo ').hide();
            } else {
                $(' #logo ').show();
                $(' #logo ').attr( 'src', to );
            }
        } );
    });    

    wp.customize( 'zenlifefree_lg_photo', function( value ) {
        value.bind( function( to ) {
            $( '.lg-homepage-photo' ).css( 'background-image: url', to );
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