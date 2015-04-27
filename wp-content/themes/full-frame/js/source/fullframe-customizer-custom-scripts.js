/**
 * Theme Customizer custom scripts
 * Control of show/hide events on feature slider type selection
 */
(function($) {

    //Message if WordPress version is less tham 4.0
    if (parseInt(fullframe_misc_links.WP_version) < 4) {
        $('.preview-notice').prepend('<span style="font-weight:bold;">' + fullframe_misc_links.old_version_message + '</span>');
        jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
            event.stopPropagation();
        });
    }

    //Add Upgrade Button,Theme instruction, Support Forum, Changelog, Donate link, Review, Facebook, Twitter, Google+, Pinterest links 
    $('.preview-notice').prepend('<span id="fullframe_upgrade"><a target="_blank" class="button btn-upgrade" href="' + fullframe_misc_links.upgrade_link + '">' + fullframe_misc_links.upgrade_text + '</a></span>');
    jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
        event.stopPropagation();
    });
    /*
     * For Featured Content on featured_content_type change event
     */
    $("#customize-control-fullframe_theme_options-featured_content_type label select").live( "change", function() {
        var value = $(this).val();

        if (value == 'demo-featured-content') {
            $('#customize-control-fullframe_theme_options-featured_content_number').hide();
            $('#customize-control-fullframe_theme_options-featured_content_headline').hide();
            $('#customize-control-fullframe_theme_options-featured_content_subheadline').hide();
            $('[id*=customize-control-fullframe_featured_content_page]').hide();
            $('#customize-control-fullframe_theme_options-featured_content_enable_title').hide();
            $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').hide();
        } else {
            $('#customize-control-fullframe_theme_options-featured_content_number').show();
            $('#customize-control-fullframe_theme_options-featured_content_headline').show();
            $('#customize-control-fullframe_theme_options-featured_content_subheadline').show();
            $('[id*=customize-control-fullframe_featured_content_page]').show();
            $('#customize-control-fullframe_theme_options-featured_content_enable_title').show();
            $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').show();
        }
    });

    /**
     * Control of show/hide events on feature content type selection on panel click if prevously value has been saved
     */
    $('#accordion-panel-fullframe_featured_content_options .accordion-section-title').live( "click", function() {
        var value = $("#customize-control-fullframe_theme_options-featured_content_type label select").val();
        if (value == 'demo-featured-content') {
            $('#customize-control-fullframe_theme_options-featured_content_number').hide();
            $('#customize-control-fullframe_theme_options-featured_content_headline').hide();
            $('#customize-control-fullframe_theme_options-featured_content_subheadline').hide();
            $('[id*=customize-control-fullframe_featured_content_page]').hide();
            $('#customize-control-fullframe_theme_options-featured_content_enable_title').hide();
            $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').hide();
        } else {
            $('#customize-control-fullframe_theme_options-featured_content_number').show();
            $('#customize-control-fullframe_theme_options-featured_content_headline').show();
            $('#customize-control-fullframe_theme_options-featured_content_subheadline').show();
            $('[id*=customize-control-fullframe_featured_content_page]').show();
            $('#customize-control-fullframe_theme_options-featured_content_enable_title').show();
            $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').show();
        }
    });

    /**
     * Control of show/hide events on feature content type selection on page load if prevously value has been saved
     * For WordPress versions less than 4.0
     */
    var fullframe_featured_content_layout_value = $("#customize-control-fullframe_theme_options-featured_content_type label select").val();

    if (fullframe_featured_content_layout_value == 'demo-content') {
        $('#customize-control-fullframe_theme_options-featured_content_number').hide();
        $('#customize-control-fullframe_theme_options-featured_content_headline').hide();
        $('#customize-control-fullframe_theme_options-featured_content_subheadline').hide();
        $('[id*=customize-control-fullframe_featured_content_page]').hide();
        $('#customize-control-fullframe_theme_options-featured_content_enable_title').hide();
        $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').hide();
    } else {
        $('#customize-control-fullframe_theme_options-featured_content_number').show();
        $('#customize-control-fullframe_theme_options-featured_content_headline').show();
        $('#customize-control-fullframe_theme_options-featured_content_subheadline').show();
        $('[id*=customize-control-fullframe_featured_content_page]').show();
        $('#customize-control-fullframe_theme_options-featured_content_enable_title').show();
        $('#customize-control-fullframe_theme_options-featured_content_enable_excerpt_content').show();
    }

   /*
     * For Feature Slider on featured_slider_type change event
     */

    $('#accordion-panel-fullframe_featured_slider .accordion-section-title').live( "click", function() {
        var value = $("#customize-control-fullframe_featured_slider_type label select").val();

        if (value == 'demo-featured-slider') {
            $('#customize-control-fullframe_featured_slide_number').hide();
        } else {
            $('#customize-control-fullframe_featured_slide_number').show();
        }

        if (value == 'featured-page-slider') {
            $('[id*=customize-control-fullframe_featured_slider_page]').show();
        } else {
            $('[id*=customize-control-fullframe_featured_slider_page]').hide();
        }
    });

    $("#customize-control-fullframe_featured_slider_type label select").live( "change", function() {
        var value = $(this).val();

        if (value == 'demo-featured-slider') {
            $('#customize-control-fullframe_featured_slide_number').hide();
        } else {
            $('#customize-control-fullframe_featured_slide_number').show();
        }

        if (value == 'featured-page-slider') {
            $('[id*=customize-control-fullframe_featured_slider_page]').show();
        } else {
            $('[id*=customize-control-fullframe_featured_slider_page]').hide();
        }
    });


    /**
     * Control of show/hide events on feature slider type selection on page load if prevously value has been saved
     * For WordPress versions less than 4.0
     */
    var fullframe_featured_slider_layout_value = $("#customize-control-fullframe_featured_slider_type label select").val();

    if (fullframe_featured_slider_layout_value == 'demo-featured-slider') {
        $('#customize-control-fullframe_featured_slide_number').hide();
    } else {
        $('#customize-control-fullframe_featured_slide_number').show();
    }

    if (fullframe_featured_slider_layout_value == 'featured-page-slider') {
        $('[id*=customize-control-fullframe_featured_slider_page]').show();
    } else {
        $('[id*=customize-control-fullframe_featured_slider_page]').hide();
    }

     $("#customize-control-fullframe_theme_options-color_scheme").live( "change", function() {
        //var name = $('#customize-control-fullframe_theme_options-color_scheme input').attr('name');
        var value = $('#customize-control-fullframe_theme_options-color_scheme input:checked').val();
        if ( 'dark' == value ){
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#ddd');

            $('#customize-control-background_color .color-picker-hex').iris('color', '#111');
        
        }
        else {
            $('#customize-control-header_textcolor .color-picker-hex').iris('color', '#404040');

            $('#customize-control-background_color .color-picker-hex').iris('color', '#f2f2f2');
        }
    });
     
})(jQuery);