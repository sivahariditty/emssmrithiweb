<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage utsav-event-planner
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'utsav-event-planner' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','utsav-event-planner'); ?></a></div>

<div class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="logo">
			        <?php if( has_custom_logo() ){ utsav_event_planner_the_custom_logo();
			           }else{ ?>
			          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			          <?php $description = get_bloginfo( 'description', 'display' );
			          if ( $description || is_customize_preview() ) : ?> 
			            <p class="site-description"><?php echo esc_html($description); ?></p>
			        <?php endif; }?>
			    </div>
			</div>
			<div class="col-lg-7 col-md-7">
				<div id="header" class="menu-section">
					<div class="nav">
						<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-2">
				<?php if( get_theme_mod( 'utsav_event_planner_book_text') != '') { ?>
					<div class="quote-btn">
						<a href="<?php echo esc_url( get_theme_mod( 'utsav_event_planner_book_url','' ) ); ?>"><?php echo esc_html( get_theme_mod( 'utsav_event_planner_book_text','' ) ); ?></a>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>