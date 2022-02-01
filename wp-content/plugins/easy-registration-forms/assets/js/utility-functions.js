function erf_util_redirect(url, timer) {
    var timer = timer || 2000;
    if (erf_util_is_url(url)) {
        setTimeout(function () {
            window.location = url;
        }, timer);
    }
}

function erf_util_is_url(str) {
    var pattern = new RegExp('^(https?:\\/\\/)?' + // protocol
            '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|' + // domain name
            '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
            '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
            '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
            '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator
    return pattern.test(str);
}


function erf_update_url_query(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    } else {
        return uri + separator + key + "=" + value;
    }
}

function erf_handle_form_ajax_response(response, selector, form) {
    var formParentBlock = selector || jQuery(form).closest('.erf-container');
    if (formParentBlock.find('.erf-edit-submission-form .erf-reg-form-container').length > 0) { // Check for edit submission pop up
        formParentBlock = formParentBlock.find('.erf-edit-submission-form .erf-reg-form-container');
    }

    if (response.success)
    {
        /* Remove Form HTML and place Thank You message */
        if (response.msg)
        {
            jQuery('html, body').animate({
                scrollTop: formParentBlock.offset().top
            }, 300);
            jQuery(form).remove();
            formParentBlock.html(response.msg);
        }

        /* Handling redirection */
        if (response.redirect_to)
        {
            if (response.msg == "") {
                erf_util_redirect(response.redirect_to, 0);
            } else
                erf_util_redirect(response.redirect_to);
            return;
        }

        /* Handling page reload */
        if (response.reload && response.form_id) {
            var currentUrl = document.location.href;
            currentUrl = erf_update_url_query(currentUrl, 'erf_form', response.form_id);
            document.location.href = erf_update_url_query(currentUrl, 'erf_auto_login', 1);
            return;
        }
        // Create the event.
        var formSubmitEvent = document.createEvent('Event');

        // Define that the event name is 'erforms_submit_response'.
        formSubmitEvent.initEvent('erforms_submit_response', true, true);
        formSubmitEvent.detail = {'formParent': formParentBlock, 'response': response};
        document.dispatchEvent(formSubmitEvent);
        jQuery(document).trigger('erf_register_common_scripts');
        //erf_global_triggers();
    } else
    {
        var data = response.data;
        var formErrors = [];
        for (i = 0; i < data.length; i++) {
            if (data[i][0]) {
                var fieldElement = jQuery(form).find('input[name=' + data[i][0] + ']');
                if (fieldElement.length > 0) {
                    fieldElement.after('<div class="erf-field-error">' + data[i][1] + '</div>');
                    var parsleyGroup = fieldElement.data('parsley-group');
                    if (parsleyGroup) {
                        var errorPageIndex = parseInt(parsleyGroup.replace('block-', ''));
                        if (!fieldElement.is(':visible')) {
                            jQuery(form).find('[page-index=' + errorPageIndex + ']').addClass('erf-has-errors');
                        }
                    }

                }
                formErrors.push("<div class='erf-error-row'>" + data[i][1] + "</div>");
            }

        }
        erf_show_form_errors(form, formErrors);
    }
}

function erf_show_form_errors(form, errors) {
    $ = jQuery;
    if ($(form).length == 0 || errors.length == 0)
        return;

    var container = $(form).find('.erf-errors');
    container.show();
    for (var i = 0; i < errors.length; i++) {
        container.find('.erf-errors-body').append(errors[i]);
    }
}

Number.prototype.round = function (p) {
    p = p || 10;
    return parseFloat(this.toFixed(p));
};

function geo_ip_lookpup_tel(success, failure) {
    jQuery.get("https://ipinfo.io", function () {}, "jsonp").always(function (resp) {
        var countryCode = (resp && resp.country) ? resp.country : "";
        success(countryCode);
    });
}

function erf_global_triggers() {
    $ = jQuery;
    $(document).trigger('erf_process_form');
    $(document).trigger('erf_process_login_form');
    $(document).trigger('erf_process_my_account');
    $(document).trigger('erf_register_common_scripts');
}

