<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Wide Range Lite
 */

get_header(); ?>

<div class="site_content_layout">
    <div class="site_content_style">
        <section class="wrt_content_wrapper">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'wide-range-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'wide-range-lite' ); ?></p>  
            </div><!-- .page-content -->
        </section>
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
<?php get_footer(); ?>