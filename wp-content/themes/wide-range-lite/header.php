<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till
 *
 * @package Wide Range Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$wide_range_lite_show_headersocialsection 	  		= get_theme_mod('wide_range_lite_show_headersocialsection', false);
?>
<div id="layout_wrapper">
<div class="menuleft">
     <div class="menupanelbg">
      <div class="logo">
        <?php wide_range_lite_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
    <div class="menushowhide">                
    <div class="menufixedleft">  
      <div class="toggle">
    	<a class="toggleMenu" href="#">&nbsp;</a>
      </div><!-- toggle -->
      <div class="sitenav">                   
   	     <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
     </div><!--.sitenav --> 
    </div><!--menufixedleft--> 
  </div><!-- .menushowhide-->
    
    <?php if( $wide_range_lite_show_headersocialsection != ''){ ?> 
           <div class="contactinfo">
            <div class="header-socialicons">                                                
                   <?php $wide_range_lite_fblink = get_theme_mod('wide_range_lite_fblink');
                    if( !empty($wide_range_lite_fblink) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($wide_range_lite_fblink); ?>"></a>
                   <?php } ?>
                
                   <?php $wide_range_lite_twittlink = get_theme_mod('wide_range_lite_twittlink');
                    if( !empty($wide_range_lite_twittlink) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($wide_range_lite_twittlink); ?>"></a>
                   <?php } ?>
            
                  <?php $wide_range_lite_gpluslink = get_theme_mod('wide_range_lite_gpluslink');
                    if( !empty($wide_range_lite_gpluslink) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($wide_range_lite_gpluslink); ?>"></a>
                  <?php }?>
            
                  <?php $wide_range_lite_linkedlink = get_theme_mod('wide_range_lite_linkedlink');
                    if( !empty($wide_range_lite_linkedlink) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($wide_range_lite_linkedlink); ?>"></a>
                  <?php } ?>                  
             </div><!--end .header-socialicons--> 
         </div><!--end .contactinfo--> 
      <?php } ?> 
    
   </div><!-- .menupanelbg--> 
    <div class="menu-bottom">
       <div id="menu-bottom-shape"></div><!-- menu-bottom-shape-->
    </div><!-- menu-bottom -->
 <div class="clear"></div>
 
</div><!-- .menuleft--> 