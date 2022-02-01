<?php 
/**
 * Template part for displaying Services Section
 *
 *@package Businessbiz
 */

    $service_title       = businessbiz_get_option( 'service_title' );
    for( $i=1; $i<=6; $i++ ) :
        $services_page_posts[] = absint(businessbiz_get_option( 'services_page_'.$i ) );
        $readmore_text   = businessbiz_get_option( 'services_custom_btn_text_' . $i );
    endfor;
    ?>

    <?php if( !empty($service_title)):?>
        <div class="section-header">
        <?php if( !empty($service_title)):?>
            <h2 class="section-title"><?php echo esc_html($service_title);?></h2>
        <?php endif;?><!-- .section-header -->
        </div>
        
    <?php endif;?>
    
    <div class="section-content col-3">
                <?php $args = array (
                    'post_type'     => 'page',
                    'post_per_page' => count( $services_page_posts ),
                    'post__in'      => $services_page_posts,
                    'orderby'       =>'post__in', 
                ); 
           
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
                
                    <article>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="featured-image">
                                <img src="<?php the_post_thumbnail_url('large'); ?>"/>
                            </div><!-- .featured-image -->
                        <?php endif; ?>
                        <div class="service-content">
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>

                            <div class="entry-content">
                                <?php
                                    $excerpt = businessbiz_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div><!-- .entry-content -->
                            <?php 
                            $readmore_text   = businessbiz_get_option( 'services_custom_btn_text_' . $i );
                            if ( ! empty( $readmore_text ) ) { 
                                ?>
                            <div class="read-more">
                                <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                            </div><!-- .read-more -->
                            <?php  }?>
                        </div>
                    </article>

                <?php endwhile;?>
              <?php wp_reset_postdata(); ?>
            <?php endif;?>
    </div>   