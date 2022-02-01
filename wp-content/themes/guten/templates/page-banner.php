<?php
$the_page_id = get_the_ID();
if ( is_home() || is_archive() || is_search() ) :
    if ( guten_is_woocommerce_activated() ) :
        if ( is_woocommerce() ) :
            $the_page_id = get_option( 'woocommerce_shop_page_id' );
        else :
            $the_page_id = get_option( 'page_for_posts' );
        endif;
    else :
        $the_page_id = get_option( 'page_for_posts' );
    endif;
else :
    $the_page_id = get_the_ID();
endif;

if ( has_post_thumbnail( $the_page_id ) && 'guten-page-fimage-layout-banner' == get_theme_mod( 'guten-page-fimage-layout' ) ) : ?>
    
    <?php echo esc_html( !get_theme_mod( 'guten-page-fimage-fullwidth', customizer_library_get_default( 'guten-page-fimage-fullwidth' ) ) ) ? '<div class="site-container">' : ''; ?>
        
        <div class="page-fimage-banner <?php echo ( 'guten-page-fimage-size-actual' == get_theme_mod( 'guten-page-fimage-size' ) ) ? sanitize_html_class( 'page-fimage-banner-actual' ) : ''; ?>" <?php echo ( 'guten-page-fimage-size-actual' != get_theme_mod( 'guten-page-fimage-size' ) ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $the_page_id ) ) . ');"' : ''; ?>>
            
            <?php if ( 'guten-page-fimage-size-actual' == get_theme_mod( 'guten-page-fimage-size' ) ) : ?>
                <?php the_post_thumbnail( 'full', $the_page_id ); ?>
            <?php elseif ( 'guten-page-fimage-size-extra-small' == get_theme_mod( 'guten-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_extra_small.gif" />
            <?php elseif ( 'guten-page-fimage-size-small' == get_theme_mod( 'guten-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_small.gif" />
            <?php elseif ( 'guten-page-fimage-size-large' == get_theme_mod( 'guten-page-fimage-size' ) ) : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_large.gif" />
            <?php else : ?>
                <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
            <?php endif; ?>
            
        </div> <!-- .page-fimage-banner -->
        
    <?php echo esc_html( !get_theme_mod( 'guten-page-fimage-fullwidth', customizer_library_get_default( 'guten-page-fimage-fullwidth' ) ) ) ? '</div>' : ''; ?>
    
<?php endif; ?>