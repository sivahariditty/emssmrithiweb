<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Business_One_Page
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function business_one_page_body_classes( $classes ) {
	
    global $post;
    $ed_slider = get_theme_mod( 'business_one_page_ed_slider' );
    
    // Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if( ! $ed_slider ) {
        $classes[] = 'no-slider';
    }
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
    if( !( is_active_sidebar( 'right-sidebar' )) || is_page_template( 'template-home.php' ) ) {
		$classes[] = 'full-width';	
	}
    
    if( is_page() ){
		$sidebar_layout = get_post_meta( $post->ID, 'business_one_page_sidebar_layout', true );
        if( $sidebar_layout == 'no-sidebar' )
		$classes[] = 'full-width';
	}
        
	return $classes;
}
add_filter( 'body_class', 'business_one_page_body_classes' );

/**
 * Callback function for Comment List *
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function business_one_page_theme_comment( $comment, $args, $depth ){
    $GLOBALS['comment'] = $comment;
	extract( $args, EXTR_SKIP );

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b>', 'business-one-page' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'business-one-page' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-metadata commentmetadata">
    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
		<time>
        <?php
			/* translators: 1: date, 2: time */
			printf( __( '%1$s - %2$s', 'business-one-page' ), get_comment_date( 'M n, Y' ), get_comment_time() ); ?>
        </time>
    </a>
	</div>
    
    <div class="comment-content"><?php comment_text(); ?></div>
    
	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Callback for Home Page Slider 
 **/
function business_one_page_slider_cb(){
    
    $slider_caption    = get_theme_mod( 'business_one_page_slider_caption', '1' );
    $slider_readmore   = get_theme_mod( 'business_one_page_slider_readmore', __( 'Learn More', 'business-one-page' ) );
    $slider_post_one   = get_theme_mod( 'business_one_page_slider_post_one' );
    $slider_post_two   = get_theme_mod( 'business_one_page_slider_post_two' );
    $slider_post_three = get_theme_mod( 'business_one_page_slider_post_three' );
    $slider_post_four  = get_theme_mod( 'business_one_page_slider_post_four' );
    $slider_posts      = array( $slider_post_one, $slider_post_two, $slider_post_three, $slider_post_four );
    $slider_posts      = array_diff( array_unique( $slider_posts ), array('') );
        
    if( $slider_posts ){
        $qry = new WP_Query ( array( 
            'post_type'     => 'post', 
            'post_status'   => 'publish',
            'posts_per_page'=> -1,                    
            'post__in'      => $slider_posts, 
            'orderby'       => 'post__in',
            'ignore_sticky_post' => true
        ) );
        
        if( $qry->have_posts() ){?>
            <div class="banner" id="banner-section">
                <ul class="slides banner-slider owl-carousel owl-theme">
                <?php
                while( $qry->have_posts() ){
                    $qry->the_post();
                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'business-one-page-slider' );
                ?>
                    <?php if( has_post_thumbnail() ){?>
                    <li>
                        <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title_attribute(); ?>" />
                        <?php if( $slider_caption ){ ?>
    				    <div class="banner-text">
    						<div class="container">
    							<div class="text">
    								<span class="category"><?php business_one_page_categories(); ?></span>
    								<strong class="title"><?php the_title(); ?></strong>
                                    <?php if( $slider_readmore ){ ?> 
                                    <a class="btn-more" href="<?php the_permalink(); ?>"><?php echo esc_html( $slider_readmore );?></a>
                                    <?php } ?>
    							</div>
    						</div>
    					</div>
                        <?php } ?>
                    </li>
                    <?php } ?>
                <?php
                }
                ?>
                </ul>
            </div>
            <?php
        }
        wp_reset_postdata();       
    }    
}
add_action( 'business_one_page_slider', 'business_one_page_slider_cb' );
 
/**
 * Function to get Sections 
 */
function business_one_page_get_sections(){
    $sections = array( 'about', 'services', 'cta1', 'portfolio', 'team', 'clients', 'blog', 'testimonial', 'cta2', 'contact' );
    $enabled_section = array();
    foreach ( $sections as $section ){
        if ( esc_attr( get_theme_mod( 'business_one_page_ed_' . $section . '_section' ) ) == 1 ){
            $enabled_section[] = array(
                'id' => $section,
                'menu_text' => esc_attr( get_theme_mod( 'business_one_page_' . $section . '_section_menu_title','' ) ),
            );
        }
    }
    return $enabled_section;
}

