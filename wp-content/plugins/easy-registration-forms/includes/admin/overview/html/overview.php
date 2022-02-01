<div id="erforms-overview" class="wrap erforms-admin-wrap erforms-overview erf-wrapper erf-wrapper-bg">
    <?php
        $form_cards = new ERForms_Form_Cards;
        $form_cards->prepare_items();
    ?>
       
    <?php if(isset($options['consent_allowed']) && $options['consent_allowed']==2): ?>
    <div class="updated settings-error notice is-dismissible">
        <form method="post">
            <p>
                In order for us to better serve you, allow us to track usage of this plugin.
                &nbsp;<input type="submit" name="erf_consent_allow" value="Allow" class="button action"/>
                <input type="submit" name="erf_consent_disallow" value="Disallow" class="button action"/>
            </p>
        </form>
    </div>
    <?php endif; ?>
    <form id="erforms-overview-table" method="get" action="<?php echo admin_url('admin.php?page=erforms-overview'); ?>">
        <div class="erf-page-title">
            <h1 class="wp-heading clearfix">
                <?php _e('All Forms', 'erforms'); ?>
                <div class="erf-search-form">
                    <?php $search = isset($_GET['filter_key']) ? sanitize_text_field(urldecode($_GET['filter_key'])) : ''; ?>
                    <label><input class="erf-input-field" type="text" value="<?php echo $search; ?>" name="filter_key" placeholder="<?php _e('Search in Form','erforms'); ?>"></label>
                </div>
            </h1>
        </div>
        <input type="hidden" name="page" value="erforms-overview" />
        <input type="submit" style="display:none"/>
    </form>    
    <div class="erforms-admin-content">
        <div class="erf-card-wrap">
            <?php $form_cards->views(); ?>
            <?php $form_cards->display(); ?>
        </div>
    </div>

</div>



<div id="erf_overview_add_form_dialog" class="erf_dialog fade" style="display: none;">
    <div class="modal-dialog">    
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php _e('ADD NEW FORM','erforms'); ?></h5>
                <button type="button" class="close erf_close_dialog">
                    <span>×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="erf-form-name">
                    <?php _e('Name of your form','erforms'); ?>
                    <input type="text" id="erf_overview_input_form_name" class="erf-input-field"/></div>
                <div id="erf_overview_add_form_response"></div>
                <div class="erf-ajax-progress" style="display:none"></div>

                <div class="erf-form-type">
                    <div class="erf-form-type-head">
                        <input value="reg" type="radio" name="erf_overview_input_form_type" id="registration-form" checked/>
                        <label for="registration-form"><?php _e('User Registration Form','erforms'); ?></label>
                    </div>
                </div>
                <?php do_action('erf_form_type'); ?>
                <div class="erf-form-type">
                    <div class="erf-form-type-head">
                        <input type="radio" name="erf_overview_input_form_type" value="contact" id="contact-form"/>
                        <label for="contact-form"><?php _e('Contact/Other Form','erforms'); ?></label> 
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" id="erf_overview_add_form_btn" class="button button-primary" value="<?php _e('Save','erforms'); ?>" />
            </div>
        </div>
    </div>
</div>


<div id="erf_overview_delete_form_dialog" class="erf_dialog" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h5><?php _e('Are you sure you want to delete?','erforms'); ?></h5>
            <button type="button" class="close erf_close_dialog">
                <span>×</span>
            </button>
        </div>
        <div class="modal-body">
            <?php _e('All the related submissions will be deleted.','erforms'); ?>
        </div>
        <div class="modal-footer">
            <input type="button" class="button button-primary erf-close-btn" value="<?php _e('Close','erforms'); ?>" />
            <input type="button" class="button button-danger erf-confirm-btn" value="<?php _e('Confirm','erforms'); ?>" />
        </div>                                
    </div>
</div>


<script>
    window.addEventListener('click', function(e){ 
        $=jQuery;
        var target= $(e.target);
        if(!target.hasClass('menu-icon')){
            $('.erf-card-actions').addClass('erform-hidden');
        }
    });
</script>    