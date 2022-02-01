<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mitra
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mitra' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="head-wrap-inner">
				<div class="site-branding">
					<div class="site-title-wrap">

						<?php $site_identity = mitra_get_option( 'site_identity' );

						if( 'logo-only' == $site_identity ){  

						    the_custom_logo(); ?>

						    <h1 class="site-title logo-only-hidden"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

						    <?php

						}elseif( 'title-only' == $site_identity ){ ?>

							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

							<?php

						 }else{ ?>

						 	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

						 	<?php

							$mitra_description = get_bloginfo( 'description', 'display' );

							if ( $mitra_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo $mitra_description; /* WPCS: xss ok. */ ?></p>
							<?php endif; 

						} ?>

					</div><!-- .site-title-wrap -->
				</div><!-- .site-branding -->

				<div id="main-navigation-wrap" class="navigation-wrap">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						) );
						?>
					</nav><!-- #site-navigation -->
					<div class="additional-btn navbar-left">
					    <div class="navbar-left navbar-btn-right">
					        <?php  
					        $nav_button_text = mitra_get_option( 'nav_button_text' );
					        $nav_button_link = mitra_get_option( 'nav_button_link' );
					        if( !empty( $nav_button_text) && !empty( $nav_button_link ) ){ ?>
					        	<a class="nav-additional-btn" href="<?php echo esc_url( $nav_button_link ); ?>"><?php echo esc_html( $nav_button_text ); ?></a>
					            <?php
					        } ?>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<?php  
		if( !is_page_template('elementor_header_footer') && !is_page_template('templates/skeleton.php') ){ ?>
		    <div class="container">
		    <div class="inner-wrapper">
		    <?php 
		}
