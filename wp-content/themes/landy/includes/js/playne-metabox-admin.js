jQuery(document).ready(function() {

    jQuery('#featuredimage_options_gallery').hide();
    jQuery('#featuredvideo_options_video').hide();
 
    jQuery('#post-formats-select input:radio[name=post_format]').change(function() {
 
        var playne_selected = jQuery("#post-formats-select input:radio[name=post_format]:checked").val();
 
        jQuery('#featuredimage_options_gallery').hide();
        jQuery('#featuredvideo_options_video').hide();

        if (this.value == playne_selected) {
            jQuery('#featuredimage_options_' + playne_selected ).show();
            jQuery('#featuredvideo_options_' + playne_selected ).show();
        }

    });

    var playne_selected = jQuery("#post-formats-select input:radio[name=post_format]:checked").val();
        jQuery('#featuredimage_options_' + playne_selected ).show();
        jQuery('#featuredvideo_options_' + playne_selected ).show();
 
});