/**
 * Callback for Social Links  
*/
function business_one_page_social_cb(){
    $facebook    = get_theme_mod( 'business_one_page_facebook' );
    $twitter     = get_theme_mod( 'business_one_page_twitter' );
    $pinterest   = get_theme_mod( 'business_one_page_pinterest' );
    $linkedin    = get_theme_mod( 'business_one_page_linkedin' );
    $google_plus = get_theme_mod( 'business_one_page_google_plus' );
    $instagram   = get_theme_mod( 'business_one_page_instagram' );
    $youtube     = get_theme_mod( 'business_one_page_youtube' );
    $ok          = get_theme_mod( 'business_one_page_odnoklassniki' );
    $vk          = get_theme_mod( 'business_one_page_vk' );
    $xing        = get_theme_mod( 'business_one_page_xing' );
    
    if( $facebook || $twitter || $pinterest || $linkedin || $google_plus || $ok || $vk || $xing ){ ?>
    <ul class="social-networks">
		<?php 
            if( $facebook ) echo '<li><a href="'. esc_url( $facebook ) .'" target="_blank" title="'. esc_html__( 'Facebook', 'business-one-page' ) .'"><span class="fa fa-facebook"></span></a></li>';
            if( $twitter ) echo '<li><a href="'. esc_url( $twitter ) .'" target="_blank" title="'. esc_html__( 'Twitter', 'business-one-page' ) .'"><span class="fa fa-twitter"></span></a></li>'; 
            if( $pinterest ) echo '<li><a href="'. esc_url( $pinterest ) .'" target="_blank" title="'. esc_html__( 'Pinterest', 'business-one-page' ) .'"><span class="fa fa-pinterest-p"></span></a></li>';
            if( $linkedin ) echo '<li><a href="'. esc_url( $linkedin ) .'" target="_blank" title="'. esc_html__( 'LinkedIn', 'business-one-page' ) .'"><span class="fa fa-linkedin"></span></a></li>';
            if( $google_plus ) echo '<li><a href="'. esc_url( $google_plus ) .'" target="_blank" title="'. esc_html__( 'Google Plus', 'business-one-page' ) .'"><span class="fa fa-google-plus"></span></a></li>';
            if( $instagram ) echo '<li><a href="'. esc_url( $instagram ) .'" target="_blank" title="'. esc_html__( 'Instagram', 'business-one-page' ) .'"><span class="fa fa-instagram"></span></a></li>';
            if( $youtube ) echo '<li><a href="'. esc_url( $youtube ) .'" target="_blank" title="'. esc_html__( 'YouTube', 'business-one-page' ) .'"><span class="fa fa-youtube"></span></a></li>';
            if( $ok ) echo '<li><a href="'. esc_url( $ok ) .'" target="_blank" title="'. esc_html__( 'OK', 'business-one-page' ) .'"><span class="fa fa-odnoklassniki"></span></a></li>';
            if( $vk ) echo '<li><a href="'. esc_url( $vk ) .'" target="_blank" title="'. esc_html__( 'VK', 'business-one-page' ) .'"><span class="fa fa-vk"></span></a></li>';
            if( $xing ) echo '<li><a href="'. esc_url( $xing ) .'" target="_blank" title="'. esc_html__( 'Xing', 'business-one-page' ) .'"><span class="fa fa-xing"></span></a></li>';
        ?>
	</ul>
    <?php }
}
add_action( 'business_one_page_social', 'business_one_page_social_cb' );

/**
 * Custom CSS
*/
if ( function_exists( 'wp_update_custom_css_post' ) ) {
    // Migrate any existing theme CSS to the core option added in WordPress 4.7.
    $css = get_theme_mod( 'business_one_page_custom_css' );
    if ( $css ) {
        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
        $return = wp_update_custom_css_post( $core_css . $css );
        if ( ! is_wp_error( $return ) ) {
            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
            remove_theme_mod( 'business_one_page_custom_css' );
        }
    }
} else {
    // Back-compat for WordPress < 4.7.
    function business_one_page_custom_css(){
        $custom_css = get_theme_mod( 'business_one_page_custom_css' );
        if( !empty( $custom_css ) ){
    		echo '<style type="text/css">';
    		echo wp_strip_all_tags( $custom_css );
    		echo '</style>';
    	}
    }
    add_action( 'wp_head', 'business_one_page_custom_css', 100 );
}

