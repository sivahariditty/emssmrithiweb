<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Wide Range Lite
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function wide_range_lite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'wide_range_lite_jetpack_setup' );
