<?php
/**
 * @package Guten
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( 'blog-blocks-layout' == get_theme_mod( 'guten-blog-layout', customizer_library_get_default( 'guten-blog-layout' ) ) ) : // Blocks Layout ?>
	
		<?php if ( 'blog-style-imgblock' == get_theme_mod( 'guten-blog-blocks-style', customizer_library_get_default( 'guten-blog-blocks-style' ) ) ) : // Image Style Block ?>
	
			<div class="blog-post-blocks-inner <?php echo ( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) ? sanitize_html_class( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : sanitize_html_class( 'blog-post-shape-square' ); ?>">
			    
			    <?php if ( has_post_thumbnail() ) :
			    	$guten_image_cut = customizer_library_get_default( 'guten-blog-list-img-cut' );
					if ( get_theme_mod( 'guten-blog-list-img-cut' ) ) {
						$guten_image_cut = get_theme_mod( 'guten-blog-list-img-cut' );
					} ?>

				    <div class="blog-post-blocks-inner-img" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ) . ');"' : ''; ?>>
				        
				        <?php if ( 'blog-post-shape-img' == get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : ?>
				        	
				    	    <?php if ( has_post_thumbnail() ) : ?>
				    	    	<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ); ?>" alt="<?php the_title(); ?>" />
				    	    <?php else : ?>
				        		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
				        	<?php endif; ?>
					        	
				        <?php else : ?>
				        
				    		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
				    		
				    	<?php endif; ?>
				    	
				    </div>

				<?php endif; ?>
			    
			    <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-post-blocks-inner-a">
			    	<div class="blog-blocks-content-inner">
			        	<header class="entry-header">
			        		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
			                
							<?php if ( 'post' == get_post_type() ) : ?>
								<div class="entry-meta">
									<span class="posted-on"><?php echo get_the_date(); ?></span><span class="byline"> | <?php echo esc_html( get_the_author() ); ?></span>
								</div><!-- .entry-meta -->
							<?php endif; ?>
			        	</header><!-- .entry-header -->
			        </div>
				</a>
			    
			</div>
			
		<?php else : // Post Style Block ?>
			
			<div class="blog-post-blocks-inner <?php echo ( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) ? sanitize_html_class( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : sanitize_html_class( 'blog-post-shape-square' ); ?>">
			    
			    <?php if ( has_post_thumbnail() ) :
			    	$guten_image_cut = customizer_library_get_default( 'guten-blog-list-img-cut' );
					if ( get_theme_mod( 'guten-blog-list-img-cut' ) ) {
						$guten_image_cut = get_theme_mod( 'guten-blog-list-img-cut' );
					} ?>

				    <div class="blog-post-blocks-inner-img" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ) . ');"' : ''; ?>>
				    	<a href="<?php echo esc_url( get_permalink() ); ?>">
						    
						    <?php if ( 'blog-post-shape-img' == get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : ?>
						    
							    <?php if ( has_post_thumbnail() ) : ?>
							    	<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ); ?>" alt="<?php the_title(); ?>" />
							    <?php else : ?>
						    		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
						    	<?php endif; ?>
						    	
						    <?php else : ?>
						    
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
								
							<?php endif; ?>
						
						</a>
					</div>

				<?php endif; ?>
				
				<div class="blog-blocks-content">
					<header class="entry-header">
						<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						
						<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php guten_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
						
					</header><!-- .entry-header -->
					
					<?php if ( !get_theme_mod( 'guten-blog-blocks-remove-content' ) ) : ?>
						<div class="blog-blocks-content-inner">
							
							<?php
							if ( has_excerpt() ) :
								the_excerpt();
							else :
								the_content( sprintf(
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'guten' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							endif; ?>
								
					    </div>
				    <?php endif; ?>
				    
					<footer class="entry-footer">
						<?php guten_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div>
				
			</div>
			
		<?php endif; ?>
	
	<?php else : // Left / Right / Alt & Top Layouts ?>

		<div class="blog-content-inner <?php echo ( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) ? sanitize_html_class( get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : sanitize_html_class( 'blog-post-shape-square' ); ?>">
		
			<?php if ( has_post_thumbnail() ) :
				$guten_image_cut = customizer_library_get_default( 'guten-blog-list-img-cut' );
				if ( get_theme_mod( 'guten-blog-list-img-cut' ) ) {
					$guten_image_cut = get_theme_mod( 'guten-blog-list-img-cut' );
				} ?>

				<a href="<?php the_permalink() ?>" class="post-loop-thumbnail" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ) . ');"' : ''; ?>>
					
					<?php if ( 'blog-post-shape-img' == get_theme_mod( 'guten-blog-post-shape', customizer_library_get_default( 'guten-blog-post-shape' ) ) ) : ?>
							    
					    <?php if ( has_post_thumbnail() ) : ?>
					    	<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $guten_image_cut ) ); ?>" alt="<?php the_title(); ?>" />
					    <?php else : ?>
				    		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
				    	<?php endif; ?>
				    	
				    <?php else : ?>
				    
						<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
						
					<?php endif; ?>
					
				</a>
			<?php endif; ?>
			
			<div class="post-loop-content">
				
				<header class="entry-header">
					<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
					
					<?php if ( 'post' == get_post_type() ) : ?>
						<div class="entry-meta">
							<?php guten_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					
					<?php
					if ( has_excerpt() ) :
						the_excerpt();
					else :
						/* translators: %s: Name of current post */
						the_content( sprintf(
							wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'guten' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						) );
					endif; ?>
						
					<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'guten' ),
						'after'  => '</div>',
					) ); ?>
				</div><!-- .entry-content -->
				
				<footer class="entry-footer">
					<?php guten_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
			<div class="clearboth"></div>
		
		</div>

	<?php endif; ?>
	
</article><!-- #post-## -->