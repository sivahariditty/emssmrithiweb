<?php if ( 'guten-no-slider' == get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) ) ) : ?>
    
    <!-- No Slider -->
    
<?php elseif ( 'guten-home-featured-image' == get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) ) ) : ?>
    
    <?php
    $home_page_id = get_option( 'page_on_front' );
    if ( 'page' == get_option( 'show_on_front' ) && has_post_thumbnail( $home_page_id ) ) : ?>
        
        <?php echo esc_html( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) ? '<div class="site-side-layout-container">' : ''; ?>
        
            <?php echo esc_html( !get_theme_mod( 'guten-slidermage-fullwidth', customizer_library_get_default( 'guten-slidermage-fullwidth' ) ) ) ? '<div class="site-container">' : ''; ?>
                
                <div class="page-fimage-banner <?php echo ( 'guten-slidermage-size-actual' == get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) ? sanitize_html_class( 'slidermage-banner-actual' ) : ''; ?>" <?php echo ( 'guten-slidermage-size-actual' != get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $home_page_id ) ) . ');"' : ''; ?>>
                    
                    <?php if ( 'guten-slidermage-size-actual' == get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) : ?>
                        <img src="<?php echo get_the_post_thumbnail_url( $home_page_id ); ?>" />
                    <?php elseif ( 'guten-slidermage-size-extra-small' == get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_extra_small.gif" />
                    <?php elseif ( 'guten-slidermage-size-small' == get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_small.gif" />
                    <?php elseif ( 'guten-slidermage-size-large' == get_theme_mod( 'guten-slidermage-size', customizer_library_get_default( 'guten-slidermage-size' ) ) ) : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_large.gif" />
                    <?php else : ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
                    <?php endif; ?>
                    
                </div> <!-- .page-fimage-banner -->
                
            <?php echo esc_html( !get_theme_mod( 'guten-slidermage-fullwidth', customizer_library_get_default( 'guten-slidermage-fullwidth' ) ) ) ? '</div>' : ''; ?>
        
        <?php echo esc_html( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) ? '</div>' : ''; ?>
        
    <?php endif; ?>

<?php elseif ( 'guten-shortcode-slider' == get_theme_mod( 'guten-slider-type', customizer_library_get_default( 'guten-slider-type' ) ) ) : ?>
    
    <?php
    $slider_code = '';
    if ( get_theme_mod( 'guten-slider-shortcode' ) ) {
        $slider_code = get_theme_mod( 'guten-slider-shortcode' );
    } ?>
    
    <?php echo esc_html( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) ? '<div class="site-side-layout-container">' : ''; ?>
    
        <?php if ( $slider_code ) : ?>
            <?php echo do_shortcode( sanitize_text_field( $slider_code ) ); ?>
        <?php else : ?>
            <?php if ( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) || 'guten-header-default' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) : ?>
                <div class="home-slider-empty"></div>
            <?php endif; ?>
        <?php endif; ?>
        
    <?php echo esc_html( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) ? '</div>' : ''; ?>
    
<?php else : ?>
    
    <?php
    $slider_cats = '';
    if ( get_theme_mod( 'guten-slider-cats' ) ) {
        $slider_cats = get_theme_mod( 'guten-slider-cats' );
    }
    $slider_auto_duration = get_theme_mod( 'guten-slider-auto-time', customizer_library_get_default( 'guten-slider-auto-time' ) ); ?>
    
    <?php if ( $slider_cats ) : ?>
        
        <?php
        $slider_query = new WP_Query( 'cat=' . esc_html( $slider_cats ) . '&posts_per_page=-1&orderby=date&order=DESC' ); ?>
        
        <?php if ( $slider_query->have_posts() ) : ?>
            
                <div class="home-slider-wrap home-slider-remove <?php echo ( 'guten-site-boxed' == get_theme_mod( 'guten-site-layout', customizer_library_get_default( 'guten-site-layout' ) ) ) ? sanitize_html_class( 'slider-site-boxed' ) : ''; ?>" data-auto="<?php echo ( get_theme_mod( 'guten-slider-auto-scroll', customizer_library_get_default( 'guten-slider-auto-scroll' ) ) ) ? esc_attr( 'false' ) : esc_attr( $slider_auto_duration ); ?>" data-duration="<?php echo ( get_theme_mod( 'guten-slider-duration', customizer_library_get_default( 'guten-slider-duration' ) ) ) ? esc_attr( get_theme_mod( 'guten-slider-duration', customizer_library_get_default( 'guten-slider-duration' ) ) ) : esc_attr( '450' ); ?>" data-scroll="<?php echo ( get_theme_mod( 'guten-slider-scroll-effect', customizer_library_get_default( 'guten-slider-scroll-effect' ) ) ) ? esc_attr( get_theme_mod( 'guten-slider-scroll-effect', customizer_library_get_default( 'guten-slider-scroll-effect' ) ) ) : esc_attr( 'crossfade' ); ?>" data-poh="<?php echo ( get_theme_mod( 'guten-slider-pause-oh', customizer_library_get_default( 'guten-slider-pause-oh' ) ) ) ? esc_attr( 'true' ) : esc_attr( 'false' ); ?>">
                    
                    <?php echo esc_html( !get_theme_mod( 'guten-slider-full-width', customizer_library_get_default( 'guten-slider-full-width' ) ) ) ? '<div class="site-container">' : ''; ?>
                        <button class="home-slider-prev"><i class="fa fa-angle-left"></i></button>
                        <button class="home-slider-next"><i class="fa fa-angle-right"></i></button>
                        
                        <div class="home-slider">
                            
                            <?php while ( $slider_query->have_posts() ) : $slider_query->the_post();
                                $slider_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
                                
                                <?php if ( get_theme_mod( 'guten-slider-linkto-post', customizer_library_get_default( 'guten-slider-linkto-post' ) ) ) : ?>
                                <a class="home-slider-block" href="<?php echo esc_url( the_permalink() ); ?>" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                                <?php else : ?>
                                <div class="home-slider-block"<?php echo ( has_post_thumbnail() ) ? ' style="background-image: url(' . esc_url( $slider_thumbnail['0'] ) . ');"' : ''; ?>>
                                <?php endif; ?>
                                    
                                    <?php if ( 'guten-slider-size-actual' == get_theme_mod( 'guten-slider-size', customizer_library_get_default( 'guten-slider-size' ) ) ) : ?>
                                        <img src="<?php echo esc_url( $slider_thumbnail['0'] ) ?>" />
                                    <?php elseif ( 'guten-slider-size-small' == get_theme_mod( 'guten-slider-size', customizer_library_get_default( 'guten-slider-size' ) ) ) : ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_small.gif" />
                                    <?php elseif ( 'guten-slider-size-large' == get_theme_mod( 'guten-slider-size', customizer_library_get_default( 'guten-slider-size' ) ) ) : ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_large.gif" />
                                    <?php else : ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
                                    <?php endif; ?>
                                    
                                    <?php if ( !get_theme_mod( 'guten-slider-remove-title', customizer_library_get_default( 'guten-slider-remove-title' ) ) ) : ?>
                                    
                                        <div class="home-slider-block-inner">
                                            <div class="home-slider-block-bg">
                                                <h3 class="home-slider-title">
                                                    <?php the_title(); ?>
                                                </h3>
                                                <?php if ( !get_theme_mod( 'guten-slider-remove-sub-title', customizer_library_get_default( 'guten-slider-remove-sub-title' ) ) ) : ?>
                                                    <?php if ( has_excerpt() ) : ?>
                                                        <p><?php the_excerpt(); ?></p>
                                                    <?php else : ?>
                                                        <p><?php the_content(); ?></p>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                    <?php endif; ?>
                                    
                                <?php if ( get_theme_mod( 'guten-slider-linkto-post', customizer_library_get_default( 'guten-slider-linkto-post' ) ) ) : ?>
                                </a>
                                <?php else : ?>
                                </div>
                                <?php endif; ?>
                            
                            <?php endwhile; ?>
                            
                        </div>
                        
                    <?php echo esc_html( !get_theme_mod( 'guten-slider-full-width', customizer_library_get_default( 'guten-slider-full-width' ) ) ) ? '</div>' : ''; ?>
                    
                    <?php if ( !get_theme_mod( 'guten-slider-remove-pagination', customizer_library_get_default( 'guten-slider-remove-pagination' ) ) ) : ?>
                        <div class="home-slider-pager"></div>
                    <?php endif; ?>
                </div>

                <?php do_action ( 'guten_after_default_slider' ); ?>
            
        <?php else : ?>
            
            <?php if ( 'guten-header-seven' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) || 'guten-header-default' == get_theme_mod( 'guten-header-layout', customizer_library_get_default( 'guten-header-layout' ) ) ) : ?>
                <div class="home-slider-empty"></div>
            <?php endif; ?>
            
        <?php endif; wp_reset_postdata(); ?>
        
    <?php else : ?>
        
        <div class="home-slider-wrap home-slider-remove" data-auto="<?php echo ( get_theme_mod( 'guten-slider-auto-scroll', customizer_library_get_default( 'guten-slider-auto-scroll' ) ) ) ? esc_attr( 'false' ) : esc_attr( $slider_auto_duration ); ?>" data-duration="<?php echo ( get_theme_mod( 'guten-slider-duration', customizer_library_get_default( 'guten-slider-duration' ) ) ) ? esc_attr( get_theme_mod( 'guten-slider-duration', customizer_library_get_default( 'guten-slider-duration' ) ) ) : esc_attr( '450' ); ?>" data-scroll="<?php echo ( get_theme_mod( 'guten-slider-scroll-effect', customizer_library_get_default( 'guten-slider-scroll-effect' ) ) ) ? esc_attr( get_theme_mod( 'guten-slider-scroll-effect', customizer_library_get_default( 'guten-slider-scroll-effect' ) ) ) : esc_attr( 'crossfade' ); ?>" data-poh="<?php echo ( get_theme_mod( 'guten-slider-pause-oh', customizer_library_get_default( 'guten-slider-pause-oh' ) ) ) ? esc_attr( 'true' ) : esc_attr( 'false' ); ?>">
            <div class="home-slider-wrap-hint">
                <?php _e( 'See how to', 'guten' ); ?> <a href="https://gutentheme.org/documentation/setting-up-the-default-slider/" target="_blank"><?php _e( 'Add your own slides here', 'guten' ); ?></a>
            </div>
            
            <?php echo esc_html( !get_theme_mod( 'guten-slider-full-width', customizer_library_get_default( 'guten-slider-full-width' ) ) ) ? '<div class="site-container">' : ''; ?>
                <div class="home-slider-prev"><i class="fa fa-angle-left"></i></div>
                <div class="home-slider-next"><i class="fa fa-angle-right"></i></div>
                
                <div class="home-slider">
                    
                    <div class="home-slider-block" style="background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/demo/slider_default_01.jpg);">
                        
                        <?php if ( 'guten-slider-size-small' == get_theme_mod( 'guten-slider-size', customizer_library_get_default( 'guten-slider-size' ) ) ) : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_small.gif" />
                        <?php elseif ( 'guten-slider-size-large' == get_theme_mod( 'guten-slider-size', customizer_library_get_default( 'guten-slider-size' ) ) ) : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_large.gif" />
                        <?php else : ?>
                            <img src="<?php echo esc_url( get_template_directory_uri() ) ?>/images/slider_blank_img_medium.gif" />
                        <?php endif; ?>
                        
                        <?php if ( !get_theme_mod( 'guten-slider-remove-title', customizer_library_get_default( 'guten-slider-remove-title' ) ) ) : ?>
                            
                            <div class="home-slider-block-inner">
                                <div class="home-slider-block-bg">
                                    <h3 class="home-slider-title">
                                        <?php _e( 'A Winner is a Dreamer who never gives up!', 'guten' ); ?>
                                    </h3>
                                    <?php if ( !get_theme_mod( 'guten-slider-remove-sub-title', customizer_library_get_default( 'guten-slider-remove-sub-title' ) ) ) : ?>
                                        <p><?php _e( 'It always seems impossible... Until it\'s done.', 'guten' ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                        <?php endif; ?>
                        
                    </div>
                    
                </div>
                
            <?php echo esc_html( !get_theme_mod( 'guten-slider-full-width', customizer_library_get_default( 'guten-slider-full-width' ) ) ) ? '</div>' : ''; ?>
            
            <?php if ( !get_theme_mod( 'guten-slider-remove-pagination', customizer_library_get_default( 'guten-slider-remove-pagination' ) ) ) : ?>
                <div class="home-slider-pager"></div>
            <?php endif; ?>
            
        </div>
            
    <?php endif; ?>
    
<?php endif; ?>