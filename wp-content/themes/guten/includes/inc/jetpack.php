<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Guten
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function guten_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'guten_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function guten_jetpack_setup
add_action( 'after_setup_theme', 'guten_jetpack_setup' );

function guten_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/contents/content' );
	}
} // end function guten_infinite_scroll_render