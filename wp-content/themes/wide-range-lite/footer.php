<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Wide Range Lite
 */
?>

<div class="footer-wrapper"> 
      <div class="footer_hold">           
          <?php if ( is_active_sidebar( 'site-footer-widget-column-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'site-footer-widget-column-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'site-footer-widget-column-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'site-footer-widget-column-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'site-footer-widget-column-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'site-footer-widget-column-3' ); ?>
                </div>
           <?php endif; ?>           
           
           <div class="clear"></div>
      </div><!--end .footer_hold-->                     
     </div><!--end #footer-wrapper-->
     <div class="footer_copywrapper"> 
            <div class="footer_hold">
                <div class="wp_powerd_by">
				  <?php bloginfo('name'); ?> | 
                  <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wide-range-lite' ) ); ?>">
				     <?php
				         /* translators: %s: WordPress. */
				          printf( __( 'Proudly Powered by %s.', 'wide-range-lite' ), 'WordPress' );
				     ?>
			       </a>                 
                </div>
                        	
                <div class="gt_design_by">				
                  <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-full-screen-wordpress-theme/', 'wide-range-lite' ) ); ?>" target="_blank">
				    <?php printf( __( 'Theme by %s', 'wide-range-lite' ), 'Grace Themes' ); ?>
                  </a>
                </div>
                <div class="clear"></div>
             </div><!--end .footer_hold-->             
        </div><!--end .footer_copywrapper-->      
</div><!--#end layout_wrapper-->

<?php wp_footer(); ?>
</body>
</html>