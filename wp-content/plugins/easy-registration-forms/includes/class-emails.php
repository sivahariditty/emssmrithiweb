<?php
class ERForms_Emails
{   
    private $from= null;
    private $from_name= null;
    private static $instance = null;
    
    private function __construct()
    {   
        add_action('erf_post_submission_completed', array($this,'post_submission_notification'));
        add_action('erf_async_post_edit_submission', array($this,'post_edit_submission_notification')); // Called after current_time + 10
        add_action('erf_post_submission', array($this,'auto_reply_user')); 
        add_action('erf_post_edit_submission', array($this,'edit_sub_auto_reply_to_user'));
        add_action('erf_async_user_activated',array($this,'async_user_activated')); // Called after current_time + 20
        add_action('erf_user_activated',array($this,'user_activated'));
        add_action('wp_ajax_erf_send_uninstall_feedback',array($this,'send_uninstall_feedback'));
        add_action('erf_send_verification_link',array($this,'send_verification_link'),10,4);
        add_action('erf_submission_deleted',array($this,'send_sub_deletion_notification'),10,3);
        add_action('erf_sub_payment_pending',array($this,'payment_pending'),10,1);
        add_action('erf_payment_status_changed',array($this,'payment_status_changed'),10,4);
        add_action('erf_submission_note_processed',array($this,'notify_note_to_user'),10,2);
    }
    
