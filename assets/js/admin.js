jQuery(document).ready(function ($) {

    // Uploading files
    var file_frame;

    jQuery.fn.upload_listing_image = function (button) {
        var button_id = button.attr('id');
        var field_id = button_id.replace('_button', '');

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: jQuery(this).data('uploader_title'),
            button: {
                text: jQuery(this).data('uploader_button_text'),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            jQuery("#" + field_id).val(attachment.id);
            jQuery("#listingimagediv img").attr('src', attachment.url);
            jQuery('#listingimagediv img').show();
            jQuery('#' + button_id).attr('id', 'remove_listing_image_button');
            jQuery('#remove_listing_image_button').text('Remove listing image');
        });

        // Finally, open the modal
        file_frame.open();
    };

    jQuery('#listingimagediv').on('click', '#upload_listing_image_button', function (event) {
        event.preventDefault();
        jQuery.fn.upload_listing_image(jQuery(this));
    });

    jQuery('#listingimagediv').on('click', '#remove_listing_image_button', function (event) {
        event.preventDefault();
        jQuery('#upload_listing_image').val('');
        jQuery('#listingimagediv img').attr('src', '');
        jQuery('#listingimagediv img').hide();
        jQuery(this).attr('id', 'upload_listing_image_button');
        jQuery('#upload_listing_image_button').text('Set listing image');
    });

});


jQuery(document).ready(function ($) {

    // Uploading files
    var file_frame;

    jQuery.fn.upload_image = function (button) {
        var button_id = button.attr('id');
        var field_id = button_id.replace('_button', '');

        // If the media frame already exists, reopen it.
        if (file_frame) {
            file_frame.open();
            return;
        }

        // Create the media frame.
        file_frame = wp.media.frames.file_frame = wp.media({
            title: button.data('uploader_title'),
            button: {
                text: button.data('uploader_button_text'),
            },
            multiple: false
        });

        // When an image is selected, run a callback.
        file_frame.on('select', function () {
            var attachment = file_frame.state().get('selection').first().toJSON();
            $("#" + field_id).val(attachment.id);
            $("#" + field_id + "_preview").attr('src', attachment.url);
            $("#" + field_id + "_preview").show();
            $("#" + button_id).attr('id', 'remove_' + field_id + '_button');
            $("#remove_" + field_id + "_button").text('Remove ' + field_id + ' image');
        });

        // Finally, open the modal
        file_frame.open();
    };

    // Event listener for uploading image
    $('body').on('click', '.upload_image_button', function (event) {
        event.preventDefault();
        $.fn.upload_image($(this));
    });

    // Event listener for removing image
    $('body').on('click', '.remove_image_button', function (event) {
        event.preventDefault();
        var field_id = $(this).data('field_id');
        $("#" + field_id).val('');
        $("#" + field_id + "_preview").attr('src', '');
        $("#" + field_id + "_preview").hide();
        $(this).attr('id', field_id + "_button");
        $("#" + field_id + "_button").text('Set ' + field_id + ' image');
    });

});



(function ($) {
    // Variables
    const $tabLink = $('#tabs-section .tab-link');
    const $tabBody = $('#tabs-section .tab-body');
    let timerOpacity;

    // Toggle Class
    const init = () => {
        // Menu Click
        $tabLink.off('click').on('click', function (e) {
            // Prevent Default
            e.preventDefault();
            e.stopPropagation();

            // Clear Timers
            window.clearTimeout(timerOpacity);

            // Toggle Class Logic
            // Remove Active Classes
            $tabLink.removeClass('active ');
            $tabBody.removeClass('active ');
            $tabBody.removeClass('active-content');

            // Add Active Classes
            $(this).addClass('active');
            $($(this).attr('href')).addClass('active');

            // Opacity Transition Class
            timerOpacity = setTimeout(() => {
                $($(this).attr('href')).addClass('active-content');
            }, 50);
        });
    };

    // Document Ready
    $(function () {
        init();
    });
}(jQuery));
