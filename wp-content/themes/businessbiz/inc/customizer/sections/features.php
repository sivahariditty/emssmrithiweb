<?php
/**
 * Features options.
 *
 * @package Businessbiz
 */

$default = businessbiz_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_features',
	array(
		'title'      => __( 'Features Section', 'businessbiz' ),
		'priority'   => 50,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_features_section]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businessbiz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businessbiz_Switch_Control( $wp_customize, 'theme_options[disable_features_section]',
    array(
		'label' 			=> __('Enable/Disable Features Section', 'businessbiz'),
		'section'    		=> 'section_home_features',
		 'settings'  		=> 'theme_options[disable_features_section]',
		'on_off_label' 		=> businessbiz_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[features_title]', 
	array(
	'default'           => $default['features_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[features_title]', 
	array(
	'label'       => __('Section Title', 'businessbiz'),
	'section'     => 'section_home_features',   
	'settings'    => 'theme_options[features_title]',
	'active_callback' => 'businessbiz_features_active',		
	'type'        => 'text'
	)
);


// features title setting and control
$wp_customize->add_setting( 'theme_options[features_custom_img]', array(
	'type'              => 'theme_mod',
	'sanitize_callback' => 'esc_url_raw',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_options[features_custom_img]', array(
	'label'				=>  esc_html__( 'Select Image', 'businessbiz' ),
	'section'        	=> 'section_home_features',
	'settings'    		=> 'theme_options[features_custom_img]',	
	'active_callback' 	=> 'businessbiz_features_active',
) ) );



for( $i=1; $i<=4; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[features_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businessbiz_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[features_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businessbiz'), $i),
		'section'     => 'section_home_features',   
		'settings'    => 'theme_options[features_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businessbiz_features_active',
		)
	);
	
}
