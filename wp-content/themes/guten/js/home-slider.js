/**
 * Home Slider JS Functionality
 *
 */
( function( $ ) {

    $( document ).ready( function() {
        // Add/Remove .focus class for accessibility
        $( '.home-slider-prev, .home-slider-next' ).on( 'focus blur', function() {
            $( this ).parent().toggleClass( 'focus' );
        });
    });
    
    $(window).resize(function () {
        guten_center_slider_elements();
    }).resize();
    
    $(window).load(function() {
        guten_home_slider();
    });
    
    // Home Page Slider
    function guten_home_slider() {
        var home_slider_auto = $( '.home-slider-wrap' ).data( 'auto' );
        var home_slider_scroll_effect = $( '.home-slider-wrap' ).data( 'scroll' );
        var home_slider_duration = $( '.home-slider-wrap' ).data( 'duration' );
        var home_slider_poh = $( '.home-slider-wrap' ).data( 'poh' );
        
        $( '.home-slider' ).carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                guten_center_slider_elements();
                $( '.home-slider-wrap' ).removeClass( 'home-slider-remove' );
            },
            scroll: {
                fx: home_slider_scroll_effect,
                pauseOnHover: home_slider_poh,
                duration: home_slider_duration
            },
            auto: home_slider_auto,
            pagination: '.home-slider-pager',
            prev: '.home-slider-prev',
            next: '.home-slider-next'
        });
    }
    
    // Center default slider elements
    function guten_center_slider_elements() {
        $( '.home-slider-block' ).each( function( i ){
            $( this ).find( '.home-slider-block-inner').height( $( this ).find( '.home-slider-block-bg').outerHeight() );
        });
    }
    
} )( jQuery );