if ( ! function_exists( 'business_one_page_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function business_one_page_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}
add_filter( 'excerpt_more', 'business_one_page_excerpt_more' );
endif;

if ( ! function_exists( 'business_one_page_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function business_one_page_excerpt_length( $length ) {
	return is_admin() ? $length : 40;
}
add_filter( 'excerpt_length', 'business_one_page_excerpt_length' );
endif;

/**
 * excerpt length for portfolio section
*/
function business_one_page_excerpt_length_alt( $length ){
    return 12;
}

/**
 * Footer Credits 
*/
function business_one_page_footer_credit(){
    $copyright_text = get_theme_mod( 'business_one_page_footer_copyright_text' );
    $text = '';
    if( $copyright_text ){
        $text .=  wp_kses_post( $copyright_text );
    }else{
        $text .=  esc_html__( 'Copyright &copy; ', 'business-one-page' ) . date('Y'); 
        $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
    }
    if ( function_exists( 'the_privacy_policy_link' ) ) {
        $text .= get_the_privacy_policy_link();
    }
    $text .= esc_html__( 'Business One Page | Developed By', 'business-one-page' );
    $text .= sprintf( esc_html__( ' %s', 'business-one-page' ), '<a href="' . esc_url( __( 'https://raratheme.com', 'business-one-page' ) ) .'" rel="nofollow" target="_blank">Rara Theme</a>' );
    $text .= sprintf( esc_html__( ' Powered by: %s', 'business-one-page' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'business-one-page' ) ) .'" target="_blank">WordPress</a>' );
    echo apply_filters( 'business_one_page_footer_text', $text );    
}
add_action( 'business_one_page_footer', 'business_one_page_footer_credit' );

/**
 * Return sidebar layouts for pages
*/
function business_one_page_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'business_one_page_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'business_one_page_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

/**
 * Exclude post with Category from blog and archive page. 
*/
function business_one_page_exclude_cat( $query ){
    $cat = get_theme_mod( 'business_one_page_exclude_cat' );
    
    if( $cat && ! is_admin() && $query->is_main_query() ){
        $cat = array_diff( array_unique( $cat ), array('') );
        if( $query->is_home() || $query->is_archive() ) {
			$query->set( 'category__not_in', $cat );
		}
    }    
}
add_filter( 'pre_get_posts', 'business_one_page_exclude_cat' );

/** 
 * Exclude Categories from Category Widget 
*/ 
function business_one_page_custom_category_widget( $arg ) {
	$cat = get_theme_mod( 'business_one_page_exclude_cat' );
    
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["exclude"] = $cat;
    }
	return $arg;
}
add_filter( "widget_categories_args", "business_one_page_custom_category_widget" );
add_filter( "widget_categories_dropdown_args", "business_one_page_custom_category_widget" );

/**
 * Exclude post from recent post widget of excluded catergory
 * 
 * @link http://blog.grokdd.com/exclude-recent-posts-by-category/
*/
function business_one_page_exclude_posts_from_recentPostWidget_by_cat( $arg ){
    
    $cat = get_theme_mod( 'business_one_page_exclude_cat' );
    
    if( $cat ){
        $cat = array_diff( array_unique( $cat ), array('') );
        $arg["category__not_in"] = $cat;
    }
    
    return $arg;   
}
add_filter( "widget_posts_args", "business_one_page_exclude_posts_from_recentPostWidget_by_cat" );

/**
 * Query if Rara One Click Demo Import id activate
*/
function is_rocdi_activated(){
    return class_exists( 'RDDI_init' ) ? true : false;
}

if( ! function_exists( 'business_one_page_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function business_one_page_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'business-one-page-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = business_one_page_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( business_one_page_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => get_permalink( $post->ID )
            ),
            "headline"  => ( function_exists( '_wp_render_title_tag' ) ? wp_get_document_title() : wp_title( '', false, 'right' ) ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => get_the_time( DATE_ISO8601, $post->ID ),
            "dateModified"  => get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => business_one_page_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">' , PHP_EOL;
        echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
        echo '</script>' , PHP_EOL;
    }
}
endif;
add_action( 'wp_head', 'business_one_page_single_post_schema' );

if( ! function_exists( 'business_one_page_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 *
 * @return string
 */
function business_one_page_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'business_one_page_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
*/
function business_one_page_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'business-one-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'business-one-page' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'business-one-page' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'business_one_page_change_comment_form_default_fields' );

if( ! function_exists( 'business_one_page_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
*/
function business_one_page_change_comment_form_defaults( $fields ){ 
    $comment_field = $fields['comment'];   
    $fields['comment'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="40" rows="8" required="required" placeholder="' . esc_attr__( 'Comment','business-one-page' ) . '"></textarea></p>';;
    
    return $fields;    
}
endif;
add_filter( 'comment_form_fields', 'business_one_page_change_comment_form_defaults' );