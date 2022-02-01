<?php
/**
 * Default theme options.
 *
 * @package Businessbiz
 */

if ( ! function_exists( 'businessbiz_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function businessbiz_get_default_theme_options() {

	$defaults = array();

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= true;

	// Our Service Section
	$defaults['disable_service_section']	= true;
	$defaults['service_title']	   	 		= esc_html__( 'Our Services', 'businessbiz' );

	// Project Section
	$defaults['disable_project_section']	= true;
	$defaults['number_of_project_items']	= 4;
	$defaults['project_title']	   	 		= esc_html__( 'Our Project', 'businessbiz' );


	// Featured Section
	$defaults['disable_features_section']	= true;
	$defaults['features_title']	   	 		= esc_html__( 'Our Features', 'businessbiz' );


	// Testimonial Section
	$defaults['disable_testimonial_section']	= true;
	$defaults['testimonial_title']	   	 		= esc_html__( 'Happy Customer', 'businessbiz' );


	//Cta Section	
	$defaults['disable_cta_section']	   	= true;
	$defaults['background_cta_section']		= get_template_directory_uri() .'/assets/images/default-header.jpg';
	$defaults['cta_small_description']	   	= esc_html__( 'Need More features?', 'businessbiz' );
	$defaults['cta_description']	   	 	= esc_html__( 'Get Accesss To All Features of Businessbiz', 'businessbiz' );
	$defaults['cta_button_label']	   	 	= esc_html__( 'Purchase Now', 'businessbiz' );
	$defaults['cta_button_url']	   	 		= '#';

	// Blog Section
	$defaults['disable_blog_section']		= true;
	$defaults['blog_title']	   	 			= esc_html__( 'Latest Blogs', 'businessbiz' ); 

	// Latest Section
	$defaults['disable_latest_section']		= true;
	$defaults['latest_title']	   	 		= esc_html__( 'Latest News', 'businessbiz' );

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','businessbiz');
	$defaults['excerpt_length']				= 40;
	$defaults['layout_options']				= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'businessbiz' );

	// Pass through filter.
	$defaults = apply_filters( 'businessbiz_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'businessbiz_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function businessbiz_get_option( $key ) {

		$default_options = businessbiz_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;