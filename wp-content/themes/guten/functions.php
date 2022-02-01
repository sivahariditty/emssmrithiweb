<?php
/**
 * Guten functions and definitions
 *
 * @package Guten
 */
define( 'GUTEN_THEME_VERSION' , '1.1.01' );

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Include Avant Upgrade page
require get_template_directory() . '/upgrade/upgrade.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/guten-pro/class-customize.php' );

if ( ! function_exists( 'guten_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function guten_setup() {
	/**
	 * Set the content width based on the theme's design and stylesheet
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory
	 * 
	 * If you're building a theme based on guten, use a find and replace
	 * to change 'guten' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'guten', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title
	 * 
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location
	register_nav_menus( array(
        'top-bar-menu' => esc_html__( 'Top Bar Menu', 'guten' ),
		'primary' => esc_html__( 'Primary Menu', 'guten' ),
        'footer-bar' => esc_html__( 'Footer Bar Menu', 'guten' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// The custom logo
	add_theme_support( 'custom-logo', array(
		'width'       => 280,
		'height'      => 145,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Set up the WordPress core custom background feature
	add_theme_support( 'custom-background', apply_filters( 'guten_custom_background_args', array(
		'default-color' => 'F9F9F9',
	) ) );
	
	// Enqueue editor styles
	add_editor_style( 'style-editor.css' );

	// Gutenberg Support
	add_theme_support( 'align-wide' );

	// WooCommerce Support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // guten_setup
add_action( 'after_setup_theme', 'guten_setup' );

/**
 * Register widget areas
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function guten_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'guten' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar(array(
		'name' => __( 'Guten Footer Standard', 'guten' ),
		'id' => 'guten-site-footer-standard',
		'before_title'  => '<h3 class="widget-title">',
        'description' => __( 'The footer will divide into however many widgets are placed here.', 'guten' )
	));

	register_sidebar( array(
		'name' => __( 'Guten Footer Custom 1', 'guten' ),
		'id' => 'guten-site-footer-custom-1',
		'before_title'  => '<h3 class="widget-title">'
	));
	register_sidebar( array(
		'name' => __( 'Guten Footer Custom 2', 'guten' ),
		'id' => 'guten-site-footer-custom-2',
		'before_title'  => '<h3 class="widget-title">'
	));
	register_sidebar( array(
		'name' => __( 'Guten Footer Custom 3', 'guten' ),
		'id' => 'guten-site-footer-custom-3',
		'before_title'  => '<h3 class="widget-title">'
	));
	register_sidebar( array(
		'name' => __( 'Guten Footer Custom 4', 'guten' ),
		'id' => 'guten-site-footer-custom-4',
		'before_title'  => '<h3 class="widget-title">'
	));
	register_sidebar( array(
		'name' => __( 'Guten Footer Custom 5', 'guten' ),
		'id' => 'guten-site-footer-custom-5',
		'before_title'  => '<h3 class="widget-title">'
	));
}
add_action( 'widgets_init', 'guten_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function guten_scripts() {
	if ( !get_theme_mod( 'guten-disable-google-font', customizer_library_get_default( 'guten-disable-google-font' ) ) ) {
		wp_enqueue_style( 'guten-title-font', '//fonts.googleapis.com/css?family=Quicksand', array(), GUTEN_THEME_VERSION );
		wp_enqueue_style( 'guten-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans', array(), GUTEN_THEME_VERSION );
		wp_enqueue_style( 'guten-heading-font-default', '//fonts.googleapis.com/css?family=Poppins', array(), GUTEN_THEME_VERSION );
	}

	wp_enqueue_style( 'guten-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/all.css', array(), '5.5.0' );
	wp_enqueue_style( 'guten-style', get_stylesheet_uri(), array(), GUTEN_THEME_VERSION );

	wp_enqueue_style( 'guten-header-style', get_template_directory_uri()."/templates/header/css/".get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ).".css", array(), GUTEN_THEME_VERSION );

	if ( guten_is_woocommerce_activated() ) :
		wp_enqueue_style( 'guten-woocommerce-style', get_template_directory_uri()."/includes/css/woocommerce.css", array(), GUTEN_THEME_VERSION );
	endif;

	if ( !get_theme_mod( 'guten-responsive-disable', customizer_library_get_default( 'guten-responsive-disable' ) ) ) :
		$guten_resp_menu = get_theme_mod( 'guten-menu-breakat', customizer_library_get_default( 'guten-menu-breakat' ) );
		$guten_resp_tablet = get_theme_mod( 'guten-tablet-breakat', customizer_library_get_default( 'guten-tablet-breakat' ) );
		$guten_resp_mobile = get_theme_mod( 'guten-mobile-breakat', customizer_library_get_default( 'guten-mobile-breakat' ) );

		switch ( $guten_resp_menu ) :
			case 'always':
				$guten_resp_menu = 'all';
				break;
			case 'mobile':
				$guten_resp_menu = '(max-width: '.$guten_resp_mobile.'px)';
				break;
			case 'custom':
				$guten_resp_menu = '(max-width: '.get_theme_mod( 'guten-menu-custom-breakat', customizer_library_get_default( 'guten-menu-custom-breakat' ) ).'px)';
				break;
			default: // Defaults to Tablet
				$guten_resp_menu = $guten_resp_menu = '(max-width: '.esc_attr( $guten_resp_tablet ).'px)';
		endswitch;
		wp_enqueue_style( 'guten-resp-menu', get_template_directory_uri()."/includes/css/menu-mobile.css", array(), GUTEN_THEME_VERSION, esc_attr( $guten_resp_menu ) );
		wp_enqueue_style( 'guten-resp-tablet', get_template_directory_uri()."/includes/css/responsive-tablet.css", array(), GUTEN_THEME_VERSION, '(max-width: '.esc_attr( $guten_resp_tablet ).'px)' );
		wp_enqueue_style( 'guten-resp-mobile', get_template_directory_uri()."/includes/css/responsive-mobile.css", array(), GUTEN_THEME_VERSION, '(max-width: '.esc_attr( $guten_resp_mobile ).'px)' );
	endif;

	if ( is_front_page() && 'guten-slider-default' == get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) ) ) :
		wp_enqueue_style( 'guten-home-slider-style', get_template_directory_uri()."/includes/css/home-slider.css", array(), GUTEN_THEME_VERSION );
		wp_enqueue_script( 'caroufredsel', get_template_directory_uri() . "/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js", array( 'jquery' ), GUTEN_THEME_VERSION, true );
		wp_enqueue_script( 'guten-caroufredsel-init', get_template_directory_uri() . "/js/home-slider.js", array( 'jquery' ), GUTEN_THEME_VERSION, true );
	endif;

	wp_enqueue_style( 'guten-footer-style', get_template_directory_uri()."/templates/footer/css/".get_theme_mod( 'guten-footer-layout', customizer_library_get_default( 'guten-footer-layout' ) ).".css", array(), GUTEN_THEME_VERSION );
	
	if ( is_rtl() ) :
		wp_enqueue_style( 'guten-rtl-style', get_template_directory_uri()."/includes/css/rtl.css", array(), GUTEN_THEME_VERSION );
	endif;

	wp_enqueue_script( 'guten-custom-js', get_template_directory_uri() . "/js/custom.js", array('jquery'), GUTEN_THEME_VERSION, true );
	
	if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) :
		wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( 'guten-masonry-custom', get_template_directory_uri() . '/js/layout-blocks.js', array('jquery'), GUTEN_THEME_VERSION, true );
	endif;

	wp_enqueue_script( 'guten-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), GUTEN_THEME_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'guten_scripts' );

/**
 * Enqueue supplemental block editor styles
 */
function guten_editor_styles() {
	if ( !get_theme_mod( 'guten-disable-google-font', customizer_library_get_default( 'guten-disable-google-font' ) ) ) {
		wp_enqueue_style( 'guten-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans', array(), GUTEN_THEME_VERSION );
		wp_enqueue_style( 'guten-heading-font-default', '//fonts.googleapis.com/css?family=Poppins', array(), GUTEN_THEME_VERSION );
	}

	wp_enqueue_style( 'guten-editor-styles', get_template_directory_uri().'/style-editor.css', false, GUTEN_THEME_VERSION, 'all' );
}
add_action( 'enqueue_block_editor_assets', 'guten_editor_styles' );

/**
 * To maintain backwards compatibility with older versions of WordPress
 */
function guten_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function guten_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'guten_pingback_header' );

/**
 * Enqueue admin styling for widgets & slider ID category page
 */
function guten_load_admin_script() {
	wp_enqueue_style( 'guten-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css', array(), GUTEN_THEME_VERSION );
	wp_enqueue_script( 'guten-admin-js', get_template_directory_uri() . '/upgrade/js/admin.js', array('jquery'), GUTEN_THEME_VERSION );
}
add_action( 'admin_enqueue_scripts', 'guten_load_admin_script' );

/**
 * Enqueue guten custom customizer styling
 */
function guten_load_customizer_script() {
	wp_enqueue_script( 'guten-customizer-js', get_template_directory_uri() . "/customizer/customizer-library/js/customizer-custom.js", array('jquery'), GUTEN_THEME_VERSION, true );
    wp_enqueue_style( 'guten-customizer-css', get_template_directory_uri() . "/customizer/customizer-library/css/customizer.css", array(), GUTEN_THEME_VERSION );
}
add_action( 'customize_controls_enqueue_scripts', 'guten_load_customizer_script' );

/**
 * Check if WooCommerce exists
 */
if ( ! function_exists( 'guten_is_woocommerce_activated' ) ) :
	function guten_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif;

// If WooCommerce exists include ajax cart
if ( guten_is_woocommerce_activated() ) {
	require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/*
 * Override WooCommerce for product # per page
 */
function guten_shop_products_per_page( $guten_wc_ppp ) {
	// $cols contains the current number of products per page based on the value stored on Options -> Reading
	$guten_wc_ppp = 8;
	if ( get_theme_mod( 'guten-woocommerce-products-per-page' ) ) :
		$guten_wc_ppp = esc_attr( get_theme_mod( 'guten-woocommerce-products-per-page' ) );
	endif;
	return $guten_wc_ppp;
}
add_filter( 'loop_shop_per_page', 'guten_shop_products_per_page', 20 );

/*
 * Override WooCommerce for product # per row
 */
if ( !function_exists( 'guten_loop_columns' ) ) :
	function guten_loop_columns() {
		$guten_woocommerce_product_cols = 4;
		if ( get_theme_mod( 'guten-woocommerce-custom-cols' ) ) :
			$guten_woocommerce_product_cols = esc_attr( get_theme_mod( 'guten-woocommerce-custom-cols' ) );
		endif;
		return $guten_woocommerce_product_cols;
	}

	add_filter( 'loop_shop_columns', 'guten_loop_columns' );
endif;

/**
 * Add classes to the body tag from settings
 */
function guten_add_body_class( $classes ) {
	if ( is_page_template( 'template-gutenberg.php' ) ) {
		$classes[] = 'guten-template-gutenberg';
	}

	if ( get_theme_mod( 'guten-blog-left-sidebar' ) ) {
		$classes[] = 'guten-blog-left-sidebar';
	}
	if ( get_theme_mod( 'guten-blog-cat-left-sidebar' ) ) {
		$classes[] = 'guten-blog-archives-left-sidebar';
	}
	if ( get_theme_mod( 'guten-blog-search-left-sidebar' ) ) {
		$classes[] = 'guten-blog-search-left-sidebar';
	}

	if ( get_theme_mod( 'guten-blog-full-width' ) && get_theme_mod( 'guten-blog-full-fl-sidebar' ) ) {
		$classes[] = 'guten-blog-fl-sidebar';
	}
	if ( get_theme_mod( 'guten-blog-cat-full-width' ) && get_theme_mod( 'guten-blog-cat-full-fl-sidebar' ) ) {
		$classes[] = 'guten-blog-archives-fl-sidebar';
	}
	if ( get_theme_mod( 'guten-blog-search-full-width' ) && get_theme_mod( 'guten-blog-search-full-fl-sidebar' ) ) {
		$classes[] = 'guten-blog-search-fl-sidebar';
	}

	if ( get_theme_mod( 'guten-page-remove-titlebar' ) ) {
		$classes[] = 'guten-shop-remove-titlebar';
	}
	if ( get_theme_mod( 'guten-remove-wc-page-titles' ) ) {
		$classes[] = 'guten-onlyshop-remove-titlebar';
	}
	
	if ( get_theme_mod( 'guten-remove-blog-title' ) ) {
		$classes[] = 'guten-blog-remove-titlebar';
	}

	return $classes;
}
add_filter( 'body_class', 'guten_add_body_class' );

/**
 * Add classes to the blog list for styling
 */
function guten_add_blog_post_classes ( $classes ) {
	global $current_class;
	
	if ( is_home() || is_archive() || is_search() ) :
		$guten_blog_layout = sanitize_html_class( customizer_library_get_default( 'guten-blog-layout' ) );
		if ( get_theme_mod( 'guten-blog-layout' ) ) :
		    $guten_blog_layout = sanitize_html_class( get_theme_mod( 'guten-blog-layout' ) );
		endif;
		$classes[] = $guten_blog_layout;

		$guten_blog_style = sanitize_html_class( 'blog-style-postblock' );
		if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) :
			if ( get_theme_mod( 'guten-blog-blocks-style' ) ) :
			    $guten_blog_style = sanitize_html_class( get_theme_mod( 'guten-blog-blocks-style' ) );
			endif;
		endif;
		$classes[] = $guten_blog_style;

		$guten_blog_img = sanitize_html_class( 'blog-post-noimg' );
		if ( has_post_thumbnail() ) :
		    $guten_blog_img = sanitize_html_class( 'blog-post-hasimg' );
		endif;
		$classes[] = $guten_blog_img;

		$classes[] = $current_class;
		$current_class = ( 'blog-alt-odd' == $current_class ) ? sanitize_html_class( 'blog-alt-even' ) : sanitize_html_class( 'blog-alt-odd' );
	endif;

	return $classes;
}
global $current_class;
$current_class = 'blog-alt-odd';
add_filter ( 'post_class' , 'guten_add_blog_post_classes' );

/**
 * Adjust is_home query if guten-blog-cats is set
 */
function guten_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'guten-blog-cats' ) ) {
        $blog_query_set = get_theme_mod( 'guten-blog-cats' );
    }

    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'guten_set_blog_queries' );

