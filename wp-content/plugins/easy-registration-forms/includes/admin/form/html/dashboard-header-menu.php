<div class="erf-page-menu">
    <ul class="erf-nav clearfix">
                <li class="erf-nav-item <?php echo $active_tab=='build' ? 'active' : '' ?>"><a href="?page=erforms-dashboard&form_id=<?php echo $form_id; ?>&tab=build"><?php _e('Fields', 'erforms'); ?></a></li>
                <li class="erf-nav-item"><a target="_blank" href="<?php echo add_query_arg(array('erform_id'=>$form_id),get_permalink($options['preview_page'])); ?>"><?php _e('Preview', 'erforms'); ?></a></li>
                <li class="erf-nav-item <?php echo $active_tab=='configure' ? 'active' : '' ?>"><a href="?page=erforms-dashboard&form_id=<?php echo $form_id; ?>&tab=configure"><?php _e('Configure', 'erforms'); ?></a></li>
                <li class="erf-nav-item <?php echo $active_tab=='notifications' ? 'active' : '' ?>"><a href="?page=erforms-dashboard&form_id=<?php echo $form_id; ?>&tab=notifications"><?php _e('Notifications', 'erforms'); ?></a></li>
                <li class="erf-nav-item <?php echo $active_tab=='attachments' ? 'active' : '' ?>"><a href="?page=erforms-dashboard&form_id=<?php echo $form_id; ?>&tab=attachments"><?php _e('Uploads', 'erforms'); ?></a></li>
                <li class="erf-nav-item <?php echo $active_tab=='reports' ? 'active' : '' ?>"><a href="?page=erforms-dashboard&form_id=<?php echo $form_id; ?>&tab=reports"><?php _e('Reports', 'erforms'); ?></a></li>
                <li class="erf-nav-item"><a href="?page=erforms-submissions&erform_id=<?php echo $form_id; ?>"><?php _e('Submissions', 'erforms'); ?></a></li>       
                <?php do_action('erf_dashboard_header_menus',$active_tab,$form_id); ?>  
    </ul>        
</div>