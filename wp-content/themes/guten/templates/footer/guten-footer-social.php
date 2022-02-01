<?php do_action ( 'guten_hook_before_footer' ); ?>

<footer id="colophon" class="site-footer site-footer-social" role="contentinfo">
	
	<div class="site-footer-icons">
        <div class="site-container">
            
            <?php if ( !get_theme_mod( 'guten-footer-remove-social', customizer_library_get_default( 'guten-footer-remove-social' ) ) ) : ?>
            	
	            <?php
				if( get_theme_mod( 'guten-social-email' ) ) :
				    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'guten-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'guten' ) . '" class="footer-social-icon footer-social-email"><i class="far fa-envelope"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-skype' ) ) :
				    echo '<a href="skype:' . esc_html( get_theme_mod( 'guten-social-skype' ) ) . '?userinfo" title="' . esc_attr__( 'Contact Us on Skype', 'guten' ) . '" class="footer-social-icon footer-social-skype"><i class="fab fa-skype"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-facebook' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'guten' ) . '" class="footer-social-icon footer-social-facebook"><i class="fab fa-facebook"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-twitter' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Twitter', 'guten' ) . '" class="footer-social-icon footer-social-twitter"><i class="fab fa-twitter"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-google-plus' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-google-plus' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Google Plus', 'guten' ) . '" class="footer-social-icon footer-social-gplus"><i class="fab fa-google-plus"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-snapchat' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-snapchat' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on SnapChat', 'guten' ) . '" class="footer-social-icon footer-social-snapchat"><i class="fab fa-snapchat"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-amazon' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-amazon' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Amazon', 'guten' ) . '" class="footer-social-icon footer-social-amazon"><i class="fab fa-amazon"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-etsy' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-etsy' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Etsy', 'guten' ) . '" class="footer-social-icon footer-social-etsy"><i class="fab fa-etsy"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-yelp' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-yelp' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Yelp', 'guten' ) . '" class="footer-social-icon footer-social-yelp"><i class="fab fa-yelp"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-youtube' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-youtube' ) ) . '" target="_blank" title="' . esc_attr__( 'View our YouTube Channel', 'guten' ) . '" class="footer-social-icon footer-social-youtube"><i class="fab fa-youtube"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-vimeo' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vimeo' ) ) . '" target="_blank" title="' . esc_attr__( 'View our Vimeo Channel', 'guten' ) . '" class="footer-social-icon footer-social-vimeo"><i class="fab fa-vimeo-square"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-instagram' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-instagram' ) ) . '" target="_blank" title="' . esc_attr__( 'Follow Us on Instagram', 'guten' ) . '" class="footer-social-icon footer-social-instagram"><i class="fab fa-instagram"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-pinterest' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-pinterest' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Pinterest', 'guten' ) . '" class="footer-social-icon footer-social-pinterest"><i class="fab fa-pinterest"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-medium' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-medium' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Medium', 'guten' ) . '" class="footer-social-icon social-medium"><i class="fab fa-medium"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-behance' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-behance' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Behance', 'guten' ) . '" class="footer-social-icon social-behance"><i class="fab fa-behance"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-soundcloud' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-soundcloud' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on SoundCloud', 'guten' ) . '" class="footer-social-icon social-soundcloud"><i class="fab fa-soundcloud"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-product-hunt' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-product-hunt' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Product Hunt', 'guten' ) . '" class="footer-social-icon social-product-hunt"><i class="fab fa-product-hunt"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-slack' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-slack' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Slack', 'guten' ) . '" class="footer-social-icon social-slack"><i class="fab fa-slack"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-linkedin' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'guten' ) . '" class="footer-social-icon footer-social-linkedin"><i class="fab fa-linkedin"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-tumblr' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'guten' ) . '" class="footer-social-icon footer-social-tumblr"><i class="fab fa-tumblr"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-digg' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-digg' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Digg', 'guten' ) . '" class="footer-social-icon footer-social-digg"><i class="fab fa-digg"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-flickr' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'guten' ) . '" class="footer-social-icon footer-social-flickr"><i class="fab fa-flickr"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-houzz' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-houzz' ) ) . '" target="_blank" title="' . esc_attr__( 'Find our profile on Houzz', 'guten' ) . '" class="footer-social-icon social-houzz"><i class="fab fa-houzz"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-vine' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vine' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Vine', 'guten' ) . '" class="footer-social-icon social-vine"><i class="fab fa-vine"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-vk' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VK', 'guten' ) . '" class="footer-social-icon social-vk"><i class="fab fa-vk"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-xing' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-xing' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Xing', 'guten' ) . '" class="footer-social-icon social-xing"><i class="fab fa-xing"></i></a>';
				endif;

				if( get_theme_mod( 'guten-social-stumbleupon' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-stumbleupon' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on StumbleUpon', 'guten' ) . '" class="footer-social-icon social-stumbleupon"><i class="fab fa-stumbleupon"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-tripadvisor' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-tripadvisor' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on TripAdvisor', 'guten' ) . '" class="footer-social-icon footer-social-tripadvisor"><i class="fab fa-tripadvisor"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-github' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-github' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on GitHub', 'guten' ) . '" class="footer-social-icon footer-social-github"><i class="fab fa-github"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-custom-class' ) && get_theme_mod( 'guten-social-custom-url' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url' ) ) . '" target="_blank" class="footer-social-icon footer-social-custom"><i class="fab ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class' ) ) . '"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-custom-class-two' ) && get_theme_mod( 'guten-social-custom-url-two' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url-two' ) ) . '" target="_blank" class="footer-social-icon footer-social-custom"><i class="fab ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class-two' ) ) . '"></i></a>';
				endif;
				
				if( get_theme_mod( 'guten-social-custom-class-nobrand' ) && get_theme_mod( 'guten-social-custom-url-nobrand' ) ) :
					echo '<a href="' . esc_url( get_theme_mod( 'guten-social-custom-url-nobrand' ) ) . '" target="_blank" class="footer-social-icon footer-social-custom"><i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-social-custom-class-nobrand' ) ) . '"></i></a>';
				endif; ?>
				
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'guten-website-footer-txt' ) ) : ?>
	        	<div class="site-footer-social-txt">
	        		<?php echo ( get_theme_mod( 'guten-website-footer-icon', customizer_library_get_default( 'guten-website-footer-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-footer-icon', customizer_library_get_default( 'guten-website-footer-icon' ) ) ) . '"></i>' : '<i class="fas fa-map-marker-alt"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-footer-txt', customizer_library_get_default( 'guten-website-footer-txt' ) ) ) ?>
	        	</div>
	        <?php endif; ?>
			
			<?php printf( __( '<div class="site-footer-social-copy">Theme: %1$s by %2$s<div class="clearboth"></div></div>', 'guten' ), __( '<a href="https://gutentheme.org/">Guten</a>', 'guten' ), __( 'Kaira</div>', 'guten' ) ); ?>
    </div>
    
