<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Businessbiz
 */

/**
 *
 * @hooked businessbiz_footer_start
 */
do_action( 'businessbiz_action_before_footer' );

/**
 * Hooked - businessbiz_footer_top_section -10
 * Hooked - businessbiz_footer_section -20
 */
do_action( 'businessbiz_action_footer' );

/**
 * Hooked - businessbiz_footer_end. 
 */
do_action( 'businessbiz_action_after_footer' );

wp_footer(); ?>

</body>  
</html>