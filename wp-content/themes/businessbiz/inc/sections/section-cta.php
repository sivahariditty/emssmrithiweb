<?php 
/**
 * Template part for displaying CTA Section
 *
 *@package Businessbiz
 */
?>
    <?php 
        $cta_small_description  = businessbiz_get_option( 'cta_small_description' );
        $cta_description        = businessbiz_get_option( 'cta_description' );
        $cta_button_label       = businessbiz_get_option( 'cta_button_label' );
        $cta_button_url         = businessbiz_get_option( 'cta_button_url' );
    ?>

    <?php if ( !empty($cta_description ) )  :?>
        <div class="section-header">
            <h3><?php echo wp_kses_post($cta_small_description); ?></h3>
            <h2 class="section-title"><?php echo wp_kses_post($cta_description); ?></h2>
        </div><!-- .section-header -->
    <?php endif;?>

    <?php if ( !empty($cta_button_label ) )  :?>
        <div class="read-more">
            <a href="<?php echo esc_url($cta_button_url); ?>" class="btn"><?php echo esc_html($cta_button_label); ?></a>
        </div><!-- .read-more -->
    <?php endif;?>
