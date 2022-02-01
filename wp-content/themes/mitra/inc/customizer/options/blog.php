<?php
/**
 * Blog Options.
 *
 * @package Mitra
 */

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
		'title'      => esc_html__( 'Blog/Archive', 'mitra' ),
		'priority'   => 100,
		'panel'      => 'theme_option_panel',
	)
);

// Setting enable_sticky_sidebar.
$wp_customize->add_setting( 'theme_options[enable_sticky_sidebar]',
	array(
		'default'           => $default['enable_sticky_sidebar'],
		'sanitize_callback' => 'mitra_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_sticky_sidebar]',
	array(
		'label'    			=> esc_html__( 'Enable Sticky Sidebar', 'mitra' ),
		'description'       => esc_html__( '(Applied for archive and single post)', 'mitra' ),
		'section'  			=> 'section_layout',
		'type'     			=> 'checkbox',
		'priority' 			=> 100,
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
		'default'           => $default['global_layout'],
		'sanitize_callback' => 'mitra_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
		'label'    => esc_html__( 'Default Sidebar Layout', 'mitra' ),
		'section'  => 'section_layout',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Sidebar / Content', 'mitra' ),
				'right-sidebar' => esc_html__( 'Content / Sidebar', 'mitra' ),
				'no-sidebar'    => esc_html__( 'Content (no sidebars)', 'mitra' ),
			),
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
		'default'           => $default['excerpt_length'],
		'sanitize_callback' => 'mitra_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
		'label'       => esc_html__( 'Excerpt Length', 'mitra' ),
		'description' => esc_html__( 'in words', 'mitra' ),
		'section'     => 'section_layout',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting readmore_text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
		'default'           => $default['readmore_text'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
		'label'    => esc_html__( 'Read More Text', 'mitra' ),
		'section'  => 'section_layout',
		'type'     => 'text',
		'priority' => 100,
	)
);