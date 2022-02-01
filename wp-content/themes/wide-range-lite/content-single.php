<?php
/**
 * @package Wide Range Lite
 */
?>
<div class="blogpost_layout">
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
 	  
        	   
    <header class="entry-header">
        <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>
    </header><!-- .entry-header -->    
       <?php if ( 'post' == get_post_type() ) : ?>
                <div class="blogpost_meta">
                  <div class="post-author"><i class="fas fa-user"></i>
				  <?php printf(
				/* translators: %s: post author */
				   esc_html_e( 'Published by %s', 'wide-range-lite' ),
				    esc_html( get_the_author() )
			        );
			       ?>
                    </div><!-- .post-author--> 
                    <div class="blogpost_date"><i class="fas fa-calendar-alt"></i> <?php the_date(); ?></div><!-- blogpost_date -->                    
                   <?php edit_post_link( __( 'Edit', 'wide-range-lite' ), '<span class="edit-link">', '</span>' ); ?>
                </div><!-- blogpost_meta -->
       <?php endif; ?>
       
       <?php if( get_theme_mod( 'wide_range_lite_removethumb_blogpost_and_singlepost' ) == '') { ?> 
	   <?php if (has_post_thumbnail() ){ ?>
			<div class="blogpost_imagebx singlepostimg">
            <?php the_post_thumbnail(); ?>
			</div>
		<?php }}  ?>

    <div class="entry-content">		
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'wide-range-lite' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="blogpost_meta">          
            <div class="blog_posttag"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div><!-- blogpost_meta -->
    </div><!-- .entry-content -->

</article>
</div><!-- .blogpost_layout-->