/**
 * Display recommended plugins with the TGM class
 */
function guten_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => __( 'Contact Form by WPForms', 'guten' ),
			'slug'      => 'wpforms-lite',
			'required'  => false,
		),
		array(
			'name'      => __( 'Elementor Page Builder', 'guten' ),
			'slug'      => 'elementor',
			'required'  => false,
			'external_url' => 'https://gutentheme.org/go/elementor/'
		),
		array(
			'name'      => __( 'WooCommerce', 'guten' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'guten' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
		),
		array(
			'name'      => __( 'Meta Slider', 'guten' ),
			'slug'      => 'ml-slider',
			'required'  => false,
		)
	);
	$config = array(
		'id'           => 'guten',
		'menu'         => 'tgmpa-install-plugins',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'guten_register_required_plugins' );

/**
 * Add classes to the admin body class
 */
function guten_add_admin_body_class() {
	$guten_admin_class = '';

	if ( 'guten-footer-custom' == get_theme_mod( 'guten-footer-layout', customizer_library_get_default( 'guten-footer-layout' ) ) ) {
		if ( get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) {
			$guten_admin_class = 'guten-footer-custom ' . sanitize_html_class( get_theme_mod( 'guten-footer-custom-cols' ) );
		} else {
			$guten_admin_class = 'guten-footer-custom guten-footer-custom-cols-3';
		}
	} elseif ( get_theme_mod( 'guten-footer-layout', customizer_library_get_default( 'guten-footer-layout' ) ) ) {
		$guten_admin_class = sanitize_html_class( get_theme_mod( 'guten-footer-layout' ) );
	} else {
		$guten_admin_class = sanitize_html_class( 'guten-footer-standard' );
	}

	return $guten_admin_class;
}
add_filter( 'admin_body_class', 'guten_add_admin_body_class' );

