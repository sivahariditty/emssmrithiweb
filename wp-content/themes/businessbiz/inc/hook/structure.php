<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Businessbiz
 */

if ( ! function_exists( 'businessbiz_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function businessbiz_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'businessbiz_action_doctype', 'businessbiz_doctype', 10 );


if ( ! function_exists( 'businessbiz_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function businessbiz_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php
}
endif;
add_action( 'businessbiz_action_head', 'businessbiz_head', 10 );

if ( ! function_exists( 'businessbiz_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function businessbiz_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'businessbiz' ); ?></a><?php
	}
endif;

add_action( 'businessbiz_action_before', 'businessbiz_page_start', 10 );

if ( ! function_exists( 'businessbiz_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function businessbiz_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'businessbiz_action_header', 'businessbiz_header_end', 15 );

if ( ! function_exists( 'businessbiz_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function businessbiz_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'businessbiz_action_before_content', 'businessbiz_content_start', 10 );

if ( ! function_exists( 'businessbiz_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function businessbiz_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === businessbiz_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-chevron-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'businessbiz_action_before_footer', 'businessbiz_footer_start' );


if ( ! function_exists( 'businessbiz_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function businessbiz_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'businessbiz_action_after_footer', 'businessbiz_footer_end', 100 );

