<?php
/**
 * The template for displaying home page.
 * @package Businessbiz
 */

if ( 'posts' != get_option( 'show_on_front' ) ){ 
    get_header(); ?>
    <?php $enabled_sections = businessbiz_get_sections();
    if( is_array( $enabled_sections ) ) {
        foreach( $enabled_sections as $section ) {

            if( ( $section['id'] == 'featured-slider' ) ){ ?>
                <?php $disable_featured_slider = businessbiz_get_option( 'disable_featured-slider_section' );
                if( true ==$disable_featured_slider): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'services' ) { ?>
                <?php $disable_services_section = businessbiz_get_option( 'disable_services_section' );
                if( true ==$disable_services_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">
                        <div class="services-wrapper">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'about' ) { ?>
                <?php $disable_about_section = businessbiz_get_option( 'disable_about_section' );
                if( true ==$disable_about_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section relative">

                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>

                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'project' ) { ?>
                <?php $disable_project_section = businessbiz_get_option( 'disable_project_section' );
                if( true ==$disable_project_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'features' ) { ?>
                <?php $disable_features_section = businessbiz_get_option( 'disable_features_section' );
                $background_features_section = businessbiz_get_option( 'features_custom_img' );
                if( true ==$disable_features_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" >
                    <!-- <div class="overlay"></div> -->
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'cta' ) { ?>
            <?php $disable_cta_section = businessbiz_get_option( 'disable_cta_section' );
            $background_cta_section = businessbiz_get_option( 'background_cta_section' );
            if( true ==$disable_cta_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $background_cta_section );?>');">
                    <div class="overlay"></div>
                    <div class="wrapper">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'latest' ) { ?>
            <?php $disable_latest_section = businessbiz_get_option( 'disable_latest_section' );
            if( true ==$disable_latest_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                    <div class="wrapper">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </div>
                </section>            
            <?php endif; ?>

            <?php } elseif( $section['id'] == 'testimonial' ) { ?>
            <?php $disable_testimonial_section = businessbiz_get_option( 'disable_testimonial_section' );
            $testimonial_image = businessbiz_get_option( 'testimonial_image' );
            if( true ==$disable_testimonial_section): ?>
                <section id="<?php echo esc_attr( $section['id'] ); ?>" style="background-image: url('<?php echo esc_url( $testimonial_image );?>');">
                <div class="overlay"></div>
                    <div class="wrapper">
                        <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                    </div>
                </section>            
            <?php endif; ?>

           <?php } elseif ( $section['id'] == 'blog' ) { ?>
                <?php $disable_blog_section = businessbiz_get_option( 'disable_blog_section' );
                if( true === $disable_blog_section): ?>
                    <section id="<?php echo esc_attr( $section['id'] ); ?>" class="blog-posts-wrapper page-section">
                        <div class="wrapper">
                            <?php get_template_part( 'inc/sections/section', esc_attr( $section['id'] ) ); ?>
                        </div>
                    </section>
                <?php endif;
                }
        }
    }
    get_footer();
} 
elseif('posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
} 
else{
    include( get_page_template() );
}