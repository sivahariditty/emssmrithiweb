<?php do_action ( 'guten_hook_before_footer' ); ?>

<footer id="colophon" class="site-footer site-footer-custom <?php echo ( get_theme_mod( 'guten-footer-widget-title-centeralign', customizer_library_get_default( 'guten-footer-widget-title-centeralign' ) ) ) ? sanitize_html_class( 'guten-centeralign-widget-title' ) : ''; ?> <?php echo sanitize_html_class( get_theme_mod( 'guten-footer-widget-title-style', customizer_library_get_default( 'guten-footer-widget-title-style' ) ) ); ?>" role="contentinfo">

	<div class="site-footer-widgets <?php echo ( get_theme_mod( 'guten-footer-custom-cols' ) ) ? sanitize_html_class( get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) : sanitize_html_class( 'guten-footer-custom-cols-3' ); ?>">
        <div class="site-container">

        	<?php if ( 'guten-footer-custom-cols-5' == get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) : ?>

	            <div class="footer-custom-block footer-custom-one">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-1' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-two">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-2' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-three">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-3' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-four">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-4' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-five">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-5' ); ?>
	            </div>

		    <?php elseif ( 'guten-footer-custom-cols-4' == get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) : ?>

		    	<div class="footer-custom-block footer-custom-one">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-1' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-two">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-2' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-three">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-3' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-four">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-4' ); ?>
	            </div>

	        <?php elseif ( 'guten-footer-custom-cols-1' == get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) : ?>

	        	<div class="footer-custom-block footer-custom-one <?php echo ( get_theme_mod( 'guten-center-col-1', customizer_library_get_default( 'guten-center-col-1' ) ) ) ? sanitize_html_class( 'footer-custom-one-center' ) : ''; ?>">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-1' ); ?>
	            </div>

	        <?php elseif ( 'guten-footer-custom-cols-2' == get_theme_mod( 'guten-footer-custom-cols', customizer_library_get_default( 'guten-footer-custom-cols' ) ) ) : ?>

	        	<div class="footer-custom-block footer-custom-one">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-1' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-two">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-2' ); ?>
	            </div>

	        <?php else : ?>

	        	<div class="footer-custom-block footer-custom-one">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-1' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-two">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-2' ); ?>
	            </div>

	            <div class="footer-custom-block footer-custom-three">
	                <?php dynamic_sidebar( 'guten-site-footer-custom-3' ); ?>
	            </div>

	        <?php endif; ?>

        </div>
    </div>

</footer>

<?php do_action ( 'guten_hook_footer_bottombar_middle' ); ?>

<div class="site-footer-bottom-bar <?php echo ( get_theme_mod( 'guten-bottombar-switch' ) ) ? sanitize_html_class( 'site-bottombar-switch' ) : ''; ?>">
	<div class="site-container"><div class="site-footer-bottom-bar-left"><?php if ( get_theme_mod( 'guten-website-footer-txt', customizer_library_get_default( 'guten-website-footer-txt' ) ) ) : ?>
		<div class="site-footer-social-txt">
			<?php echo ( get_theme_mod( 'guten-website-footer-icon', customizer_library_get_default( 'guten-website-footer-icon' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-footer-icon', customizer_library_get_default( 'guten-website-footer-icon' ) ) ) . '"></i>' : '<i class="fas fa-map-marker-alt"></i>'; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-footer-txt', customizer_library_get_default( 'guten-website-footer-txt' ) ) ) ?>
		</div>
	<?php endif; printf( __( 'Theme: %1$s by %2$s', 'guten' ), __( '<a href="https://gutentheme.org/">Guten</a>', 'guten' ), __( 'Kaira', 'guten' ) ); do_action ( 'guten_hook_footer_bottom_left' ); echo '</div>'; ?>

	<div class="site-footer-bottom-bar-right">
		<?php do_action ( 'guten_hook_footer_bottom_right' ); ?><?php if ( !get_theme_mod( 'guten-footer-remove-moretxt' ) ) : ?>
			<?php if ( get_theme_mod( 'guten-website-footer-txt-right', customizer_library_get_default( 'guten-website-footer-txt-right' ) ) ) : ?>
				<div class="site-footer-social-txt">
					<?php echo ( get_theme_mod( 'guten-website-footer-icon-right', customizer_library_get_default( 'guten-website-footer-icon-right' ) ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'guten-website-footer-icon-right', customizer_library_get_default( 'guten-website-footer-icon-right' ) ) ) . '"></i>' : ''; ?> <?php echo wp_kses_post( get_theme_mod( 'guten-website-footer-txt-right', customizer_library_get_default( 'guten-website-footer-txt-right' ) ) ) ?>
				</div>
			<?php endif; ?>
		<?php endif; wp_nav_menu( array( 'theme_location' => 'footer-bar', 'container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>

		<?php if ( !get_theme_mod( 'guten-footer-remove-social', customizer_library_get_default( 'guten-footer-remove-social' ) ) ) : ?>
			<?php get_template_part( '/templates/social-links' ); ?>
		<?php endif; ?></div><div class="clearboth"></div>
	</div>
</div>

<?php do_action ( 'guten_hook_after_footer' ); ?>