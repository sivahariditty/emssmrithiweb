/*( function( api ) {

    api.sectionConstructor['upsell'] = api.Section.extend( {

        // No events for this type of section.
        attachEvents: function () {},

        // Always make the section active.
        isContextuallyActive: function () {
            return true;
        }
    } );

} )( wp.customize );*/

jQuery(document).ready(function($) {
 /**
      * Function for repeater field
     */
    function business_owner_refresh_repeater_values(){
        $(".mt-repeater-field-control-wrap").each(function(){
            
            var values = []; 
            var $this = $(this);
            
            $this.find(".mt-repeater-field-control").each(function(){
            var valueToPush = {};   

            $(this).find('[data-name]').each(function(){
                var dataName = $(this).attr('data-name');
                var dataValue = $(this).val();
                valueToPush[dataName] = dataValue;
            });

            values.push(valueToPush);
            });

            $this.next('.mt-repeater-collector').val(JSON.stringify(values)).trigger('change');
        });
    }

    $('#customize-theme-controls').on('click','.mt-repeater-field-title',function(){
        $(this).next().slideToggle();
        $(this).closest('.mt-repeater-field-control').toggleClass('expanded');
    });

    $('#customize-theme-controls').on('click', '.mt-repeater-field-close', function(){
        $(this).closest('.mt-repeater-fields').slideUp();;
        $(this).closest('.mt-repeater-field-control').toggleClass('expanded');
    });

    $("body").on("click",'.mt-repeater-add-control-field', function(){

        var fLimit = $(this).parent().find('.field-limit').val();
        var fCount = $(this).parent().find('.field-count').val();
        if( fCount < fLimit ) {
            fCount++;
            $(this).parent().find('.field-count').val(fCount);
        } else {
            $(this).before('<span class="mt-limit-msg"><em>Only '+fLimit+' repeater field will be permitted.</em></span>');
            return;
        }

        var $this = $(this).parent();
        if(typeof $this != 'undefined') {

            var field = $this.find(".mt-repeater-field-control:first").clone();
            if(typeof field != 'undefined'){
                
                field.find("input[type='text'][data-name]").each(function(){
                    var defaultValue = $(this).attr('data-default');
                    $(this).val(defaultValue);
                });
                
                field.find(".mt-repeater-icon-list").each(function(){
                    var defaultValue = $(this).next('input[data-name]').attr('data-default');
                    $(this).next('input[data-name]').val(defaultValue);
                    $(this).prev('.mt-repeater-selected-icon').children('i').attr('class','').addClass(defaultValue);
                    
                    $(this).find('li').each(function(){
                        var icon_class = $(this).find('i').attr('class');
                        if(defaultValue == icon_class ){
                            $(this).addClass('icon-active');
                        }else{
                            $(this).removeClass('icon-active');
                        }
                    });
                });

                field.find('.mt-repeater-fields').show();

                $this.find('.mt-repeater-field-control-wrap').append(field);

                field.addClass('expanded').find('.mt-repeater-fields').show(); 
                $('.accordion-section-content').animate({ scrollTop: $this.height() }, 1000);
                business_owner_refresh_repeater_values();
            }

        }
        return false;
     });
    
    $("#customize-theme-controls").on("click", ".mt-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.mt-repeater-field-control').slideUp('normal', function(){
                $(this).remove();
                business_owner_refresh_repeater_values();
            });
        }
        return false;
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]',function(){
        business_owner_refresh_repeater_values();
        return false;
    });

    /*Drag and drop to change order*/
    $(".mt-repeater-field-control-wrap").sortable({
        orientation: "vertical",
        update: function( event, ui ) {
            business_owner_refresh_repeater_values();
        }
    });

    $('body').on('click', '.mt-repeater-icon-list li', function(){
        var icon_class = $(this).find('i').attr('class');
        $(this).addClass('icon-active').siblings().removeClass('icon-active');
        $(this).parent('.mt-repeater-icon-list').prev('.mt-repeater-selected-icon').children('i').attr('class','').addClass(icon_class);
        $(this).parent('.mt-repeater-icon-list').next('input').val(icon_class).trigger('change');
        business_owner_refresh_repeater_values();
    });

    $('body').on('click', '.mt-repeater-selected-icon', function(){
        $(this).next().slideToggle();
    });

});    