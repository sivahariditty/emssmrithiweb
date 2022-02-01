<?php 

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}

class Businessbiz_Dropdown_Chooser extends WP_Customize_Control{
	public $type = 'dropdown_chooser';

	public function render_content(){
		if ( empty( $this->choices ) )
                return;
		?>
            <label>
                <span class="customize-control-title">
                	<?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
	            <span class="description customize-control-description">
	            	<?php echo wp_kses_post($this->description); ?>
	            </span>
	            <?php } ?>

                <select class="businessbiz-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ( $this->choices as $value => $label )
                        echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . esc_html( $label ) . '</option>';
                    ?>
                </select>
            </label>
		<?php
	}
}

//Custom control for any note, use label as output description
class Businessbiz_Note_Control extends WP_Customize_Control {
    public $type = 'description';

    public function render_content() {
        if ( 'custom-html' === $this->type ) {
            echo wp_kses_post( $this->label );
        } else {
            echo '<h2 class="description">' . esc_html( $this->label ) . '</h2>';
        }
    }
}

 ?>