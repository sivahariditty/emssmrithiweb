<?php 
/**
 * Template part for displaying Blog Section
 *
 *@package Businessbiz
 */
?>
<?php 
	 $blog_post_title    = businessbiz_get_option( 'blog_title' );
	 $blog_category = businessbiz_get_option( 'blog_category' );

?> 
    <?php if(!empty($blog_post_title)):?>
	  <div class="section-header">
	    <h2 class="section-title"><?php echo esc_html($blog_post_title);?></h2>
	  </div><!-- .section-header -->
  	<?php endif;?>
  <div class="section-content col-3">
            <?php 
                $args = array (

                    'posts_per_page' =>3,              
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                    );
                    if ( absint( $blog_category ) > 0 ) {
                        $args['cat'] = absint( $blog_category );
                    }
            
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=-1;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>
				    <article>
				    	<div class="post-item">
					      	<?php if(has_post_thumbnail()):?>
						        <div class="featured-image">
						        	<a href="<?php the_permalink();?>"><?php the_post_thumbnail('businessbiz-blog');?></a>  
						        </div>
					    	<?php endif?>

					    	<div class="entry-container">
						    	<div class="entry-meta">		         
						            <?php businessbiz_posted_on();?>
						        </div><!-- .entry-meta -->

						        <header class="entry-header">
									<h2 class="entry-title">
										<a href="<?php the_permalink();?>"><?php the_title();?></a>
									</h2>
						        </header>

						        <div class="entry-content">
				 				    <?php
										$excerpt = businessbiz_the_excerpt( 20 );
										echo wp_kses_post( wpautop( $excerpt ) );
									?>
						        </div><!-- .entry-content -->

						        <?php $readmore_text = businessbiz_get_option( 'readmore_text' );?>
						        <a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($readmore_text);?></a>
					        </div><!-- .entry-container -->
					    </div><!-- .post-item -->
				    </article>
	    <?php endwhile;?>
	    <?php wp_reset_postdata(); ?>
    <?php endif;
    ?>
  </div>