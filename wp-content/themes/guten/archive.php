<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Guten
 */
$blog_columns = 'blog-columns-three';
if ( get_theme_mod( 'guten-blog-column-layout' ) )
	$blog_columns = get_theme_mod( 'guten-blog-column-layout' );

$blog_style = 'blog-style-postblock';
if ( get_theme_mod( 'guten-blog-blocks-style' ) )
	$blog_style = get_theme_mod( 'guten-blog-blocks-style' );

get_header(); ?>

	<div id="primary" class="content-area <?php echo ( get_theme_mod( 'guten-blog-cat-full-width' ) ) ? sanitize_html_class( 'content-area-full' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-blog-break-blocks' ) && !get_theme_mod( 'guten-remove-content-bgborder' ) ) ? sanitize_html_class( 'blog-break-blocks' ) : ''; ?>">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php
				if ( 'guten-page-titlebar-standard' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) :
					get_template_part( '/templates/titlebar' );
				endif; ?>
				
				<?php
				// if archive pages are set to be blocks
				if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) : ?>
					<div class="blog-blocks-wrap blog-blocks-wrap-remove <?php echo sanitize_html_class( $blog_columns ); ?> <?php echo sanitize_html_class( $blog_style ); ?>">
						<div class="blog-blocks-wrap-inner">
				<?php
				endif; ?>
				
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
						<?php
						/* Include the Post-Format-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Format name) and that will be used instead.
							*/
						get_template_part( 'templates/contents/content' ); ?>
						
					<?php endwhile; ?>
					
				<?php
				if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) : ?>
						<div class="clearboth"></div></div>
					</div>
				<?php
				endif; ?>
				
				<?php
				if ( function_exists( 'wp_paginate' ) ):
				    wp_paginate();  
				else :
					the_posts_navigation();
				endif; ?>

			<?php else : ?>

				<?php get_template_part( 'templates/contents/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( get_theme_mod( 'guten-blog-cat-full-width' ) && !get_theme_mod( 'guten-blog-cat-full-fl-sidebar' ) ) : ?>
        <!-- No Sidebar -->
    <?php else : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>
	
	<div class="clearboth"></div>
	
<?php get_footer(); ?>