<?php
/**
 * Project options.
 *
 * @package Businessbiz
 */

$default = businessbiz_get_default_theme_options();

// Featured Project Section
$wp_customize->add_section( 'section_home_project',
	array(
		'title'      => __( ' Project Section', 'businessbiz' ),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_project_section]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'businessbiz_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Businessbiz_Switch_Control( $wp_customize, 'theme_options[disable_project_section]',
    array(
		'label' 			=> __('Enable/Disable Project Section', 'businessbiz'),
		'section'    		=> 'section_home_project',
		'settings'  		=> 'theme_options[disable_project_section]',
		'on_off_label' 		=> businessbiz_switch_options(),
    )
) );

//Project Section title
$wp_customize->add_setting('theme_options[project_title]', 
	array(
	'default'           => $default['project_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[project_title]', 
	array(
	'label'       => __('Section Title', 'businessbiz'),
	'section'     => 'section_home_project',   
	'settings'    => 'theme_options[project_title]',
	'active_callback' => 'businessbiz_project_active',		
	'type'        => 'text'
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_project_items]', 
	array(
	'default' 			=> $default['number_of_project_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'businessbiz_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_project_items]', 
	array(
	'label'       => __('Number Of Project', 'businessbiz'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4.', 'businessbiz'),
	'section'     => 'section_home_project',   
	'settings'    => 'theme_options[number_of_project_items]',		
	'type'        => 'number',
	'active_callback' => 'businessbiz_project_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$number_of_project_items = businessbiz_get_option( 'number_of_project_items' );
for( $i=1; $i<=$number_of_project_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[project_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'businessbiz_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[project_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'businessbiz'), $i),
		'section'     => 'section_home_project',   
		'settings'    => 'theme_options[project_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'businessbiz_project_active',
		)
	);

	// project read more setting and control
	$wp_customize->add_setting( 'theme_options[project_read_more_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'theme_options[project_read_more_' . $i . ']', array(
		'label'           	=> sprintf( __( 'Read More Text %d', 'businessbiz' ), $i ),
		'section'        	=> 'section_home_project',	
		'active_callback' 	=> 'businessbiz_project_active',
		'type'				=> 'text',
	) );
}

