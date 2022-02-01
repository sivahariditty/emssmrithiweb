<?php    
/**
 *Wide Range Lite Theme Customizer
 *
 * @package Wide Range Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wide_range_lite_customize_register( $wp_customize ) {	
	
	function wide_range_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function wide_range_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'wide_range_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'wide-range-lite' ),		
	) );
	
	$wp_customize->add_setting('wide_range_lite_color_scheme',array(
		'default' => '#22c7cd',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'wide_range_lite_color_scheme',array(
			'label' => __('Site Color Scheme','wide-range-lite'),			
			'description' => __('More color options in PRO Version','wide-range-lite'),
			'section' => 'colors',
			'settings' => 'wide_range_lite_color_scheme'
		))
	);	
	
	
	 //Header social icons
	$wp_customize->add_section('wide_range_lite_headersocialsection',array(
		'title' => __('Side Panel social icons','wide-range-lite'),
		'description' => __( 'Add social icons link here to display icons.', 'wide-range-lite' ),			
		'priority' => null,
		'panel' => 	'wide_range_lite_panel_area', 
	));
	
	$wp_customize->add_setting('wide_range_lite_fblink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('wide_range_lite_fblink',array(
		'label' => __('Add facebook link here','wide-range-lite'),
		'section' => 'wide_range_lite_headersocialsection',
		'setting' => 'wide_range_lite_fblink'
	));	
	
	$wp_customize->add_setting('wide_range_lite_twittlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wide_range_lite_twittlink',array(
		'label' => __('Add twitter link here','wide-range-lite'),
		'section' => 'wide_range_lite_headersocialsection',
		'setting' => 'wide_range_lite_twittlink'
	));
	
	$wp_customize->add_setting('wide_range_lite_gpluslink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wide_range_lite_gpluslink',array(
		'label' => __('Add google plus link here','wide-range-lite'),
		'section' => 'wide_range_lite_headersocialsection',
		'setting' => 'wide_range_lite_gpluslink'
	));
	
	$wp_customize->add_setting('wide_range_lite_linkedlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('wide_range_lite_linkedlink',array(
		'label' => __('Add linkedin link here','wide-range-lite'),
		'section' => 'wide_range_lite_headersocialsection',
		'setting' => 'wide_range_lite_linkedlink'
	));
	
	$wp_customize->add_setting('wide_range_lite_show_headersocialsection',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_show_headersocialsection', array(
	   'settings' => 'wide_range_lite_show_headersocialsection',
	   'section'   => 'wide_range_lite_headersocialsection',
	   'label'     => __('Check To show This Section','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Social icons Section 			
	
	// Slider Section		
	$wp_customize->add_section( 'wide_range_lite_headerslider_sections', array(
		'title' => __('Slider Section', 'wide-range-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 655 pixel.','wide-range-lite'), 
		'panel' => 	'wide_range_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('wide_range_lite_pgesdrno1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wide_range_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wide_range_lite_pgesdrno1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','wide-range-lite'),
		'section' => 'wide_range_lite_headerslider_sections'
	));	
	
	$wp_customize->add_setting('wide_range_lite_pgesdrno2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wide_range_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wide_range_lite_pgesdrno2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','wide-range-lite'),
		'section' => 'wide_range_lite_headerslider_sections'
	));	
	
	$wp_customize->add_setting('wide_range_lite_pgesdrno3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'wide_range_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('wide_range_lite_pgesdrno3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','wide-range-lite'),
		'section' => 'wide_range_lite_headerslider_sections'
	));	// Slider Section		
	
	$wp_customize->add_setting('wide_range_lite_showpageslider_sections',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_showpageslider_sections', array(
	    'settings' => 'wide_range_lite_showpageslider_sections',
	    'section'   => 'wide_range_lite_headerslider_sections',
	     'label'     => __('Check To Show This Section','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 
	// Sidebar Options
	$wp_customize->add_section('wide_range_lite_sidebar_options', array(
		'title' => __('Sidebar Options','wide-range-lite'),		
		'priority' => null,
		'panel' => 	'wide_range_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('wide_range_lite_removesidebar_from_frontapge',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_removesidebar_from_frontapge', array(
	   'settings' => 'wide_range_lite_removesidebar_from_frontapge',
	   'section'   => 'wide_range_lite_sidebar_options',
	   'label'     => __('Check to remove sidebar from front page','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//sidebar options
	 
	 
	 $wp_customize->add_setting('wide_range_lite_removesidebar_from_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_removesidebar_from_singlepost', array(
	   'settings' => 'wide_range_lite_removesidebar_from_singlepost',
	   'section'   => 'wide_range_lite_sidebar_options',
	   'label'     => __('Check to remove sidebar from single post','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//single post sidebar options
	 
	 $wp_customize->add_setting('wide_range_lite_removethumb_blogpost_and_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_removethumb_blogpost_and_singlepost', array(
	   'settings' => 'wide_range_lite_removethumb_blogpost_and_singlepost',
	   'section'   => 'wide_range_lite_sidebar_options',
	   'label'     => __('Check to remove thumbnail from blogpost and single post','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//remove features image for blog post
	 
	 
	 $wp_customize->add_setting('wide_range_lite_removesidebar_from_pages',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_removesidebar_from_pages', array(
	   'settings' => 'wide_range_lite_removesidebar_from_pages',
	   'section'   => 'wide_range_lite_sidebar_options',
	   'label'     => __('Check to remove sidebar from static front page and inner pages','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));//single post sidebar options	 
	
	
	// Front page Options
	$wp_customize->add_section('wide_range_lite_frontpage_options', array(
		'title' => __('Front Page Options','wide-range-lite'),		
		'priority' => null,
		'panel' => 	'wide_range_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('wide_range_lite_remove_contentpart_from_frontpage',array(
		'default' => false,
		'sanitize_callback' => 'wide_range_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'wide_range_lite_remove_contentpart_from_frontpage', array(
	   'settings' => 'wide_range_lite_remove_contentpart_from_frontpage',
	   'section'   => 'wide_range_lite_frontpage_options',
	   'label'     => __('Check to remove content part from front page','wide-range-lite'),
	   'type'      => 'checkbox'
	 ));// revove content part from front page
	 
	 
		 
}
add_action( 'customize_register', 'wide_range_lite_customize_register' );

function wide_range_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .blogpost_layout h2 a:hover,
        #sidebar ul li a:hover,								
        .blogpost_layout h3 a:hover,				
        .blogpost_meta a:hover,		
        .button:hover,
		.header-socialicons a:hover,			
		.sitenav ul li a:hover, 
	    .sitenav ul li.current-menu-item a,
	    .sitenav ul li.current-menu-parent a.parent,
	    .sitenav ul li.current-menu-item ul.sub-menu li a:hover,	           
		.footer-wrapper h2 span,
		.footer-wrapper ul li a:hover, 
		.footer-wrapper ul li.current_page_item a        				
            { color:<?php echo esc_html( get_theme_mod('wide_range_lite_color_scheme','#22c7cd')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover,        
        .nivo-controlNav a.active,		
		#commentform input#submit,						
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current		
		
            { background-color:<?php echo esc_html( get_theme_mod('wide_range_lite_color_scheme','#22c7cd')); ?>;}
			
		.nivo-caption .slide_more:hover,	
		.tagcloud a:hover,		
		 blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('wide_range_lite_color_scheme','#22c7cd')); ?>;}	
			
         	
    </style> 
<?php                                      
}
         
add_action('wp_head','wide_range_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wide_range_lite_customize_preview_js() {
	wp_enqueue_script( 'wide_range_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '01052019', true );
}
add_action( 'customize_preview_init', 'wide_range_lite_customize_preview_js' );