/**
 * Function to remove Category pre-title text
 */
function guten_remove_page_title_pretext( $guten_title ) {
	if ( get_theme_mod( 'guten-remove-cat-pre-title', customizer_library_get_default( 'guten-remove-cat-pre-title' ) ) ) :
		if ( is_category() ) {
			$guten_title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$guten_title = single_tag_title( '', false );
		} elseif ( is_post_type_archive() ) {
			$guten_title = post_type_archive_title( '', false );
		} elseif ( is_author() ) {
			$guten_title = '<span class="vcard">' . get_the_author() . '</span>' ;
		}
	endif;

    return $guten_title;
}
add_filter( 'get_the_archive_title', 'guten_remove_page_title_pretext' );

/**
 * Register a custom Post -> Categories ID column
 */
function guten_edit_cat_columns( $guten_cat_columns ) {
    $guten_cat_in = array( 'cat_id' => 'ID' );
    $guten_cat_columns = guten_cat_columns_array_push_after( $guten_cat_columns, $guten_cat_in, 0 );
    return $guten_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'guten_edit_cat_columns' );

/**
 * Print the ID column
 */
function guten_cat_custom_columns( $value, $name, $cat_id ) {
    if ( 'cat_id' == $name )
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'guten_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function guten_cat_columns_array_push_after( $src, $guten_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $guten_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $guten_cat_in );
        }
    }
    return $R;
}

