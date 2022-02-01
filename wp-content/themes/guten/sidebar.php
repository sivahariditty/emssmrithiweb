<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Guten
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>
<div id="secondary" class="widget-area <?php echo ( get_theme_mod( 'guten-page-sidebar-blocks' ) ) ? sanitize_html_class( 'sidebar-break-blocks' ) : ''; ?>" role="complementary">
	<?php if ( is_page_template( 'template-floating-right-sidebar.php' ) && get_theme_mod( 'guten-site-add-side-social', customizer_library_get_default( 'guten-site-add-side-social' ) ) == 0 ) : ?>
		<button class="floating-sidebar-control floating-sidebar-control-right"></button>
	<?php else : ?>
		<button class="floating-sidebar-control floating-sidebar-control-left"></button>
	<?php endif; ?>

	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->