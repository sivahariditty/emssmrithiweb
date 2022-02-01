<?php 
/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */

if ( ! function_exists( 'businessbiz_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function businessbiz_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'businessbiz' ),
            'off'       => esc_html__( 'Disable', 'businessbiz' )
        );
        return apply_filters( 'businessbiz_switch_options', $arr );
    }
endif;


 

 ?>