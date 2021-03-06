<?php
/**
 * Widget for grid layout which is suitable for services/features and teams.
 *
 * @package Mystery Themes
 * @subpackage Owner
 * @since 1.0.0
 */
add_action( 'widgets_init', 'owner_register_grid_layout_widget' );

function owner_register_grid_layout_widget() {
    register_widget( 'Owner_Grid_Layout' );
}

class Owner_Grid_Layout extends WP_Widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'owner_grid_layout',
            'description' => __( 'Display posts from selected category as grid view.', 'owner' )
        );
        parent::__construct( 'owner_grid_layout', __( 'Owner : Grid Items', 'owner' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

        $owner_category_dropdown = owner_category_dropdown();
        
        $fields = array(

            'section_title' => array(
                'owner_widgets_name'         => 'section_title',
                'owner_widgets_title'        => __( 'Section Title', 'owner' ),
                'owner_widgets_field_type'   => 'text'
            ),

            'section_info' => array(
                'owner_widgets_name'         => 'section_info',
                'owner_widgets_title'        => __( 'Section Info', 'owner' ),
                'owner_widgets_row'          => 5,
                'owner_widgets_field_type'   => 'textarea'
            ),

            'section_cat_id' => array(
                'owner_widgets_name'         => 'section_cat_id',
                'owner_widgets_title'        => __( 'Section Category', 'owner' ),
                'owner_widgets_field_type'   => 'select',
                'owner_widgets_default'      => 0,
                'owner_widgets_field_options'=> $owner_category_dropdown
            ),

            'section_post_count' => array(
                'owner_widgets_name'         => 'section_post_count',
                'owner_widgets_title'        => __( 'Section Post Count', 'owner' ),
                'owner_widgets_default'      => 3,
                'owner_widgets_field_type'   => 'number'
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

    	$owner_section_title 	  = empty( $instance['section_title'] ) ? '' : $instance['section_title'];
    	$owner_section_info		  = empty( $instance['section_info'] ) ? '' : $instance['section_info'];
    	$owner_section_cat_id 	  = empty( $instance['section_cat_id'] ) ? 0 : $instance['section_cat_id'];
        $owner_section_post_count = empty( $instance['section_post_count'] ) ? 3 : $instance['section_post_count'];

    	if( empty( $owner_section_cat_id ) ) {
    		return ;
    	}

        if( !empty( $owner_section_title ) || !empty( $owner_section_info ) ) {
            $sec_title_class = 'has-title';
        } else {
            $sec_title_class = 'no-title';
        }

        $grid_args = array(
        				'post_type' => 'post',
        				'category__in' => $owner_section_cat_id,
        				'posts_per_page' => $owner_section_post_count
        			);
        $grid_query = new WP_Query( $grid_args );
        echo $before_widget;
    ?>
    		<div class="section-wrapper owner-widget-wrapper">
    			<div class="mt-container">
	                <div class="section-title-wrapper <?php echo esc_attr( $sec_title_class ); ?> clearfix">
	                    <?php
	                        if( !empty( $owner_section_title ) ) {
	                            echo $before_title . esc_html( $owner_section_title ) . $after_title;
	                        }

	                        if( !empty( $owner_section_info ) ) {
	                            echo '<span class="section-info">'. wp_kses_post( $owner_section_info ) .'</span>';
	                        }
	                    ?>
	                </div><!-- .section-title-wrapper -->

	                <div class="grid-items-wrapper mt-column-wrapper">
	                	<?php
	                		if( $grid_query->have_posts() ) {
	                			while( $grid_query->have_posts() ) {
	                				$grid_query->the_post();
	                	?>
	                				<div class="single-post-wrapper mt-column-3">
		                				<?php if( has_post_thumbnail() ) { ?>
                                            <div class="img-holder">
                                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                    <?php the_post_thumbnail( 'large' ); ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                        <?php the_excerpt(); ?>
	                				</div><!-- .single-post-wrapper -->
	                	<?php
	                			}
	                		}
	                	?>
	                </div><!-- .grid-items-wrapper -->
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