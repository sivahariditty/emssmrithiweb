<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Businessbiz
 */
/**
* Hook - businessbiz_action_doctype.
*
* @hooked businessbiz_doctype -  10
*/
do_action( 'businessbiz_action_doctype' );
?>
<head>
<?php
/**
* Hook - businessbiz_action_head.
*
* @hooked businessbiz_head -  10
*/
do_action( 'businessbiz_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php

/**
* Hook - businessbiz_action_before.
*
* @hooked businessbiz_page_start - 10
*/
do_action( 'businessbiz_action_before' );

/**
*
* @hooked businessbiz_header_start - 10
*/
do_action( 'businessbiz_action_before_header' );

/**
*
*@hooked businessbiz_site_branding - 10
*@hooked businessbiz_header_end - 15 
*/
do_action('businessbiz_action_header');

/**
*
* @hooked businessbiz_content_start - 10
*/
do_action( 'businessbiz_action_before_content' );

/**
 * Banner start
 * 
 * @hooked businessbiz_banner_header - 10
*/
do_action( 'businessbiz_banner_header' );  
