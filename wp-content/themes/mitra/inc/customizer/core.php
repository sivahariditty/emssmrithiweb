<?php
/**
 * Core functions.
 *
 * @package Mitra
 */

if ( ! function_exists( 'mitra_get_option' ) ) :

    /**
     * Get theme option.
     *
     * @since 1.0.0
     *
     * @param string $key Option key.
     * @return mixed Option value.
     */
    function mitra_get_option( $key ) {

        if ( empty( $key ) ) {

            return;

        }

        $mitra_default = mitra_get_default_theme_options();

        $default = ( isset( $mitra_default[ $key ] ) ) ? $mitra_default[ $key ] : '';
        $theme_options = get_theme_mod( 'theme_options', $mitra_default );
        $theme_options = array_merge( $mitra_default, $theme_options );
        $value = '';

        if ( isset( $theme_options[ $key ] ) ) {
            $value = $theme_options[ $key ];
        }

        return $value;

    }

endif;

if ( ! function_exists( 'mitra_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function mitra_get_default_theme_options() {

        $defaults = array();

        $defaults['site_identity']          = 'title-text';
        $defaults['nav_button_text']        = esc_html__( 'Contact Now', 'mitra' );
        $defaults['nav_button_link']        = '';

        $defaults['enable_sticky_sidebar']  = true;
        $defaults['global_layout']          = 'right-sidebar';
        $defaults['excerpt_length']         = 40;
        $defaults['readmore_text']          = esc_html__( 'Read More', 'mitra' );

        $defaults['copyright_text']         = esc_html__( 'Copyright &copy; [the-year] [the-site-title]. All rights reserved.', 'mitra' );
        $defaults['enable_social_icons']      = true;
        $defaults['enable_goto_top']          = true;

        return $defaults;
    }

endif;

//=============================================================
// Get all options in array
//=============================================================
if ( ! function_exists( 'mitra_get_options' ) ) :

    /**
     * Get all theme options in array.
     *
     * @since 1.0.0
     *
     * @return array Theme options.
     */
    function mitra_get_options() {

        $value = array();

        $value = get_theme_mods();

        return $value;

    }

endif;