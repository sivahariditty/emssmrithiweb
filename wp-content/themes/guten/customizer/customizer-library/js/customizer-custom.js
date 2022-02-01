/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {

    $( window ).load( function() {

        // Show / Hide Fonts Google/Websafe settings
        guten_websafe_check();
        $( '#customize-control-guten-disable-google-font input[type=checkbox]' ).on( 'change', function() {
            guten_websafe_check();
        });
        
        function guten_websafe_check() {
            if ( $( '#customize-control-guten-disable-google-font input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-title-font' ).hide();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-tagline-font' ).hide();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-body-font' ).hide();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-heading-font' ).hide();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-title-font-websafe' ).show();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-tagline-font-websafe' ).show();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-body-font-websafe' ).show();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-heading-font-websafe' ).show();
            } else {
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-title-font-websafe' ).hide();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-tagline-font-websafe' ).hide();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-body-font-websafe' ).hide();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-heading-font-websafe' ).hide();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-title-font' ).show();
                $( '#sub-accordion-section-guten-typography-section #customize-control-guten-tagline-font' ).show();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-body-font' ).show();
                $( '#sub-accordion-section-guten-typography-section-default #customize-control-guten-heading-font' ).show();
            }
        }

        // Show / Hide Header Drop Down Cart Colors
        guten_logo_boxes_check();
        $( '#customize-control-guten-show-site-title input[type=checkbox], #customize-control-guten-show-site-tagline input[type=checkbox]' ).on( 'change', function() {
            guten_logo_boxes_check();
        });
        
        function guten_logo_boxes_check() {
            if ( $( '#customize-control-guten-show-site-title input[type=checkbox]' ).is( ':checked' ) || $( '#customize-control-guten-show-site-tagline input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-title_tagline #customize-control-guten-title-tagline-position' ).show();
                $( '#sub-accordion-section-title_tagline #customize-control-guten-logo-top-pad' ).show();
            } else {
                $( '#sub-accordion-section-title_tagline #customize-control-guten-title-tagline-position' ).hide();
                $( '#sub-accordion-section-title_tagline #customize-control-guten-logo-top-pad' ).hide();
            }
        }
        
        // Show / Hide Side Social Design
        guten_social_set_check();
        $( '#customize-control-guten-site-add-side-social input[type=checkbox]' ).on( 'change', function() {
            guten_social_set_check();
        });
        
        function guten_social_set_check() {
            if ( $( '#customize-control-guten-site-add-side-social input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-social-settings #customize-control-guten-site-side-social-top' ).show();
                $( '#sub-accordion-section-guten-social-settings #customize-control-guten-side-social-look' ).show();
            } else {
                $( '#sub-accordion-section-guten-social-settings #customize-control-guten-site-side-social-top' ).hide();
                $( '#sub-accordion-section-guten-social-settings #customize-control-guten-side-social-look' ).hide();
            }
        }

        // Show / Hide Content Color Setting
        guten_color_set_boxes_check();
        $( '#customize-control-guten-remove-content-bgborder input[type=checkbox]' ).on( 'change', function() {
            guten_color_set_boxes_check();
        });
        
        function guten_color_set_boxes_check() {
            if ( $( '#customize-control-guten-remove-content-bgborder input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-panel-colors-section-pages #customize-control-guten-content-bg-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-page-content-br' ).hide();
            } else {
                $( '#sub-accordion-section-guten-panel-colors-section-pages #customize-control-guten-content-bg-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-page-content-br' ).show();
            }
        }
        
        // Show / Hide Site Boxed Color Setting
        var guten_site_boxed_select_value = $( '#customize-control-guten-site-layout select' ).val();
        guten_site_boxed_value_check( guten_site_boxed_select_value );

        $( '#customize-control-guten-site-layout select' ).on( 'change', function() {
            var guten_sboxed_select_value = $( this ).val();
            guten_site_boxed_value_check( guten_sboxed_select_value );
        } );

        function guten_site_boxed_value_check( guten_sboxed_select_value ) {
            if ( guten_sboxed_select_value == 'guten-site-boxed' ) {
                $( '#sub-accordion-section-colors #customize-control-guten-boxed-bg-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-add-sidebar-line' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-header-topbar' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-remove-content-bgborder' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-page-content-br' ).hide();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-break-blocks' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-header-topbar' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-header' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-all-content' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-footer' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-footer-bottombar' ).hide();
            } else {
                $( '#sub-accordion-section-colors #customize-control-guten-boxed-bg-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-add-sidebar-line' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-remove-content-bgborder' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-page-content-br' ).show();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-break-blocks' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-header-topbar' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-header' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-all-content' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-footer' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-break-footer-bottombar' ).show();
            }
        }

        var guten_breakpoints_select_value = $( '#customize-control-guten-menu-breakat select' ).val();
        guten_breakpoint_value_check( guten_breakpoints_select_value );

        $( '#customize-control-guten-menu-breakat select' ).on( 'change', function() {
            var guten_break_select_value = $( this ).val();
            guten_breakpoint_value_check( guten_break_select_value );
        } );

        function guten_breakpoint_value_check( guten_break_select_value ) {
            if ( guten_break_select_value == 'custom' ) {
                $( '#sub-accordion-section-guten-mobile-panel-section-breakpoints #customize-control-guten-menu-custom-breakat' ).show();
            } else {
                $( '#sub-accordion-section-guten-mobile-panel-section-breakpoints #customize-control-guten-menu-custom-breakat' ).hide();
            }
        }
        
        // Show / Hide Header Layout Settings
        var guten_header_layout_value = $( '#customize-control-guten-header-layout select' ).val();
        guten_header_layout_type_check( guten_header_layout_value );

        $( '#customize-control-guten-header-layout select' ).on( 'change', function() {
            var guten_header_select_value = $( this ).val();
            guten_header_layout_type_check( guten_header_select_value );
        });

        function guten_header_layout_type_check( guten_header_select_value ) {
            if ( guten_header_select_value == 'guten-header-default' || guten_header_select_value == 'guten-header-seven' ) {
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
            } else if ( guten_header_select_value == 'guten-header-six' ) {
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            } else if ( guten_header_select_value == 'guten-header-three' ) {
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            } else if ( guten_header_select_value == 'guten-header-four' || guten_header_select_value == 'guten-header-five' || guten_header_select_value == 'guten-header-nine' ) {
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            } else if ( guten_header_select_value == 'guten-header-two' ) {
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            } else if ( guten_header_select_value == 'guten-header-eight' ) {
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            } else {
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-topbar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-main-nav' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-site-layout' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-site #customize-control-guten-set-container-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-trans-header-border-btm' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-remove-slider-space' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-bg-opacity' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-navi-font-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-side-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-header #customize-control-guten-header-nav-align' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-nav #customize-control-guten-nav-drop-opacity' ).hide();
            }
        }

        // Show / Hide Header Drop Down Cart Colors
        guten_drop_cart_boxes_check();
        $( '#customize-control-guten-header-add-drop-cart input[type=checkbox]' ).on( 'change', function() {
            guten_drop_cart_boxes_check();
        });
        
        function guten_drop_cart_boxes_check() {
            if ( $( '#customize-control-guten-header-add-drop-cart input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-cart-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-cart-font-color' ).show();
            } else {
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-cart-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-header #customize-control-guten-header-cart-font-color' ).hide();
            }
        }
        
        // Show / Hide Slider Settings
        var guten_the_slider_select_value = $( '#customize-control-guten-slider-type select' ).val();
        guten_customizer_slider_check( guten_the_slider_select_value );

        $( '#customize-control-guten-slider-type select' ).on( 'change', function() {
            var guten_slider_select_value = $( this ).val();
            guten_customizer_slider_check( guten_slider_select_value );
        } );

        function guten_customizer_slider_check( guten_slider_select_value ) {
            if ( guten_slider_select_value == 'guten-no-slider' ) {
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-cats' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-full-width' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-sub-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-pagination' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-help-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-time' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-duration' ).hide();
            } else if ( guten_slider_select_value == 'guten-shortcode-slider' ) {
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-cats' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-full-width' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-sub-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-pagination' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-time' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-duration' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-shortcode' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-help-slider-shortcode' ).show();
            } else if ( guten_slider_select_value == 'guten-home-featured-image' ) {
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-cats' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-scroll-effect' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-full-width' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-linkto-post' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-sub-title' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-scroll' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-pagination' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-help-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-pause-oh' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-time' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-duration' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-fullwidth' ).show();
            } else {
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slidermage-fullwidth' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-help-slider-shortcode' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-time' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-duration' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-cats' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-scroll-effect' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-full-width' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-linkto-post' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-title' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-sub-title' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-auto-scroll' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-remove-pagination' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-slider #customize-control-guten-slider-pause-oh' ).show();
            }
        }

        // Show / Hide blog blocks options
        var guten_blocks_layout_value = $( '#customize-control-guten-blog-layout select' ).val();
        var guten_blocks_style_value = $( '#customize-control-guten-blog-blocks-style select' ).val();
        guten_blocks_layout_type_check( guten_blocks_layout_value, guten_blocks_style_value );

        $( '#customize-control-guten-blog-layout select' ).on( 'change', function() {
            var guten_blocks_style_value = $( '#customize-control-guten-blog-blocks-style select' ).val();
            var guten_blocks_select_value = $( this ).val();
            guten_blocks_layout_type_check( guten_blocks_select_value, guten_blocks_style_value );
        });
        function guten_blocks_layout_type_check( guten_blocks_select_value ) {
            if ( guten_blocks_select_value == 'blog-blocks-layout' ) {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-column-layout' ).show();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-blocks-style' ).show();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-blocks-spacing' ).show();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-circle-imgs' ).hide();
            } else {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-circle-imgs' ).show();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-column-layout' ).hide();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-blocks-style' ).hide();
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-blocks-spacing' ).hide();
            }
        }

        // Show / Hide footer layout settings
        var guten_foot_select_value = $( '#customize-control-guten-footer-layout select' ).val();
        guten_foot_value_check( guten_foot_select_value );

        $( '#customize-control-guten-footer-layout select' ).on( 'change', function() {
            var foot_select_value = $( this ).val();
            guten_foot_value_check( foot_select_value );
        } );

        function guten_foot_value_check( foot_select_value ) {
            if ( foot_select_value == 'guten-footer-custom' ) {
                $( '#customize-control-guten-footer-customize input[type=checkbox]' ).attr( 'checked', false );
                guten_fc_check();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-custom-cols' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-heading-font-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-top-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-bottom-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-bottombar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-bottombar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-custom' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-centeralign' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-style' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-space' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-standard' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-social' ).hide();
            } else if ( foot_select_value == 'guten-footer-none' ) {
                $( '#customize-control-guten-footer-customize input[type=checkbox]' ).attr( 'checked', false );
                guten_fc_check();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-bottombar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-top-pad' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-bottom-pad' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-space' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-custom-cols' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-bg-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-heading-font-color' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-font-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-custom' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-standard' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-social' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-centeralign' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-style' ).hide();
            } else if ( foot_select_value == 'guten-footer-standard' ) {
                $( '#customize-control-guten-footer-customize input[type=checkbox]' ).attr( 'checked', false );
                guten_fc_check();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-heading-font-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-top-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-bottom-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-bottombar-switch' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-standard' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-centeralign' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-style' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-space' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-custom-cols' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-custom' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-social' ).hide();
            } else {
                $( '#customize-control-guten-footer-customize input[type=checkbox]' ).attr( 'checked', false );
                guten_fc_check();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-top-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-bottom-pad' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-social-icon-space' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-bg-color' ).show();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-font-color' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-social' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-bottombar-switch' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-custom-cols' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize' ).hide();
                $( '#sub-accordion-section-guten-panel-colors-section-footer #customize-control-guten-footer-heading-font-color' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-custom' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-noteon-footer-standard' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-centeralign' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-widget-title-style' ).hide();
            }
        }

        // Show / Hide Footer Custom Elements
        var guten_fc_select_value = $( '#customize-control-guten-footer-custom-cols select' ).val();
        guten_fc_check( guten_fc_select_value );

        $( '#customize-control-guten-footer-custom-cols select' ).on( 'change', function() {
            var guten_check_fc_select_value = $( this ).val();
            guten_fc_check( guten_check_fc_select_value );
        } );
        $( '#customize-control-guten-footer-customize input[type=checkbox]' ).on( 'change', function() {
            var guten_fc_select_value = $( '#customize-control-guten-footer-custom-cols select' ).val();
            guten_fc_check( guten_fc_select_value );
        });

        function guten_fc_check( guten_check_fc_select_value ) {
            if ( $( '#customize-control-guten-footer-customize input[type=checkbox]' ).is( ':checked' ) ) {
                if ( guten_check_fc_select_value == 'guten-footer-custom-cols-1' ) {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
                } else if ( guten_check_fc_select_value == 'guten-footer-custom-cols-2' ) {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
                } else if ( guten_check_fc_select_value == 'guten-footer-custom-cols-3' ) {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
                } else if ( guten_check_fc_select_value == 'guten-footer-custom-cols-4' ) {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
                } else if ( guten_check_fc_select_value == 'guten-footer-custom-cols-5' ) {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).show();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).show();
                } else {
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
                }
            } else {
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-1' ).hide();
                    $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-center-col-1' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-2' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-3' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-4' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-footer #customize-control-guten-footer-customize-col-5' ).hide();
            }
        }

        // Show / Hide Page Featured Image Layout
        var guten_page_layout_value = $( '#customize-control-guten-page-fimage-layout select' ).val();
        guten_page_layout_type_check( guten_page_layout_value );

        $( '#customize-control-guten-page-fimage-layout select' ).on( 'change', function() {
            var guten_page_select_value = $( this ).val();
            guten_page_layout_type_check( guten_page_select_value );
        });

        function guten_page_layout_type_check( guten_page_select_value ) {
            if ( guten_page_select_value == 'guten-page-fimage-layout-banner' ) {
                $( '#sub-accordion-section-guten-site-layout-section-page #customize-control-guten-page-fimage-size' ).show();
                $( '#sub-accordion-section-guten-site-layout-section-page #customize-control-guten-page-fimage-fullwidth' ).show();
            } else {
                $( '#sub-accordion-section-guten-site-layout-section-page #customize-control-guten-page-fimage-size' ).hide();
                $( '#sub-accordion-section-guten-site-layout-section-page #customize-control-guten-page-fimage-fullwidth' ).hide();
            }
        }
        
        // Show / Hide Single Post Featured Image Layout
        var guten_single_page_layout_value = $( '#customize-control-guten-single-page-fimage-layout select' ).val();
        guten_single_page_layout_type_check( guten_single_page_layout_value );

        $( '#customize-control-guten-single-page-fimage-layout select' ).on( 'change', function() {
            var guten_single_page_select_value = $( this ).val();
            guten_single_page_layout_type_check( guten_single_page_select_value );
        });

        function guten_single_page_layout_type_check( guten_single_page_select_value ) {
            if ( guten_single_page_select_value == 'guten-single-page-fimage-layout-banner' ) {
                $( '#sub-accordion-section-guten-blog-section-post #customize-control-guten-single-page-fimage-size' ).show();
                $( '#sub-accordion-section-guten-blog-section-post #customize-control-guten-single-page-fimage-fullwidth' ).show();
            } else {
                $( '#sub-accordion-section-guten-blog-section-post #customize-control-guten-single-page-fimage-size' ).hide();
                $( '#sub-accordion-section-guten-blog-section-post #customize-control-guten-single-page-fimage-fullwidth' ).hide();
            }
        }

        guten_blog_list_check();
        $( '#customize-control-guten-blog-full-width input[type=checkbox]' ).on( 'change', function() {
            guten_blog_list_check();
        });
        function guten_blog_list_check() {
            if ( $( '#customize-control-guten-blog-full-width input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-full-fl-sidebar' ).show();
            } else {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-full-fl-sidebar' ).hide();
            }
        }
        guten_blog_archive_check();
        $( '#customize-control-guten-blog-cat-full-fl-sidebar input[type=checkbox]' ).on( 'change', function() {
            guten_blog_archive_check();
        });
        function guten_blog_archive_check() {
            if ( $( '#customize-control-guten-blog-cat-full-fl-sidebar input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-cat-full-fl-sidebar' ).show();
            } else {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-cat-full-fl-sidebar' ).hide();
            }
        }
        guten_blog_archive_check();
        $( '#customize-control-guten-blog-cat-full-width input[type=checkbox]' ).on( 'change', function() {
            guten_blog_archive_check();
        });
        function guten_blog_archive_check() {
            if ( $( '#customize-control-guten-blog-cat-full-width input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-cat-full-fl-sidebar' ).show();
            } else {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-cat-full-fl-sidebar' ).hide();
            }
        }
        guten_blog_search_check();
        $( '#customize-control-guten-blog-search-full-width input[type=checkbox]' ).on( 'change', function() {
            guten_blog_search_check();
        });
        function guten_blog_search_check() {
            if ( $( '#customize-control-guten-blog-search-full-width input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-search-full-fl-sidebar' ).show();
            } else {
                $( '#sub-accordion-section-guten-blog-section-blog #customize-control-guten-blog-search-full-fl-sidebar' ).hide();
            }
        }

    } );

} )( jQuery );