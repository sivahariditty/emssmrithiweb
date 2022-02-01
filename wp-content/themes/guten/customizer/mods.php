<?php
/**
 * Functions used to implement options
 *
 * @package Customizer Library Guten
 */

/**
 * Enqueue Google Fonts
 */
function guten_customizer_fonts() {

	// Font options
	$fonts = array(
		get_theme_mod( 'guten-title-font', customizer_library_get_default( 'guten-title-font' ) ),
		get_theme_mod( 'guten-tagline-font', customizer_library_get_default( 'guten-tagline-font' ) ),
		get_theme_mod( 'guten-body-font', customizer_library_get_default( 'guten-body-font' ) ),
		get_theme_mod( 'guten-heading-font', customizer_library_get_default( 'guten-heading-font' ) )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	if ( !get_theme_mod( 'guten-disable-google-font', customizer_library_get_default( 'guten-disable-google-font' ) ) ) {
		wp_enqueue_style( 'guten_customizer_fonts', $font_uri, array(), null, 'screen' );
	}

}
add_action( 'wp_enqueue_scripts', 'guten_customizer_fonts' );
