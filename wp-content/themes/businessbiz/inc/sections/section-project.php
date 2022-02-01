<?php $project_title       = businessbiz_get_option( 'project_title' );
    $btn_text = businessbiz_get_option( 'project_btn_text');
    $number_of_project_items  = businessbiz_get_option( 'number_of_project_items' );

    for( $i=1; $i<=$number_of_project_items; $i++ ) :
        $project_page_posts[] = absint(businessbiz_get_option( 'project_page_'.$i ) );
        $project_read_more     = businessbiz_get_option( 'project_read_more_'. $i );

    endfor;
    if ( $number_of_project_items <= 3 ) { 
        $class = 'classic';
    } else {
        $class = 'modern';
    }
?>
    <div class="section-header">
        
        <?php if ( ! empty( $project_title ) ) : ?>
            <h2 class="section-title"><?php echo esc_html( $project_title ); ?></h2>
        <?php endif; ?>
    </div><!-- .section-header -->

    <div class="posts-slider  <?php echo esc_attr( $class ); ?>-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
        <?php $args = array (
            'post_type'     => 'page',
            'post_per_page' => count( $project_page_posts ),
            'post__in'      => $project_page_posts,
            'orderby'       =>'post__in', 
        ); 

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>

                    <article>
                        <div class="post-item-wrapper">
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                                <div class="overlay"></div>
                                <?php
                                    $project_read_more     = businessbiz_get_option( 'project_read_more_'. $i );
                                     if ( ! empty( $project_read_more ) ) { ?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink(); ?>" tabindex="-1">
                                            <i class="fa fa-arrow-circle-right fa-3x"></i>
                                            <span><?php echo esc_html( $project_read_more ); ?></span>
                                        </a>
                                    </div><!-- .read-more -->
                                <?php } ?>

                            </div>

                            <div class="entry-container">
                                 <div class="entry-meta before-title">
                                     <?php businessbiz_posted_on();?>
                                </div><!-- .entry-meta --> 

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php the_permalink();?>">
                                    <?php the_title();?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <?php
                                        $excerpt = businessbiz_the_excerpt( 20 );
                                        echo wp_kses_post( wpautop( $excerpt ) );
                                    ?>
                                </div><!-- .entry-content -->

                                <div class="entry-meta after-title">
                                     <?php businessbiz_posted_on();?>
                                </div><!-- .entry-meta -->

                                <?php 
                                     $project_read_more     = businessbiz_get_option( 'project_read_more_'. $i );
                                    if ( ! empty( $project_read_more ) ) { ?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink(); ?>" tabindex="-1">
                                            <i class="fa fa-arrow-circle-right fa-3x"></i>
                                            <span><?php echo esc_html( $project_read_more ); ?></span>
                                        </a>
                                    </div><!-- .read-more -->
                                <?php } ?>
                            </div><!-- .entry-container -->
                        </div><!-- .post-item-wrapper -->
                    </article>
                <?php endwhile;?>

                <?php wp_reset_postdata(); ?>
            <?php endif;
        ?>
    </div><!-- .section-content -->

    <?php
    if ( ! empty( $options['event_btn'] ) ) { ?>
        <div class="view-all">
            <a href="<?php echo esc_url( $options['event_btn_url'] ); ?>" class="btn"><?php echo esc_html( $options['event_btn'] ); ?></a>
        </div><!-- .view-all -->
    <?php } ?>