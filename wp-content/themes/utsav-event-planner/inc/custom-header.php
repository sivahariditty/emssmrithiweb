<?php
/**
 * Custom header implementation
 */

function utsav_event_planner_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'utsav_event_planner_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'utsav_event_planner_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'utsav_event_planner_custom_header_setup' );

if ( ! function_exists( 'utsav_event_planner_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see utsav_event_planner_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'utsav_event_planner_header_style' );
function utsav_event_planner_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .top-header {
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'utsav-event-planner-basic-style', $custom_css );
	endif;
}
endif; // utsav_event_planner_header_style