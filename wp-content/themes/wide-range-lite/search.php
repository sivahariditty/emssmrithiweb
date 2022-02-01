<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Wide Range Lite
 */

get_header(); ?>

<div class="site_content_layout">
    <div class="site_content_style">
        <section class="wrt_content_wrapper">
            <div class="site_posts_column">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( esc_html_e( 'Search Results for: %s', 'wide-range-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(); ?>
                <?php else : ?>
                    <?php get_template_part( 'no-results' ); ?>
                <?php endif; ?>                  
            </div><!-- site_posts_column -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
<?php get_footer(); ?>