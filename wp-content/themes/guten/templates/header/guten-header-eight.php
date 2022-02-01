<?php
/**
 * @package Guten
 */ ?>

<?php do_action ( 'guten_hook_before_topbar' ); ?>

<?php if ( !get_theme_mod( 'guten-header-remove-topbar', customizer_library_get_default( 'guten-header-remove-topbar' ) ) ) : ?>
	<div class="site-top-bar guten-header-eight <?php echo ( get_theme_mod( 'guten-header-topbar-switch', customizer_library_get_default( 'guten-header-topbar-switch' ) ) ) ? sanitize_html_class( 'site-top-bar-switch' ) : ''; ?>">
		
		<div class="site-container">
			
			<div class="site-top-bar-left">
				
				<?php if ( !get_theme_mod( 'guten-header-remove-no', customizer_library_get_default( 'guten-header-remove-no' ) ) ) : ?>
					<span class="site-topbar-no"><?php echo ( get_theme_mod( 'guten-website-head-no-icon', customizer_library_get_default( 'guten-website-head-no-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-head-no-icon', customizer_library_get_default( 'guten-website-head-no-icon' ) ) ) . '"></i>' : '<i class="fas fa-phone"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-head-no', customizer_library_get_default( 'guten-website-head-no' ) ) ) ?></span>
				<?php endif; ?>
				
				<?php if ( !get_theme_mod( 'guten-header-remove-add', customizer_library_get_default( 'guten-header-remove-add' ) ) ) : ?>
	            	<span class="site-topbar-ad"><?php echo ( get_theme_mod( 'guten-website-site-add-icon', customizer_library_get_default( 'guten-website-site-add-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-site-add-icon', customizer_library_get_default( 'guten-website-site-add-icon' ) ) ) . '"></i>' : '<i class="fas fa-map-marker-alt"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-site-add', customizer_library_get_default( 'guten-website-site-add' ) ) ) ?></span>
				<?php endif; ?>

				<?php do_action ( 'guten_hook_topbar_left' ); ?>
				
			</div>
			
			<div class="site-top-bar-right">
				
		        <?php if ( !get_theme_mod( 'guten-header-remove-social', customizer_library_get_default( 'guten-header-remove-social' ) ) ) : ?>
					<?php get_template_part( '/templates/social-links' ); ?>
				<?php endif; ?>
				
				<?php wp_nav_menu( array( 'theme_location' => 'top-bar-menu', 'container_class' => 'guten-header-nav', 'fallback_cb' => false ) ); ?>
				
				<?php do_action ( 'guten_hook_topbar_right' ); ?>

			</div>
			<div class="clearboth"></div>
			
		</div>
		
	</div>
<?php endif; ?>

<?php do_action ( 'guten_hook_after_topbar' ); ?>

<header id="masthead" class="site-header guten-header-eight <?php echo ( get_theme_mod( 'guten-header-switch', customizer_library_get_default( 'guten-header-switch' ) ) ) ? sanitize_html_class( 'site-header-switch' ) : ''; ?> <?php echo ( is_front_page() && get_theme_mod( 'guten-header-remove-slider-space', customizer_library_get_default( 'guten-header-remove-slider-space' ) ) ) ? sanitize_html_class( 'site-header-nospace' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-header-remove-main-nav', customizer_library_get_default( 'guten-header-remove-main-nav' ) ) ) ? sanitize_html_class( 'site-no-nav' ) : ''; ?>" role="banner">
	
	<div class="site-container">
			
		<div class="site-branding <?php echo ( get_theme_mod( 'guten-title-tagline-position', customizer_library_get_default( 'guten-title-tagline-position' ) ) ) ? sanitize_html_class( 'site-branding-float-all' ) : ''; ?> <?php echo ( has_custom_logo() ) ? sanitize_html_class( 'site-branding-logo' ) : sanitize_html_class( 'site-branding-nologo' ); ?>">
			
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
        
        <div class="site-branding-right">

            <?php if ( !get_theme_mod( 'guten-header-remove-extratxt', customizer_library_get_default( 'guten-header-remove-extratxt' ) ) ) : ?>
                <?php if ( get_theme_mod( 'guten-website-header-extra-txt', customizer_library_get_default( 'guten-website-header-extra-txt' ) ) ) : ?>
                    <div class="site-top-bar-right-extra-txt">
                        <?php echo ( get_theme_mod( 'guten-website-header-extra-icon', customizer_library_get_default( 'guten-website-header-extra-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-header-extra-icon', customizer_library_get_default( 'guten-website-header-extra-icon' ) ) ) . '"></i>' : ''; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-header-extra-txt', customizer_library_get_default( 'guten-website-header-extra-txt' ) ) ) ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
            <?php if ( !get_theme_mod( 'guten-header-search', customizer_library_get_default( 'guten-header-search' ) ) ) : ?>
			    <div class="search-block">
			    	<?php get_search_form(); ?>
			    </div>
            <?php endif; ?>
            
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
		
	</div>
	
	<?php if ( !get_theme_mod( 'guten-header-remove-main-nav', customizer_library_get_default( 'guten-header-remove-main-nav' ) ) ) : ?>
		<div class="site-header-top">
			
			<div class="site-container">
				<div class="site-header-top-left">
					
					<nav id="site-navigation" class="main-navigation <?php echo ( get_theme_mod( 'guten-nav-onmobile-acc', customizer_library_get_default( 'guten-nav-onmobile-acc' ) ) ) ? sanitize_html_class( 'guten-nav-accesson' ) : sanitize_html_class( 'guten-nav-accessoff' ); ?> <?php echo ( get_theme_mod( 'guten-header-nav-style', customizer_library_get_default( 'guten-header-nav-style' ) ) ) ? sanitize_html_class( get_theme_mod( 'guten-header-nav-style', customizer_library_get_default( 'guten-header-nav-style' ) ) ) : sanitize_html_class( 'guten-nav-style-plain' ); ?>" role="navigation" aria-label='<?php _e( 'Primary Menu ', 'guten' ); ?>'>
						<button class="header-menu-button" aria-controls="site-navigation" aria-expanded="false"><i class="fas fa-bars"></i><span><?php echo esc_attr( get_theme_mod( 'guten-header-menu-text', customizer_library_get_default( 'guten-header-menu-text' ) ) ); ?></span></button>
						<div id="main-menu" class="main-menu-container">
							<span class="main-menu-close"><i class="fas fa-angle-right"></i><i class="fas fa-angle-left"></i></span>
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</div>
					</nav><!-- #site-navigation -->
					
				</div>
				
				<div class="clearboth"></div>
				
			</div>
			
		</div>
	<?php endif; ?>
	
	<?php
	if ( 'guten-page-titlebar-banner' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) :
		get_template_part( '/templates/titlebar' );
	endif; ?>
</header>

<?php do_action ( 'guten_hook_after_header' ); ?>