<?php                     
/**
 * Wide Range Lite functions and definitions
 *
 * @package Wide Range Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'wide_range_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.  
 */
function wide_range_lite_setup() {		
	global $content_width;   
    if ( ! isset( $content_width ) ) {
        $content_width = 670; /* pixels */
    }	

	load_theme_textdomain( 'wide-range-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support('html5');	
	add_theme_support( 'post-thumbnails' );		
	add_theme_support( 'title-tag' );	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 200,
		'flex-height' => true,
	) );	
	add_theme_support( 'custom-background', array(
		'default-image'          => get_template_directory_uri().'/images/defaultbodybg.jpg',
		'default-color' => 'ffffff'
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wide-range-lite' ),
		'footer' => __( 'Footer Menu', 'wide-range-lite' ),						
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // wide_range_lite_setup
add_action( 'after_setup_theme', 'wide_range_lite_setup' );
function wide_range_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'wide-range-lite' ),
		'description'   => __( 'Appears on blog page sidebar', 'wide-range-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'wide-range-lite' ),
		'description'   => __( 'Appears on footer', 'wide-range-lite' ),
		'id'            => 'site-footer-widget-column-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'wide-range-lite' ),
		'description'   => __( 'Appears on footer', 'wide-range-lite' ),
		'id'            => 'site-footer-widget-column-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'wide-range-lite' ),
		'description'   => __( 'Appears on footer', 'wide-range-lite' ),
		'id'            => 'site-footer-widget-column-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
	
}
add_action( 'widgets_init', 'wide_range_lite_widgets_init' );


function wide_range_lite_font_url(){
		$font_url = '';		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','Roboto Condensed:on or off','wide-range-lite');		
		
		/* Translators: If there are any character that are not
		* supported by Open Sans, trsnalate this to off, do not
		* translate into your own language.
		*/
		$opensans = _x('on','Open Sans:on or off','wide-range-lite');		
		
		
		    if('off' !== $robotocondensed || 'off' !== $opensans ){
			    $font_family = array();
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,700';
			}
			
			if('off' !== $opensans){
				$font_family[] = 'Open Sans:400,600,700,800';
			}					
						
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function wide_range_lite_scripts() {
	wp_enqueue_style('wide-range-lite-font', wide_range_lite_font_url(), array());
	wp_enqueue_style( 'wide-range-lite-basic-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'fontawesome-all-style', get_template_directory_uri().'/fontsawesome/css/fontawesome-all.css' );
	wp_enqueue_style( 'wide-range-lite-responsive', get_template_directory_uri()."/css/responsive.css" );
	wp_enqueue_script( 'jquery-nivo-slider', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'wide-range-lite-editable', get_template_directory_uri() . '/js/editable.js' );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wide_range_lite_scripts' );

function wide_range_lite_ie_stylesheet(){
	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style('wide-range-lite-ie', get_template_directory_uri().'/css/ie.css', array( 'wide-range-lite-style' ), '20190312' );
	wp_style_add_data('wide-range-lite-ie','conditional','lt IE 10');
	
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'wide-range-lite-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'wide-range-lite-style' ), '20190312' );
	wp_style_add_data( 'wide-range-lite-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'wide-range-lite-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'wide-range-lite-style' ), '20190312' );
	wp_style_add_data( 'wide-range-lite-ie7', 'conditional', 'lt IE 8' );	
	}
add_action('wp_enqueue_scripts','wide_range_lite_ie_stylesheet');

define('WIDE_RANGE_LITE_THEME_DOC','https://gracethemes.com/documentation/wide-range/#homepage-lite','wide-range-lite');
define('WIDE_RANGE_LITE_PROTHEME_URL','https://gracethemes.com/themes/full-screen-wordpress-theme/','wide-range-lite');
define('WIDE_RANGE_LITE_LIVE_DEMO','https://www.gracethemes.com/demo/wide-range/','wide-range-lite');

if ( ! function_exists( 'wide_range_lite_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function wide_range_lite_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';

//Custom Excerpt length.
function wide_range_lite_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'wide_range_lite_excerpt_length', 999 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template for about theme.
 */
if ( is_admin() ) { 
require get_template_directory() . '/inc/about-themes.php';
}

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';