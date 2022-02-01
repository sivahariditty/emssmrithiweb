<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Guten
 */
?>
		<div class="clearboth"></div>
	</div><!-- #content -->
	
	<?php
	if ( get_theme_mod( 'guten-footer-side-fullwidth', customizer_library_get_default( 'guten-footer-side-fullwidth' ) ) ) :
		echo esc_html( 'guten-header-six' == get_theme_mod( 'guten-header-layout' ) ) ? '</div><div class="clearboth"></div>' : ''; // Site Side Layout
	endif; ?>
	
	<?php get_template_part( '/templates/footer/'.get_theme_mod( 'guten-footer-layout', customizer_library_get_default( 'guten-footer-layout' ) ) ); // Get Site Footer ?>
	
	<?php
	if ( !get_theme_mod( 'guten-footer-side-fullwidth', customizer_library_get_default( 'guten-footer-side-fullwidth' ) ) ) :
		echo esc_html( 'guten-header-six' == get_theme_mod( 'guten-header-layout' ) ) ? '</div><div class="clearboth"></div>' : ''; // Site Side Layout
	endif; ?>

<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '</div>' : ''; ?>

<?php echo esc_html( 'guten-header-six' != get_theme_mod( 'guten-header-layout' ) && 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? '</div>' : '</div>'; ?>

</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>