/**
 * Adjust the Recent Posts widget query if guten-slider-cats is set
 */
function guten_filter_recent_posts_widget_parameters( $params ) {
	$slider_categories = get_theme_mod( 'guten-slider-cats' );
    $slider_type 	   = get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'guten-slider-default' ) {
		if ( count($slider_categories) > 0) {
			// do not alter the query on wp-admin pages and only alter it if it's the main query
			$params['category__not_in'] = $slider_categories;
		}
	}
	
	return $params;
}
add_filter( 'widget_posts_args', 'guten_filter_recent_posts_widget_parameters' );

/**
 * Adjust the widget categories query if guten-slider-cats is set
 */
function guten_set_widget_categories_args($args){
	$slider_categories = get_theme_mod( 'guten-slider-cats' );
    $slider_type 	   = get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'guten-slider-default' ) {
		//if ( count($slider_categories) > 0) {
			//$exclude = implode(',', $slider_categories);
			$args['exclude'] = $slider_categories;
		//}
	}
	
	return $args;
}
add_filter( 'widget_categories_args', 'guten_set_widget_categories_args' );

function guten_set_widget_categories_dropdown_arg($args){
	$slider_categories = get_theme_mod( 'guten-slider-cats' );
    $slider_type 	   = get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) );
	
	if ( $slider_categories && $slider_type == 'guten-slider-default' ) {
		// if ( count($slider_categories) > 0) {
			// $exclude = implode(',', $slider_categories);
			$args['exclude'] = $slider_categories;
		// }
	}
	
	return $args;
}
add_filter( 'widget_categories_dropdown_args', 'guten_set_widget_categories_dropdown_arg' );
