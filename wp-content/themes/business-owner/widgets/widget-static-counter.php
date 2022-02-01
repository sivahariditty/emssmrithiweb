<?php
/**
 * Widget to show the content of Counter
 *
 * @package Owner
 * @subpackage Business Owner
 * @since 1.0.0
 */
if( ! function_exists( 'business_owner_register_widgets' ) ) :
    function business_owner_register_widgets(){
	   //register static counter widget
		register_widget( 'Business_Owner_Static_Counter' );
    }
endif;        
add_action( 'widgets_init', 'business_owner_register_widgets' ); 
 
class Business_Owner_Static_Counter extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'business_owner_static_counter',
            'description' => __( 'Display contents as static counter.', 'business-owner' )
        );
        parent::__construct( 'business_static_counter', __( 'Business Owner: Static Counter', 'business-owner' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

        	'section_title' => array(
                'owner_widgets_name'         => 'section_title',
                'owner_widgets_title'        => __( 'Section Title', 'business-owner' ),
                'owner_widgets_field_type'   => 'text'
            ),
            
            'section_bg_image' => array(
                'owner_widgets_name' => 'section_bg_image',
                'owner_widgets_title' => __( 'Section Background Image', 'business-owner' ),
                'owner_widgets_field_type' => 'upload',
            ),
       	);
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $owner_section_title    = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
        $owner_section_bg_image = empty( $instance['section_bg_image'] ) ? '' : $instance['section_bg_image'];

        $get_static_static_counters_json = get_theme_mod( 'static_counters', '' );

        if( !empty( $owner_section_menu_id ) ) {
            $owner_section_menu_id = 'id='.esc_attr( $owner_section_menu_id );
        }

        if( !empty( $owner_section_title ) || !empty( $owner_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        echo $before_widget;
    ?>
    		 <div class="section-wrapper owner-widget-wrapper" style="background-image:url('<?php echo esc_url( $owner_section_bg_image ); ?>'); background-position: center; background-attachment: fixed; background-size: cover;">
                <div class="mt-container">
                    <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?>" data-wow-delay="0.7s">
                        <?php
                            if( !empty( $owner_section_title ) ) {
                                echo $before_title . wp_kses_post( $owner_section_title ) . $after_title;
                            }
                        ?>
                    </div><!-- .section-title-wrapper -->
                    <div class="mt-column-wrapper">
                    	<?php
                    		if( ! empty( $get_static_static_counters_json ) ) {
                    			$get_decode_static_static_counters = json_decode( $get_static_static_counters_json );
                    			foreach ( $get_decode_static_static_counters as $get_static_static_counter ) {
                    	?>
                    			<div class="single-counter-wrap mt-column-4">
                                    <div class="single-counter-icon-wrap">
                    				    <i class="<?php echo esc_attr( $get_static_static_counter->counter_icon ); ?>"></i>
                                    </div>
                                    <div class="single-count-title-wrap">
                                        <span class="single-count"><?php echo esc_html( $get_static_static_counter->counter_number ); ?></span>
                        				<h3 class="counter-title"><?php echo esc_html( $get_static_static_counter->counter_title ); ?></h3>
                                    </div>
                    			</div><!-- .single-counter-wrap -->
                    	<?php
                    			}
                    		}
                    	?>
                    </div><!-- .mt-column-wrapper -->
                </div><!-- .mt-container -->
            </div><!-- .section-wrapper -->
    <?php
        echo $after_widget;
    }
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    owner_widgets_updated_field_value()      defined in owner-widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$owner_widgets_name] = owner_widgets_updated_field_value( $widget_field, $new_instance[$owner_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    owner_widgets_show_widget_field()        defined in owner-widget-fields.php
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $owner_widgets_field_value = !empty( $instance[$owner_widgets_name] ) ? wp_kses_post( $instance[$owner_widgets_name] ) : '';
            owner_widgets_show_widget_field( $this, $widget_field, $owner_widgets_field_value );
        }
    }
}