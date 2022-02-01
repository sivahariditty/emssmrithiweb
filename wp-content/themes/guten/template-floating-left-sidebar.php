<?php
/**
 * Template Name: Floating Left Sidebar
 * Template Post Type: Post, Page
 */
get_header(); ?>

	<div id="primary" class="content-area content-area-full">
		<main id="main" class="site-main" role="main">
			
			<?php
			if ( 'guten-page-titlebar-standard' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) :
				get_template_part( '/templates/titlebar' );
			endif; ?>
			
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'templates/contents/content', 'page' ); ?>

				<?php
				if ( is_single() ) :
					the_post_navigation();
				endif; ?>

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; ?>

			<?php endwhile; // end of the loop. ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
	<?php get_sidebar(); ?>

<?php get_footer(); ?>