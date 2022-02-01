<?php
/**
 * The template for displaying search results pages.
 *
 * @package Guten
 */
$blog_style = 'blog-style-postblock';
if ( get_theme_mod( 'guten-blog-blocks-style' ) )
	$blog_style = get_theme_mod( 'guten-blog-blocks-style' );

$blog_columns = 'blog-columns-three';
if ( get_theme_mod( 'guten-blog-column-layout' ) )
	$blog_columns = get_theme_mod( 'guten-blog-column-layout' );

get_header(); ?>

	<section id="primary" class="content-area <?php echo ( get_theme_mod( 'guten-blog-search-full-width' ) ) ? sanitize_html_class( 'content-area-full' ) : ''; ?> <?php echo ( get_theme_mod( 'guten-blog-break-blocks' ) && !get_theme_mod( 'guten-remove-content-bgborder' ) ) ? sanitize_html_class( 'blog-break-blocks' ) : ''; ?>">
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
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'templates/contents/content', 'search' ); ?>

					<?php endwhile; ?>
						
				<?php
				if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) : ?>
						<div class="clearboth"></div></div>
					</div>
				<?php
				endif; ?>

			<?php else : ?>

				<?php get_template_part( 'templates/contents/content', 'none' ); ?>

			<?php endif; ?>
			
			<?php
			if ( function_exists( 'wp_paginate' ) ):
			    wp_paginate();  
			else :
				the_posts_navigation();
			endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php if ( get_theme_mod( 'guten-blog-search-full-width' ) && !get_theme_mod( 'guten-blog-search-full-fl-sidebar' ) ) : ?>
        <!-- No Sidebar -->
    <?php else : ?>
        <?php get_sidebar(); ?>
    <?php endif; ?>
    
    <div class="clearboth"></div>

<?php get_footer(); ?>
