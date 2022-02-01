<?php
/**
 * Describe child theme functions
 *
 * @package Owner
 * @subpackage Business Owner
 * 
 */
 
 /*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'business_owner_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function business_owner_setup() {

	    $business_owner_theme_info = wp_get_theme();
	    $GLOBALS['business_owner_version'] = $business_owner_theme_info->get( 'Version' );
	}
	endif;

add_action( 'after_setup_theme', 'business_owner_setup' );

/*-------------------------------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'business_owner_fonts_url' ) ) :
	/**
	 * Register Google fonts
	 *
	 * @return string Google fonts URL for the theme.
	 * @since 1.0.0
	 */
    function business_owner_fonts_url() {

        $fonts_url = '';
        $font_families = array();

        /*
         * Translators: If there are characters in your language that are not supported
         * by Dosis, translate this to 'off'. Do not translate into your own language.
         */
        if ( 'off' !== _x( 'on', 'Dosis font: on or off', 'business-owner' ) ) {
            $font_families[] = 'Dosis:300,400,400i,500,700';
        }

        if( $font_families ) {
            $query_args = array(
                'family' => urlencode( implode( '|', $font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            );

            $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
endif;

/*-------------------------------------------------------------------------------------------------------------------------------*/
	
if( ! function_exists( 'business_owner_customize_register' ) ) :
	/**
	 * Managed the theme default color
	 */
	function business_owner_customize_register( $wp_customize ) {
		
		global $wp_customize;

		$wp_customize->get_setting( 'owner_theme_skin_color' )->default = '#1CB9C8';
       
    /**
     * Static Counter Section
     *
     * @since 1.0.0
     */
    $wp_customize->add_section(
        'static_counter_section',
        array(
            'title'     => esc_html__( 'Static Counter', 'business-owner' ),
            'panel'     => 'owner_additional_settings_panel',
            'priority'  => 15,
        )
    );

    /**
     * Repeater field for static counter
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting( 
        'static_counters', 
        array(
            'sanitize_callback' => 'owner_sanitize_repeater',
            'default' => json_encode(array(
                array(
                    'counter_title'  => '',
                    'counter_number' => '',
                    'counter_icon'   => 'fa fa-thumbs-o-up'
                    )
            ))
        )
    );
    $wp_customize->add_control( new Business_Owner_Repeater_Controler(
        $wp_customize, 
            'static_counters', 
            array(
                'label'   => __( 'Static Counters', 'business-owner' ),
                'section' => 'static_counter_section',
                'settings' => 'static_counters',
                'priority' => 5,
                'business_owner_box_label' => __( 'Single Counter','business-owner' ),
                'business_owner_box_add_control' => __( 'Add Counter','business-owner' ),
            ),
            array(
                'counter_title' => array(
                    'type'        => 'text',
                    'label'       => __( 'Counter Title', 'business-owner' ),
                    'description' => __( 'Enter the title for single counter.', 'business-owner' )
                ),
                'counter_number' => array(
                    'type'        => 'number',
                    'label'       => __( 'Counter Number', 'business-owner' ),
                    'description' => __( 'Enter the number for single counter.', 'business-owner' )
                ),
                'counter_icon' => array(
                    'type'        => 'icon',
                    'default'     => 'fa fa-thumbs-o-up',
                    'label'       => __( 'Counter Icon', 'business-owner' ),
                    'description' => __( 'Choose the icon for single counter.', 'business-owner' )
                )
            )
        )
    );
    
         /**
	     * Switch option for slider curve shape at bottom 
	     *
	     * @since 1.1.3
	     */
	    $wp_customize->add_setting(
	        'slider_shape_option',
	        array(
	            'default' => 'show',
	            'sanitize_callback' => 'owner_sanitize_switch_option',
	            )
	    );
	    $wp_customize->add_control( new Owner_Customize_Switch_Control(
	        $wp_customize, 
	            'slider_shape_option', 
	            array(
	                'type' 		=> 'switch',
	                'label' 	=> esc_html__( 'Slider Shape Option', 'business-owner' ),
	                'description' 	=> esc_html__( 'Show/hide curve shape at the bottom of slider.', 'business-owner' ),
	                'section' 	=> 'owner_slider_section',
	                'choices'   => array(
	                    'show' 	=> esc_html__( 'Show', 'business-owner' ),
	                    'hide' 	=> esc_html__( 'Hide', 'business-owner' )
	                    ),
	                'priority'  => 5,
	            )
	        )
	    );
        
        /**
	     * Theme Color
	     * Field for Image Radio
	     *
	     * @since 1.0.0
	     */
	    $wp_customize->add_setting(
	        'owner_theme_skin_color',
	        array(
	            'default'           => '#1CB9C8',
	            'sanitize_callback' => 'sanitize_hex_color',
	        )
	    );
	    $wp_customize->add_control( new Owner_Customize_Control_Radio_Image(
	        $wp_customize,
	        'owner_theme_skin_color',
	            array(
	                'label'    => esc_html__( 'Theme Skin Color', 'business-owner' ),
	                'description' => esc_html__( 'Choose website skin color from available options.', 'business-owner' ),
	                'section'  => 'colors',
	                'choices'  => array(
		                    '#f9ab03' => array(
		                        'label' => esc_html__( 'Skin 1', 'business-owner' ),
		                        'url'   => '%s/assets/images/skin_color_1.jpg'
		                    ),
		                    '#f82510' => array(
		                        'label' => esc_html__( 'Skin 2', 'business-owner' ),
		                        'url'   => '%s/assets/images/skin_color_2.jpg'
		                    ),
		                    '#105cf8' => array(
		                        'label' => esc_html__( 'Skin 3', 'business-owner' ),
		                        'url'   => '%s/assets/images/skin_color_3.jpg'
		                    ),
                            '#1CB9C8' => array(
		                        'label' => esc_html__( 'Skin 4', 'business-owner' ),
		                        'url'   => get_stylesheet_directory_uri().'/assets/images/skin_color_4.jpg'
		                    )
		            ),
		            'priority' => 1
	            )
	        )
	    );    
	}
endif;

add_action( 'customize_register', 'business_owner_customize_register', 20 );

/*-------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue child theme styles and scripts
 */
add_action( 'wp_enqueue_scripts', 'business_owner_scripts', 20 );

function business_owner_scripts() {
    
    global $business_owner_version;
    
    wp_enqueue_style( 'business-owner-google-font', business_owner_fonts_url(), array(), null );
    
    wp_dequeue_style( 'owner-style' );
    wp_dequeue_style( 'owner-responsive-style' );
    
	wp_enqueue_style( 'owner-parent-style', get_template_directory_uri() . '/style.css', array(), esc_attr( $business_owner_version ) );
    
    wp_enqueue_style( 'owner-parent-responsive', get_template_directory_uri() . '/assets/css/owner-responsive.css', array(), esc_attr( $business_owner_version ) );
    
    wp_enqueue_style( 'business-owner', get_stylesheet_uri(), array(), esc_attr( $business_owner_version ) );
    
    wp_enqueue_script( 'business-owner-waypoint-js', get_stylesheet_directory_uri() . '/assets/counter-up/waypoint.js', array(), '1.0', true );
    wp_enqueue_script( 'business_owner_counter_up', get_stylesheet_directory_uri() . '/assets/counter-up/jquery.counterup.min.js', array( 'jquery' ), '1.0' );
    wp_enqueue_script( 'business_owner_custom_scripts', get_stylesheet_directory_uri() . '/assets/scripts/custom-scripts.js', array( 'jquery' ), esc_attr( $business_owner_version ) );
    
    $business_owner_theme_color = esc_attr( get_theme_mod( 'owner_theme_skin_color', '#1CB9C8' ) );
    $business_owner_theme_color_rgba = business_owner_hex2rgba( $business_owner_theme_color, '0.6' );
    $output_css = '';
    
    $output_css .= ".navigation .nav-links a:hover,.bttn:hover,button,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover,.edit-link .post-edit-link,.reply .comment-reply-link,.header-search-wrapper .search-main:hover,.header-search-wrapper .search-submit ,.mt-slider-btn-wrap .slider-btn:hover,.owner-slider-wrapper .lSAction > a:hover,.widget_search .search-submit,.widget_search .search-submit,.cta-btn-wrap a:hover,.owner_portfolio .single-post-wrapper .portfolio-title-wrapper .portfolio-link,.team-wrapper .team-desc,.owner_testimonials  .lSSlideOuter .lSPager.lSpg > li:hover a,.owner_testimonials  .lSSlideOuter .lSPager.lSpg > li.active a,#mt-scrollup,.error404 .page-title,.mt-slider-btn-wrap .slider-btn:first-child{ background: ". esc_attr( $business_owner_theme_color ) ."}\n";
    
    $output_css .= "a,a:hover,a:focus,a:active,.entry-footer a:hover,.comment-author .fn .url:hover,.commentmetadata .comment-edit-link,#cancel-comment-reply-link,#cancel-comment-reply-link:before,.logged-in-as a,.social-icons-holder a:hover,#site-navigation ul li.current-menu-item > a, #site-navigation ul li:hover > a,.widget a:hover,.widget a:hover::before,.widget li:hover::before,.owner_grid_layout .post-title a:hover,.team-title-wrapper .post-title a:hover,.testimonial-content::before,.owner_testimonials .client-name ,.latest-posts-wrapper .byline a:hover, .latest-posts-wrapper .posted-on a:hover,.latest-posts-wrapper .news-title a:hover,.entry-title a:hover,.post-readmore a:hover,.site-info a:hover,.grid-archive-layout .entry-title a:hover,.owner-slider-wrapper .slide-title span{ color: ". esc_attr( $business_owner_theme_color ) ."}\n";

    $output_css .= ".navigation .nav-links a,.bttn,button,input[type='button'],input[type='reset'],input[type='submit'],.header-search-wrapper .search-main:hover,.mt-slider-btn-wrap .slider-btn:hover,.widget_search .search-submit,.cta-btn-wrap a:hover{ border-color: ". esc_attr( $business_owner_theme_color ) ."}\n";
    
    $output_css .=".comment-list .comment-body{ border-top-color:". esc_attr( $business_owner_theme_color ) ."; }\n";
        
    $output_css .=".owner-slider-wrapper .slide-title::after, .owner-slider-wrapper .slide-title::before,.widget .widget-title,.widget .owner-widget-wrapper .widget-title{ border-left-color:". esc_attr( $business_owner_theme_color ) ."; }\n";
        
    $output_css .=".widget .owner-widget-wrapper .widget-title{ border-right-color:". esc_attr( $business_owner_theme_color ) ."; }\n";
    
    $output_css .=".business_owner_static_counter .owner-widget-wrapper::before { background-color:". esc_attr( $business_owner_theme_color_rgba ) ."; }\n";

    $refine_output_css = business_owner_css_strip_whitespace( $output_css );

    wp_add_inline_style( 'business-owner', $refine_output_css );
    
}

/**
 * Get rgba color from hex
 *
 * @since 1.0.0
 */
function business_owner_hex2rgba( $color, $opacity ) {
    if ( $color[0] == '#' ) {
        $color = substr( $color, 1 );
    }
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    $rgb =  array_map( 'hexdec', $hex );
    $output = 'rgba( '.implode( ",", $rgb ).','.$opacity.' )';
    return $output;
}
/*--------------------------------------------------------------------------------------------------------------*/
/**
 * Enqueue required scritps/styles for customizer panel
 */
function business_owner_customize_backend_scripts() {
    global $business_owner_version;
    
    wp_enqueue_style( 'business_owner_admin_customizer_style', get_stylesheet_directory_uri() . '/assets/css/customizer-style.css', array(), esc_attr( $business_owner_version ) );
    
    wp_enqueue_script( 'business_owner_admin_customizer_scripts', get_stylesheet_directory_uri() . '/assets/scripts/customizer-control.js', array( 'jquery', 'customize-controls' ), esc_attr( $business_owner_version ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'business_owner_customize_backend_scripts', 20 );
      
/*-----------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'business_owner_css_strip_whitespace' ) ) :

    /**
     * Get minified css and removed space
     *
     * @since 1.0.0
     */

    function business_owner_css_strip_whitespace( $css ){
        $replace = array(
            "#/\*.*?\*/#s" => "",  // Strip C style comments.
            "#\s\s+#"      => " ", // Strip excess whitespace.
        );
        $search = array_keys( $replace );
        $css = preg_replace( $search, $replace, $css );

        $replace = array(
            ": "  => ":",
            "; "  => ";",
            " {"  => "{",
            " }"  => "}",
            ", "  => ",",
            "{ "  => "{",
            ";}"  => "}", // Strip optional semicolons.
            ",\n" => ",", // Don't wrap multiple selectors.
            "\n}" => "}", // Don't wrap closing braces.
            "} "  => "}\n", // Put each rule on it's own line.
        );
        $search = array_keys( $replace );
        $css = str_replace( $search, $replace, $css );

        return trim( $css );
    }

endif;

 /**
 * Sanitize repeater value
 *
 * @since 1.0.0
 */
 function owner_sanitize_repeater( $input ){
    $input_decoded = json_decode( $input, true );
                
    if( !empty( $input_decoded ) ) {
        foreach ( $input_decoded as $boxes => $box ){
            foreach ( $box as $key => $value ){
                $input_decoded[$boxes][$key] = wp_kses_post( $value );
            }
        }
    return json_encode( $input_decoded );
    }
    return $input;
 }
/**
 * Include widgets files
 */
require get_stylesheet_directory() . '/widgets/customizer-classes.php';
require get_stylesheet_directory() . '/widgets/widget-static-counter.php';

/*===========================================================================================================================*/
/**
 * Define font awesome icons
 *
 * @return array();
 * @since 1.0.0
 */
if( ! function_exists( 'business_owner_font_awesome_icon_array' ) ) :
    function business_owner_font_awesome_icon_array(){
        return array("fa fa-glass","fa fa-music","fa fa-search","fa fa-envelope-o","fa fa-heart","fa fa-star","fa fa-star-o","fa fa-user","fa fa-film","fa fa-th-large","fa fa-th","fa fa-th-list","fa fa-check","fa fa-remove","fa fa-close","fa fa-times","fa fa-search-plus","fa fa-search-minus","fa fa-power-off","fa fa-signal","fa fa-gear","fa fa-cog","fa fa-trash-o","fa fa-home","fa fa-file-o","fa fa-clock-o","fa fa-road","fa fa-download","fa fa-arrow-circle-o-down","fa fa-arrow-circle-o-up","fa fa-inbox","fa fa-play-circle-o","fa fa-rotate-right","fa fa-repeat","fa fa-refresh","fa fa-list-alt","fa fa-lock","fa fa-flag","fa fa-headphones","fa fa-volume-off","fa fa-volume-down","fa fa-volume-up","fa fa-qrcode","fa fa-barcode","fa fa-tag","fa fa-tags","fa fa-book","fa fa-bookmark","fa fa-print","fa fa-camera","fa fa-font","fa fa-bold","fa fa-italic","fa fa-text-height","fa fa-text-width","fa fa-align-left","fa fa-align-center","fa fa-align-right","fa fa-align-justify","fa fa-list","fa fa-dedent","fa fa-outdent","fa fa-indent","fa fa-video-camera","fa fa-photo","fa fa-image","fa fa-picture-o","fa fa-pencil","fa fa-map-marker","fa fa-adjust","fa fa-tint","fa fa-edit","fa fa-pencil-square-o","fa fa-share-square-o","fa fa-check-square-o","fa fa-arrows","fa fa-step-backward","fa fa-fast-backward","fa fa-backward","fa fa-play","fa fa-pause","fa fa-stop","fa fa-forward","fa fa-fast-forward","fa fa-step-forward","fa fa-eject","fa fa-chevron-left","fa fa-chevron-right","fa fa-plus-circle","fa fa-minus-circle","fa fa-times-circle","fa fa-check-circle","fa fa-question-circle","fa fa-info-circle","fa fa-crosshairs","fa fa-times-circle-o","fa fa-check-circle-o","fa fa-ban","fa fa-arrow-left","fa fa-arrow-right","fa fa-arrow-up","fa fa-arrow-down","fa fa-mail-forward","fa fa-share","fa fa-expand","fa fa-compress","fa fa-plus","fa fa-minus","fa fa-asterisk","fa fa-exclamation-circle","fa fa-gift","fa fa-leaf","fa fa-fire","fa fa-eye","fa fa-eye-slash","fa fa-warning","fa fa-exclamation-triangle","fa fa-plane","fa fa-calendar","fa fa-random","fa fa-comment","fa fa-magnet","fa fa-chevron-up","fa fa-chevron-down","fa fa-retweet","fa fa-shopping-cart","fa fa-folder","fa fa-folder-open","fa fa-arrows-v","fa fa-arrows-h","fa fa-bar-chart-o","fa fa-bar-chart","fa fa-twitter-square","fa fa-facebook-square","fa fa-camera-retro","fa fa-key","fa fa-gears","fa fa-cogs","fa fa-comments","fa fa-thumbs-o-up","fa fa-thumbs-o-down","fa fa-star-half","fa fa-heart-o","fa fa-sign-out","fa fa-linkedin-square","fa fa-thumb-tack","fa fa-external-link","fa fa-sign-in","fa fa-trophy","fa fa-github-square","fa fa-upload","fa fa-lemon-o","fa fa-phone","fa fa-square-o","fa fa-bookmark-o","fa fa-phone-square","fa fa-twitter","fa fa-facebook-f","fa fa-facebook","fa fa-github","fa fa-unlock","fa fa-credit-card","fa fa-feed","fa fa-rss","fa fa-hdd-o","fa fa-bullhorn","fa fa-bell","fa fa-certificate","fa fa-hand-o-right","fa fa-hand-o-left","fa fa-hand-o-up","fa fa-hand-o-down","fa fa-arrow-circle-left","fa fa-arrow-circle-right","fa fa-arrow-circle-up","fa fa-arrow-circle-down","fa fa-globe","fa fa-wrench","fa fa-tasks","fa fa-filter","fa fa-briefcase","fa fa-arrows-alt","fa fa-group","fa fa-users","fa fa-chain","fa fa-link","fa fa-cloud","fa fa-flask","fa fa-cut","fa fa-scissors","fa fa-copy","fa fa-files-o","fa fa-paperclip","fa fa-save","fa fa-floppy-o","fa fa-square","fa fa-navicon","fa fa-reorder","fa fa-bars","fa fa-list-ul","fa fa-list-ol","fa fa-strikethrough","fa fa-underline","fa fa-table","fa fa-magic","fa fa-truck","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-money","fa fa-caret-down","fa fa-caret-up","fa fa-caret-left","fa fa-caret-right","fa fa-columns","fa fa-unsorted","fa fa-sort","fa fa-sort-down","fa fa-sort-desc","fa fa-sort-up","fa fa-sort-asc","fa fa-envelope","fa fa-linkedin","fa fa-rotate-left","fa fa-undo","fa fa-legal","fa fa-gavel","fa fa-dashboard","fa fa-tachometer","fa fa-comment-o","fa fa-comments-o","fa fa-flash","fa fa-bolt","fa fa-sitemap","fa fa-umbrella","fa fa-paste","fa fa-clipboard","fa fa-lightbulb-o","fa fa-exchange","fa fa-cloud-download","fa fa-cloud-upload","fa fa-user-md","fa fa-stethoscope","fa fa-suitcase","fa fa-bell-o","fa fa-coffee","fa fa-cutlery","fa fa-file-text-o","fa fa-building-o","fa fa-hospital-o","fa fa-ambulance","fa fa-medkit","fa fa-fighter-jet","fa fa-beer","fa fa-h-square","fa fa-plus-square","fa fa-angle-double-left","fa fa-angle-double-right","fa fa-angle-double-up","fa fa-angle-double-down","fa fa-angle-left","fa fa-angle-right","fa fa-angle-up","fa fa-angle-down","fa fa-desktop","fa fa-laptop","fa fa-tablet","fa fa-mobile-phone","fa fa-mobile","fa fa-circle-o","fa fa-quote-left","fa fa-quote-right","fa fa-spinner","fa fa-circle","fa fa-mail-reply","fa fa-reply","fa fa-github-alt","fa fa-folder-o","fa fa-folder-open-o","fa fa-smile-o","fa fa-frown-o","fa fa-meh-o","fa fa-gamepad","fa fa-keyboard-o","fa fa-flag-o","fa fa-flag-checkered","fa fa-terminal","fa fa-code","fa fa-mail-reply-all","fa fa-reply-all","fa fa-star-half-empty","fa fa-star-half-full","fa fa-star-half-o","fa fa-location-arrow","fa fa-crop","fa fa-code-fork","fa fa-unlink","fa fa-chain-broken","fa fa-question","fa fa-info","fa fa-exclamation","fa fa-superscript","fa fa-subscript","fa fa-eraser","fa fa-puzzle-piece","fa fa-microphone","fa fa-microphone-slash","fa fa-shield","fa fa-calendar-o","fa fa-fire-extinguisher","fa fa-rocket","fa fa-maxcdn","fa fa-chevron-circle-left","fa fa-chevron-circle-right","fa fa-chevron-circle-up","fa fa-chevron-circle-down","fa fa-html5","fa fa-css3","fa fa-anchor","fa fa-unlock-alt","fa fa-bullseye","fa fa-ellipsis-h","fa fa-ellipsis-v","fa fa-rss-square","fa fa-play-circle","fa fa-ticket","fa fa-minus-square","fa fa-minus-square-o","fa fa-level-up","fa fa-level-down","fa fa-check-square","fa fa-pencil-square","fa fa-external-link-square","fa fa-share-square","fa fa-compass","fa fa-toggle-down","fa fa-caret-square-o-down","fa fa-toggle-up","fa fa-caret-square-o-up","fa fa-toggle-right","fa fa-caret-square-o-right","fa fa-euro","fa fa-eur","fa fa-gbp","fa fa-dollar","fa fa-usd","fa fa-rupee","fa fa-inr","fa fa-cny","fa fa-rmb","fa fa-yen","fa fa-jpy","fa fa-ruble","fa fa-rouble","fa fa-rub","fa fa-won","fa fa-krw","fa fa-bitcoin","fa fa-btc","fa fa-file","fa fa-file-text","fa fa-sort-alpha-asc","fa fa-sort-alpha-desc","fa fa-sort-amount-asc","fa fa-sort-amount-desc","fa fa-sort-numeric-asc","fa fa-sort-numeric-desc","fa fa-thumbs-up","fa fa-thumbs-down","fa fa-youtube-square","fa fa-youtube","fa fa-xing","fa fa-xing-square","fa fa-youtube-play","fa fa-dropbox","fa fa-stack-overflow","fa fa-instagram","fa fa-flickr","fa fa-adn","fa fa-bitbucket","fa fa-bitbucket-square","fa fa-tumblr","fa fa-tumblr-square","fa fa-long-arrow-down","fa fa-long-arrow-up","fa fa-long-arrow-left","fa fa-long-arrow-right","fa fa-apple","fa fa-windows","fa fa-android","fa fa-linux","fa fa-dribbble","fa fa-skype","fa fa-foursquare","fa fa-trello","fa fa-female","fa fa-male","fa fa-gittip","fa fa-gratipay","fa fa-sun-o","fa fa-moon-o","fa fa-archive","fa fa-bug","fa fa-vk","fa fa-weibo","fa fa-renren","fa fa-pagelines","fa fa-stack-exchange","fa fa-arrow-circle-o-right","fa fa-arrow-circle-o-left","fa fa-toggle-left","fa fa-caret-square-o-left","fa fa-dot-circle-o","fa fa-wheelchair","fa fa-vimeo-square","fa fa-turkish-lira","fa fa-try","fa fa-plus-square-o","fa fa-space-shuttle","fa fa-slack","fa fa-envelope-square","fa fa-wordpress","fa fa-openid","fa fa-institution","fa fa-bank","fa fa-university","fa fa-mortar-board","fa fa-graduation-cap","fa fa-yahoo","fa fa-google","fa fa-reddit","fa fa-reddit-square","fa fa-stumbleupon-circle","fa fa-stumbleupon","fa fa-delicious","fa fa-digg","fa fa-pied-piper-pp","fa fa-pied-piper-alt","fa fa-drupal","fa fa-joomla","fa fa-language","fa fa-fax","fa fa-building","fa fa-child","fa fa-paw","fa fa-spoon","fa fa-cube","fa fa-cubes","fa fa-behance","fa fa-behance-square","fa fa-steam","fa fa-steam-square","fa fa-recycle","fa fa-automobile","fa fa-car","fa fa-cab","fa fa-taxi","fa fa-tree","fa fa-spotify","fa fa-deviantart","fa fa-soundcloud","fa fa-database","fa fa-file-pdf-o","fa fa-file-word-o","fa fa-file-excel-o","fa fa-file-powerpoint-o","fa fa-file-photo-o","fa fa-file-picture-o","fa fa-file-image-o","fa fa-file-zip-o","fa fa-file-archive-o","fa fa-file-sound-o","fa fa-file-audio-o","fa fa-file-movie-o","fa fa-file-video-o","fa fa-file-code-o","fa fa-vine","fa fa-codepen","fa fa-jsfiddle","fa fa-life-bouy","fa fa-life-buoy","fa fa-life-saver","fa fa-support","fa fa-life-ring","fa fa-circle-o-notch","fa fa-ra","fa fa-resistance","fa fa-rebel","fa fa-ge","fa fa-empire","fa fa-git-square","fa fa-git","fa fa-y-combinator-square","fa fa-yc-square","fa fa-hacker-news","fa fa-tencent-weibo","fa fa-qq","fa fa-wechat","fa fa-weixin","fa fa-send","fa fa-paper-plane","fa fa-send-o","fa fa-paper-plane-o","fa fa-history","fa fa-circle-thin","fa fa-header","fa fa-paragraph","fa fa-sliders","fa fa-share-alt","fa fa-share-alt-square","fa fa-bomb","fa fa-soccer-ball-o","fa fa-futbol-o","fa fa-tty","fa fa-binoculars","fa fa-plug","fa fa-slideshare","fa fa-twitch","fa fa-yelp","fa fa-newspaper-o","fa fa-wifi","fa fa-calculator","fa fa-paypal","fa fa-google-wallet","fa fa-cc-visa","fa fa-cc-mastercard","fa fa-cc-discover","fa fa-cc-amex","fa fa-cc-paypal","fa fa-cc-stripe","fa fa-bell-slash","fa fa-bell-slash-o","fa fa-trash","fa fa-copyright","fa fa-at","fa fa-eyedropper","fa fa-paint-brush","fa fa-birthday-cake","fa fa-area-chart","fa fa-pie-chart","fa fa-line-chart","fa fa-lastfm","fa fa-lastfm-square","fa fa-toggle-off","fa fa-toggle-on","fa fa-bicycle","fa fa-bus","fa fa-ioxhost","fa fa-angellist","fa fa-cc","fa fa-shekel","fa fa-sheqel","fa fa-ils","fa fa-meanpath","fa fa-buysellads","fa fa-connectdevelop","fa fa-dashcube","fa fa-forumbee","fa fa-leanpub","fa fa-sellsy","fa fa-shirtsinbulk","fa fa-simplybuilt","fa fa-skyatlas","fa fa-cart-plus","fa fa-cart-arrow-down","fa fa-diamond","fa fa-ship","fa fa-user-secret","fa fa-motorcycle","fa fa-street-view","fa fa-heartbeat","fa fa-venus","fa fa-mars","fa fa-mercury","fa fa-intersex","fa fa-transgender","fa fa-transgender-alt","fa fa-venus-double","fa fa-mars-double","fa fa-venus-mars","fa fa-mars-stroke","fa fa-mars-stroke-v","fa fa-mars-stroke-h","fa fa-neuter","fa fa-genderless","fa fa-facebook-official","fa fa-pinterest-p","fa fa-whatsapp","fa fa-server","fa fa-user-plus","fa fa-user-times","fa fa-hotel","fa fa-bed","fa fa-viacoin","fa fa-train","fa fa-subway","fa fa-medium","fa fa-yc","fa fa-y-combinator","fa fa-optin-monster","fa fa-opencart","fa fa-expeditedssl","fa fa-battery-4","fa fa-battery-full","fa fa-battery-3","fa fa-battery-three-quarters","fa fa-battery-2","fa fa-battery-half","fa fa-battery-1","fa fa-battery-quarter","fa fa-battery-0","fa fa-battery-empty","fa fa-mouse-pointer","fa fa-i-cursor","fa fa-object-group","fa fa-object-ungroup","fa fa-sticky-note","fa fa-sticky-note-o","fa fa-cc-jcb","fa fa-cc-diners-club","fa fa-clone","fa fa-balance-scale","fa fa-hourglass-o","fa fa-hourglass-1","fa fa-hourglass-start","fa fa-hourglass-2","fa fa-hourglass-half","fa fa-hourglass-3","fa fa-hourglass-end","fa fa-hourglass","fa fa-hand-grab-o","fa fa-hand-rock-o","fa fa-hand-stop-o","fa fa-hand-paper-o","fa fa-hand-scissors-o","fa fa-hand-lizard-o","fa fa-hand-spock-o","fa fa-hand-pointer-o","fa fa-hand-peace-o","fa fa-trademark","fa fa-registered","fa fa-creative-commons","fa fa-gg","fa fa-gg-circle","fa fa-tripadvisor","fa fa-odnoklassniki","fa fa-odnoklassniki-square","fa fa-get-pocket","fa fa-wikipedia-w","fa fa-safari","fa fa-chrome","fa fa-firefox","fa fa-opera","fa fa-internet-explorer","fa fa-tv","fa fa-television","fa fa-contao","fa fa-500px","fa fa-amazon","fa fa-calendar-plus-o","fa fa-calendar-minus-o","fa fa-calendar-times-o","fa fa-calendar-check-o","fa fa-industry","fa fa-map-pin","fa fa-map-signs","fa fa-map-o","fa fa-map","fa fa-commenting","fa fa-commenting-o","fa fa-houzz","fa fa-vimeo","fa fa-black-tie","fa fa-fonticons","fa fa-reddit-alien","fa fa-edge","fa fa-credit-card-alt","fa fa-codiepie","fa fa-modx","fa fa-fort-awesome","fa fa-usb","fa fa-product-hunt","fa fa-mixcloud","fa fa-scribd","fa fa-pause-circle","fa fa-pause-circle-o","fa fa-stop-circle","fa fa-stop-circle-o","fa fa-shopping-bag","fa fa-shopping-basket","fa fa-hashtag","fa fa-bluetooth","fa fa-bluetooth-b","fa fa-percent","fa fa-gitlab","fa fa-wpbeginner","fa fa-wpforms","fa fa-envira","fa fa-universal-access","fa fa-wheelchair-alt","fa fa-question-circle-o","fa fa-blind","fa fa-audio-description","fa fa-volume-control-phone","fa fa-braille","fa fa-assistive-listening-systems","fa fa-asl-interpreting","fa fa-american-sign-language-interpreting","fa fa-deafness","fa fa-hard-of-hearing","fa fa-deaf","fa fa-glide","fa fa-glide-g","fa fa-signing","fa fa-sign-language","fa fa-low-vision","fa fa-viadeo","fa fa-viadeo-square","fa fa-snapchat","fa fa-snapchat-ghost","fa fa-snapchat-square","fa fa-pied-piper","fa fa-first-order","fa fa-yoast","fa fa-themeisle","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-fa","fa fa-font-awesome");
    }
endif;

/*===========================================================================================================================*/
/**
 * Define font awesome social media icons
 *
 * @return array();
 * @since 1.0.0
 */
if( ! function_exists( 'business_owner_font_awesome_social_icon_array' ) ) :
    function business_owner_font_awesome_social_icon_array(){
        return array(
                "fa fa-facebook-square","fa fa-facebook-f","fa fa-facebook","fa fa-facebook-official","fa fa-twitter-square","fa fa-twitter","fa fa-yahoo","fa fa-google","fa fa-google-wallet","fa fa-google-plus-circle","fa fa-google-plus-official","fa fa-instagram","fa fa-linkedin-square","fa fa-linkedin","fa fa-pinterest-p","fa fa-pinterest","fa fa-pinterest-square","fa fa-google-plus-square","fa fa-google-plus","fa fa-youtube-square","fa fa-youtube","fa fa-youtube-play","fa fa-vimeo","fa fa-vimeo-square",
            );
    }
endif;


/**
 * function for slider wrapper start
 */
if( ! function_exists( 'owner_slider_wrapper_start' ) ):
	function owner_slider_wrapper_start() {
	   $slider_shape_option = get_theme_mod( 'slider_shape_option', 'show' );
       if( $slider_shape_option == 'show' ){
            $slider_layout = 'curve-shape-layout';
       }else{
            $slider_layout = '';
       } ?>
       <div class="owner-slider-wrapper <?php echo esc_attr( $slider_layout ); ?>">
<?php       
	}
endif;