function erf_popup_message(args, container) {
    $ = jQuery;
    if (container.length == 0)
        container = $('body');
    var popup = $('<div/>', {
        class: 'erf-modal erf-modal-small'
    });
    popup.append('<div class="erf-modal-header">&nbsp;<button type="button" class="erf-modal-close">X</button></div><div class="erf-modal-body"></div>');
    popup.find('.erf-modal-body').html(args.content);
    container.append(popup);
    popup.find('.erf-modal-close').click(function () {
        popup.remove();
    });
    popup.show();
}

function erf_get_moment_format(format) {
    switch (format) {
        case 'mm/dd/yy' :
            return 'MM/DD/YYYY';
        case 'dd/mm/yy' :
            return 'DD/MM/YYYY';
        case 'mm-dd-yy' :
            return 'MM-DD-YYYY';
        case 'dd-mm-yy' :
            return 'DD-MM-YYYY';
        default:
            return 'MM/DD/YYYY';
    }
    return 'MM/DD/YYYY';
}

/*
 * Interpolate form and registers the events to handle two way binding between the 
 * field short tag (__Field'label__) and input field.
 */
function erf_interpolate_form(form, formData) {
    var nonInputFields = ['paragraph', 'button'];
    var elems = form.find('.erf_dynamic_ph');
    // Looping through all the form input fields to identify span elements with field placeholders
    if(elems.length>0){
        for (var i = 0; i < formData.fields.length; i++) {
            var singleField = formData.fields[i];
            if (singleField.hasOwnProperty('type') && nonInputFields.indexOf(singleField.type) == -1) {
                singleField.label = singleField.label.toLowerCase();
                var searchLabel = '__' + singleField.label + '__';
                elems.each(function () {
                    var item = $(this);
                    if (item.text().toLowerCase() == searchLabel) {
                        item.html('');
                        /*************** Closure ******************/
                        (function(fieldName){
                            // Handling single input fields
                            form.find('[name="' + fieldName+ '"]').on('input', function () {
                                if ($(this).is(':file')) { // Handling file type field
                                    var file = $(this);
                                    setTimeout(function(){ // Implementing the preview action after few seconds to make sure preview div is available
                                        var filePreview = file.closest('.form-group').find('.erf_img_preview');
                                        if (filePreview.length > 0) {
                                            item.html(filePreview[0].outerHTML);
                                            item.find('.erf_delete_attachment').remove(); // Removing "Delete File" button
                                        }
                                        else{
                                            item.html('');
                                        }
                                    }, 1500);
                                } 
                                else 
                                {
                                    item.html($(this).val());
                                }

                            });

                            // Handling multi input fields (Checkbox,Multiselect dropdown)
                            form.find('[name="' + fieldName + '[]"]').on('input', function () {
                                var selectedValues = []; // Stores only checked/selected values
                                if ($(this).is(':checkbox')) {
                                    form.find('[name="' + fieldName + '[]"]:checked').each(function () {
                                        selectedValues.push($(this).val());
                                    });
                                } else if ($(this).is('select')) {
                                    selectedValues = $(this).val();
                                }
                                item.html(selectedValues.join(','));
                            });
                            // Checking for file previews
                            var fileField= form.find('[name="' + fieldName + '"]:file');
                            if(fileField.length>0){
                                var parentField = fileField.closest('.form-group');
                                if(parentField.length>0){
                                    var preview = parentField.find('.erf_img_preview');
                                    if(preview.length>0){
                                        item.html(preview[0].outerHTML);
                                        item.find('.erf_delete_attachment').remove();
                                    }
                                }
                            }

                        })(singleField.name);
                        /*************** Closure ends here******************/
                    }
                });
            }
        }
    }
    
}

/*
 * Returns data from Global scope (window)
 */
erforms_get_form_from_gs= function(formId){
    if(typeof 'form_' + formId !== 'undefined'){
        return window['form_' + formId];
    }
    return false;
}

/*
 * Set data into Global scope (window)
 */
erforms_set_form_into_gs= function(formId,form){
    window['form_' + formId]= form;
}