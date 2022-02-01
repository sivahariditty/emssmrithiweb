<?php if ( !is_front_page() ) : ?>
    <?php if ( !get_theme_mod( 'guten-page-remove-titlebar', customizer_library_get_default( 'guten-page-remove-titlebar' ) ) ) : ?>
    
        <header class="page-titlebar <?php echo sanitize_html_class( get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ); ?> <?php echo ( get_theme_mod( 'guten-page-centered-titlebar' ) ) ? sanitize_html_class( 'page-titlebar-center' ) : ''; ?>">
            
            <?php if ( 'guten-page-titlebar-banner' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) : ?>
            <div class="site-container">
            <?php endif; ?>

                <?php if ( is_home() ) :
                    $blog_page_id = get_option( 'page_for_posts' );  ?>
                    
                    <h2 class="page-titlebar-h"><?php echo esc_html( get_page( $blog_page_id )->post_title ); ?></h2>
                
                    <?php elseif ( is_archive() ) : ?>
                    
                    <?php if ( class_exists( 'WooCommerce' ) ) :

                        if ( is_shop() || is_product_category() || is_product_tag() ) :
                            $shop_id = get_option( 'woocommerce_shop_page_id' ); ?>
                            
                            <h2 class="page-titlebar-h"><?php echo esc_html( get_page( $shop_id )->post_title ); ?></h2>
                        <?php
                        else :
                            the_archive_title( '<h2 class="page-titlebar-h">', '</h2>' );
                            the_archive_description( '<div class="taxonomy-description">', '</div>' );
                        endif; ?>

                    <?php else : ?>
                        <?php
                        the_archive_title( '<h2 class="page-titlebar-h">', '</h2>' );
                        the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
                    <?php endif; ?>
                
                <?php elseif ( is_search() ) : ?>
                    
                    <h2 class="page-titlebar-h"><?php printf( esc_html__( 'Search Results for: %s', 'guten' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
                
                <?php elseif ( is_singular() ) : ?>
                    
                <h2 class="page-titlebar-h"><?php echo esc_html( get_the_title( get_the_ID() ) ); ?></h2>
                    
                <?php elseif ( guten_is_woocommerce_activated() ) : ?>
                    
                    <?php if ( is_shop() ) :
                        $shop_id = get_option( 'woocommerce_shop_page_id' ); ?>
                        
                        <h2 class="page-titlebar-h"><?php echo esc_html( get_page( $shop_id )->post_title ); ?></h2>
                    <?php endif; ?>
                
                <?php else : ?>
                    
                    <h2 class="page-titlebar-h"><?php the_title(); ?></h2>
                    
                <?php endif; ?>
                
                <?php if ( ! is_front_page() ) : ?>
            
                    <?php if ( function_exists( 'bcn_display' ) ) : ?>
                        <div class="breadcrumbs">
                            <?php bcn_display(); ?>
                        </div>
                    <?php endif; ?>
                    
                <?php endif; ?>

            <?php if ( 'guten-page-titlebar-banner' == get_theme_mod( 'guten-page-title-layout', customizer_library_get_default( 'guten-page-title-layout' ) ) ) : ?>
            </div>
            <?php endif; ?>
            
        </header><!-- .entry-header -->
    
    <?php endif; ?>
<?php endif; ?>