    public static function get_instance()
    {   
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    /*
     * Notifies admin on submission completion
     */
    public function async_notify_admin($sub_id){
        $submission_model= erforms()->submission;
        $submission= $submission_model->get_submission($sub_id);
        
        $form= erforms()->form->get_form($submission['form_id']);
        if(empty($form['enable_admin_notification']))
            return;
        
        
        $subject= $form['admin_notification_subject'];
        $message= $form['admin_notification_msg'];
        $registration_html= '';
        if (!empty($submission['unique_id'])){
            $registration_html= '<div>'.__('Unique Submission ID', 'erforms').': '.$submission['unique_id'].'</div>';
        }
                     
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            if ($field['f_type'] == 'file' && !empty($field['f_val'])) {
                if (wp_attachment_is_image($field['f_val'])) {
                    $image_attributes = wp_get_attachment_image_src($field['f_val']);
                    $field['f_val']= '<a target="_blank" href="'.wp_get_attachment_url($field['f_val']).'">'.__('View File','erforms').'</a>';
                } else {
                    $url = wp_get_attachment_url($field['f_val']);
                    $field['f_val']='<a target="_blank" href="' . $url . '">'.__('View File','erforms').'</a>';
                }
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
            $registration_html .= '<div>'.$field['f_label'].': '.$field['f_val'].'</div> <br>';
        }
        
        if(!empty($submission['plans']))
        {
            $registration_html .= '<div>'.__('Amount','erforms').': '.erforms_currency_symbol($submission['currency'], false) . $submission['amount'].'</div> <br>';
            $registration_html .= '<div>'.__('Payment Status','erforms').': '.ucwords($submission['payment_status']).'</div> <br>';
            $registration_html .= '<div>'.__('Payment Invoice','erforms').': '.$submission['payment_invoice'].'</div> <br>';
            $registration_html .= '<div>'.__('Payment Method','erforms').': '.erforms_payment_method_title($submission['payment_method']).'</div> <br>';
        }
        
        if (!empty($submission['unique_id'])){ 
             $registration_html = str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $registration_html);
             $message= str_replace('{{UNIQUE_ID}}', $submission['unique_id'], $message);
        }
        
        $message= str_replace('{{REGISTRATION_DATA}}', $registration_html, $message);
        $to= $form['admin_notification_to'];
        if(empty($to)){
           $to= get_option('admin_email');
        }
        $message= do_shortcode(wpautop($message));
        if(!empty($form['admin_notification_from'])){
             $this->from= $form['admin_notification_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        if(!empty($form['admin_notification_from_name'])){
            $this->from_name= $form['admin_notification_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $message= apply_filters('erf_admin_sub_email',$message,$submission); // Allows to dynamically update the email content
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    /*
     * Send auto reply message to user
     */
    public function auto_reply_user($submission){
        $submission_id= $submission['id']; // Fetching submission entry from database for latest values
        $submission= erforms()->submission->get_submission($submission_id);
        $form= erforms()->form->get_form($submission['form_id']);
        
        if(empty($form['enabled_auto_reply']))
            return;
        $subject= $form['auto_reply_subject'];
        $message= $form['auto_reply_msg'];
        
        if($form['type']=='reg'){
            $user= isset($submission['user']) ? $submission['user'] : false;
            if(empty($user))
                return false;
            $to= $user['user_email'];
        }
        else
        {
           if(!empty($form['auto_reply_to'])){
               $to= $form['auto_reply_to'];
           }
           else if(!empty($submission['primary_field_val'])){
               $to= $submission['primary_field_val'];
           }
           else{
                return;
           }
        }
        foreach($submission['fields_data'] as $field){
                    if(is_array($field['f_val'])){
                        $field['f_val']= implode(',',$field['f_val']);
                    }
                    $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
                    $to= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $to);
        }
        if (!empty($submission['unique_id'])){
             $message= str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $message);
        }
        $user= wp_get_current_user();
        if(!empty($user->ID)){
            $to= str_replace('{{current_user}}',$user->user_email, $to);
        }
        $message= do_shortcode(wpautop($message));
        if(!empty($form['auto_reply_from'])){
             $this->from= $form['auto_reply_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['auto_reply_from_name'])){
            $this->from_name= $form['auto_reply_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        $message= apply_filters('erf_auto_reply_email',$message,$submission); // Allows to dynamically update the email content
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function async_user_activated($user_id){     
        $this->user_activated($user_id);
    }
    
    public function set_html_content_type($content_type) {
	return 'text/html';
    }
    
    public function user_activated($user_id){
        $user_model= erforms()->user;
        $form_id= $user_model->get_meta($user_id,'form');
        if(empty($form_id))
            return false;
        
        $form= erforms()->form->get_form($form_id);
        if(empty($form['enable_act_notification']))
            return false;
        $user= $user_model->get_user($user_id);
        $subject= $form['user_act_subject'];
        $message= $form['user_act_msg'];
        $to= $user->user_email;
        $message= do_shortcode(wpautop($message));
        if(!empty($form['user_act_from'])){
             $this->from= $form['user_act_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['user_act_from_name'])){
            $this->from_name= $form['user_act_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        // Parsing for any dynamic values
        $placeholders= array('{{first_name}}','{{last_name}}','{{user_email}}','{{display_name}}');
        $placeholder_values= array($user->first_name,$user->last_name,$user->user_email,$user->display_name);
        $message= str_ireplace($placeholders, $placeholder_values, $message);
        $message= apply_filters('erf_user_activated_email',$message,$user_id); // Allows to dynamically update the email content
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function report_issue($name,$email,$subject,$message){
        $subject= $subject;
        $message= $message;
        $message.= ' <br> From: '.$email;
        $to= 'erformswp@gmail.com';
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
    }
    
    public function quick_email($to,$subject,$message,$from='',$from_name=''){
        $message= do_shortcode(wpautop($message));
        if(!empty($from)){
            $this->from= $from;
            add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($from_name)){
            $this->from_name= $from_name;
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        if(!empty($this->from)){
            $this->from= null;
            remove_filter('wp_mail_from',array($this,'set_email_from'));
        }
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function offline_payment_notification($sub_id){
        $options= erforms()->options->get_options();
        $submission_model= erforms()->submission;
        $submission= $submission_model->get_submission($sub_id);
        if(empty($options['send_offline_email']) || empty($options['offline_email']) || empty($submission['payment_method'])){
            return;
        }
        
        if($submission['payment_method']!='offline'){
            return;
        }
        
        $user= isset($submission['user']) ? $submission['user'] : false;
        if(!empty($user)){
            $to=  $user['user_email'];
        }
        else if(!empty($submission['primary_field_val'])){
            $to= $submission['primary_field_val'];
        }
        else{
            return;
        }
            
        
        $form= erforms()->form->get_form($submission['form_id']);
        if(!empty($options['offline_email_subject'])){
            $subject= $options['offline_email_subject'];
        }
        else{
            $subject= $form['name'].' '.__('Offline Payment','erforms');
        }
        
        $message= $options['offline_email'];
        $message= do_shortcode(wpautop($message));
        
        $message= apply_filters('erf_offline_email',$message,$submission); // Allows to dynamically update the email content
        
        if(!empty($options['offline_email_from'])){
             $this->from= $options['offline_email_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($options['offline_email_from_name'])){
            $this->from_name= $options['offline_email_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));   
        remove_filter( 'wp_mail_from', array($this,'set_email_from'));
        remove_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        
    }
    
    public function post_submission_notification($sub_id){
        $this->async_notify_admin($sub_id);
        $this->offline_payment_notification($sub_id);
    }
    
    /* Responds user after edit submission */
    public function edit_sub_auto_reply_to_user($submission){
        $submission_id= $submission['id']; // Fetching submission entry from database for latest values
        $submission= erforms()->submission->get_submission($submission_id);
        $form= erforms()->form->get_form($submission['form_id']);
   
        if(empty($form['enable_edit_notifications']))
            return;
        
        $user= isset($submission['user']) ? $submission['user'] : false;
        if(!empty($user)){
            $to= $user['user_email'];
        }
        else if(!empty($submission['primary_field_val'])){
            $to= $submission['primary_field_val'];
        }
        else{
            return false;
        }
        $subject= $form['edit_sub_user_subject'];
        $message= $form['edit_sub_user_email'];
        
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
        }
        
        if (!empty($submission['unique_id'])){
             $message= str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $message);
        }
        
        
        $message= do_shortcode(wpautop($message));
        if(!empty($form['edit_sub_user_from'])){
             $this->from= $form['edit_sub_user_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['edit_sub_user_from_name'])){
            $this->from_name= $form['edit_sub_user_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        $message= apply_filters('erf_edit_sub_auto_reply_email',$message,$submission); // Allows to dynamically update the email content
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    
    }
    
    /*Notify admin after edit submission */
    public function notify_edit_sub_to_admin($sub_id){
        $submission_model= erforms()->submission;
        $submission= $submission_model->get_submission($sub_id);
        
        $form= erforms()->form->get_form($submission['form_id']);
        if(empty($form['enable_edit_notifications']))
            return;
        
        
        $subject= $form['edit_sub_admin_subject'];
        $message= $form['edit_sub_admin_email'];
        $registration_html= '';
        if (!empty($submission['unique_id'])){
            $registration_html= '<div>'.__('Unique Submission ID', 'erforms').': '.$submission['unique_id'].'</div>';
        }
                     
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            if ($field['f_type'] == 'file' && !empty($field['f_val'])) {
                if (wp_attachment_is_image($field['f_val'])) {
                    $image_attributes = wp_get_attachment_image_src($field['f_val']);
                    $field['f_val']= '<a target="_blank" href="'.wp_get_attachment_url($field['f_val']).'">'.__('View File','erforms').'</a>';
                } else {
                    $url = wp_get_attachment_url($field['f_val']);
                    $field['f_val']='<a target="_blank" href="' . $url . '">'.__('View File','erforms').'</a>';
                }
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
            $registration_html .= '<div>'.$field['f_label'].': '.$field['f_val'].'</div> <br>';
        }
        
        if (!empty($submission['unique_id'])){ 
             $registration_html = str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $registration_html);
             $message= str_replace('{{UNIQUE_ID}}', $submission['unique_id'], $message);
        }
        
        $message= str_replace('{{REGISTRATION_DATA}}', $registration_html, $message);
        $to= $form['edit_sub_admin_list'];
        if(empty($to)){
           $to= get_option('admin_email');
        }
        $message= do_shortcode(wpautop($message));
        if(!empty($form['edit_sub_admin_from'])){
             $this->from= $form['edit_sub_admin_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['edit_sub_admin_from_name'])){
            $this->from_name= $form['edit_sub_admin_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $message= apply_filters('erf_edit_sub_admin_email',$message,$submission); // Allows to dynamically update the email content
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function post_edit_submission_notification($sub_id){
         $this->notify_edit_sub_to_admin($sub_id);
    }
    
    public function report_usage(){
        $subject= 'ERForms Usage';
        $message= get_site_url();
        $to= 'erformswp@gmail.com';
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
    } 
    
    public function send_uninstall_feedback(){
        $subject= 'Uninstall Feedback';
        $message= $_POST['msg'];
        $message .= ' <br> Site: '.get_site_url();
        $to= 'erformswp@gmail.com';
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_die();
    }
    
    public function send_submission_report($report,$path){
        $subject= $report['email_subject'];
        $message= $report['email_message'];
        $message= do_shortcode(wpautop($message));
        if(!empty($report['receipents'])){
            $to= $report['receipents'];
        }else{
            $to= get_option('admin_email');
        }
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message,'',$path);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
    }
    
    public function set_email_from($from){
        if(!empty($this->from)){
            return $this->from;
        }
        return $from;
    }
    
    public function set_email_from_name($from_name){
        if(!empty($this->from_name)){
            return $this->from_name;
        }
        return $from_name;
    }
    
    public function send_verification_link($user_id,$hash,$form,$sub_id){
        if(empty($form['en_user_ver_msg'])){
            return;
        }
        
        if(!empty($form['user_ver_subject'])){
            $subject= $form['user_ver_subject'];
        }
        else
        {
            $subject= __('Account Verification','erforms');
        }
        
        $submission= erforms()->submission->get_submission($sub_id);
        $message= $form['user_ver_email_msg'];
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
        }
        
        if (!empty($submission['unique_id'])){
             $message= str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $message);
        }
        
       
        if(!empty($form['after_user_ver_page'])){
            $url= add_query_arg(array('erf_account_hash'=>$hash,'erf_form'=>$form['id']),get_permalink($form['after_user_ver_page']));
        }
        else
        {
            $url= add_query_arg(array('erf_account_hash'=>$hash,'action'=>'erf_account_verification','erf_form'=>$form['id']),admin_url('admin-ajax.php'));
        }
        
        // Replacing expiry link
        $message= str_replace('{{verification_link}}',"<a href='$url' targe='_blank'>$url</a>",$message);        
        $message= do_shortcode(wpautop($message));
        $user= get_user_by('id',$user_id);
        $to= $user->user_email;
        if(!empty($form['user_ver_from'])){
             $this->from= $form['user_ver_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['user_ver_from_name'])){
            $this->from_name= $form['user_ver_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    
    // Send notification on submission deletion
    public function send_sub_deletion_notification($form,$submission,$user){
        if(empty($form['enable_delete_notifications'])) // Submission notification not enabled
            return false;
       
        /*
         * Admin Notification
         */
        $subject= $form['delete_sub_admin_subject'];
        if(empty($subject)){
            $subject= __('Submission Deleted','erforms');
        }
        
        $registration_html= '';
        $message= $form['delete_sub_admin_email'];
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
            $registration_html .= '<div>'.$field['f_label'].': '.$field['f_val'].'</div> <br>';
        }
        
        if (!empty($submission['unique_id'])){
             $registration_html = str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $registration_html);
             $message= str_replace('{{UNIQUE_ID}}', $submission['unique_id'], $message);
        }
        
        $message= str_replace('{{REGISTRATION_DATA}}', $registration_html, $message);
        $message= do_shortcode(wpautop($message));
        if(!empty($form['delete_sub_admin_from'])){
             $this->from= $form['delete_sub_admin_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['delete_sub_admin_from_name'])){
            $this->from_name= $form['delete_sub_admin_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        $to= $form['delete_sub_admin_list'];
        if(empty($to)){
           $to= get_option('admin_email');
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
        
        // Admin notification ends here
        
        /*
         * User notification
         */
        $subject= $form['delete_sub_user_subject'];
        if(empty($subject)){
            $subject= __('Submission Deleted','erforms');
        }
        $to= $user->user_email; 
        $message= $form['delete_sub_user_email'];
        foreach($submission['fields_data'] as $field){
            if(is_array($field['f_val'])){
                $field['f_val']= implode(',',$field['f_val']);
            }
            $message= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $message);
            $to= str_replace('{{'.$field['f_label'].'}}', $field['f_val'], $to);
        }
        
        if (!empty($submission['unique_id'])){
             $message= str_replace('{{UNIQUE_ID}}',$submission['unique_id'], $message);
        }
        $message= do_shortcode(wpautop($message));
        if(!empty($form['delete_sub_user_from'])){
             $this->from= $form['delete_sub_user_from'];
             add_filter( 'wp_mail_from', array($this,'set_email_from'));
        }
        
        if(!empty($form['delete_sub_user_from_name'])){
            $this->from_name= $form['delete_sub_user_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function payment_pending($sub_id){
        $submission= erforms()->submission->get_submission($sub_id);
        if(empty($submission) || empty($submission['plans']) || $submission['payment_status']!=ERFORMS_PENDING){
            return;
        }
        $form= erforms()->form->get_form($submission['form_id']);
        $options= erforms()->options->get_options();
        if(empty($options['en_payment_pending_email']))
            return;
        $from_email= $options['pending_pay_email_from'];
        
        if(empty($from_email)){
           $from_email= get_option('admin_email');
        }
        $this->from= $from_email;
        add_filter( 'wp_mail_from', array($this,'set_email_from'));
        
        if(!empty($options['pending_pay_email_from_name'])){
            $this->from_name= $options['pending_pay_email_from_name'];
            add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
        }
        $subject= $options['pending_pay_email_subject'];
        if(empty($subject)){
            $subject= __('Pending Payment','erforms');
        }
        $payment_html= '';
        $payment_html .= '<div>'.__('Amount','erforms').': '.erforms_currency_symbol($submission['currency'], false) . $submission['amount'].'</div> <br>';
        $payment_html .= '<div>'.__('Payment Status','erforms').': '.ucwords($submission['payment_status']).'</div> <br>';
        $payment_html .= '<div>'.__('Payment Invoice','erforms').': '.$submission['payment_invoice'].'</div> <br>';
        $payment_html .= '<div>'.__('Payment Method','erforms').': '.erforms_payment_method_title($submission['payment_method']).'</div> <br>';
            
        $message= do_shortcode(wpautop($options['payment_pending_email']));
        if(!empty($submission['user'])){
            $message= str_replace(array('{{display_name}}','{{payment_details}}'), array($submission['user']['display_name'],$payment_html), $message);
            $to= $submission['user']['user_email'];
        }
        else if(!empty($submission['primary_field_val'])){
            $display_name= !empty($submission['primary_contact_name_val']) ? $submission['primary_contact_name_val'] : $submission['primary_field_val'];
            $message= str_replace(array('{{display_name}}','{{payment_details}}'), array($display_name,$payment_html), $message);
            $to= $submission['primary_field_val'];
        }
        else{
            return;
        }
       
        $message= apply_filters('erf_pending_pay_email_msg',$message,$submission);
        add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        wp_mail($to,$subject,$message);
        remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
        $this->from= null;
        remove_filter('wp_mail_from',array($this,'set_email_from'));
        $this->from_name= null;
        remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
    }
    
    public function payment_completed($sub_id){
        // User Notification
        $submission= erforms()->submission->get_submission($sub_id);
        if(empty($submission) || empty($submission['plans']) || $submission['payment_status']!=ERFORMS_COMPLETED){
            return;
        }
        $form= erforms()->form->get_form($submission['form_id']);
        $options= erforms()->options->get_options();
        if(!empty($options['en_payment_completed_email'])){
            $from_email= $options['completed_pay_email_from'];
            if(empty($from_email)){
               $from_email= get_option('admin_email');
            }
            $this->from= $from_email;
            add_filter( 'wp_mail_from', array($this,'set_email_from'));

            if(!empty($options['completed_pay_email_from_name'])){
                $this->from_name= $options['completed_pay_email_from_name'];
                add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
            }
            $subject= $options['completed_pay_email_subject'];
            if(empty($subject)){
                $subject= __('Payment Completed','erforms');
            }

            $payment_html= '';
            $payment_html .= '<div>'.__('Amount','erforms').': '.erforms_currency_symbol($submission['currency'], false) . $submission['amount'].'</div> <br>';
            $payment_html .= '<div>'.__('Payment Status','erforms').': '.ucwords($submission['payment_status']).'</div> <br>';
            $payment_html .= '<div>'.__('Payment Invoice','erforms').': '.$submission['payment_invoice'].'</div> <br>';
            $payment_html .= '<div>'.__('Payment Method','erforms').': '.erforms_payment_method_title($submission['payment_method']).'</div> <br>';

            $message=  $message= do_shortcode(wpautop($options['payment_completed_email']));
            if(!empty($submission['user'])){
                $to= $submission['user']['user_email'];
                $message= str_replace(array('{{display_name}}','{{payment_details}}'), array($submission['user']['display_name'],$payment_html), $message);
            }
            else if(!empty($submission['primary_field_val'])){
                $display_name= !empty($submission['primary_contact_name_val']) ? $submission['primary_contact_name_val'] : $submission['primary_field_val'];
                $message= str_replace(array('{{display_name}}','{{payment_details}}'), array($display_name,$payment_html), $message);
                $to= $submission['primary_field_val'];
            }
            else{
                return;
            }
            
            $message= apply_filters('erf_completed_pay_email_msg',$message,$submission);
            add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
            wp_mail($to,$subject,$message);
            remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
            $this->from= null;
            remove_filter('wp_mail_from',array($this,'set_email_from'));
            $this->from_name= null;
            remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
        }
        
        
        //Admin Notification
        if(!empty($options['en_pay_completed_admin_email'])){
            $from_email= $options['completed_pay_admin_email_from'];
            if(!empty($from_email)){
                $this->from= $from_email;
                add_filter( 'wp_mail_from', array($this,'set_email_from'));
            }
            
            if(!empty($options['completed_pay_admin_email_from_name'])){
                $this->from_name= $options['completed_pay_admin_email_from_name'];
                add_filter( 'wp_mail_from_name', array($this,'set_email_from_name'));
            }
            $subject= $options['completed_pay_admin_email_subject'];
            if(empty($subject)){
                $subject= __('Payment Completed','erforms');
            }
            add_filter('wp_mail_content_type',array($this,'set_html_content_type'));
            $to= get_option('admin_email');
            if(!empty($options['completed_pay_admin_email_to'])){
                $to= $options['completed_pay_admin_email_to'];
            }
            
            $registration_html= '';
            if (!empty($submission['unique_id'])){
                $registration_html= '<div>'.__('Unique Submission ID', 'erforms').': '.$submission['unique_id'].'</div>';
            }

            foreach($submission['fields_data'] as $field){
                if(is_array($field['f_val'])){
                    $field['f_val']= implode(',',$field['f_val']);
                }
                if ($field['f_type'] == 'file' && !empty($field['f_val'])) {
                    if (wp_attachment_is_image($field['f_val'])) {
                        $image_attributes = wp_get_attachment_image_src($field['f_val']);
                        $field['f_val']= '<a target="_blank" href="'.wp_get_attachment_url($field['f_val']).'">'.__('View File','erforms').'</a>';
                    } else {
                        $url = wp_get_attachment_url($field['f_val']);
                        $field['f_val']='<a target="_blank" href="' . $url . '">'.__('View File','erforms').'</a>';
                    }
                }
                $registration_html .= '<div>'.$field['f_label'].': '.$field['f_val'].'</div> <br>';
            }

            if(!empty($submission['plans']))
            {
                $registration_html .= '<div>'.__('Amount','erforms').': '.erforms_currency_symbol($submission['currency'], false) . $submission['amount'].'</div> <br>';
                $registration_html .= '<div>'.__('Payment Status','erforms').': '.ucwords($submission['payment_status']).'</div> <br>';
                $registration_html .= '<div>'.__('Payment Invoice','erforms').': '.$submission['payment_invoice'].'</div> <br>';
                $registration_html .= '<div>'.__('Payment Method','erforms').': '.erforms_payment_method_title($submission['payment_method']).'</div> <br>';
            }
            $message= do_shortcode(wpautop($options['pay_completed_admin_email']));
            $message= str_replace('{{submission_data}}',$registration_html,$message);
            $message= apply_filters('erf_completed_pay_admin_email_msg',$message);
            wp_mail($to,$subject,$message);
            remove_filter('wp_mail_content_type',array($this,'set_html_content_type'));
            $this->from= null;
            remove_filter('wp_mail_from',array($this,'set_email_from'));
            $this->from_name= null;
            remove_filter('wp_mail_from_name',array($this,'set_email_from_name'));
        }
    }
    
    public function payment_status_changed($new_status,$old_status,$sub_id,$notify){
        if(!empty($notify) && $new_status=='pending'){
            $this->payment_pending($sub_id);
        }
        else if(!empty($notify) && $new_status=='completed'){
            $this->payment_completed($sub_id);
        }
        
    }
    
    // Function will send notification if note is added from individual submission page.
    public function notify_note_to_user($submission,$note){
        if(empty($note['recipients'])){
            return;
        }
        $to= $note['recipients'];
        if (!has_action('erf_custom_sub_user_note_email') && !empty($to)){
            $options= erforms()->options->get_options();
            $display_name='';
            if(!empty($submission['user'])){
                $display_name=$user['display_name'];
            }
            else if(!empty($submission['primary_contact_name_val'])){
                $display_name=$submission['primary_contact_name_val'];
            }
            if (!empty($options['note_user_email'])) {
                $message = str_replace(array('{{display_name}}', '{{message}}'), array(ucwords($display_name), $note['text']), wpautop($options['note_user_email']));
            } else {
                $message = __('Hello','erforms').' ' . ucwords($display_name) . '<br><br>' . $note['text'];
            }
            $subject = !empty($options['note_user_email_sub']) ? $options['note_user_email_sub'] : ucwords($form['title']) . ' ' . __('Notification', 'erforms');
            $this->quick_email($to, $subject, $message, $options['note_user_email_from'], $options['note_user_email_from_name']);
        }
        else
        {
            do_action('erf_custom_sub_user_note_email',$submission);
        }
    }
    
}

ERForms_Emails::get_instance();