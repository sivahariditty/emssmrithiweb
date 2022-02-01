<?php
/**
 * utsav-event-planner: Customizer
 *
 * @package WordPress
 * @subpackage utsav-event-planner
 * @since 1.0
 */

function utsav_event_planner_customize_register( $wp_customize ) {

	$wp_customize->add_panel( 'utsav_event_planner_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'utsav-event-planner' ),
	    'description' => __( 'Description of what this panel does.', 'utsav-event-planner' ),
	) );

	$wp_customize->add_section( 'utsav_event_planner_theme_options_section', array(
    	'title'      => __( 'General Settings', 'utsav-event-planner' ),
		'priority'   => 30,
		'panel' => 'utsav_event_planner_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('utsav_event_planner_theme_options',array(
        'default' => __('Right Sidebar','utsav-event-planner'),
        'sanitize_callback' => 'utsav_event_planner_sanitize_choices'	        
	));

	$wp_customize->add_control('utsav_event_planner_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','utsav-event-planner'),
        'section' => 'utsav_event_planner_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','utsav-event-planner'),
            'Right Sidebar' => __('Right Sidebar','utsav-event-planner'),
            'One Column' => __('One Column','utsav-event-planner'),
            'Three Columns' => __('Three Columns','utsav-event-planner'),
            'Four Columns' => __('Four Columns','utsav-event-planner'),
            'Grid Layout' => __('Grid Layout','utsav-event-planner')
        ),
	));

	// Top Bar
	$wp_customize->add_section( 'utsav_event_planner_top_bar', array(
    	'title'      => __( 'Top Bar', 'utsav-event-planner' ),
		'priority'   => null,
		'panel' => 'utsav_event_planner_panel_id'
	) );

	$wp_customize->add_setting('utsav_event_planner_book_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('utsav_event_planner_book_text',array(
		'label'	=> __('Add Button Text','utsav-event-planner'),
		'section'=> 'utsav_event_planner_top_bar',
		'setting'=> 'utsav_event_planner_book_text',
		'type'=> 'text'
	));

	$wp_customize->add_setting('utsav_event_planner_book_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('utsav_event_planner_book_url',array(
		'label'	=> __('Add Button URL','utsav-event-planner'),
		'section'=> 'utsav_event_planner_top_bar',
		'setting'=> 'utsav_event_planner_book_url',
		'type'=> 'url'
	));

	//social icons
	$wp_customize->add_section( 'utsav_event_planner_social', array(
    	'title'      => __( 'Social Icons', 'utsav-event-planner' ),
		'priority'   => null,
		'panel' => 'utsav_event_planner_panel_id'
	) );

	$wp_customize->add_setting('utsav_event_planner_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('utsav_event_planner_facebook_url',array(
		'label'	=> __('Add Facebook link','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_social',
		'setting'	=> 'utsav_event_planner_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('utsav_event_planner_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('utsav_event_planner_twitter_url',array(
		'label'	=> __('Add Twitter link','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_social',
		'setting'	=> 'utsav_event_planner_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('utsav_event_planner_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('utsav_event_planner_insta_url',array(
		'label'	=> __('Add Instagram link','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_social',
		'setting'	=> 'utsav_event_planner_insta_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('utsav_event_planner_linkedin_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('utsav_event_planner_linkedin_url',array(
		'label'	=> __('Add Linkedin link','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_social',
		'setting'	=> 'utsav_event_planner_linkedin_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('utsav_event_planner_pinterest_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('utsav_event_planner_pinterest_url',array(
		'label'	=> __('Add Pintrest link','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_social',
		'setting'	=> 'utsav_event_planner_pinterest_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'utsav_event_planner_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'utsav-event-planner' ),
		'priority'   => null,
		'panel' => 'utsav_event_planner_panel_id'
	) );

	$wp_customize->add_setting('utsav_event_planner_slider_hide_show',array(
       	'default' => 'true',
       	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('utsav_event_planner_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','utsav-event-planner'),
	   	'description' => __('Image Size ( 1500px x 450 )','utsav-event-planner'),
	   	'section' => 'utsav_event_planner_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'utsav_event_planner_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'utsav_event_planner_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'utsav_event_planner_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'utsav-event-planner' ),
			'section'  => 'utsav_event_planner_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	// We Arrange 
	$wp_customize->add_section('utsav_event_planner_arrange_section',array(
		'title'	=> __('We Arrange','utsav-event-planner'),
		'description'=> __('This section will appear below the slider.','utsav-event-planner'),
		'panel' => 'utsav_event_planner_panel_id',
	));
	
	$wp_customize->add_setting('utsav_event_planner_section_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('utsav_event_planner_section_title',array(
		'label'	=> __('Section Title','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_arrange_section',
		'setting'	=> 'utsav_event_planner_section_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('utsav_event_planner_arrange_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('utsav_event_planner_arrange_cat',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','utsav-event-planner'),
		'section' => 'utsav_event_planner_arrange_section',
	));

	//Footer
    $wp_customize->add_section( 'utsav_event_planner_footer', array(
    	'title'      => __( 'Footer Text', 'utsav-event-planner' ),
		'priority'   => null,
		'panel' => 'utsav_event_planner_panel_id'
	) );

    $wp_customize->add_setting('utsav_event_planner_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('utsav_event_planner_footer_copy',array(
		'label'	=> __('Footer Text','utsav-event-planner'),
		'section'	=> 'utsav_event_planner_footer',
		'setting'	=> 'utsav_event_planner_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'utsav_event_planner_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'utsav_event_planner_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'utsav_event_planner_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'utsav_event_planner_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'utsav-event-planner' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'utsav-event-planner' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'utsav_event_planner_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'utsav_event_planner_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'utsav_event_planner_customize_register' );

function utsav_event_planner_customize_partial_blogname() {
	bloginfo( 'name' );
}

function utsav_event_planner_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function utsav_event_planner_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function utsav_event_planner_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Utsav_Event_Planner_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Utsav_Event_Planner_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Utsav_Event_Planner_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Event Planner Pro ', 'utsav-event-planner' ),
					'pro_text' => esc_html__( 'Go Pro','utsav-event-planner' ),
					'pro_url'  => esc_url( 'https://www.luzuk.com/themes/event-planner-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'utsav-event-planner-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'utsav-event-planner-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Utsav_Event_Planner_Customize::get_instance();