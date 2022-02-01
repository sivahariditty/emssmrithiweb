<?php
/**
 * @package Guten
 */ ?>

<?php do_action ( 'guten_hook_before_topbar' ); ?>

<div class="site-header-side-container">
	<div class="site-header-side-container-inner">

		<?php if ( !get_theme_mod( 'guten-header-remove-topbar', customizer_library_get_default( 'guten-header-remove-topbar' ) ) ) : ?>
			<div class="site-top-bar guten-header-six">
				
				<div class="site-top-bar-left">
				
					<?php wp_nav_menu( array( 'theme_location' => 'top-bar-menu', 'container_class' => 'guten-header-nav', 'fallback_cb' => false ) ); ?>
					
					<?php do_action ( 'guten_hook_topbar_left' ); ?>

				</div>
				
				<div class="site-top-bar-right">
					
					<?php if ( !get_theme_mod( 'guten-header-remove-no', customizer_library_get_default( 'guten-header-remove-no' ) ) ) : ?>
						<span class="site-topbar-no"><?php echo ( get_theme_mod( 'guten-website-head-no-icon', customizer_library_get_default( 'guten-website-head-no-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-head-no-icon', customizer_library_get_default( 'guten-website-head-no-icon' ) ) ) . '"></i>' : '<i class="fas fa-phone"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-head-no', customizer_library_get_default( 'guten-website-head-no' ) ) ) ?></span>
					<?php endif; ?>
					
					<?php if ( !get_theme_mod( 'guten-header-remove-add', customizer_library_get_default( 'guten-header-remove-add' ) ) ) : ?>
		            	<span class="site-topbar-ad"><?php echo ( get_theme_mod( 'guten-website-site-add-icon', customizer_library_get_default( 'guten-website-site-add-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-site-add-icon', customizer_library_get_default( 'guten-website-site-add-icon' ) ) ) . '"></i>' : '<i class="fas fa-map-marker-alt"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-site-add', customizer_library_get_default( 'guten-website-site-add' ) ) ) ?></span>
					<?php endif; ?>

					<?php do_action ( 'guten_hook_topbar_right' ); ?>
					
				</div>
				<div class="clearboth"></div>
					
			</div>
		<?php endif; ?>

		<?php do_action ( 'guten_hook_after_topbar' ); ?>

		<header id="masthead" class="site-header guten-header-six" role="banner">
			
			<div class="site-branding <?php echo ( has_custom_logo() ) ? sanitize_html_class( 'site-branding-logo' ) : sanitize_html_class( 'site-branding-nologo' ); ?>">
				
				<?php if ( has_custom_logo() ) : ?>
	                <?php the_custom_logo(); ?>
	                <div class="site-branding-block <?php echo ( get_theme_mod( 'guten-title-tagline-position', customizer_library_get_default( 'guten-title-tagline-position' ) ) ) ? sanitize_html_class( 'site-branding-float' ) : ''; ?>">
		                <?php if ( get_theme_mod( 'guten-show-site-title' ) ) : ?>
		                	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                <?php endif; ?>
		                <?php if ( get_theme_mod( 'guten-show-site-tagline' ) ) : ?>
		                	<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		                <?php endif; ?>
		            </div>
	            <?php else : ?>
	                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	            <?php endif; ?>
				
			</div><!-- .site-branding -->
			
			<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'guten-nav-onmobile-acc', customizer_library_get_default( 'guten-nav-onmobile-acc' ) ) ) ? sanitize_html_class( 'guten-nav-accesson' ) : sanitize_html_class( 'guten-nav-accessoff' ); ?> <?php echo ( get_theme_mod( 'guten-header-nav-style' ) ) ? sanitize_html_class( get_theme_mod( 'guten-header-nav-style' ) ) : sanitize_html_class( 'guten-nav-style-plain' ); ?> <?php echo ( get_theme_mod( 'guten-header-nav-align' ) ) ? sanitize_html_class( get_theme_mod( 'guten-header-nav-align' ) ) : sanitize_html_class( 'guten-nav-align-right' ); ?>" role="navigation" aria-label='<?php _e( 'Primary Menu ', 'guten' ); ?>'>
				<button class="header-menu-button" aria-controls="site-navigation" aria-expanded="false"><i class="fas fa-bars"></i><span><?php echo esc_attr( get_theme_mod( 'guten-header-menu-text', customizer_library_get_default( 'guten-header-menu-text' ) ) ); ?></span></button>
				<div id="main-menu" class="main-menu-container">
					<span class="main-menu-close"><i class="fas fa-angle-right"></i><i class="fas fa-angle-left"></i></span>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					
					<?php if ( guten_is_woocommerce_activated() ) : ?>
						<?php if ( !get_theme_mod( 'guten-header-remove-cart', customizer_library_get_default( 'guten-header-remove-cart' ) ) ) : ?>
							<div class="header-cart">
								
					            <a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'guten' ); ?>">
						            <span class="header-cart-amount">
						                <?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'guten' ), WC()->cart->get_cart_contents_count() ); ?><span> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
						            </span>
						            <span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
						                <i class="fas fa-shopping-cart"></i>
						            </span>
						        </a>
								
								<?php if ( get_theme_mod( 'guten-header-add-drop-cart', customizer_library_get_default( 'guten-header-add-drop-cart' ) ) ) : ?>
									<div class="site-header-cart">
										<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
					
				</div>
			</nav><!-- #site-navigation -->
			
			<div class="site-header-social <?php echo ( get_theme_mod( 'guten-social-color-header', customizer_library_get_default( 'guten-social-color-header' ) ) ) ? sanitize_html_class( 'social-icons-color' ) : ''; ?>">
			
				<?php if ( !get_theme_mod( 'guten-header-search', customizer_library_get_default( 'guten-header-search' ) ) ) : ?>
					<button class="menu-search">
				    	<i class="fas fa-search search-btn"></i>
				    </button>
				<?php endif; ?>
				
				<?php if ( !get_theme_mod( 'guten-header-remove-social', customizer_library_get_default( 'guten-header-remove-social' ) ) ) : ?>
					<?php get_template_part( '/templates/social-links' ); ?>
				<?php endif; ?>
				
			</div>
			
			<?php if ( !get_theme_mod( 'guten-header-remove-extratxt', customizer_library_get_default( 'guten-header-remove-extratxt' ) ) ) : ?>
				<?php if ( get_theme_mod( 'guten-website-header-extra-txt' ) ) : ?>
		        	<div class="site-top-bar-right-extra-txt">
		        		<?php echo esc_html( get_theme_mod( 'guten-website-header-extra-icon' ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-header-extra-icon', customizer_library_get_default( 'guten-website-header-extra-icon' ) ) ) . '"></i>' : ''; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-header-extra-txt', customizer_library_get_default( 'guten-website-header-extra-txt' ) ) ) ?>
		        	</div>
		        <?php endif; ?>
			<?php endif; ?>
			
		</header>

		<?php do_action ( 'guten_hook_after_header' ); ?>
		
		<?php if ( !get_theme_mod( 'guten-header-search', customizer_library_get_default( 'guten-header-search' ) ) ) : ?>
		    <div class="search-block">
		    	<?php get_search_form(); ?>
		    </div>
		<?php endif; ?>
		
	</div>
</div>