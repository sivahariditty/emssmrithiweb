<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Guten
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( !is_front_page() && 'guten-page-fimage-layout-standard' == get_theme_mod( 'guten-page-fimage-layout' ) ) : ?>
		
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

</article><!-- #post-## -->
