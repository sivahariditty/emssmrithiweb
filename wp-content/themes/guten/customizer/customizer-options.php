<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Guten
 */

function customizer_library_guten_options() {

	$primary_color = '#4e87d8';
	$secondary_color = '#0b53b9';

    $header_bg_color = '#FFFFFF';
    $header_font_color = '#AAAAAA';

	$body_font_color = '#333';
	$heading_font_color = '#000';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

    // Header Image
    $section = 'title_tagline';
    
    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Identity', 'guten' ),
        'priority' => '10',
        'description' => __( 'Change the <a href="#guten-site-layout-section-header" rel="tc-section">Header Layout</a> or <a href="#guten-site-layout-section-footer" rel="tc-section">Footer Layouts</a><br />Add a <a href="#guten-site-layout-section-slider" rel="tc-section">Home Page Slider</a> to the home page<br />Change <a href="#guten-panel-colors" rel="tc-panel">Theme Layout Colors</a><br />Edit the <a href="#guten-blog-section-blog" rel="tc-section">Blog Layout</a> section<br />Edit <a href="#guten-site-layout-section-page" rel="tc-section">Pages Featured Images</a><br />Edit <a href="#guten-blog-section-post" rel="tc-section">Single Posts featured images</a><br />Add <a href="#guten-social-section" rel="tc-section">Social Links</a> to your site', 'guten' ),
    );

    $options['guten-branding-top-pad'] = array(
        'id' => 'guten-branding-top-pad',
        'label'   => __( 'Site Title top padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 40,
    );
    $options['guten-branding-bottom-pad'] = array(
        'id' => 'guten-branding-bottom-pad',
        'label'   => __( 'Site Title bottom padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 60,
    );
    $options['guten-logo-max-width'] = array(
        'id' => 'guten-logo-max-width',
        'label'   => __( 'Set a max-width for the logo', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'This only applies if a logo image is uploaded', 'guten' ),
    );
    $options['guten-show-site-title'] = array(
        'id' => 'guten-show-site-title',
        'label'   => __( 'Show Site Title (with logo uploaded)', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-show-site-tagline'] = array(
        'id' => 'guten-show-site-tagline',
        'label'   => __( 'Show Site Tagline (with logo uploaded)', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['guten-title-tagline-position'] = array(
        'id' => 'guten-title-tagline-position',
        'label'   => __( 'Float side by side', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-logo-top-pad'] = array(
        'id' => 'guten-logo-top-pad',
        'section' => $section,
        'type'    => 'number',
        'default' => 0,
        'description' => __( 'Adjust <a href="#guten-typography-section" rel="tc-section">Title & Tagline Settings</a><br /><br /><b>Adjust Logo top padding</b> (with uploaded logo)', 'guten' )
    );

    $panel = 'guten-panel-layout';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Theme Settings', 'guten' ),
        'priority' => '30'
    );

    $section = 'guten-mobile-panel-section-breakpoints';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Breakpoints', 'guten' ),
        'priority' => '10',
        'description' => __( 'Adjust some <a href="#guten-panel-mobile-settings" rel="tc-panel">Mobile/Tablet Settings</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-responsive-disable'] = array(
        'id' => 'guten-responsive-disable',
        'label'   => __( 'Disable Responsive on Guten', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-tablet-breakat'] = array(
        'id' => 'guten-tablet-breakat',
        'label'   => __( 'Tablet Breakpoint', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '980'
    );
    $options['guten-mobile-breakat'] = array(
        'id' => 'guten-mobile-breakat',
        'label'   => __( 'Mobile Breakpoint', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => '782'
    );
    $choices = array(
        'always' => __( 'Always On', 'guten' ),
        'tablet' => __( 'Tablet', 'guten' ),
        'mobile' => __( 'Mobile', 'guten' ),
        'custom' => __( 'Custom', 'guten' )
    );
    $options['guten-menu-breakat'] = array(
        'id' => 'guten-menu-breakat',
        'label'   => __( 'Menu Breakpoint', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'tablet'
    );
    $options['guten-menu-custom-breakat'] = array(
        'id' => 'guten-menu-custom-breakat',
        'label'   => __( 'Enter the breakpoint size for mobile menu', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 782,
    );

	$section = 'guten-site-layout-section-site';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Layout', 'guten' ),
		'priority' => '10',
        'description' => __( 'Change the <a href="#guten-site-layout-section-header" rel="tc-section">Header Layout</a> or <a href="#guten-site-layout-section-footer" rel="tc-section">Footer Layouts</a><br />Add a <a href="#guten-site-layout-section-slider" rel="tc-section">Home Page Slider</a> to the home page<br />Change <a href="#guten-panel-colors" rel="tc-panel">Theme Layout Colors</a><br />Edit the <a href="#guten-blog-section-blog" rel="tc-section">Blog Layout</a> section<br />Edit <a href="#guten-site-layout-section-page" rel="tc-section">Pages Featured Images</a><br />Edit <a href="#guten-blog-section-post" rel="tc-section">Single Posts featured images</a><br />Add <a href="#guten-social-section" rel="tc-section">Social Links</a> to your site', 'guten' ),
        'panel' => $panel
	);
    
    $options['guten-disable-google-font'] = array(
        'id' => 'guten-disable-google-font',
        'label'   => __( 'Disable Google Fonts', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'This will remove the connection to Google Fonts and let you select only web-safe fonts under the <a href="#guten-panel-font-settings" rel="tc-panel">Guten Font Settings</a>', 'guten' ),
        'default' => 0,
    );
    $choices = array(
        'guten-site-boxed' => __( 'Boxed Layout', 'guten' ),
        'guten-site-full-width' => __( 'Full Width Layout', 'guten' )
    );
    $options['guten-site-layout'] = array(
        'id' => 'guten-site-layout',
        'label'   => __( 'Site Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-site-full-width'
    );
    $options['guten-set-container-width'] = array(
        'id' => 'guten-set-container-width',
        'label'   => __( 'Site Container Width', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 900,
            'max'   => 1400,
            'step'  => 2,
        ),
        'description' => __( 'Set the header, content & footer widths of your site (900 pixels to 1400 pixels)', 'guten' ),
        'default' => 1240
    );
    $options['guten-set-content-width'] = array(
        'id' => 'guten-set-content-width',
        'label'   => __( 'Content Only Width', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 900,
            'max'   => 1400,
            'step'  => 2,
        ),
        'description' => __( 'Set only the content width for all pages (900 pixels to 1400 pixels)', 'guten' ),
        'default' => 1240
    );
    $options['guten-site-break-header-topbar'] = array(
        'id' => 'guten-site-break-header-topbar',
        'label'   => __( 'Set Header Top Bar to Browser Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-site-break-header'] = array(
        'id' => 'guten-site-break-header',
        'label'   => __( 'Set Header to Browser Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-site-break-all-content'] = array(
        'id' => 'guten-site-break-all-content',
        'label'   => __( 'Set All Pages Content to Browser Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-site-break-footer'] = array(
        'id' => 'guten-site-break-footer',
        'label'   => __( 'Set Footer to Browser Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-site-break-footer-bottombar'] = array(
        'id' => 'guten-site-break-footer-bottombar',
        'label'   => __( 'Set Footer Bottom Bar to Browser Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-set-sidebar-width'] = array(
        'id' => 'guten-set-sidebar-width',
        'label'   => __( 'Sidebar Width', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 20,
            'max'   => 45,
            'step'  => 1,
        ),
        'description' => __( 'Set the sidebar width for all pages (25% to 45%)', 'guten' ),
        'default' => 25
    );
    $options['guten-add-sidebar-line'] = array(
        'id' => 'guten-add-sidebar-line',
        'label'   => __( 'Add Sidebar divider line', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-remove-content-bgborder'] = array(
        'id' => 'guten-remove-content-bgborder',
        'label'   => __( 'Remove Content Background & Borders', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-page-content-br'] = array(
        'id' => 'guten-page-content-br',
        'label'   => __( 'Content Border Radius', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 40,
            'step'  => 2,
        ),
        'default' => 0
    );
    $options['guten-help-note-site-layout'] = array(
        'id' => 'guten-help-note-site-layout',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br/>- Guten Premium comes with Page Layouts to import<br />- Add a Back To Top button<br />- Premium offers extra built in SEO settings</span>', 'guten' )
    );


    $section = 'guten-site-layout-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'guten' ),
        'priority' => '20',
        'description' => __( 'Customize the <a href="#guten-panel-colors-section-header" rel="tc-section">Header Colors</a><br />Add your <a href="#guten-social-section" rel="tc-section">Social links</a><br />Edit <a href="#guten-website-section-text-header" rel="tc-section">Header texts</a><br />Select <a href="#guten-panel-font-settings" rel="tc-panel">Site Fonts</a> for the theme', 'guten' ),
        'panel' => $panel
    );

    $options['guten-header-remove-topbar'] = array(
        'id' => 'guten-header-remove-topbar',
        'label'   => __( 'Remove Top Bar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-header-topbar-switch'] = array(
        'id' => 'guten-header-topbar-switch',
        'label'   => __( 'Switch Top Bar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'guten-header-default' => __( 'Transparent Header', 'guten' ),
        'guten-header-one' => __( 'Basic Header', 'guten' ),
        'guten-header-two' => __( 'Centered Header', 'guten' ),
        'guten-header-three' => __( 'Centered Header Social', 'guten' ),
        'guten-header-four' => __( 'Standard Header', 'guten' ),
        'guten-header-five' => __( 'Standard Header Social', 'guten' ),
        'guten-header-six' => __( 'Side Layout Header', 'guten' ),
        'guten-header-seven' => __( 'Transparent Header Centered', 'guten' ),
        'guten-header-eight' => __( 'Big Header + Search', 'guten' ),
        'guten-header-nine' => __( 'Standard Header + Search', 'guten' )
    );
    $options['guten-header-layout'] = array(
        'id' => 'guten-header-layout',
        'label'   => __( 'Header Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-header-default'
    );
    $options['guten-header-remove-main-nav'] = array(
        'id' => 'guten-header-remove-main-nav',
        'label'   => __( 'Remove Main Navigation Section', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0
    );
    $options['guten-header-switch'] = array(
        'id' => 'guten-header-switch',
        'label'   => __( 'Switch Header', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-trans-header-border-btm'] = array(
        'id' => 'guten-trans-header-border-btm',
        'label'   => __( 'Add bottom border', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 1,
    );
    $options['guten-header-remove-slider-space'] = array(
        'id' => 'guten-header-remove-slider-space',
        'label'   => __( 'Remove Slider Top Space', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'guten-nav-style-plain' => __( 'Plain', 'guten' ),
        'guten-nav-style-solid' => __( 'Solid', 'guten' ),
        'guten-nav-style-underlined' => __( 'Underlined', 'guten' ),
        'guten-nav-style-blocks' => __( 'Blocks', 'guten' )
    );
    $options['guten-header-nav-style'] = array(
        'id' => 'guten-header-nav-style',
        'label'   => __( 'Navigation Style', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-nav-style-plain'
    );
    $options['guten-header-nav-case-normal'] = array(
        'id' => 'guten-header-nav-case-normal',
        'label'   => __( 'Navigation - Normal Case', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
    );
    $options['guten-noteon-nav-style'] = array(
        'id' => 'guten-noteon-nav-style',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<a href="https://kairaweb.com/documentation/change-navigation-drop-direction-custom-css-class/" target="_blank">Switch the direction</a> of the navigation dropdown', 'guten' )
    );
    $choices = array(
        'guten-nav-align-right' => __( 'Align Right', 'guten' ),
        'guten-nav-align-left' => __( 'Align Left', 'guten' ),
        'guten-nav-align-center' => __( 'Align Center', 'guten' )
    );
    $options['guten-header-nav-align'] = array(
        'id' => 'guten-header-nav-align',
        'label'   => __( 'Navigation Alignment', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-nav-align-right'
    );
    if ( guten_is_woocommerce_activated() ) :
        $options['guten-header-add-drop-cart'] = array(
            'id' => 'guten-header-add-drop-cart',
            'label'   => __( 'Add WooCommerce Drop Down Cart', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
    endif;
    $options['guten-header-remove-no'] = array(
        'id' => 'guten-header-remove-no',
        'label'   => __( 'Remove Phone Number', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-header-remove-add'] = array(
        'id' => 'guten-header-remove-add',
        'label'   => __( 'Remove Address', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-header-remove-extratxt'] = array(
        'id' => 'guten-header-remove-extratxt',
        'label'   => __( 'Remove Extra Text', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    if ( guten_is_woocommerce_activated() ) :
        $options['guten-header-remove-cart'] = array(
            'id' => 'guten-header-remove-cart',
            'label'   => __( 'Remove WooCommerce Cart', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
    endif;
    $options['guten-header-remove-social'] = array(
        'id' => 'guten-header-remove-social',
        'label'   => __( 'Remove Social Icons', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-header-search'] = array(
        'id' => 'guten-header-search',
        'label'   => __( 'Remove Search', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-header-px'] = array(
        'id' => 'guten-header-px',
        'label'   => __( 'Header Bottom Margin', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'You can also edit the <a href="#guten-site-layout-section-footer" rel="tc-section">Footer Top Margin</a>', 'guten' ),
        'default' => 60,
    );
    $options['guten-help-note-header'] = array(
        'id' => 'guten-help-note-header',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Turn on a Sticky Header/Navigation<br />- Change Shopping Cart icon to bag/cart/basket<br />- Option to replace the default search with a more advanced search plugin shortcode</span>', 'guten' )
    );
    

    $section = 'guten-site-layout-section-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'guten' ),
        'priority' => '30',
        'description' => __( 'Edit the <a href="#guten-panel-colors-section-slider" rel="tc-section">Default Slider colors</a>', 'guten' ),
        'panel' => $panel
    );

    $choices = array(
        'guten-slider-default' => __( 'Default Slider', 'guten' ),
        'guten-shortcode-slider' => __( 'Slider Shortcode', 'guten' ),
        'guten-home-featured-image' => __( 'Featured Image', 'guten' ),
        'guten-no-slider' => __( 'None', 'guten' )
    );
    $options['guten-slider-type'] = array(
        'id' => 'guten-slider-type',
        'label'   => __( 'Choose a Slider', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-slider-default'
    );
    $options['guten-slider-cats'] = array(
        'id' => 'guten-slider-cats',
        'label'   => __( 'Slider Categories', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Add a Category ID to display Posts in the slider.<br />Get the Category ID at <a href="edit-tags.php?taxonomy=category" target="_blank">Posts -> Categories</a>.<br /><br />Read more: <a href="https://gutentheme.org/documentation/setting-up-the-default-slider/" target="_blank"><b>Setting up the Default Slider</b></a>', 'guten' )
    );
    $options['guten-slider-full-width'] = array(
        'id' => 'guten-slider-full-width',
        'label'   => __( 'Set slider to full width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 1,
    );
    $choices = array(
        'guten-slider-size-small' => __( 'Small Banner Size Slider', 'guten' ),
        'guten-slider-size-medium' => __( 'Medium Banner Size Slider', 'guten' ),
        'guten-slider-size-large' => __( 'Large Banner Size Slider', 'guten' ),
        'guten-slider-size-actual' => __( 'Use Actual Image Proportions', 'guten' )
    );
    $options['guten-slider-size'] = array(
        'id' => 'guten-slider-size',
        'label'   => __( 'Slider Size', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-slider-size-medium'
    );
    $choices = array(
        'crossfade' => __( 'Fade', 'guten' ),
        'cover-fade' => __( 'Cover Fade', 'guten' ),
        'uncover-fade' => __( 'Uncover Fade', 'guten' ),
        'cover' => __( 'Cover', 'guten' ),
        'scroll' => __( 'Scroll', 'guten' )
    );
    $options['guten-slider-scroll-effect'] = array(
        'id' => 'guten-slider-scroll-effect',
        'label'   => __( 'Slider Scroll Effect', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'crossfade'
    );
    $options['guten-slider-auto-time'] = array(
        'id' => 'guten-slider-auto-time',
        'label'   => __( 'Slider Scroll Duration', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'The time it takes between slides', 'guten' ),
        'default' => 6500,
    );
    $options['guten-slider-duration'] = array(
        'id' => 'guten-slider-duration',
        'label'   => __( 'Slider Transition Duration', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'The time of the transition between slides', 'guten' ),
        'default' => 450,
    );
    $options['guten-slider-linkto-post'] = array(
        'id' => 'guten-slider-linkto-post',
        'label'   => __( 'Link Slide to post', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Specify custom links on each slider post', 'guten' ),
        'default' => 0,
    );
    $options['guten-slider-pause-oh'] = array(
        'id' => 'guten-slider-pause-oh',
        'label'   => __( 'Pause Slider on mouse hover', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-slider-remove-title'] = array(
        'id' => 'guten-slider-remove-title',
        'label'   => __( 'Remove Slider Title & Text', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-slider-remove-sub-title'] = array(
        'id' => 'guten-slider-remove-sub-title',
        'label'   => __( 'Remove Slider Excerpt Only', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-slider-remove-pagination'] = array(
        'id' => 'guten-slider-remove-pagination',
        'label'   => __( 'Remove Slider Pagination', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-slider-auto-scroll'] = array(
        'id' => 'guten-slider-auto-scroll',
        'label'   => __( 'Stop Auto Scroll', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-help-note-slider'] = array(
        'id' => 'guten-help-note-slider',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Add custom links to each slide</span>', 'guten' )
    );

    $options['guten-slider-shortcode'] = array(
        'id' => 'guten-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the full shortcode given by the slider.', 'guten' )
    );
    $options['guten-help-slider-shortcode'] = array(
        'id' => 'guten-help-slider-shortcode',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'We recommend trying out <a href="https://kairaweb.com/go/meta-slider/" target="_blank">Meta Slider</a> (Free or Pro)', 'guten' )
    );
    
    $choices = array(
        'guten-slidermage-size-extra-small' => __( 'Extra Small Image', 'guten' ),
        'guten-slidermage-size-small' => __( 'Small Image', 'guten' ),
        'guten-slidermage-size-medium' => __( 'Medium Image', 'guten' ),
        'guten-slidermage-size-large' => __( 'Large Image', 'guten' ),
        'guten-slidermage-size-actual' => __( 'Use Full Image', 'guten' )
    );
    $options['guten-slidermage-size'] = array(
        'id' => 'guten-slidermage-size',
        'label'   => __( 'Image Size', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-slidermage-size-medium'
    );
    $options['guten-slidermage-fullwidth'] = array(
        'id' => 'guten-slidermage-fullwidth',
        'label'   => __( 'Make Full Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );


    $section = 'guten-site-layout-section-titlebar';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Page Title', 'guten' ),
        'priority' => '40',
        'panel' => $panel
    );

    $options['guten-page-remove-titlebar'] = array(
        'id' => 'guten-page-remove-titlebar',
        'label'   => __( 'Remove all Page Titles', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'guten-page-titlebar-standard' => __( 'Standard Layout', 'guten' ),
        'guten-page-titlebar-banner' => __( 'Banner Layout', 'guten' )
    );
    $options['guten-page-title-layout'] = array(
        'id' => 'guten-page-title-layout',
        'label'   => __( 'Title Bar Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-page-titlebar-standard'
    );
    $options['guten-page-centered-titlebar'] = array(
        'id' => 'guten-page-centered-titlebar',
        'label'   => __( 'Page Titles - Centered', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );


    $section = 'guten-site-layout-section-page';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Pages / Sidebar', 'guten' ),
        'priority' => '40',
        'panel' => $panel
    );

    $choices = array(
        'guten-page-fimage-layout-none' => __( 'None', 'guten' ),
        'guten-page-fimage-layout-standard' => __( 'Standard', 'guten' ),
        'guten-page-fimage-layout-banner' => __( 'Page Banner', 'guten' )
    );
    $options['guten-page-fimage-layout'] = array(
        'id' => 'guten-page-fimage-layout',
        'label'   => __( 'Featured Image Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-page-fimage-layout-none'
    );
    $choices = array(
        'guten-page-fimage-size-extra-small' => __( 'Extra Small Banner', 'guten' ),
        'guten-page-fimage-size-small' => __( 'Small Banner', 'guten' ),
        'guten-page-fimage-size-medium' => __( 'Medium Banner', 'guten' ),
        'guten-page-fimage-size-large' => __( 'Large Banner', 'guten' ),
        'guten-page-fimage-size-actual' => __( 'Use Proper Image', 'guten' )
    );
    $options['guten-page-fimage-size'] = array(
        'id' => 'guten-page-fimage-size',
        'label'   => __( 'Page Banner Size', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-page-fimage-size-medium'
    );
    $options['guten-page-fimage-fullwidth'] = array(
        'id' => 'guten-page-fimage-fullwidth',
        'label'   => __( 'Full Width Banner', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $options['guten-page-sidebar-blocks'] = array(
        'id' => 'guten-page-sidebar-blocks',
        'label'   => __( 'Break Sidebar into Blocks', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $options['guten-page-widget-spacing'] = array(
        'id' => 'guten-page-widget-spacing',
        'label'   => __( 'Sidebar Widget Spacing', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 100,
            'step'  => 2,
        ),
        'default' => 50
    );
    $options['guten-blog-widget-title-size'] = array(
        'id' => 'guten-blog-widget-title-size',
        'label'   => __( 'Sidebar Title Size', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 14,
    );
    $options['guten-blog-widget-title-centeralign'] = array(
        'id' => 'guten-blog-widget-title-centeralign',
        'label'   => __( 'Center Align Title', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'widget-title-style-sideline-short' => __( 'Title Sideline', 'guten' ),
        'widget-title-style-underline-short' => __( 'Title Underline', 'guten' ),
        'widget-title-style-underline-dots' => __( 'Underlined Dots', 'guten' ),
        'widget-title-style-underline-solid' => __( 'Underlined Solid', 'guten' ),
        'widget-title-style-plain' => __( 'Plain', 'guten' )
    );
    $options['guten-blog-widget-title-style'] = array(
        'id' => 'guten-blog-widget-title-style',
        'label'   => __( 'Widget Title Styling', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'widget-title-style-sideline-short'
    );


    $section = 'guten-blog-section-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog List', 'guten' ),
        'priority' => '40',
        'panel' => $panel
    );

    $options['guten-remove-blog-title'] = array(
        'id' => 'guten-remove-blog-title',
        'label'   => __( 'Remove Blog & Archive Page Titles', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-remove-cat-pre-title'] = array(
        'id' => 'guten-remove-cat-pre-title',
        'label'   => __( 'Remove text before Archive Title', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'This will not update in the Customizer. Exit the Customizer to view the change', 'guten' ),
        'default' => 0,
    );
    $options['guten-blog-break-blocks'] = array(
        'id' => 'guten-blog-break-blocks',
        'label'   => __( 'Break Posts into Blocks', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'blog-left-layout' => __( 'Left Layout', 'guten' ),
        'blog-right-layout' => __( 'Right Layout', 'guten' ),
        'blog-alt-layout' => __( 'Alternate Layout', 'guten' ),
        'blog-top-layout' => __( 'Top Layout', 'guten' ),
        'blog-blocks-layout' => __( 'Blocks Layout', 'guten' )
    );
    $options['guten-blog-layout'] = array(
        'id' => 'guten-blog-layout',
        'label'   => __( 'Blog Posts Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-left-layout'
    );
    $choices = array(
        'blog-post-shape-square' => __( 'All Images Square', 'guten' ),
        'blog-post-shape-round' => __( 'All Images Round', 'guten' ),
        'blog-post-shape-img' => __( 'Actual Image Shape', 'guten' )
    );
    $options['guten-blog-post-shape'] = array(
        'id' => 'guten-blog-post-shape',
        'label'   => __( 'Blog Post Image Shape', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-post-shape-square'
    );
    $options['guten-blog-list-img-cut'] = array(
        'id' => 'guten-blog-list-img-cut',
        'label'   => __( 'Blog Image Cut', 'guten' ),
        'section' => $section,
        'type'    => 'imageselect',
        'description' => __( 'Select which cut the Blog list uses<br />Recommended: Optimize images before upload', 'guten' ),
        'default' => 'large'
    );
    $choices = array(
        'blog-columns-two' => __( '2', 'guten' ),
        'blog-columns-three' => __( '3', 'guten' ),
        'blog-columns-four' => __( '4', 'guten' ),
        'blog-columns-five' => __( '5', 'guten' )
    );
    $options['guten-blog-column-layout'] = array(
        'id' => 'guten-blog-column-layout',
        'label'   => __( 'Blog Columns', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-columns-three'
    );
    $choices = array(
        'blog-style-imgblock' => __( 'Image/Block Style', 'guten' ),
        'blog-style-postblock' => __( 'Post/Block Style', 'guten' )
    );
    $options['guten-blog-blocks-style'] = array(
        'id' => 'guten-blog-blocks-style',
        'label'   => __( 'Blocks Styling', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-style-postblock'
    );
    $options['guten-blog-blocks-spacing'] = array(
        'id' => 'guten-blog-blocks-spacing',
        'label'   => __( 'Blocks Spacing', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 40,
            'step'  => 2,
        ),
        'default' => 8
    );
    $options['guten-blog-cats'] = array(
        'id' => 'guten-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br /><br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.<br /><br />Get the ID at <b>Posts -> Categories</b>.', 'guten' )
    );

    $options['guten-blog-left-sidebar'] = array(
        'id' => 'guten-blog-left-sidebar',
        'label'   => __( 'Blog Left Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-cat-left-sidebar'] = array(
        'id' => 'guten-blog-cat-left-sidebar',
        'label'   => __( 'Blog Archives/Categories Left Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-search-left-sidebar'] = array(
        'id' => 'guten-blog-search-left-sidebar',
        'label'   => __( 'Search Results Left Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-full-width'] = array(
        'id' => 'guten-blog-full-width',
        'label'   => __( 'Blog Full Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-cat-full-width'] = array(
        'id' => 'guten-blog-cat-full-width',
        'label'   => __( 'Blog Archives/Categories Full Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-search-full-width'] = array(
        'id' => 'guten-blog-search-full-width',
        'label'   => __( 'Search Results Full Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options['guten-blog-full-fl-sidebar'] = array(
        'id' => 'guten-blog-full-fl-sidebar',
        'label'   => __( 'Blog Add Floating Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-cat-full-fl-sidebar'] = array(
        'id' => 'guten-blog-cat-full-fl-sidebar',
        'label'   => __( 'Blog Archives Add Floating Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-blog-search-full-fl-sidebar'] = array(
        'id' => 'guten-blog-search-full-fl-sidebar',
        'label'   => __( 'Search Results Add Floating Sidebar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-help-note-blog-list'] = array(
        'id' => 'guten-help-note-blog-list',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Display Full Post or Customized Summary of post<br />- Remove Post Date and/or author<br />- Remove Post Categories and/or tags<br />- Blocks Layout: Remove Post content/summary</span>', 'guten' )
    );

    $section = 'guten-blog-section-post';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog Single Posts', 'guten' ),
        'priority' => '50',
        'panel' => $panel
    );

    $choices = array(
        'guten-single-page-fimage-layout-none' => __( 'None', 'guten' ),
        'guten-single-page-fimage-layout-standard' => __( 'Standard', 'guten' ),
        'guten-single-page-fimage-layout-banner' => __( 'Page Banner', 'guten' )
    );
    $options['guten-single-page-fimage-layout'] = array(
        'id' => 'guten-single-page-fimage-layout',
        'label'   => __( 'Featured Image Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-single-page-fimage-layout-none'
    );
    $choices = array(
        'guten-single-page-fimage-size-extra-small' => __( 'Extra Small Banner', 'guten' ),
        'guten-single-page-fimage-size-small' => __( 'Small Banner', 'guten' ),
        'guten-single-page-fimage-size-medium' => __( 'Medium Banner', 'guten' ),
        'guten-single-page-fimage-size-large' => __( 'Large Banner', 'guten' ),
        'guten-single-page-fimage-size-actual' => __( 'Use Proper Image', 'guten' )
    );
    $options['guten-single-page-fimage-size'] = array(
        'id' => 'guten-single-page-fimage-size',
        'label'   => __( 'Page Banner Size', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-single-page-fimage-size-medium'
    );
    $options['guten-single-page-fimage-fullwidth'] = array(
        'id' => 'guten-single-page-fimage-fullwidth',
        'label'   => __( 'Full Width Banner', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options['guten-single-remove-meta-date'] = array(
        'id' => 'guten-single-remove-meta-date',
        'label'   => __( 'Remove date "Posted On"', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-single-remove-meta-auth'] = array(
        'id' => 'guten-single-remove-meta-auth',
        'label'   => __( 'Remove author Byline', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-single-remove-cats'] = array(
        'id' => 'guten-single-remove-cats',
        'label'   => __( 'Remove Post Categories', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-single-remove-tags'] = array(
        'id' => 'guten-single-remove-tags',
        'label'   => __( 'Remove Post Tags', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-help-note-blog-single'] = array(
        'id' => 'guten-help-note-blog-single',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Remove OR Change pagination to Side Arrows<br />- Remove Side Aligned Social links on Post</span>', 'guten' )
    );


    $section = 'guten-site-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'guten' ),
        'priority' => '80',
        'description' => __( 'Customize the <a href="#guten-panel-colors-section-footer" rel="tc-section">Footer Colors</a><br/>Add your <a href="#guten-social-section" rel="tc-section">Social links</a><br />Edit <a href="#guten-website-section-text-footer" rel="tc-section">Footer texts</a> with your details<br />Select <a href="#guten-panel-font-settings" rel="tc-panel">Site Fonts</a> for the theme', 'guten' ),
        'panel' => $panel
    );

    $choices = array(
        'guten-footer-standard' => __( 'Standard Layout', 'guten' ),
        'guten-footer-social' => __( 'Social Layout', 'guten' ),
        'guten-footer-custom' => __( 'Custom Layout', 'guten' ),
        'guten-footer-none' => __( 'None', 'guten' )
    );
    $options['guten-footer-layout'] = array(
        'id' => 'guten-footer-layout',
        'label'   => __( 'Footer Layout', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-footer-standard'
    );
    $options['guten-noteon-footer-standard'] = array(
        'id' => 'guten-noteon-footer-standard',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'The Standard Footer is divided into columns by the amount of widgets that are added under<br /><i>Dashboard -> Appearance -> <a href="#widgets" rel="tc-panel">Widgets</a></i>', 'guten' )
    );
    $options['guten-noteon-footer-custom'] = array(
        'id' => 'guten-noteon-footer-custom',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'The Custom Footer is built with <i><a href="#widgets" rel="tc-panel">Widgets</a></i>, or go to Dashboard -> Appearance -> Widgets', 'guten' )
    );
    $options['guten-noteon-footer-social'] = array(
        'id' => 'guten-noteon-footer-social',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Add your <a href="#guten-social-section" rel="tc-section">Social links</a> to the footer', 'guten' )
    );
    $options['guten-footer-side-fullwidth'] = array(
        'id' => 'guten-footer-side-fullwidth',
        'label'   => __( 'Set Footer to Full Width', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-bottombar-switch'] = array(
        'id' => 'guten-bottombar-switch',
        'label'   => __( 'Switch Bottom Bar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-footer-remove-moretxt'] = array(
        'id' => 'guten-footer-remove-moretxt',
        'label'   => __( 'Remove Extra Text', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-footer-remove-social'] = array(
        'id' => 'guten-footer-remove-social',
        'label'   => __( 'Remove Social Icons', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );

    $options['guten-footer-social-icon-size'] = array(
        'id' => 'guten-footer-social-icon-size',
        'label'   => __( 'Social Icon Size', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 16,
            'max'   => 100,
            'step'  => 1,
        ),
        'default' => 30
    );
    $options['guten-footer-social-icon-space'] = array(
        'id' => 'guten-footer-social-icon-space',
        'label'   => __( 'Social Icon Spacing', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 5,
            'max'   => 80,
            'step'  => 1,
        ),
        'default' => 15
    );

    $choices = array(
        'guten-footer-custom-cols-1' => __( '1 Column', 'guten' ),
        'guten-footer-custom-cols-2' => __( '2 Columns', 'guten' ),
        'guten-footer-custom-cols-3' => __( '3 Columns', 'guten' ),
        'guten-footer-custom-cols-4' => __( '4 Columns', 'guten' ),
        'guten-footer-custom-cols-5' => __( '5 Columns', 'guten' )
    );
    $options['guten-footer-custom-cols'] = array(
        'id' => 'guten-footer-custom-cols',
        'label'   => __( 'Columns', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-footer-custom-cols-3'
    );

    $options['guten-footer-customize'] = array(
        'id' => 'guten-footer-customize',
        'label'   => __( 'Custom Widths', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Select this box to manually adjust the columns widths by percentage ( % )', 'guten' ),
        'default' => 0,
    );

    $options['guten-footer-customize-col-1'] = array(
        'id' => 'guten-footer-customize-col-1',
        'label'   => __( 'Column 1 %', 'guten' ),
        'section' => $section,
        'type'    => 'number',
    );
    $options['guten-center-col-1'] = array(
        'id' => 'guten-center-col-1',
        'label'   => __( 'Center Column', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Reduce the width of the column to center it', 'guten' ),
        'default' => 0,
    );
    $options['guten-footer-customize-col-2'] = array(
        'id' => 'guten-footer-customize-col-2',
        'label'   => __( 'Column 2 %', 'guten' ),
        'section' => $section,
        'type'    => 'number',
    );
    $options['guten-footer-customize-col-3'] = array(
        'id' => 'guten-footer-customize-col-3',
        'label'   => __( 'Column 3 %', 'guten' ),
        'section' => $section,
        'type'    => 'number',
    );
    $options['guten-footer-customize-col-4'] = array(
        'id' => 'guten-footer-customize-col-4',
        'label'   => __( 'Column 4 %', 'guten' ),
        'section' => $section,
        'type'    => 'number',
    );
    $options['guten-footer-customize-col-5'] = array(
        'id' => 'guten-footer-customize-col-5',
        'label'   => __( 'Column 5 %', 'guten' ),
        'section' => $section,
        'type'    => 'number',
    );
    
    $options['guten-footer-px'] = array(
        'id' => 'guten-footer-px',
        'label'   => __( 'Footer Top Margin', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'You can also edit the <a href="#guten-site-layout-section-header" rel="tc-section">Header Bottom Margin</a>', 'guten' ),
        'default' => 60,
    );
    $options['guten-footer-top-pad'] = array(
        'id' => 'guten-footer-top-pad',
        'label'   => __( 'Footer top padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 50,
    );
    $options['guten-footer-bottom-pad'] = array(
        'id' => 'guten-footer-bottom-pad',
        'label'   => __( 'Footer bottom padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 30,
    );

    $options['guten-footer-widget-title-size'] = array(
        'id' => 'guten-footer-widget-title-size',
        'label'   => __( 'Footer Widget Title Size', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 14,
    );
    $options['guten-footer-widget-title-centeralign'] = array(
        'id' => 'guten-footer-widget-title-centeralign',
        'label'   => __( 'Center Align Title', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'footer-title-style-sideline-short' => __( 'Title Sideline', 'guten' ),
        'footer-title-style-underline-short' => __( 'Title Underline', 'guten' ),
        'footer-title-style-underline-dots' => __( 'Underlined Dots', 'guten' ),
        'footer-title-style-underline-solid' => __( 'Underlined Solid', 'guten' ),
        'footer-title-style-plain' => __( 'Plain', 'guten' )
    );
    $options['guten-footer-widget-title-style'] = array(
        'id' => 'guten-footer-widget-title-style',
        'label'   => __( 'Footer Widget Title Styling', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'footer-title-style-sideline-short'
    );
    $options['guten-footer-bottombar-top-pad'] = array(
        'id' => 'guten-footer-bottombar-top-pad',
        'label'   => __( 'Footer Bottom Bar top padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 10,
    );
    $options['guten-footer-bottombar-bottom-pad'] = array(
        'id' => 'guten-footer-bottombar-bottom-pad',
        'label'   => __( 'Footer Bottom bar bottom padding', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 10,
    );
    $options['guten-help-note-footer'] = array(
        'id' => 'guten-help-note-footer',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Remove/Edit Site Attribution copyright text<br />- Remove the Footer Bottom Bar</span>', 'guten' )
    );


    $panel = 'guten-panel-font-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Font Settings', 'guten' ),
        'priority' => '40'
    );

    // Font Options
    $section = 'guten-typography-section';
    $font_websafe_choices = array( 'Arial' => 'Arial', 'Arial Black' => 'Arial Black', 'Helvetica' => 'Helvetica', 'Verdana' => 'Verdana', 'Georgia' => 'Georgia', 'Palatino' => 'Palatino', 'Garamond' => 'Garamond', 'Bookman' => 'Bookman', 'Courier' => 'Courier', 'Courier New' => 'Courier New', 'Times New Roman' => 'Times New Roman', 'Times' => 'Times' );
    $font_google_choices = customizer_library_get_font_choices();

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Title/Tagline Fonts', 'guten' ),
        'priority' => '20',
        'description' => __( 'Upload a Site Logo under <a href="title_tagline" rel="tc-section">Site Identity</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-title-font'] = array(
        'id' => 'guten-title-font',
        'label'   => __( 'Site Title Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_google_choices,
        'default' => 'Quicksand'
    );
    $options['guten-title-font-websafe'] = array(
        'id' => 'guten-title-font-websafe',
        'label'   => __( 'Site Title Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_websafe_choices,
        'default' => 'Verdana'
    );
    $options['guten-title-font-size'] = array(
        'id' => 'guten-title-font-size',
        'label'   => __( 'Site Title Size', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 66,
    );
    $options['guten-site-title-uc'] = array(
        'id' => 'guten-site-title-uc',
        'label'   => __( 'Site Title - Uppercase', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-site-title-font-color'] = array(
        'id' => 'guten-site-title-font-color',
        'label'   => __( 'Site Title Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#000000',
    );
    $options['guten-tagline-font'] = array(
        'id' => 'guten-tagline-font',
        'label'   => __( 'Site Tagline Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_google_choices,
        'default' => 'Quicksand'
    );
    $options['guten-tagline-font-websafe'] = array(
        'id' => 'guten-tagline-font-websafe',
        'label'   => __( 'Site Tagline Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_websafe_choices,
        'default' => 'Arial'
    );
    $options['guten-tagline-font-size'] = array(
        'id' => 'guten-tagline-font-size',
        'label'   => __( 'Site Tagline Size', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 12,
    );
    $options['guten-site-tagline-case-normal'] = array(
        'id' => 'guten-site-tagline-case-normal',
        'label'   => __( 'Site Tagline - Normal Case', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
    );
    $options['guten-site-tagline-font-color'] = array(
        'id' => 'guten-site-tagline-font-color',
        'label'   => __( 'Site Tagline Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#3a3a3a',
    );
    $options['guten-title-bottom-margin'] = array(
        'id' => 'guten-title-bottom-margin',
        'label'   => __( 'Site Title Bottom Margin', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'This will set the space between the site title and the site tagline', 'guten' ),
        'default' => 0,
    );

    $section = 'guten-typography-section-default';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Fonts', 'guten' ),
        'priority' => '20',
        'panel' => $panel
    );

    $options['guten-body-font'] = array(
        'id' => 'guten-body-font',
        'label'   => __( 'Body Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_google_choices,
        'default' => 'Open Sans'
    );
    $options['guten-body-font-websafe'] = array(
        'id' => 'guten-body-font-websafe',
        'label'   => __( 'Body Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_websafe_choices,
        'default' => 'Arial'
    );
    $options['guten-body-font-color'] = array(
        'id' => 'guten-body-font-color',
        'label'   => __( 'Body Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $body_font_color,
    );
    $options['guten-body-fonts-size'] = array(
        'id' => 'guten-body-fonts-size',
        'label'   => __( 'Body Font Size', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 5,
            'step'  => 1,
        ),
        'description' => __( 'Small <b>|</b> Normal <b>|</b> Medium <b>|</b> Large <b>|</b> Larger', 'guten' ),
        'default' => 2
    );
    $options['guten-heading-font'] = array(
        'id' => 'guten-heading-font',
        'label'   => __( 'Heading Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_google_choices,
        'default' => 'Quicksand'
    );
    $options['guten-heading-font-websafe'] = array(
        'id' => 'guten-heading-font-websafe',
        'label'   => __( 'Heading Font', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $font_websafe_choices,
        'default' => 'Verdana'
    );
    $options['guten-heading-font-color'] = array(
        'id' => 'guten-heading-font-color',
        'label'   => __( 'Heading Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    $options['guten-heading-fonts-size'] = array(
        'id' => 'guten-heading-fonts-size',
        'label'   => __( 'Heading Size Proportions', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 1,
            'max'   => 4,
            'step'  => 1,
        ),
        'description' => __( 'Small <b>|</b> Normal <b>|</b> Medium <b>|</b> Large', 'guten' ),
        'default' => 2
    );
    $options['guten-page-title-font-color'] = array(
        'id' => 'guten-page-title-font-color',
        'label'   => __( 'Page Title Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    $options['guten-bloglist-title-color'] = array(
        'id' => 'guten-bloglist-title-color',
        'label'   => __( 'Blog List Title Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    $options['guten-sidebar-widget-title-color'] = array(
        'id' => 'guten-sidebar-widget-title-color',
        'label'   => __( 'Sidebar Widget Title Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $heading_font_color,
    );
    // WooCommerce style Layout
    if ( guten_is_woocommerce_activated() ) :
        $options['guten-wc-product-title-size'] = array(
            'id' => 'guten-wc-product-title-size',
            'label'   => __( 'WooCommerce Product Title Size', 'guten' ),
            'section' => $section,
            'type'    => 'number',
            'default' => 18,
        );
        $options['guten-wc-product-title-color'] = array(
            'id' => 'guten-wc-product-title-color',
            'label'   => __( 'WooCommerce Product Title Color', 'guten' ),
            'section' => $section,
            'type'    => 'color',
            'default' => $heading_font_color,
        );
    endif;


    $panel = 'guten-panel-colors';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Layout Colors', 'guten' ),
        'priority' => '40'
    );
    
    // Colors
    $section = 'colors';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Default Colors', 'guten' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['guten-boxed-bg-color'] = array(
        'id' => 'guten-boxed-bg-color',
        'label'   => __( 'Site Boxed Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );

    $options['guten-primary-color'] = array(
        'id' => 'guten-primary-color',
        'label'   => __( 'Primary Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );

    $options['guten-secondary-color'] = array(
        'id' => 'guten-secondary-color',
        'label'   => __( 'Secondary Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $secondary_color,
    );

    $section = 'guten-panel-colors-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'guten' ),
        'priority' => '10',
        'description' => __( 'Edit the <a href="#guten-site-layout-section-header" rel="tc-section">Header Settings</a><br />Change the <a href="#guten-website-section-text-header" rel="tc-section">Header text</a><br />Edit your theme <a href="#guten-panel-font-settings" rel="tc-panel">Site Fonts</a>', 'guten' ),
        'panel' => $panel
    );
    
    $options['guten-topbar-bg-color'] = array(
        'id' => 'guten-topbar-bg-color',
        'label'   => __( 'Top Bar Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#133d6f',
    );
    $options['guten-topbar-font-color'] = array(
        'id' => 'guten-topbar-font-color',
        'label'   => __( 'Top Bar Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );
    $options['guten-header-bg-color'] = array(
        'id' => 'guten-header-bg-color',
        'label'   => __( 'Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bg_color,
    );
    $options['guten-header-font-color'] = array(
        'id' => 'guten-header-font-color',
        'label'   => __( 'Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );
    $options['guten-header-bg-opacity'] = array(
        'id' => 'guten-header-bg-opacity',
        'label'   => __( 'Header Opacity', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 99,
            'step'  => 1,
        ),
        'default' => 15
    );
    
    // WooCommerce style Layout
    if ( guten_is_woocommerce_activated() ) :
        $options['guten-header-cart-bg-color'] = array(
            'id' => 'guten-header-cart-bg-color',
            'label'   => __( 'Header Cart Background Color', 'guten' ),
            'section' => $section,
            'type'    => 'color',
            'default' => $header_bg_color,
        );
        $options['guten-header-cart-font-color'] = array(
            'id' => 'guten-header-cart-font-color',
            'label'   => __( 'Header Cart Font Color', 'guten' ),
            'section' => $section,
            'type'    => 'color',
            'default' => $header_font_color,
        );
    endif;
    

    $section = 'guten-panel-colors-section-nav';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Navigation', 'guten' ),
        'priority' => '10',
        'description' => __( 'Customize the <a href="#guten-mobile-panel-section-colors" rel="tc-section">Mobile Navigation Colors</a>', 'guten' ),
        'panel' => $panel
    );
    
    $options['guten-navi-bg-color'] = array(
        'id' => 'guten-navi-bg-color',
        'label'   => __( 'Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bg_color,
    );
    $options['guten-navi-font-color'] = array(
        'id' => 'guten-navi-font-color',
        'label'   => __( 'Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );
    $options['guten-nav-drop-bg-color'] = array(
        'id' => 'guten-nav-drop-bg-color',
        'label'   => __( 'Drop Down Bg Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bg_color,
    );
    $options['guten-nav-drop-font-color'] = array(
        'id' => 'guten-nav-drop-font-color',
        'label'   => __( 'Drop Down Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );
    $options['guten-nav-drop-opacity'] = array(
        'id' => 'guten-nav-drop-opacity',
        'label'   => __( 'Drop Down Opacity', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 99,
            'step'  => 1,
        ),
        'default' => 30
    );
    $options['guten-navi-selected-color'] = array(
        'id' => 'guten-navi-selected-color',
        'label'   => __( 'Selected/Active Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );

    $section = 'guten-panel-colors-section-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'guten' ),
        'priority' => '10',
        'description' => __( 'Edit the <a href="#guten-site-layout-section-slider" rel="tc-section">Slider Settings</a>', 'guten' ),
        'panel' => $panel
    );
    
    $options['guten-slider-bg-color'] = array(
        'id' => 'guten-slider-bg-color',
        'label'   => __( 'Slider Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#f9f9f9',
    );
    $options['guten-slider-arrows-color'] = array(
        'id' => 'guten-slider-arrows-color',
        'label'   => __( 'Slider Arrows Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-slider-pagi-color'] = array(
        'id' => 'guten-slider-pagi-color',
        'label'   => __( 'Slider Pagination Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-slider-text-bg-color'] = array(
        'id' => 'guten-slider-text-bg-color',
        'label'   => __( 'Slider Text Block Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-slider-text-bg-opacity'] = array(
        'id' => 'guten-slider-text-bg-opacity',
        'label'   => __( 'Slider Text Block Opacity', 'guten' ),
        'section' => $section,
        'type'    => 'range',
        'input_attrs' => array(
            'min'   => 0,
            'max'   => 99,
            'step'  => 1,
        ),
        'default' => 60
    );
    $options['guten-slider-text-color'] = array(
        'id' => 'guten-slider-text-color',
        'label'   => __( 'Slider Text Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#000000',
    );
    $options['guten-slider-text-title-color'] = array(
        'id' => 'guten-slider-text-title-color',
        'label'   => __( 'Slider Main Title Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#000000',
    );
    
    
    $section = 'guten-panel-colors-section-pages';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Pages', 'guten' ),
        'priority' => '10',
        'panel' => $panel
    );
    
    $options['guten-content-bg-color'] = array(
        'id' => 'guten-content-bg-color',
        'label'   => __( 'Content Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-content-a-color'] = array(
        'id' => 'guten-content-a-color',
        'label'   => __( 'Content Link Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $primary_color,
    );
    $options['guten-content-a-hover-color'] = array(
        'id' => 'guten-content-a-hover-color',
        'label'   => __( 'Content Link Hover Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $secondary_color,
    );
    
    $section = 'guten-panel-colors-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'guten' ),
        'priority' => '10',
        'description' => __( 'Edit the <a href="#guten-site-layout-section-footer" rel="tc-section">Footer Settings</a><br />Change the <a href="#guten-website-section-text-footer" rel="tc-section">Footer text</a><br />Edit your <a href="#guten-panel-font-settings" rel="tc-panel">Theme Fonts</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-footer-bg-color'] = array(
        'id' => 'guten-footer-bg-color',
        'label'   => __( 'Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bg_color,
    );
    $options['guten-footer-heading-font-color'] = array(
        'id' => 'guten-footer-heading-font-color',
        'label'   => __( 'Heading Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );
    $options['guten-footer-font-color'] = array(
        'id' => 'guten-footer-font-color',
        'label'   => __( 'Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );

    $options['guten-footer-bottombar-bg-color'] = array(
        'id' => 'guten-footer-bottombar-bg-color',
        'label'   => __( 'Bottom Bar Bg Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_bg_color,
    );
    $options['guten-footer-bottombar-font-color'] = array(
        'id' => 'guten-footer-bottombar-font-color',
        'label'   => __( 'Bottom Bar Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $header_font_color,
    );


    $panel = 'guten-panel-text';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Theme Text', 'guten' ),
        'priority' => '40'
    );

    $section = 'guten-website-section-text-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'guten' ),
        'priority' => '20',
        'description' => __( 'Edit the <a href="#guten-site-layout-section-header" rel="tc-section">Header Settings</a><br />Change the <a href="#guten-panel-colors-section-header" rel="tc-section">Header Colors</a><br />Edit your theme <a href="#guten-panel-font-settings" rel="tc-panel">Site Fonts</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-header-text-help'] = array(
        'id' => 'guten-header-text-help',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Use your own icon by adding "fa-" and the corrent <a href="https://fontawesome.com/icons?d=gallery&c=buildings,business,chat,code,date-time,design,editors,maps,marketing,shapes,travel,writing&m=free" target="_blank">Font Awesome</a> class name. Eg: "fa-phone"<br /><br />Or remove the icon by saving an empty input.', 'guten' ),
    );
    $options['guten-website-head-no-icon'] = array(
        'id' => 'guten-website-head-no-icon',
        'label'   => __( 'Phone Number Icon', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'fa-phone', 'guten')
    );
    $options['guten-website-head-no'] = array(
        'id' => 'guten-website-head-no',
        'label'   => __( 'Phone Number', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Call Us: +2782 444 YEAH', 'guten' )
    );
    $options['guten-website-site-add-icon'] = array(
        'id' => 'guten-website-site-add-icon',
        'label'   => __( 'Address Icon', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'fa-map-marker-alt', 'guten')
    );
    $options['guten-website-site-add'] = array(
        'id' => 'guten-website-site-add',
        'label'   => __( 'Address', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Cape Town, South Africa', 'guten' )
    );
    $options['guten-website-header-extra-icon'] = array(
        'id' => 'guten-website-header-extra-icon',
        'label'   => __( 'Extra Text Icon', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'fa-leaf', 'guten')
    );
    $options['guten-website-header-extra-txt'] = array(
        'id' => 'guten-website-header-extra-txt',
        'label'   => __( 'Extra Text', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'leaf', 'guten')
    );

    $section = 'guten-website-section-text-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'guten' ),
        'priority' => '30',
        'description' => __( 'Edit the <a href="#guten-site-layout-section-footer" rel="tc-section">Footer Settings</a><br />Change the <a href="#guten-panel-colors-section-footer" rel="tc-section">Footer Colors</a><br />Edit your theme <a href="#guten-panel-font-settings" rel="tc-panel">Site Fonts</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-footer-text-help'] = array(
        'id' => 'guten-footer-text-help',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Use any other icon by adding "fa-" and the corrent <a href="https://fontawesome.com/icons?d=gallery&c=buildings,business,chat,code,date-time,design,editors,maps,marketing,shapes,travel,writing&m=free" target="_blank">Font Awesome</a> class name. Eg: "fa-phone"<br /><br />Or remove the icon by saving an empty input.', 'guten' ),
    );
    $options['guten-website-footer-icon'] = array(
        'id' => 'guten-website-footer-icon',
        'label'   => __( 'Extra Text Icon Left', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'fa-map-marker-alt', 'guten')
    );
    $options['guten-website-footer-txt'] = array(
        'id' => 'guten-website-footer-txt',
        'label'   => __( 'Extra Text Left', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Built in sunny Cape Town - ', 'guten')
    );
    $options['guten-website-footer-icon-right'] = array(
        'id' => 'guten-website-footer-icon-right',
        'label'   => __( 'Extra Text Icon Right', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'fa-apple-alt', 'guten')
    );
    $options['guten-website-footer-txt-right'] = array(
        'id' => 'guten-website-footer-txt-right',
        'label'   => __( 'Extra Text Right', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'More Text', 'guten')
    );

    $section = 'guten-website-section-text-extra';

    $sections[] = array(
        'id' => $section,
        'title' => __( '404 Error / No Results', 'guten' ),
        'priority' => '30',
        'panel' => $panel
    );

    $options['guten-website-error-head'] = array(
        'id' => 'guten-website-error-head',
        'label'   => __( '404 Error Page Heading', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'guten')
    );
    $options['guten-website-error-msg'] = array(
        'id' => 'guten-website-error-msg',
        'label'   => __( 'Error 404 Message', 'guten' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'guten')
    );
    $options['guten-website-nosearch-head'] = array(
        'id' => 'guten-website-nosearch-head',
        'label'   => __( 'No Search Results Heading', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Nothing Found', 'guten')
    );
    $options['guten-website-nosearch-msg'] = array(
        'id' => 'guten-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'guten' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'guten')
    );


    // Mobile Settings
    $panel = 'guten-panel-mobile-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Mobile Settings', 'guten' ),
        'priority' => '70'
    );
    
    $section = 'guten-mobile-panel-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'guten' ),
        'priority' => '10',
        'panel' => $panel
    );

    $options['guten-onmobile-remove-topbar'] = array(
        'id' => 'guten-onmobile-remove-topbar',
        'label'   => __( 'Remove Site Top Bar', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    if ( guten_is_woocommerce_activated() ) :
        $options['guten-onmobile-remove-wc-cart'] = array(
            'id' => 'guten-onmobile-remove-wc-cart',
            'label'   => __( 'Remove WooCommerce Cart', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
    endif;
    $options['guten-header-menu-text'] = array(
        'id' => 'guten-header-menu-text',
        'label'   => __( 'Menu Button Text', 'guten' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'menu'
    );
    $options['guten-nav-onmobile-acc'] = array(
        'id' => 'guten-nav-onmobile-acc',
        'label'   => __( 'Expand Navigation elements on mobile (always open)', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-onmobile-site-title-size'] = array(
        'id' => 'guten-onmobile-site-title-size',
        'label'   => __( 'Site Title Size', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 56
    );

    $section = 'guten-mobile-panel-section-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'guten' ),
        'priority' => '20',
        'panel' => $panel
    );
    $options['guten-slider-mobile-set-height'] = array(
        'id' => 'guten-slider-mobile-set-height',
        'label'   => __( 'Add set height to Slides', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['guten-slider-mobile-remove-txt'] = array(
        'id' => 'guten-slider-mobile-remove-txt',
        'label'   => __( 'Remove Slider Text', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    
    $section = 'guten-mobile-panel-section-colors';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Mobile Menu Colors', 'guten' ),
        'priority' => '20',
        'description' => __( 'Customize the <a href="#guten-panel-colors" rel="tc-panel">Site Layout Colors</a>', 'guten' ),
        'panel' => $panel
    );

    $options['guten-mobile-nav-bg-color'] = array(
        'id' => 'guten-mobile-nav-bg-color',
        'label'   => __( 'Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#000000',
    );
    $options['guten-mobile-nav-font-color'] = array(
        'id' => 'guten-mobile-nav-font-color',
        'label'   => __( 'Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#C5C5C5',
    );
    $options['guten-mobile-nav-font-hover-color'] = array(
        'id' => 'guten-mobile-nav-font-hover-color',
        'label'   => __( 'Font Hover/Selected Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-mobile-nav-ddbtn-color'] = array(
        'id' => 'guten-mobile-nav-ddbtn-color',
        'label'   => __( 'Drop Down Button Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#1a1a1a',
    );
    $options['guten-mobile-nav-ddbg-color'] = array(
        'id' => 'guten-mobile-nav-ddbg-color',
        'label'   => __( 'Drop Down Background Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#242424',
    );
    $options['guten-mobile-nav-ddf-color'] = array(
        'id' => 'guten-mobile-nav-ddf-color',
        'label'   => __( 'Drop Down Font Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );
    $options['guten-mobile-nav-ddfh-color'] = array(
        'id' => 'guten-mobile-nav-ddfh-color',
        'label'   => __( 'Drop Down Font Hover Color', 'guten' ),
        'section' => $section,
        'type'    => 'color',
        'default' => '#FFFFFF',
    );

    // Social Settings
    $panel = 'guten-panel-social-settings';

    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Guten Social Links', 'guten' ),
        'priority' => '70'
    );

    $section = 'guten-social-settings';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links Options', 'guten' ),
        'priority' => '70',
        'panel' => $panel
    );

    $options['guten-site-add-side-social'] = array(
        'id' => 'guten-site-add-side-social',
        'label'   => __( 'Add Side Aligned Social Icons', 'guten' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Add <a href="#guten-social-section" rel="tc-section">Social Links</a> for this to show', 'guten' ),
        'default' => 0,
    );
    $options['guten-site-side-social-top'] = array(
        'id' => 'guten-site-side-social-top',
        'label'   => __( 'Position from Top', 'guten' ),
        'section' => $section,
        'type'    => 'number',
        'default' => 155,
    );
    $choices = array(
        'guten-side-social-square' => __( 'Square', 'guten' ),
        'guten-side-social-round' => __( 'Round', 'guten' )
    );
    $options['guten-side-social-look'] = array(
        'id' => 'guten-side-social-look',
        'label'   => __( 'Side Social Links Design', 'guten' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'guten-side-social-square'
    );
    $options['guten-help-note-social'] = array(
        'id' => 'guten-help-note-social',
        'section' => $section,
        'type'    => 'help',
        'description' => __( '<span><b>Guten Premium Features:</b><br />- Scroll Side Aligned Icons with the browser<br />- Set Header Social Icons to brand colors<br />- Set Footer Social Icons to brand colors<br />- Set Side Aligned Social Icons to brand colors</span>', 'guten' )
    );

    $section = 'guten-social-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Social Links', 'guten' ),
        'priority' => '70',
        'panel' => $panel
    );
    
    $options['guten-social-email'] = array(
        'id' => 'guten-social-email',
        'label'   => __( 'Email Address', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-skype'] = array(
        'id' => 'guten-social-skype',
        'label'   => __( 'Skype Name', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-facebook'] = array(
        'id' => 'guten-social-facebook',
        'label'   => __( 'Facebook', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-twitter'] = array(
        'id' => 'guten-social-twitter',
        'label'   => __( 'Twitter', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-google-plus'] = array(
        'id' => 'guten-social-google-plus',
        'label'   => __( 'Google Plus', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-snapchat'] = array(
        'id' => 'guten-social-snapchat',
        'label'   => __( 'SnapChat', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-amazon'] = array(
        'id' => 'guten-social-amazon',
        'label'   => __( 'Amazon', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-etsy'] = array(
        'id' => 'guten-social-etsy',
        'label'   => __( 'Etsy', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-yelp'] = array(
        'id' => 'guten-social-yelp',
        'label'   => __( 'Yelp', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-youtube'] = array(
        'id' => 'guten-social-youtube',
        'label'   => __( 'YouTube', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-vimeo'] = array(
        'id' => 'guten-social-vimeo',
        'label'   => __( 'Vimeo', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-instagram'] = array(
        'id' => 'guten-social-instagram',
        'label'   => __( 'Instagram', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-pinterest'] = array(
        'id' => 'guten-social-pinterest',
        'label'   => __( 'Pinterest', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-medium'] = array(
        'id' => 'guten-social-medium',
        'label'   => __( 'Medium', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-behance'] = array(
        'id' => 'guten-social-behance',
        'label'   => __( 'Behance', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-soundcloud'] = array(
        'id' => 'guten-social-soundcloud',
        'label'   => __( 'SoundCloud', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-product-hunt'] = array(
        'id' => 'guten-social-product-hunt',
        'label'   => __( 'Product Hunt', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-slack'] = array(
        'id' => 'guten-social-slack',
        'label'   => __( 'Slack', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-linkedin'] = array(
        'id' => 'guten-social-linkedin',
        'label'   => __( 'LinkedIn', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-tumblr'] = array(
        'id' => 'guten-social-tumblr',
        'label'   => __( 'Tumblr', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-digg'] = array(
        'id' => 'guten-social-digg',
        'label'   => __( 'Digg', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-flickr'] = array(
        'id' => 'guten-social-flickr',
        'label'   => __( 'Flickr', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-houzz'] = array(
        'id' => 'guten-social-houzz',
        'label'   => __( 'Houzz', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-vine'] = array(
        'id' => 'guten-social-vine',
        'label'   => __( 'Vine', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-vk'] = array(
        'id' => 'guten-social-vk',
        'label'   => __( 'VK', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-xing'] = array(
        'id' => 'guten-social-xing',
        'label'   => __( 'Xing', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-stumbleupon'] = array(
        'id' => 'guten-social-stumbleupon',
        'label'   => __( 'StumbleUpon', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-tripadvisor'] = array(
        'id' => 'guten-social-tripadvisor',
        'label'   => __( 'TripAdvisor', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-github'] = array(
        'id' => 'guten-social-github',
        'label'   => __( 'GitHub', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-icon-help'] = array(
        'id' => 'guten-social-icon-help',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Use any other brand icon by adding the corrent <a href="https://fontawesome.com/icons?d=gallery&s=brands&m=free" target="_blank">Font Awesome</a> class name. Eg: "fa-facebook"<br /><br />This only uses brand icons.', 'guten' ),
    );
    $options['guten-social-custom-class'] = array(
        'id' => 'guten-social-custom-class',
        'label'   => __( 'Add a Custom Social Link', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-custom-url'] = array(
        'id' => 'guten-social-custom-url',
        'label'   => __( 'Add the URL', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-custom-class-two'] = array(
        'id' => 'guten-social-custom-class-two',
        'label'   => __( 'Add another Custom Social Link', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-custom-url-two'] = array(
        'id' => 'guten-social-custom-url-two',
        'label'   => __( 'Add the URL', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-icon-help-nobrand'] = array(
        'id' => 'guten-social-icon-help-nobrand',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Or use another non-brand <a href="https://fontawesome.com/icons?d=gallery&c=buildings,business,chat,code,date-time,design,editors,maps,marketing,shapes,travel,writing&m=free" target="_blank">Font Awesome</a> icon.<br />Eg: "fa-bed"<br /><br />This will not take brand icons.', 'guten' ),
    );
    $options['guten-social-custom-class-nobrand'] = array(
        'id' => 'guten-social-custom-class-nobrand',
        'label'   => __( 'Add a Custom Social Link', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['guten-social-custom-url-nobrand'] = array(
        'id' => 'guten-social-custom-url-nobrand',
        'label'   => __( 'Add the URL', 'guten' ),
        'section' => $section,
        'type'    => 'text',
    );
    
    // WooCommerce style Layout
    if ( guten_is_woocommerce_activated() ) :

        $panel = 'woocommerce';

        $panels[] = array(
            'id' => $panel,
            'title' => __( 'WooCommerce', 'guten' ),
            'priority' => '120'
        );

        $section = 'guten-site-layout-section-woocommerce';

        $sections[] = array(
            'id' => $section,
            'title' => __( 'Product Page (Guten)', 'guten' ),
            'priority' => '80',
            'panel' => $panel
        );
        
        $options['guten-remove-wc-page-titles'] = array(
            'id' => 'guten-remove-wc-page-titles',
            'label'   => __( 'Remove Shop Page Titles', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $choices = array(
            '2' => __( '2', 'guten' ),
            '3' => __( '3', 'guten' ),
            '4' => __( '4', 'guten' ),
            '5' => __( '5', 'guten' )
        );
        $options['guten-woocommerce-custom-cols'] = array(
            'id' => 'guten-woocommerce-custom-cols',
            'label'   => __( 'Product Columns', 'guten' ),
            'section' => $section,
            'type'    => 'select',
            'choices' => $choices,
            'default' => '4'
        );
        $options['guten-woocommerce-products-per-page'] = array(
            'id' => 'guten-woocommerce-products-per-page',
            'label'   => __( 'Products Per Page', 'guten' ),
            'section' => $section,
            'type'    => 'number',
            'default' => 8
        );
        $options['guten-remove-wc-results-sorting'] = array(
            'id' => 'guten-remove-wc-results-sorting',
            'label'   => __( 'Remove Shop Results & Sorting', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $options['guten-remove-product-border'] = array(
            'id' => 'guten-remove-product-border',
            'label'   => __( 'Remove Product Border', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $options['guten-remove-cats-count'] = array(
            'id' => 'guten-remove-cats-count',
            'label'   => __( 'Remove Categories Count', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );

        $options['guten-align-product-titles'] = array(
            'id' => 'guten-align-product-titles',
            'label'   => __( 'Align Product Titles', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'description' => __( 'Try keep titles to 2 lines, if more then you can <a href="https://kairaweb.com/documentation/add-custom-css-to-align-the-woocommerce-titles/" target="_blank">add CSS to align the titles</a>', 'guten' ),
            'default' => 0,
        );
        $options['guten-wc-mobile-prod-full-width'] = array(
            'id' => 'guten-wc-mobile-prod-full-width',
            'label'   => __( 'Products Full Width on Mobile', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $options['guten-help-note-wc-shop'] = array(
            'id' => 'guten-help-note-wc-shop',
            'section' => $section,
            'type'    => 'help',
            'description' => __( '<span><b>Guten Premium Features:</b><br />- Set Shop & Product pages to Left Sidebar<br />- Set Shop & Product pages to Full Width<br />- Add Floating Sidebar to Shop Full Width layouts</span>', 'guten' )
        );

        $section = 'guten-section-woocommerce-single';

        $sections[] = array(
            'id' => $section,
            'title' => __( 'Product Single Page (Guten)', 'guten' ),
            'priority' => '90',
            'panel' => $panel
        );

        $options['guten-wc-single-remove-bc'] = array(
            'id' => 'guten-wc-single-remove-bc',
            'label'   => __( 'Remove Breadcrumbs', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $options['guten-wc-single-remove-sku'] = array(
            'id' => 'guten-wc-single-remove-sku',
            'label'   => __( 'Remove Product SKU', 'guten' ),
            'section' => $section,
            'type'    => 'checkbox',
            'default' => 0,
        );
        $options['guten-set-wc-single-col-width'] = array(
            'id' => 'guten-set-wc-single-col-width',
            'label'   => __( 'Product Single Page Column Width', 'guten' ),
            'section' => $section,
            'type'    => 'range',
            'input_attrs' => array(
                'min'   => 15,
                'max'   => 48,
                'step'  => 1,
            ),
            'description' => __( 'Set the width of the Product Single Page Columns', 'guten' ),
            'default' => 48
        );
        $options['guten-help-note-wc-single'] = array(
            'id' => 'guten-help-note-wc-single',
            'section' => $section,
            'type'    => 'help',
            'description' => __( '<span><b>Guten Premium Features:</b><br />- Remove Related Products<br />- Change Product Tabs - Side/Horizontal/Link Tabs</span>', 'guten' )
        );

    endif;


	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_guten_options' );
