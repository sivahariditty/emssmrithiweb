<?php
/**
 *Wide Range Lite About Theme
 *
 * @package Wide Range Lite
 */

//about theme info
add_action( 'admin_menu', 'wide_range_lite_abouttheme' );
function wide_range_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'wide-range-lite'), __('About Theme Info', 'wide-range-lite'), 'edit_theme_options', 'wide_range_lite_guide', 'wide_range_lite_mostrar_guide');   
} 

//Info of the theme
function wide_range_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'wide-range-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Wide Range Lite is a beautifully designed, intuitive and attractive, engaging and dynamic, powerful and accessible, gorgeous and flexible free full screen WordPress theme. This theme is specifically developed for creating all types of full width websites. It is particularly powerful when used to create your professional photojournalism websites. Wide Range is perfect for landing pages, photography, digital marketing company, portfolio, personal blog or any other websites. ','wide-range-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'wide-range-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'wide-range-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'wide-range-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'wide-range-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'wide-range-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'wide-range-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'wide-range-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'wide-range-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'wide-range-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( WIDE_RANGE_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'wide-range-lite'); ?></a> | 
            <a href="<?php echo esc_url( WIDE_RANGE_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'wide-range-lite'); ?></a> | 
            <a href="<?php echo esc_url( WIDE_RANGE_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'wide-range-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>