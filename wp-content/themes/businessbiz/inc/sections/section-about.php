<?php 
/**
 * Template part for displaying About Section
 *
 *@package Businessbiz
 */
    $img_url = businessbiz_get_option( 'about_custom_img');
    $about_title  = businessbiz_get_option( 'about_custom_title');
    $excerpt   = businessbiz_get_option( 'about_custom_content');
    $btn_url = businessbiz_get_option( 'about_btn_url');
    $btn_text = businessbiz_get_option( 'about_btn_text');

    ?>    
<div class="about-section-wrapper <?php echo ! empty( $img_url) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?> ">
                
    <?php if ( ! empty( $img_url ) ) : ?>
        <div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ) ?>');">    
        </div><!-- .featured-image -->
    <?php endif; ?>

    <div class="entry-container">
        <?php if ( ! empty( $about_title ) ) : ?>
            <div class="section-header">
                <h2 class="section-title separator"><?php echo esc_html( $about_title ); ?></h2>
            </div><!-- .section-header -->
        <?php endif; 

        if ( ! empty( $excerpt ) ) : ?>
            <div class="section-content">
                <p><?php echo wp_kses_post( $excerpt ); ?></p>
            </div><!-- .entry-content -->
        <?php endif; 

        if ( ! empty( $btn_text ) ) : ?>
            <div class="more-link">
                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_text ); ?></a>
            </div><!-- .more-link -->
        <?php endif; ?>
    </div><!-- .entry-container -->
</div>   