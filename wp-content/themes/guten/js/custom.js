/**
 * Custom JS Functionality
 *
 */
( function( $ ) {
    jQuery( document ).ready( function() {
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children, .main-navigation li.menu-item-has-children' ).prepend( '<button class="menu-dropdown-btn"><i class="fa fa-angle-down"></i></button>' );
        $( '.main-navigation ul#primary-menu > li > a, .main-navigation #primary-menu > ul > li > a' ).wrapInner( '<span class="nav-span-block"></span>' );
        // Add/Remove .focus class for accessibility
        $( '.main-navigation, .guten-header-nav' ).find( 'a' ).on( 'focus blur', function() {
            $( this ).parents( 'ul, li' ).toggleClass( 'focus' );
        } );
        // Mobile nav button functionality
        $( '.menu-dropdown-btn' ).click( function(e){
            $(this).parent().toggleClass( 'open-page-item' );
        });
        // The menu button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
        });
        // True/False Aria label for accessibility
        $( '.header-menu-button' ).on( 'click', function() { 
            $( '.primary-menu nav ul' ).toggle();
            var visible = $( 'body' ).hasClass( 'show-main-menu' );
            if ( visible ) {
                $(this).attr( 'aria-expanded', 'true' );
            } else {
                $(this).attr( 'aria-expanded', 'false' );
            }
        } );

        // Show / Hide Floating Sidebar
        $( '.floating-sidebar-control' ).click( function(e){
            $( 'body' ).toggleClass( 'show-floating-sidebar' );
        });
        
        // Show / Hide Search
        $( '.menu-search' ).toggle( function(){
            $( 'body').addClass( 'show-site-search' );
            $( '.search-block input.search-field' ).focus();
        },function(){
            $( 'body').removeClass( 'show-site-search' );
        });

        // Scroll To Top Button Functionality
        $(".scroll-to-top").bind("click", function() {
            $('html, body').animate( { scrollTop: 0 }, 800 );
        });
        $(window).scroll(function(){
            if ($(this).scrollTop() > 400) {
                $('.scroll-to-top').fadeIn();
            } else {
                $('.scroll-to-top').fadeOut();
            }
        });
		
    });
    
    $(window).resize(function () {
        // Close menu if open and browser is scrolled out on mobile
        if ( $( window ).width() > 980 ) {
            $( 'body' ).removeClass( 'show-main-menu' );
        }
    });
    
    $(window).load(function() {
        // Hidden social links animate in after page load
        $( '.side-aligned-social' ).removeClass( 'hide-side-social' );
    });
    
    // Hide Search if user clicks outside
    $( document ).mouseup( function (e) {
        var container = $( '.search-block' );
        if ( !container.is( e.target ) && container.has( e.target ).length === 0 ) {
            $( 'body' ).removeClass( 'show-site-search' );
        }
    });
} )( jQuery );