jQuery(document).ready(function ($) {
    //disable inputs
	jQuery('.dck_blur :input').attr('disabled', true);
    jQuery('#dck-tab-2 :input').attr('disabled', true);
    jQuery('ul.dck-tabs li').click(function () {
        var tab_id = $(this).attr('data-tab');
        jQuery('ul.dck-tabs li').removeClass('current');
        jQuery('.dck-tab-content').removeClass('current');
        jQuery(this).addClass('current');
        jQuery("#" + tab_id).addClass('current');

    })
	
    jQuery('.dck-color-field').wpColorPicker();
	jQuery('.wp-picker-container :button').attr('disabled', true);
});