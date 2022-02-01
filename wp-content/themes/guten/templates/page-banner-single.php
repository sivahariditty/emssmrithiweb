<?php
$single_page_id = get_the_ID(); ?>

<?php if ( has_post_thumbnail( $single_page_id ) && 'guten-single-page-fimage-layout-banner' == get_theme_mod( 'guten-single-page-fimage-layout' ) ) : ?>
    
    <?php echo esc_html( !get_theme_mod( 'guten-single-page-fimage-fullwidth' ) ) ? '<div class="site-container">' : ''; ?>
        
        <div class="page-fimage-banner <?php echo ( 'guten-single-page-fimage-size-actual' == get_theme_mod( 'guten-single-page-fimage-size' ) ) ? sanitize_html_class( 'page-fimage-banner-actual' ) : ''; ?>" <?php echo ( 'guten-single-page-fimage-size-actual' != get_theme_mod( 'guten-single-page-fimage-size' ) ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $single_page_id ) ) . ');"' : ''; ?>>
            
            <?php if ( 'guten-single-page-fimage-size-actual' == get_theme_mod( 'guten-single-page-fimage-size' ) ) : ?>
                <?php the_post_thumbnail( 'full', $single_page_id ); ?>
            <?php elseif ( 'guten-single-page-fimage-size-extra-small' == get_theme_mod( 'guten-single-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_extra_small.gif" />
            <?php elseif ( 'guten-single-page-fimage-size-small' == get_theme_mod( 'guten-single-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_small.gif" />
            <?php elseif ( 'guten-single-page-fimage-size-large' == get_theme_mod( 'guten-single-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_large.gif" />
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
            <?php endif; ?>
            
        </div> <!-- .page-fimage-banner -->
        
    <?php echo esc_html( !get_theme_mod( 'guten-single-page-fimage-fullwidth' ) ) ? '</div>' : ''; ?>
    
<?php endif; ?>