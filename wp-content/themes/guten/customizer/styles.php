<?php
/**
 * Implements styles set in the theme customizer
 *
 * @package Customizer Library Guten
 */

if ( ! function_exists( 'guten_customizer_library_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function guten_customizer_library_build_styles() {

	$websafe = ( get_theme_mod( 'guten-disable-google-font', customizer_library_get_default( 'guten-disable-google-font' ) ) == 1 ) ? '-websafe' : '';

	// Mobile Menu Sizes
	$guten_resp_menu = get_theme_mod( 'guten-menu-breakat', customizer_library_get_default( 'guten-menu-breakat' ) );
	$guten_resp_tablet = get_theme_mod( 'guten-tablet-breakat', customizer_library_get_default( 'guten-tablet-breakat' ) );
	$guten_resp_mobile = get_theme_mod( 'guten-mobile-breakat', customizer_library_get_default( 'guten-mobile-breakat' ) );

	switch ( $guten_resp_menu ) :
		case 'always':
			$guten_resp_menu = 'all';
			break;
		case 'mobile':
			$guten_resp_menu = '(max-width: '.esc_attr( $guten_resp_mobile ).'px)';
			break;
		case 'custom':
			$guten_resp_menu = '(max-width: '.get_theme_mod( 'guten-menu-custom-breakat', customizer_library_get_default( 'guten-menu-custom-breakat' ) ).'px)';
			break;
		default: // Defaults to Tablet
			$guten_resp_menu = $guten_resp_menu = '(max-width: '.esc_attr( $guten_resp_tablet ).'px)';
	endswitch;
	
	// Site Container Set Width
	$setting = 'guten-set-container-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$container_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-container,
				.content-boxed,
				.site-boxed,
				.site-boxed .site-header'
			),
			'declarations' => array(
				'max-width' => $container_width . 'px'
			)
		) );
	}
	$setting = 'guten-set-content-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$container_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.content-container'
			),
			'declarations' => array(
				'max-width' => $container_width . 'px'
			)
		) );
	}
	$setting = 'guten-header-px';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$header_margin = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header,
				.home-slider-empty,
				.site-header.site-header-nobanner,
				body.single-product.woocommerce .site-header'
			),
			'declarations' => array(
				'margin-bottom' => $header_margin . 'px'
			)
		) );
	}
	$setting = 'guten-footer-px';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_margin = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'margin-top' => $footer_margin . 'px'
			)
		) );
	}
	
	// Set Sidebar Width
	$setting = 'guten-set-sidebar-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$sidebar_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce #container,
				.woocommerce-page #container,
				.page-template-template-right-sidebar .content-area,
				.page-template-template-left-sidebar .content-area,
				.post-template-template-right-sidebar .content-area,
				.post-template-template-left-sidebar .content-area,
				.content-not-boxed > .site-container.guten-content-nobgborder .content-area'
			),
			'declarations' => array(
				'width' => ( 95 - $sidebar_width ) . '%'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce .content-boxed #container,
				.woocommerce-page .content-boxed #container,
				.page-template-template-right-sidebar .content-boxed .content-area,
				.page-template-template-left-sidebar .content-boxed .content-area,
				.post-template-template-right-sidebar .content-boxed .content-area,
				.post-template-template-left-sidebar .content-boxed .content-area,
				.page-template-template-right-sidebar .content-not-boxed > .site-container.guten-content-nobgborder .content-area,
				.page-template-template-left-sidebar .content-not-boxed > .site-container.guten-content-nobgborder .content-area,
				.post-template-template-right-sidebar .content-not-boxed > .site-container.guten-content-nobgborder .content-area,
				.post-template-template-left-sidebar .content-not-boxed > .site-container.guten-content-nobgborder .content-area'
			),
			'declarations' => array(
				'width' => ( 100 - $sidebar_width ) . '%'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog .widget-area,
				.archive .widget-area,
				.search .widget-area,
				.woocommerce .widget-area,
				.page-template-template-right-sidebar .widget-area,
				.page-template-template-left-sidebar .widget-area,
				.post-template-template-right-sidebar .widget-area,
				.post-template-template-left-sidebar .widget-area,
				body.page-template-template-floating-left-sidebar .widget-area,
				body.page-template-template-floating-right-sidebar .widget-area,
				body.post-template-template-floating-left-sidebar .widget-area,
				body.post-template-template-floating-right-sidebar .widget-area'
			),
			'declarations' => array(
				'width' => $sidebar_width . '%'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.page-template-template-floating-left-sidebar .widget-area,
				body.post-template-template-floating-left-sidebar .widget-area,
				body.blog.guten-blog-fl-sidebar .widget-area,
				body.archive.category.guten-blog-archives-fl-sidebar .widget-area,
				body.archive.tag.guten-blog-archives-fl-sidebar .widget-area,
				body.single.single-post.guten-blog-single-fl-sidebar .widget-area,
				body.search-results.guten-blog-search-fl-sidebar .widget-area,
				body.post-type-archive-product.woocommerce.guten-shop-full-width.guten-shop-fl-sidebar .widget-area,
				body.archive.woocommerce.guten-shop-archives-full-width.guten-shop-archives-fl-sidebar .widget-area,
				body.single-product.woocommerce.guten-shop-single-full-width.guten-shop-single-fl-sidebar .widget-area'
			),
			'declarations' => array(
				'left' => '-' . $sidebar_width . '%'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.page-template-template-floating-right-sidebar .widget-area,
				body.post-template-template-floating-right-sidebar .widget-area'
			),
			'declarations' => array(
				'right' => '-' . $sidebar_width . '%'
			)
		) );
	}
	
	// Primary Color
	$setting = 'guten-primary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#comments .form-submit #submit,
				.search-block .search-submit,
				.side-aligned-social a.social-icon,
				.no-results-btn,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.widget-title-style-underline-short .widget-area .widget-title:after,
				.widget-title-style-sideline-short .widget-area .widget-title:after,
				.footer-title-style-underline-short .site-footer-widgets .widget-title:after,
				.footer-title-style-sideline-short .site-footer-widgets .widget-title:after,
				.woocommerce ul.products li.product a.add_to_cart_button, .woocommerce-page ul.products li.product a.add_to_cart_button,
				.woocommerce ul.products li.product .onsale, .woocommerce-page ul.products li.product .onsale,
				.woocommerce button.button.alt,
				.woocommerce-page button.button.alt,
				.woocommerce input.button.alt:hover,
				.woocommerce-page #content input.button.alt:hover,
				.woocommerce .cart-collaterals .shipping_calculator .button,
				.woocommerce-page .cart-collaterals .shipping_calculator .button,
				.woocommerce a.button,
				.woocommerce-page a.button,
				.woocommerce input.button,
				.woocommerce-page #content input.button,
				.woocommerce-page input.button,
				.woocommerce #review_form #respond .form-submit input,
				.woocommerce-page #review_form #respond .form-submit input,
				.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
				.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,
				.single-product span.onsale,
				.main-navigation.guten-nav-style-solid ul > li > a:hover,
				.main-navigation.guten-nav-style-solid ul > li > a:focus,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-solid ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-solid ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-solid .current_page_item > a,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
				.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
				.main-navigation ul ul a:hover,
				.main-navigation ul ul a:focus,
				.main-navigation ul ul li.current-menu-item > a,
				.main-navigation ul ul li.current_page_item > a,
				.main-navigation ul ul li.current-menu-parent > a,
				.main-navigation ul ul li.current_page_parent > a,
				.main-navigation ul ul li.current-menu-ancestor > a,
				.main-navigation ul ul li.current_page_ancestor > a,
				li.guten-button span.nav-span-block,
				.wpcf7-submit,
				.wp-paginate li a:hover,
				.wp-paginate li a:focus,
				.wp-paginate li a:active,
				.wp-paginate li .current,
				.wp-paginate.wpp-modern-grey li a:hover,
				.wp-paginate.wpp-modern-grey li a:focus,
				.wp-paginate.wpp-modern-grey li .current,
				.main-navigation.guten-nav-style-blocks ul > li > a:hover span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li > a:focus span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-item > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-ancestor > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-parent > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current_page_parent > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current_page_ancestor > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks .current_page_item > a span.nav-span-block'
			),
			'declarations' => array(
				'background' => 'inherit',
                'background-color' => $color
			)
		) );
	}
	
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a,
				.content-area .entry-content a,
				#comments a,
				.post-edit-link,
				.site-title a,
				.error-404.not-found .page-header .page-title span,
				.search-button .fa-search,
				.header-cart-checkout.cart-has-items .fa-shopping-cart,
				.woocommerce ul.products li.product .price,
				.site-header-top-right .social-icon:hover,
				.site-header-top-right .social-icon:focus,
				.site-footer-bottom-bar .social-icon:hover,
				.site-footer-bottom-bar .social-icon:focus,
				.header-menu-button:focus,
				.main-navigation.guten-nav-style-plain ul > li > a:hover,
				.main-navigation.guten-nav-style-plain ul > li > a:focus,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-plain ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-plain ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-plain .current_page_item > a'
			),
			'declarations' => array(
                'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation.guten-nav-style-underlined ul > li > a:hover,
				.main-navigation.guten-nav-style-underlined ul > li > a:focus,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-underlined ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-underlined ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-underlined .current_page_item > a'
			),
			'declarations' => array(
                'box-shadow' => '0 -4px 0 ' . $color . ' inset'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.wp-block-quote:not(.is-large),
				.wp-block-quote:not(.is-style-large)'
			),
			'declarations' => array(
                'border-left-color' => $color
			)
		) );
	}
	
	// Secondary Color
	$setting = 'guten-secondary-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation button:hover,
				#comments .form-submit #submit:hover,
				.search-block .search-submit:hover,
				.no-results-btn:hover,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.woocommerce input.button.alt,
				.woocommerce-page #content input.button.alt,
				.woocommerce .cart-collaterals .shipping_calculator .button,
				.woocommerce-page .cart-collaterals .shipping_calculator .button,
				.woocommerce a.button:hover,
				.woocommerce-page a.button:hover,
				.woocommerce input.button:hover,
				.woocommerce-page #content input.button:hover,
				.woocommerce-page input.button:hover,
				.woocommerce ul.products li.product a.add_to_cart_button:hover,
				.woocommerce-page ul.products li.product a.add_to_cart_button:hover,
				.woocommerce button.button.alt:hover,
				.woocommerce-page button.button.alt:hover,
				.woocommerce #review_form #respond .form-submit input:hover,
				.woocommerce-page #review_form #respond .form-submit input:hover,
				.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
				.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
				li.guten-button span.nav-span-block:hover,
				.wpcf7-submit:hover'
			),
			'declarations' => array(
				'background' => 'inherit',
                'background-color' => $color
			)
		) );
	}
	
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover, a:focus,
				.guten-header-nav ul li a:hover,
				.guten-header-nav ul li a:focus,
				.content-area .entry-content a:hover,
				.content-area .entry-content a:focus,
				.header-social .social-icon:hover,
				.widget-area .widget a:hover,
				.widget-area .widget a:focus,
				.site-footer-widgets .widget a:hover,
				.site-footer-widgets .widget a:focus,
				.site-footer .widget a:hover,
				.site-footer .widget a:focus,
				.search-btn:hover,
				button.menu-search:focus .search-btn,
				.search-button .fa-search:hover,
				.search-button .fa-search:focus,
				.woocommerce #content div.product p.price,
				.woocommerce-page #content div.product p.price,
				.woocommerce-page div.product p.price,
				.woocommerce #content div.product span.price,
				.woocommerce div.product span.price,
				.woocommerce-page #content div.product span.price,
				.woocommerce-page div.product span.price,
				.woocommerce ul.products li.product .price:hover,
				.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
				.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Site Boxed Background Color
	$setting = 'guten-boxed-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.content-boxed'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	
	// Body Font
	$setting = 'guten-body-font'.$websafe;
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	if ( $websafe ) {
		$stack = '\''.$mod.'\', sans-serif';
	} else {
		$stack = customizer_library_get_font_stack( $mod );
	}

	if ( $mod != customizer_library_get_default( $setting ) || get_theme_mod( 'guten-disable-google-font' ) == 1 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body,
				.widget-area .widget a'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}
	
	// Site Title & Tagline Color
	$setting = 'guten-site-title-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a'
			),
			'declarations' => array(
				'color' => $color . ' !important'
			)
		) );
	}
	$setting = 'guten-site-tagline-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Body Font Color
	$setting = 'guten-body-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body,
                .widget-area .widget a,
                .woocommerce .woocommerce-breadcrumb a,
                .woocommerce .woocommerce-breadcrumb,
                .woocommerce-page .woocommerce-breadcrumb,
                .woocommerce #content ul.products li.product span.price,
                .woocommerce-page #content ul.products li.product span.price,
                .woocommerce div.product .woocommerce-tabs ul.tabs li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Heading Font
	$setting = 'guten-heading-font'.$websafe;
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	if ( $websafe ) {
		$stack = '\''.$mod.'\', sans-serif';
	} else {
		$stack = customizer_library_get_font_stack( $mod );
	}

	if ( $mod != customizer_library_get_default( $setting ) || get_theme_mod( 'guten-disable-google-font' ) == 1 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1, h2, h3, h4, h5, h6,
                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
                .widget-area .widget-title,
                .main-navigation ul li a,
                .woocommerce table.cart th,
                .woocommerce-page #content table.cart th,
                .woocommerce-page table.cart th,
                .woocommerce input.button.alt,
                .woocommerce-page #content input.button.alt,
                .woocommerce table.cart input,
                .woocommerce-page #content table.cart input,
                .woocommerce-page table.cart input,
                button, input[type="button"],
                input[type="reset"],
                input[type="submit"]',
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}
	
	// Heading Font Color
	$setting = 'guten-heading-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1, h2, h3, h4, h5, h6,
                h1 a, h2 a, h3 a, h4 a, h5 a, h6 a,
                .widget-area .widget-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Site Title Font
	$setting = 'guten-title-font'.$websafe;
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	if ( $websafe ) {
		$stack = '\''.$mod.'\', sans-serif';
	} else {
		$stack = customizer_library_get_font_stack( $mod );
	}

	if ( $mod != customizer_library_get_default( $setting ) || get_theme_mod( 'guten-disable-google-font' ) == 1 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title a'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}
	// Site Title Font Size
	$setting = 'guten-title-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_font_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title'
			),
			'declarations' => array(
				'font-size' => $title_font_size . 'px !important',
				'line-height' => ( $title_font_size + 5 ) . 'px !important'
			)
		) );
	}
	$setting = 'guten-site-tagline-case-normal';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'text-transform' => 'none'
			)
		) );

	}
	// Site Tagline Font
	$setting = 'guten-tagline-font'.$websafe;
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	if ( $websafe ) {
		$stack = '\''.$mod.'\', sans-serif';
	} else {
		$stack = customizer_library_get_font_stack( $mod );
	}

	if ( $mod != customizer_library_get_default( $setting ) || get_theme_mod( 'guten-disable-google-font' ) == 1 ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}
	// Site Title Font Size
	$setting = 'guten-tagline-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_font_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-description'
			),
			'declarations' => array(
				'font-size' => $title_font_size . 'px'
			)
		) );
	}
	// Site Title Bottom Margin
	$setting = 'guten-title-bottom-margin';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_bottom_margin = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title'
			),
			'declarations' => array(
				'margin-bottom' => $title_bottom_margin . 'px'
			)
		) );
	}

	// Site Body Font Size
	$setting = 'guten-body-fonts-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_font_size = esc_attr( $mod );

		switch ( $title_font_size ) {
			case '1':
				$title_font_size = '13';
				break;
			case '2':
				$title_font_size = '';
				break;
			case '3':
				$title_font_size = '16';
				break;
			case '4':
				$title_font_size = '18';
				break;
			case '5':
				$title_font_size = '20';
				break;
		}

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-container.content-container,
				.blog-style-postblock .blog-post-blocks-inner .blog-blocks-content'
			),
			'declarations' => array(
				'font-size' => $title_font_size . 'px'
			)
		) );
	}
	
	// Site Logo Max Width
	$setting = 'guten-logo-max-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$logo_max_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding a.custom-logo-link'
			),
			'declarations' => array(
				'max-width' => $logo_max_width . 'px'
			)
		) );
	}
	
	// Site Logo Top Padding
	$setting = 'guten-branding-top-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$logo_top_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'padding-top' => $logo_top_pad . 'px'
			)
		) );
	}
	// Site Logo Bottom Padding
	$setting = 'guten-branding-bottom-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$logo_bottom_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding'
			),
			'declarations' => array(
				'padding-bottom' => $logo_bottom_pad . 'px'
			)
		) );
	}
	// Site Logo Bottom Padding
	$setting = 'guten-logo-top-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$logo_bottom_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-branding-block'
			),
			'declarations' => array(
				'padding-top' => $logo_bottom_pad . 'px'
			)
		) );
	}
	$setting = 'guten-header-nav-case-normal';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation li'
			),
			'declarations' => array(
				'text-transform' => 'none'
			)
		) );

	}
	// Sidebar Widget Title Size
	$setting = 'guten-blog-widget-title-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$widget_title_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area .widget-title'
			),
			'declarations' => array(
				'font-size' => $widget_title_size . 'px'
			)
		) );
	}
	// Sidebar Widget Title Size
	$setting = 'guten-footer-widget-title-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$widget_title_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .widgettitle,
				.site-footer .widget-title'
			),
			'declarations' => array(
				'font-size' => $widget_title_size . 'px'
			)
		) );
	}
	
	// Site Logo Max Width
	$setting = 'guten-blog-blocks-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$blog_blocks_space = esc_attr( $mod );
		
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog-blocks-wrap-inner'
			),
			'declarations' => array(
				'margin' => '0 -' . $blog_blocks_space . 'px'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog-blocks-wrap .blog-blocks-layout,
				.blog-break-blocks .blog-blocks-wrap article.blog-blocks-layout'
			),
			'declarations' => array(
				'margin' => '0 0 ' . ($blog_blocks_space * 2) . 'px'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog-style-postblock .blog-post-blocks-inner,
				.blog-style-imgblock .blog-post-blocks-inner'
			),
			'declarations' => array(
				'margin' => '0 ' . $blog_blocks_space . 'px 1px'
			)
		) );
	}
	
	// Header Background Color
	$setting = 'guten-header-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-top-bar.guten-header-one .search-block,
				.site-header.guten-header-one .site-header-top,
				.site-header.guten-header-one .search-block,
				.site-header.guten-header-one .main-navigation ul ul,
				.site-header.guten-header-two,
				.site-header.guten-header-two .site-header-top,
				.site-header.guten-header-two .main-navigation ul ul,
				.site-header.guten-header-four,
				.site-header.guten-header-four .main-navigation ul ul,
				.site-header.guten-header-five,
				.site-header.guten-header-five .main-navigation ul ul,
				.site-header.guten-header-three,
				.site-header.guten-header-three .site-header-top,
				.site-header.guten-header-three .main-navigation ul ul,
				.site-header.guten-header-eight,
				.site-header.guten-header-eight .site-header-top,
				.site-header.guten-header-eight .main-navigation ul ul,
				.site-header.guten-header-nine,
				.site-header.guten-header-nine .main-navigation ul ul,
				.site-header-side-container-inner,
				.site-top-bar.guten-header-six,
				.site-header.guten-header-six,
				.site-header.guten-header-six .main-navigation ul ul,
				.site-header-side-container .search-block'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	// Transparent Header Background Color
	$setting = 'guten-header-bg-color';
	$setting_opacity = 'guten-header-bg-opacity';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$mod_opacity = get_theme_mod( $setting_opacity, customizer_library_get_default( $setting_opacity ) );

	if ( $mod !== customizer_library_get_default( $setting ) || $mod_opacity !== customizer_library_get_default( $setting_opacity ) ) {

		$color = sanitize_hex_color( $mod );
		$rgba_color = customizer_library_hex_to_rgb( $color );
		$opacity = esc_attr( $mod_opacity );
		
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-default,
				.site-header.guten-header-default .main-navigation ul ul,
				.site-header.guten-header-seven,
				.site-header.guten-header-seven .main-navigation ul ul'
			),
			'declarations' => array(
				'background-color' => 'rgba(' . $rgba_color['r'] . ', ' . $rgba_color['g'] . ', ' . $rgba_color['b'] . ', 0.' . $opacity . ');'
			)
		) );
	}
	// Header Font Color
	$setting = 'guten-header-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header-top,
				.site-header-social,
				.site-header-search,
				.guten-header-one .header-cart,
				.guten-header-six .header-cart,
				.main-navigation ul li a,
				.site-header-top .social-icon,
				.site-header.guten-header-six .site-top-bar-right-extra-txt'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	// Top Bar Background Color
	$setting = 'guten-topbar-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-top-bar.guten-header-default,
				.site-top-bar.guten-header-default .site-top-bar-left,
				.site-top-bar.guten-header-default .site-top-bar-right,
				.site-top-bar.guten-header-default .search-block,
				.site-top-bar.guten-header-one,
				.site-top-bar.guten-header-one .site-top-bar-left,
				.site-top-bar.guten-header-one .site-top-bar-right,
				.site-top-bar.guten-header-one .guten-header-nav ul ul,
				.site-top-bar.guten-header-two,
				.site-top-bar.guten-header-two .site-top-bar-left,
				.site-top-bar.guten-header-two .site-top-bar-right,
				.site-top-bar.guten-header-two .guten-header-nav ul ul,
				.site-top-bar.guten-header-two .search-block,
				.site-top-bar.guten-header-three,
				.site-top-bar.guten-header-three .site-top-bar-left,
				.site-top-bar.guten-header-three .site-top-bar-right,
				.site-top-bar.guten-header-three .guten-header-nav ul ul,
				.site-header.guten-header-three .search-block,
				.site-top-bar.guten-header-four,
				.site-top-bar.guten-header-four .site-top-bar-left,
				.site-top-bar.guten-header-four .site-top-bar-right,
				.site-top-bar.guten-header-four .guten-header-nav ul ul,
				.site-top-bar.guten-header-four .search-block,
				.site-top-bar.guten-header-five,
				.site-top-bar.guten-header-five .site-top-bar-left,
				.site-top-bar.guten-header-five .site-top-bar-right,
				.site-top-bar.guten-header-five .guten-header-nav ul ul,
				.site-top-bar.guten-header-five .search-block,
				.site-top-bar.guten-header-six,
				.site-top-bar.guten-header-six .guten-header-nav ul ul,
				.site-top-bar.guten-header-seven,
				.site-top-bar.guten-header-seven .site-top-bar-left,
				.site-top-bar.guten-header-seven .site-top-bar-right,
				.site-top-bar.guten-header-eight,
				.site-top-bar.guten-header-eight .site-top-bar-left,
				.site-top-bar.guten-header-eight .site-top-bar-right,
				.site-top-bar.guten-header-eight .guten-header-nav ul ul,
				.site-top-bar.guten-header-nine,
				.site-top-bar.guten-header-nine .site-top-bar-left,
				.site-top-bar.guten-header-nine .site-top-bar-right,
				.site-top-bar.guten-header-nine .guten-header-nav ul ul,
				.site-top-bar.guten-header-nine .search-block'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	// Top Bar Font Color
	$setting = 'guten-topbar-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-top-bar'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	// Header Cart Colors
	$setting = 'guten-header-cart-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.header-cart .site-header-cart'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	$setting = 'guten-header-cart-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.header-cart .site-header-cart,
				.header-cart .site-header-cart ul.cart_list li a,
				.header-cart .site-header-cart ul.product_list_widget li a,
				.header-cart .site-header-cart .widget_shopping_cart .total'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Header 2 & 4 Nav Colors
	$setting = 'guten-navi-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-two .site-header-top,
				.site-header.guten-header-two .main-navigation ul ul,
				.site-header.guten-header-three .site-header-top,
				.site-header.guten-header-three .main-navigation ul ul,
				.site-header.guten-header-six .site-header-top,
				.site-header.guten-header-six .main-navigation ul ul,
				.site-header.guten-header-eight .site-header-top,
				.site-header.guten-header-eight .main-navigation ul ul'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	$setting = 'guten-navi-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-two .site-header-top,
				.site-header.guten-header-two .main-navigation ul li a,
				.site-header.guten-header-three .site-header-top,
				.site-header.guten-header-three .main-navigation ul li a,
				.site-header.guten-header-six .site-header-top,
				.site-header.guten-header-six .main-navigation ul li a,
				.guten-header-six .header-cart,
				.site-header.guten-header-eight .site-header-top,
				.site-header.guten-header-eight .main-navigation ul li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	// Navigation Drop Down Background Color
	$setting = 'guten-nav-drop-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-one .main-navigation ul ul,
				.site-header.guten-header-two .main-navigation ul ul,
				.site-header.guten-header-three .main-navigation ul ul,
				.site-header.guten-header-four .main-navigation ul ul,
				.site-header.guten-header-five .main-navigation ul ul,
				.site-header.guten-header-six .main-navigation ul ul,
				.site-header.guten-header-eight .main-navigation ul ul,
				.site-header.guten-header-nine .main-navigation ul ul'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	// Transparent Header Background Color
	$setting = 'guten-nav-drop-bg-color';
	$setting_opacity = 'guten-nav-drop-opacity';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
	$mod_opacity = get_theme_mod( $setting_opacity, customizer_library_get_default( $setting_opacity ) );

	if ( $mod !== customizer_library_get_default( $setting ) || $mod_opacity !== customizer_library_get_default( $setting_opacity ) ) {

		$color = sanitize_hex_color( $mod );
		$rgba_color = customizer_library_hex_to_rgb( $color );
		$opacity = esc_attr( $mod_opacity );
		
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-default .main-navigation ul ul,
				.site-header.guten-header-seven .main-navigation ul ul'
			),
			'declarations' => array(
				'background-color' => 'rgba(' . $rgba_color['r'] . ', ' . $rgba_color['g'] . ', ' . $rgba_color['b'] . ', 0.' . $opacity . ');'
			)
		) );
	}
	// Navigation Drop Down Font Color
	$setting = 'guten-nav-drop-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header.guten-header-default .main-navigation ul ul li a,
				.site-header.guten-header-one .main-navigation ul ul li a,
				.site-header.guten-header-two .main-navigation ul ul li a,
				.site-header.guten-header-three .main-navigation ul ul li a,
				.site-header.guten-header-four .main-navigation ul ul li a,
				.site-header.guten-header-five .main-navigation ul ul li a,
				.site-header.guten-header-six .main-navigation ul ul li a,
				.site-header.guten-header-seven .main-navigation ul ul li a,
				.site-header.guten-header-eight .main-navigation ul ul li a,
				.site-header.guten-header-nine .main-navigation ul ul li a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	// Navigation Active Color
	$setting = 'guten-navi-selected-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation.guten-nav-style-solid ul > li > a:hover,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-solid ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-solid ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-solid ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-solid .current_page_item > a,
				.main-navigation.guten-nav-style-blocks ul > li > a:hover span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-item > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-ancestor > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current-menu-parent > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current_page_parent > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks ul > li.current_page_ancestor > a span.nav-span-block,
				.main-navigation.guten-nav-style-blocks .current_page_item > a span.nav-span-block,
				.main-navigation ul ul a:hover,
				.main-navigation ul ul li.current-menu-item > a,
				.main-navigation ul ul li.current_page_item > a,
				.main-navigation ul ul li.current-menu-parent > a,
				.main-navigation ul ul li.current_page_parent > a,
				.main-navigation ul ul li.current-menu-ancestor > a,
				.main-navigation ul ul li.current_page_ancestor > a'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.header-cart-checkout.cart-has-items .fa-shopping-cart,
				.main-navigation.guten-nav-style-plain ul > li > a:hover,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-plain ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-plain ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-plain ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-plain .current_page_item > a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation.guten-nav-style-underlined ul > li > a:hover,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-item > a,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-ancestor > a,
				.main-navigation.guten-nav-style-underlined ul > li.current-menu-parent > a,
				.main-navigation.guten-nav-style-underlined ul > li.current_page_parent > a,
				.main-navigation.guten-nav-style-underlined ul > li.current_page_ancestor > a,
				.main-navigation.guten-nav-style-underlined .current_page_item > a'
			),
			'declarations' => array(
				'box-shadow' => '0 -4px 0 ' . $color . ' inset'
			)
		) );
	}
	// Mobile Navigation Colors
	$setting = 'guten-mobile-nav-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#main-menu'
			),
			'declarations' => array(
				'background-color' => $color
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation li a,
				.guten-header-one a.header-cart-contents,
				.guten-header-six a.header-cart-contents,
				.main-menu-close, button.menu-dropdown-btn'
			),
			'declarations' => array(
				'color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-font-hover-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#site-navigation.main-navigation ul > li > a:hover,
				#site-navigation.main-navigation ul > li.current-menu-item > a,
				#site-navigation.main-navigation ul > li.current-menu-ancestor > a,
				#site-navigation.main-navigation ul > li.current-menu-parent > a,
				#site-navigation.main-navigation ul > li.current_page_parent > a,
				#site-navigation.main-navigation ul > li.current_page_ancestor > a,
				#site-navigation.main-navigation .current_page_item > a,
				#site-navigation.main-navigation ul > li.current-menu-item > a span.nav-span-block,
				#site-navigation.main-navigation ul > li.current-menu-ancestor > a span.nav-span-block,
				#site-navigation.main-navigation ul > li.current-menu-parent > a span.nav-span-block,
				#site-navigation.main-navigation ul > li.current_page_parent > a span.nav-span-block,
				#site-navigation.main-navigation ul > li.current_page_ancestor > a span.nav-span-block,
				#site-navigation.main-navigation .current_page_item > a span.nav-span-block,
				#site-navigation.main-navigation.guten-nav-style-plain ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-solid ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-underlined ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-blocks ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-blocks ul li a:hover span.nav-span-block'
			),
			'declarations' => array(
				'color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-ddbtn-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.menu-dropdown-btn'
			),
			'declarations' => array(
				'background-color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-ddbg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.main-navigation ul ul'
			),
			'declarations' => array(
				'background-color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-ddf-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#site-navigation.main-navigation.guten-nav-style-plain ul ul li a,
				#site-navigation.main-navigation.guten-nav-style-solid ul ul li a,
				#site-navigation.main-navigation.guten-nav-style-underlined ul ul li a,
				#site-navigation.main-navigation.guten-nav-style-blocks ul ul li a'
			),
			'declarations' => array(
				'color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	$setting = 'guten-mobile-nav-ddfh-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#site-navigation.main-navigation.guten-nav-style-plain ul ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-solid ul ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-underlined ul ul li a:hover,
				#site-navigation.main-navigation.guten-nav-style-blocks ul ul li a:hover'
			),
			'declarations' => array(
				'color' => $color . ' !important'
			),
			'media' => esc_attr( $guten_resp_menu )
		) );
	}
	// Mobile Navigation Colors -- End
	
	// Footer Background Color
	$setting = 'guten-footer-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-standard,
				.site-footer.site-footer-social,
				.site-footer.site-footer-custom'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	// Footer Font Color
	$setting = 'guten-footer-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	// Footer Heading Font Color
	$setting = 'guten-footer-heading-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .widgettitle,
				.site-footer .widget-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer.footer-title-style-underline-dots .widgettitle,
				.site-footer.footer-title-style-underline-dots .widget-title'
			),
			'declarations' => array(
				'border-bottom' => '1px dashed ' . $color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer.footer-title-style-underline-solid .widgettitle,
				.site-footer.footer-title-style-underline-solid .widget-title'
			),
			'declarations' => array(
				'border-bottom' => '1px solid ' . $color
			)
		) );
	}
	// Footer Bottom Bar Background Color
	$setting = 'guten-footer-bottombar-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-bottom-bar'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}
	// Footer Bottom Bar Font Color
	$setting = 'guten-footer-bottombar-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-bottom-bar'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}
	
	// Pages Color Settings
	$setting = 'guten-content-bg-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$page_bg_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog .widget-area,
				.archive .widget-area,
				.search .widget-area,
				.woocommerce .widget-area,
				.page-template-template-right-sidebar .widget-area,
				.page-template-template-left-sidebar .widget-area,
				.post-template-template-right-sidebar .widget-area,
				.post-template-template-left-sidebar .widget-area,
				body.page-template-template-floating-left-sidebar .widget-area,
				body.post-template-template-floating-left-sidebar .widget-area,
				body.page-template-template-floating-right-sidebar .widget-area,
				body.post-template-template-floating-right-sidebar .widget-area,
				body.page-template-default .content-area,
				body.post-template-default .content-area,
				body.page-template-default .widget-area,
				body.post-template-default .widget-area,
				.woocommerce #container,
				.woocommerce-page #container,
				.content-area,
				.widget-area,
				.blog-break-blocks article.hentry,
				.widget-area.sidebar-break-blocks .widget,
				.blog-break-blocks .blog-blocks-wrap article.blog-blocks-layout .blog-blocks-content,
				.blog-break-blocks .blog-post-blocks-inner.blog-post-shape-round'
			),
			'declarations' => array(
				'background-color' => $page_bg_color
			)
		) );
	}
	$setting = 'guten-content-a-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$page_a_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.content-area a,
				.content-area .entry-content a'
			),
			'declarations' => array(
				'color' => $page_a_color
			)
		) );
	}
	$setting = 'guten-content-a-hover-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$page_a_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.content-area a:hover,
				.content-area .entry-content a:hover'
			),
			'declarations' => array(
				'color' => $page_a_color
			)
		) );
	}
	
	// Page Title Color
	$setting = 'guten-page-title-font-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'page-titlebar-h,
				.woocommerce-products-header h1,
				.single .entry-title'
			),
			'declarations' => array(
				'color' => $title_color
			)
		) );
	}
	// Blog List Title Color
	$setting = 'guten-bloglist-title-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.post-loop-content .entry-title a,
				.blog-style-postblock .blog-post-blocks-inner h3 a,
				.blog-style-imgblock .blog-blocks-content-inner h3,
				.blog-style-imgblock .blog-blocks-content-inner .entry-meta'
			),
			'declarations' => array(
				'color' => $title_color
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.blog-style-imgblock .blog-blocks-content-inner'
			),
			'declarations' => array(
				'border-color' => $title_color
			)
		) );
	}
	// Sidebar Widget Title Color
	$setting = 'guten-sidebar-widget-title-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area .widget-title'
			),
			'declarations' => array(
				'color' => $title_color
			)
		) );
	}
	// WooCommerce Title Size
	$setting = 'guten-wc-product-title-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce ul.products li.product h3,
				.woocommerce-page ul.products li.product h3,
				.woocommerce ul.products li.product .woocommerce-loop-category__title,
				.woocommerce ul.products li.product .woocommerce-loop-product__title'
			),
			'declarations' => array(
				'font-size' => $title_size . 'px'
			)
		) );
	}
	// WooCommerce Title Color
	$setting = 'guten-wc-product-title-color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce ul.products li.product h3,
				.woocommerce-page ul.products li.product h3,
				.woocommerce ul.products li.product .woocommerce-loop-category__title,
				.woocommerce ul.products li.product .woocommerce-loop-product__title'
			),
			'declarations' => array(
				'color' => $title_color
			)
		) );
	}
	
	// Footer Padding Settings
	$setting = 'guten-footer-top-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_top_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-standard .site-footer-widgets,
				.site-footer-social .site-footer-icons,
				.site-footer-custom .site-footer-widgets'
			),
			'declarations' => array(
				'padding-top' => $footer_top_pad . 'px'
			)
		) );
	}
	$setting = 'guten-footer-bottom-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_top_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-standard .site-footer-widgets,
				.site-footer-social .site-footer-icons,
				.site-footer-custom .site-footer-widgets'
			),
			'declarations' => array(
				'padding-bottom' => $footer_top_pad . 'px'
			)
		) );
	}
	$setting = 'guten-footer-bottombar-top-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_top_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-bottom-bar'
			),
			'declarations' => array(
				'padding-top' => $footer_top_pad . 'px'
			)
		) );
	}
	$setting = 'guten-footer-bottombar-bottom-pad';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_top_pad = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-bottom-bar'
			),
			'declarations' => array(
				'padding-bottom' => $footer_top_pad . 'px'
			)
		) );
	}
	
	// Footer Custom custom widths
	if ( get_theme_mod( 'guten-footer-customize', customizer_library_get_default( 'guten-footer-customize' ) ) ) :
		
		// Site Footer Column Widths
		$setting = 'guten-footer-customize-col-1';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$footer_col_one = esc_attr( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.footer-custom-block.footer-custom-one'
				),
				'declarations' => array(
					'width' => $footer_col_one . '%'
				)
			) );
		}
		$setting = 'guten-footer-customize-col-2';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$footer_col_two = esc_attr( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.footer-custom-block.footer-custom-two'
				),
				'declarations' => array(
					'width' => $footer_col_two . '%'
				)
			) );
		}
		$setting = 'guten-footer-customize-col-3';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$footer_col_three = esc_attr( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.footer-custom-block.footer-custom-three'
				),
				'declarations' => array(
					'width' => $footer_col_three . '%'
				)
			) );
		}
		$setting = 'guten-footer-customize-col-4';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$footer_col_four = esc_attr( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.footer-custom-block.footer-custom-four'
				),
				'declarations' => array(
					'width' => $footer_col_four . '%'
				)
			) );
		}
		$setting = 'guten-footer-customize-col-5';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$footer_col_five = esc_attr( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.footer-custom-block.footer-custom-five'
				),
				'declarations' => array(
					'width' => $footer_col_five . '%'
				)
			) );
		}
	
	endif;

	// Footer Custom custom widths
	if ( get_theme_mod( 'guten-slider-type' ) == 'guten-slider-default' ) :

		$setting = 'guten-slider-bg-color';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$color = sanitize_hex_color( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-wrap'
				),
				'declarations' => array(
					'background-color' => $color
				)
			) );
		}
		$setting = 'guten-slider-arrows-color';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$color = sanitize_hex_color( $mod );
			$rgba_color = customizer_library_hex_to_rgb( $color );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-prev,
					.home-slider-next'
				),
				'declarations' => array(
					'color' => $color
				)
			) );
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-prev,
					.home-slider-next'
				),
				'declarations' => array(
					'box-shadow' => '0 0 0 1px ' . $color . ' inset'
				)
			) );
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-prev:hover,
					.home-slider-next:hover'
				),
				'declarations' => array(
					'background-color' => 'rgba(' . $rgba_color['r'] . ', ' . $rgba_color['g'] . ', ' . $rgba_color['b'] . ', 0.15);'
				)
			) );
		}
		$setting = 'guten-slider-pagi-color';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$color = sanitize_hex_color( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-pager span'
				),
				'declarations' => array(
					'border' => '1px solid '.$color
				)
			) );
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-pager a.selected span'
				),
				'declarations' => array(
					'background-color' => $color
				)
			) );
		}
		$setting = 'guten-slider-text-bg-color';
		$setting_opacity = 'guten-slider-text-bg-opacity';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );
		$mod_opacity = get_theme_mod( $setting_opacity, customizer_library_get_default( $setting_opacity ) );

		if ( $mod !== customizer_library_get_default( $setting ) || $mod_opacity !== customizer_library_get_default( $setting_opacity ) ) {

			$color = sanitize_hex_color( $mod );
			$rgba_color = customizer_library_hex_to_rgb( $color );
			$opacity = esc_attr( $mod_opacity );
			
			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-block-bg'
				),
				'declarations' => array(
					'background-color' => 'rgba(' . $rgba_color['r'] . ', ' . $rgba_color['g'] . ', ' . $rgba_color['b'] . ', 0.' . $opacity . ');'
				)
			) );
		}
		$setting = 'guten-slider-text-color';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$color = sanitize_hex_color( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-block-bg'
				),
				'declarations' => array(
					'color' => $color,
					'text-shadow' => 'none'
				)
			) );
		}
		$setting = 'guten-slider-text-title-color';
		$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

		if ( $mod !== customizer_library_get_default( $setting ) ) {

			$color = sanitize_hex_color( $mod );

			Customizer_Library_Styles()->add( array(
				'selectors' => array(
					'.home-slider-title'
				),
				'declarations' => array(
					'color' => $color
				)
			) );
		}
		
	endif;

	// Remove WC Categories Count
	$setting = 'guten-remove-cats-count';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$widget_title_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'ul.products mark.count'
			),
			'declarations' => array(
				'display' => 'none'
			)
		) );
	}
	// Widget Spacing
	$setting = 'guten-page-widget-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$widget_spacing = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area .widget'
			),
			'declarations' => array(
				'margin' => '0 0 ' . $widget_spacing . 'px'
			)
		) );
	}
	// Content Border Radius
	$setting = 'guten-page-content-br';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$content_bradius = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce .guten-site-full-width #container,
				.guten-site-full-width .content-area,
				.guten-site-full-width .widget-area,
				.guten-site-full-width .widget-area.sidebar-break-blocks .widget,
				.blog-break-blocks article.hentry,
				.blog-break-blocks .site-main > .entry-header,
				.blog-style-imgblock .blog-post-blocks-inner,
				.blog-style-postblock .blog-post-blocks-inner'
			),
			'declarations' => array(
				'border-radius' => $content_bradius . 'px',
				'overflow' => 'hidden'
			)
		) );
	}
	$setting = 'guten-wc-mobile-prod-full-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$title_bottom_margin = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.woocommerce ul.products,
    			body.woocommerce-page ul.products'
			),
			'declarations' => array(
				'margin' => '0 0 10px !important'
			),
			'media' => '(max-width: 580px)'
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.woocommerce ul.products li.product,
    			body.woocommerce-page ul.products li.product'
			),
			'declarations' => array(
				'width' => '100% !important',
				'margin' => '0 0 24px !important'
			),
			'media' => '(max-width: 620px)'
		) );
	}
	$setting = 'guten-site-title-uc';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$container_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title'
			),
			'declarations' => array(
				'text-transform' => 'uppercase'
			)
		) );
	}
	$setting = 'guten-slider-mobile-set-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$container_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.home-slider-block'
			),
			'declarations' => array(
				'height' => '260px'
			),
			'media' => '(max-width: 700px)'
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.home-slider-block img'
			),
			'declarations' => array(
				'width' => '100%',
				'height' => '100%'
			),
			'media' => '(max-width: 700px)'
		) );
	}
	$setting = 'guten-slider-mobile-remove-txt';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$container_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.home-slider-block-inner'
			),
			'declarations' => array(
				'display' => 'none !important'
			),
			'media' => '(max-width: 700px)'
		) );
	}
	// Set WC Product Page Col Widths
	$setting = 'guten-set-wc-single-col-width';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$wc_col_width = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce div.product div.summary'
			),
			'declarations' => array(
				'width' => ( 96 - $wc_col_width ) . '%'
			)
		) );
		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.woocommerce div.product div.images'
			),
			'declarations' => array(
				'width' => $wc_col_width . '%'
			)
		) );
	}
	// Side Social Icons top position
	$setting = 'guten-site-side-social-top';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.side-aligned-social'
			),
			'declarations' => array(
				'top' => $side_social_top . 'px'
			)
		) );
	}
	$setting = 'guten-footer-social-icon-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_social_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.footer-social-icon'
			),
			'declarations' => array(
				'font-size' => $footer_social_size . 'px'
			)
		) );
	}
	$setting = 'guten-footer-social-icon-space';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$footer_social_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.footer-social-icon'
			),
			'declarations' => array(
				'margin' => '0 ' . $footer_social_size . 'px 25px'
			)
		) );
	}
	// Site Full Width settings
	$setting = 'guten-site-break-header-topbar';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-top-bar .site-container'
			),
			'declarations' => array(
				'max-width' => '100%'
			)
		) );
	}
	$setting = 'guten-site-break-header';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-header .site-container'
			),
			'declarations' => array(
				'max-width' => '100%'
			)
		) );
	}
	$setting = 'guten-site-break-all-content';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-container.content-container'
			),
			'declarations' => array(
				'max-width' => '100%'
			)
		) );
	}
	$setting = 'guten-site-break-footer';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-container'
			),
			'declarations' => array(
				'max-width' => '100%'
			)
		) );
	}
	$setting = 'guten-site-break-footer-bottombar';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer-bottom-bar .site-container'
			),
			'declarations' => array(
				'max-width' => '100%'
			)
		) );
	}

	$setting = 'guten-wc-single-remove-bc';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.single-product.woocommerce .woocommerce-breadcrumb'
			),
			'declarations' => array(
				'display' => 'none'
			)
		) );
	}
	$setting = 'guten-wc-single-remove-sku';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body.single-product span.sku_wrapper'
			),
			'declarations' => array(
				'display' => 'none'
			)
		) );
	}
	$setting = 'guten-onmobile-remove-topbar';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-top-bar'
			),
			'declarations' => array(
				'display' => 'none !important'
			),
			'media' => '(max-width: '.esc_attr( $guten_resp_tablet ).'px)'
		) );
	}
	$setting = 'guten-onmobile-remove-wc-cart';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$side_social_top = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.header-cart'
			),
			'declarations' => array(
				'display' => 'none !important'
			),
			'media' => '(max-width: '.esc_attr( $guten_resp_tablet ).'px)'
		) );
	}
	$setting = 'guten-onmobile-site-title-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$mobile_title_size = esc_attr( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-title,
				.site-title a'
			),
			'declarations' => array(
				'font-size' => $mobile_title_size . 'px !important'
			),
			'media' => '(max-width: '.esc_attr( $guten_resp_tablet ).'px)'
		) );
	}

}
endif;

add_action( 'customizer_library_styles', 'guten_customizer_library_build_styles' );

if ( ! function_exists( 'guten_customizer_library_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function guten_customizer_library_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"guten-custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}
}
endif;

add_action( 'wp_head', 'guten_customizer_library_styles', 11 );