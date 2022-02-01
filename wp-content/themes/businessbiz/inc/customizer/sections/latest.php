<?php
/**
 * Home Page Options.
 *
 * @package Businessbiz
 */

$default = businessbiz_get_default_theme_options();

// Latest Section
$wp_customize->add_section( 'section_home_latest',
	array(
		'title'      => __( 'Latest News Section', 'businessbiz' ),
		'priority'   => 70,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);


$wp_customize->add_setting( 'theme_options[disable_latest_section]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businessbiz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businessbiz_Switch_Control( $wp_customize, 'theme_options[disable_latest_section]',
    array(
		'label' 	=> __('Disable Latest Section', 'businessbiz'),
		'section'    			=> 'section_home_latest',
		
		'on_off_label' 		=> businessbiz_switch_options(),
    )
) );


// Latest title
$wp_customize->add_setting('theme_options[latest_title]', 
	array(
	'default'           => $default['latest_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[latest_title]', 
	array(
	'label'       => __('Section Title', 'businessbiz'),
	'section'     => 'section_home_latest',   
	'settings'    => 'theme_options[latest_title]',	
	'active_callback' => 'businessbiz_latest_active',		
	'type'        => 'text'
	)
);

// Setting  Latest Category.
$wp_customize->add_setting( 'theme_options[latest_category]',
	array(
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new businessbiz_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[latest_category]',
		array(
		'label'    => __( 'Select Category', 'businessbiz' ),
		'section'  => 'section_home_latest',
		'settings' => 'theme_options[latest_category]',	
		'active_callback' => 'businessbiz_latest_active',		
		'priority' => 100,
		)
	)
);

