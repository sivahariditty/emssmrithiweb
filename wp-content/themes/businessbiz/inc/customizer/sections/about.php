<?php
/**
 * About options.
 *
 * @package Businessbiz
 */

$default = businessbiz_get_default_theme_options();

// Featured About Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( ' About Section', 'businessbiz' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businessbiz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businessbiz_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'businessbiz'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> businessbiz_switch_options(),
    )
) );


// about title setting and control
$wp_customize->add_setting( 'theme_options[about_custom_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'theme_options[about_custom_title]', array(
	'label'           	=>  __( 'Title ', 'businessbiz' ), 
	'section'        	=> 'section_home_about',	
	'active_callback' 	=> 'businessbiz_about_active',
	'type'				=> 'text',
) );

// about title setting and control
$wp_customize->add_setting( 'theme_options[about_custom_img]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[about_custom_img]', array(
	 'label'           	=> esc_html__( 'Select Image ', 'businessbiz' ), 
	'section'        	=> 'section_home_about',
	'settings'    		=> 'theme_options[about_custom_img]',	
	'active_callback' 	=> 'businessbiz_about_active',
) ) );

// about title setting and control
$wp_customize->add_setting( 'theme_options[about_custom_content]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'sanitize_textarea_field',
) );

$wp_customize->add_control( 'theme_options[about_custom_content]', array(
	'label'           	=>  __( 'Content ', 'businessbiz' ), 
	'section'        	=> 'section_home_about',
	'settings'    		=> 'theme_options[about_custom_content]',	
	'active_callback' 	=> 'businessbiz_about_active',
	'type'				=> 'textarea',
) );

// About Button Text
$wp_customize->add_setting('theme_options[about_btn_text]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[about_btn_text]', 
	array(
	'label'       => __('Button Label', 'businessbiz'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_btn_text]',	
	'active_callback' => 'businessbiz_about_active',	
	'type'        => 'text'
	)
);

	// About Button Url
$wp_customize->add_setting('theme_options[about_btn_url]', 
	array(

	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_control('theme_options[about_btn_url]', 
	array(
	'label'       => __('Button Url', 'businessbiz'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[about_btn_url]',	
	'active_callback' => 'businessbiz_about_active',	
	'type'        => 'url'
	)
);