</footer>

<?php do_action ( 'guten_hook_footer_bottombar_middle' ); ?>
<div class="site-social-bottom-bar site-footer-bottom-bar">

	<div class="site-container">

		<?php do_action ( 'guten_hook_footer_bottom_left' ); ?>
		
		<?php wp_nav_menu( array( 'theme_location' => 'footer-bar', 'container' => false, 'depth'  => 1 ) ); ?>
		
		<?php if ( !get_theme_mod( 'guten-footer-remove-moretxt' ) ) : ?>
			<?php if ( get_theme_mod( 'guten-website-footer-txt-right', customizer_library_get_default( 'guten-website-footer-txt-right' ) ) ) : ?>
				<div class="site-footer-social-txt">
					<?php echo ( get_theme_mod( 'guten-website-footer-icon-right', customizer_library_get_default( 'guten-website-footer-icon-right' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-footer-icon-right', customizer_library_get_default( 'guten-website-footer-icon-right' ) ) ) . '"></i>' : ''; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-footer-txt-right', customizer_library_get_default( 'guten-website-footer-txt-right' ) ) ) ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action ( 'guten_hook_footer_bottom_right' ); ?>
			
	</div>
	
	<div class="clearboth"></div>
</div>
<?php do_action ( 'guten_hook_after_footer' ); ?>