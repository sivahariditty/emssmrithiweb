<?php
/**
 * Functions for users wanting to upgrade to premium
 *
 * @package Guten
 */

/**
 * Display the upgrade to Premium page & load styles.
 */
function guten_premium_admin_menu() {
    global $guten_upgrade_page;
    $guten_upgrade_page = add_theme_page( __( 'About Guten', 'guten' ), '<span class="premium-link">' . __( 'About Guten', 'guten' ) . '</span>', 'edit_theme_options', 'theme_info', 'guten_render_upgrade_page' );
}
add_action( 'admin_menu', 'guten_premium_admin_menu' );

/**
 * Enqueue admin stylesheet only on upgrade page.
 */
function guten_load_upgrade_page_scripts() {
    global $pagenow;
	if ( $pagenow == 'themes.php' ) {
		wp_enqueue_style( 'guten-upgrade-css', get_template_directory_uri() . '/upgrade/css/upgrade-admin.css' );
	    wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . '/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js', array( 'jquery' ), GUTEN_THEME_VERSION, true );
	    wp_enqueue_script( 'guten-upgrade-js', get_template_directory_uri() . '/upgrade/js/upgrade-custom.js', array( 'jquery' ), GUTEN_THEME_VERSION, true );
	}
}
add_action( 'admin_enqueue_scripts', 'guten_load_upgrade_page_scripts' );

/**
 * Render the premium page to download premium upgrade plugin
 */
function guten_render_upgrade_page() {
	get_template_part( 'upgrade/tpl/upgrade-page' );
}