<?php 
/**
 * Template part for displaying Feature Section
 *
 *@package Businessbiz
 */

    $features_title       = businessbiz_get_option( 'features_title' );
    $img_url = businessbiz_get_option( 'features_custom_img');
    for( $i=1; $i<=4; $i++ ) :
        $features_page_posts[] = absint(businessbiz_get_option( 'features_page_'.$i ) );
    endfor;
    ?>
    <div class="features-section-wrapper <?php echo ! empty( $img_url) ? 'has-post-thumbnail' : 'no-post-thumbnail'; ?> "> 
        <?php if ( ! empty( $img_url ) ) : ?>
            <div class="featured-image" style="background-image: url('<?php echo esc_url( $img_url ) ?>');">
            </div><!-- .featured-image -->
        <?php endif; ?>
        <div class="entry-container">
            <?php if( !empty($features_title)):?>
                <div class="section-header">
                    <?php if( !empty($features_title)):?>
                        <h2 class="section-title"><?php echo esc_html($features_title);?></h2>
                    <?php endif;?><!-- .section-header -->
                </div>       
            <?php endif;?>       
            <div class="section-content col-2">
                        <?php $args = array (
                            'post_type'     => 'page',
                            'post_per_page' => count( $features_page_posts ),
                            'post__in'      => $features_page_posts,
                            'orderby'       =>'post__in', 
                        ); 
                    $loop = new WP_Query($args);                        
                    if ( $loop->have_posts() ) :
                        $i=-1;  
                        while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                        
                            <article>
                                <div class="features-content">
                                    <header class="entry-header">
                                        <h3 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    </header>
                                <div class="entry-content">
                                    <?php
                                        $excerpt = businessbiz_the_excerpt( 5 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->
                                </div>
                            </article>

                        <?php endwhile;?>
                      <?php wp_reset_postdata(); ?>
                    <?php endif;?>

            </div>  
        </div>
    </div>
