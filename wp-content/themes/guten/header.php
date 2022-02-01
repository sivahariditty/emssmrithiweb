<?php
/**
 * The header for our theme.
 * @package Guten
 */
?><!DOCTYPE html><!-- Guten.ORG -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<?php if ( get_theme_mod( 'guten-responsive-disable', customizer_library_get_default( 'guten-responsive-disable' ) ) ) : ?>
	<meta name="viewport" content="width=1240">
<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( get_theme_mod( 'guten-site-add-side-social', customizer_library_get_default( 'guten-site-add-side-social' ) ) ) : ?>
	<div class="side-aligned-social hide-side-social <?php echo ( get_theme_mod( 'guten-side-social-look' ) ) ? sanitize_html_class( get_theme_mod( 'guten-side-social-look' ) ) : sanitize_html_class( 'guten-side-social-square' ); ?>">
	<?php if ( is_page_template( 'template-floating-right-sidebar.php' ) && get_theme_mod( 'guten-site-add-side-social', customizer_library_get_default( 'guten-site-add-side-social' ) ) == 1 ) : ?>
	<button class="floating-sidebar-control floating-sidebar-control-right"></button>
	<?php endif; ?>	
	<?php get_template_part( '/templates/social-links' ); ?>
	</div>
<?php endif; ?>
<div id="page" class="hfeed site <?php echo sanitize_html_class( get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ); ?> <?php echo ( 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? sanitize_html_class( 'boxed-site' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-slider-type' ) ) ? sanitize_html_class( get_theme_mod( 'guten-slider-type' ) ) : sanitize_html_class( 'guten-slider-default' ); ?> <?php echo ( get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? sanitize_html_class( get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) : sanitize_html_class( 'guten-site-full-width' ); ?> <?php echo sanitize_html_class( get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ); ?>">

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'guten' ); ?></a>

<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '<div class="content-boxed">' : '<div class="content-not-boxed">'; ?>
	
<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '<div class="site-boxed">' : ''; ?>
	
	<?php if ( function_exists( 'hfe_render_header' ) ) :
		hfe_render_header(); ?>
	<?php else : ?>
	<?php get_template_part( '/templates/header/'.get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ); // Get Site Header ?>
	<?php endif; ?>
	
<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '</div>' : ''; ?>
	
	<?php if ( is_front_page() ) : ?>
		
		<?php get_template_part( '/templates/slider/homepage-slider' ); // Home Page Slider ?>
		
	<?php endif; ?>

<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '<div class="site-boxed">' : ''; ?>

	<?php echo esc_html( 'guten-header-six' == get_theme_mod( 'guten-header-layout' ) ) ? '<div class="site-side-layout-container">' : ''; // Site Side Layout ?>
	
	<?php if ( !is_front_page() ) : ?>
		<?php if ( is_home() || is_archive() || is_search() || is_page() ) : ?>
			<?php get_template_part( '/templates/page-banner' ); ?>
		<?php else : ?>
			<?php get_template_part( '/templates/page-banner-single' ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<div id="content" class="site-container content-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?> <?php echo ( get_theme_mod( 'guten-woocommerce-custom-cols' ) ) ? sanitize_html_class( 'guten-woocommerce-cols-' . get_theme_mod( 'guten-woocommerce-custom-cols', customizer_library_get_default( 'guten-woocommerce-custom-cols' ) ) ) : sanitize_html_class( 'guten-woocommerce-cols-4' ); ?> <?php echo ( get_theme_mod( 'guten-heading-fonts-size', customizer_library_get_default( 'guten-heading-fonts-size' ) ) ) ? sanitize_html_class( 'guten-heading-size-' . get_theme_mod( 'guten-heading-fonts-size', customizer_library_get_default( 'guten-heading-fonts-size' ) ) ) : ''; ?> <?php echo ( get_theme_mod( 'guten-remove-product-border' ) ) ? sanitize_html_class( 'guten-products-noborder' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-remove-content-bgborder', customizer_library_get_default( 'guten-remove-content-bgborder' ) ) && 'guten-site-full-width' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? sanitize_html_class( 'guten-content-nobgborder' ) : sanitize_html_class( 'guten-content-hasbgborder' ); ?> <?php echo ( get_theme_mod( 'guten-remove-wc-results-sorting' ) ) ? sanitize_html_class( 'guten-remove-results-sorting' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-align-product-titles' ) ) ? sanitize_html_class( 'guten-wc-title-align' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-add-sidebar-line' ) ) ? sanitize_html_class( 'guten-add-sidebar-line' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-blog-widget-title-centeralign' ) ) ? sanitize_html_class( 'guten-centeralign-widget-title' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-blog-widget-title-style' ) ) ? sanitize_html_class( get_theme_mod( 'guten-blog-widget-title-style' ) ) : sanitize_html_class( 'widget-title-style-sideline-short' ); ?>">
		<?php
		if ( 'guten-header-six' == get_theme_mod( 'guten-header-layout' ) && 'guten-page-titlebar-banner' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) :
			get_template_part( '/templates/titlebar' );
		endif; ?>