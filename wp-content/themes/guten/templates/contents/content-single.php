<?php
/**
 * @package Guten
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header <?php echo ( get_theme_mod( 'guten-single-remove-meta-date', customizer_library_get_default( 'guten-single-remove-meta-date' ) ) ) ? sanitize_html_class( 'guten-single-remdate' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-single-remove-meta-auth', customizer_library_get_default( 'guten-single-remove-meta-auth' ) ) ) ? sanitize_html_class( 'guten-single-remauth' ) : ''; ?>">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		
		<div class="entry-meta">
			<?php guten_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<?php if ( 'guten-single-page-fimage-layout-standard' == get_theme_mod( 'guten-single-page-fimage-layout', customizer_library_get_default( 'guten-single-page-fimage-layout' ) ) ) : ?>
	
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="entry-content-img">
				<?php the_post_thumbnail( 'full' ); ?>
			</div>
		<?php endif; ?>
		
	<?php endif; ?>
	
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'guten' ),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-content -->
	
	<footer class="entry-footer <?php echo ( get_theme_mod( 'guten-single-remove-cats', customizer_library_get_default( 'guten-single-remove-cats' ) ) ) ? sanitize_html_class( 'guten-single-remcats' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-single-remove-tags', customizer_library_get_default( 'guten-single-remove-tags' ) ) ) ? sanitize_html_class( 'guten-single-remtags' ) : ''; ?>">
		<?php guten_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->