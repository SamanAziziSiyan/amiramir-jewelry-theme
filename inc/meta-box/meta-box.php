<?php
// Register the meta box
function jewelery_best_meta_box()
{
    add_meta_box(
        'jewelery_best_meta_box',          // Unique ID
        'Best Jewelry',                    // Box title
        'jewelery_best_meta_box_content',  // Content callback function
        'jewelery',                        // Post type
        'side',                            // Context (where the meta box appears)
        'high'                             // Priority (high to display at the top)
    );
}

// Content callback function for the meta box
function jewelery_best_meta_box_content($post)
{
    // Get the current value of the 'best_jewelery' meta field
    $best_jewelery = get_post_meta($post->ID, 'best_jewelery', true);

    // Output a nonce field for verification
    wp_nonce_field('jewelery_best_meta_box_nonce', 'jewelery_best_nonce');

    // Output the HTML for the meta box
?>
    <label for="best_jewelery">Is this the best jewelry?</label>
    <select name="best_jewelery" id="best_jewelery">
        <option value="yes" <?php selected($best_jewelery, 'yes'); ?>>Yes</option>
        <option value="no" <?php selected($best_jewelery, 'no'); ?>>No</option>
    </select>
<?php
}

// Save the meta box data
function jewelery_best_meta_box_save($post_id)
{
    // Check if nonce is set
    if (!isset($_POST['jewelery_best_nonce'])) {
        return;
    }

    // Verify nonce
    if (!wp_verify_nonce($_POST['jewelery_best_nonce'], 'jewelery_best_meta_box_nonce')) {
        return;
    }

    // Check if this is an autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check the user's permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save the 'best_jewelery' meta field
    $best_jewelery = sanitize_text_field($_POST['best_jewelery']);
    update_post_meta($post_id, 'best_jewelery', $best_jewelery);
}

// Hook functions into WordPress
add_action('add_meta_boxes', 'jewelery_best_meta_box');
add_action('save_post', 'jewelery_best_meta_box_save');



// Gallery functionality
function property_gallery_add_metabox()
{
    add_meta_box(
        'post_custom_gallery',
        'Gallery',
        'property_gallery_metabox_callback',
        'jewelery', // Change post type name
        'normal',
        'core'
    );
}
add_action('admin_init', 'property_gallery_add_metabox');

function property_gallery_metabox_callback()
{
    wp_nonce_field(basename(__FILE__), 'sample_nonce');
    global $post;
    $gallery_data = get_post_meta($post->ID, 'gallery_data', true);
?>
    <div id="gallery_wrapper">
        <div id="img_box_container">
            <?php
            if (isset($gallery_data['image_url'])) {
                for ($i = 0; $i < count($gallery_data['image_url']); $i++) {
            ?>
                    <div class="gallery_single_row dolu">
                        <div class="gallery_area image_container ">
                            <img class="gallery_img_img" src="<?php esc_html_e($gallery_data['image_url'][$i]); ?>" height="55" width="55" onclick="open_media_uploader_image_this(this)" />
                            <input type="hidden" class="meta_image_url" name="gallery[image_url][]" value="<?php esc_html_e($gallery_data['image_url'][$i]); ?>" />
                        </div>
                        <div class="gallery_area">
                            <span class="button remove" onclick="remove_img(this)" title="Remove" /><i class="fas fa-trash-alt"></i></span>
                        </div>
                        <div class="clear" />
                    </div>
        </div>
<?php
                }
            }
?>
    </div>
    <div style="display:none" id="master_box">
        <div class="gallery_single_row">
            <div class="gallery_area image_container" onclick="open_media_uploader_image(this)">
                <input class="meta_image_url" value="" type="hidden" name="gallery[image_url][]" />
            </div>
            <div class="gallery_area">
                <span class="button remove" onclick="remove_img(this)" title="Remove" /><i class="fas fa-trash-alt"></i></span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="add_gallery_single_row">
        <input class="button add" type="button" value="+" onclick="open_media_uploader_image_plus();" title="Add image" />
    </div>
    </div>
<?php
}

function property_gallery_styles_scripts()
{
    global $post;
    if ('jewelery' != $post->post_type)
        return;
?>
    <style type="text/css">
        .gallery_area {
            float: right;
        }

        .image_container {
            float: left !important;
            width: 100px;
            background: #f0f0f0;
            height: 100px;
            background-repeat: no-repeat;
            background-size: cover;
            border-radius: 3px;
            cursor: pointer;
        }

        .image_container img {
            height: 100px;
            width: 100px;
            border-radius: 3px;
        }

        .clear {
            clear: both;
        }

        #gallery_wrapper {
            width: 100%;
            height: auto;
            position: relative;
            display: inline-block;
        }

        #gallery_wrapper input[type=text] {
            width: 300px;
        }

        #gallery_wrapper .gallery_single_row {
            float: left;
            display: inline-block;
            width: 100px;
            position: relative;
            margin-right: 8px;
            margin-bottom: 20px;
        }

        .dolu {
            display: inline-block !important;
        }

        #gallery_wrapper label {
            padding: 0 6px;
        }

        .button.remove {
            background: none;
            color: #f1f1f1;
            position: absolute;
            border: none;
            top: 4px;
            right: 7px;
            font-size: 1.2em;
            padding: 0px;
            box-shadow: none;
        }

        .button.remove:hover {
            background: none;
            color: #fff;
        }

        .button.add {
            background: #c3c2c2;
            color: #ffffff;
            border: none;
            box-shadow: none;
            width: 100px;
            height: 100px;
            line-height: 100px;
            font-size: 4em;
        }

        .button.add:hover,
        .button.add:focus {
            background: #e2e2e2;
            box-shadow: none;
            color: #0f88c1;
            border: none;
        }
    </style>
    <script type="text/javascript">
        function remove_img(value) {
            var parent = jQuery(value).parent().parent();
            parent.remove();
        }
        var media_uploader = null;

        function open_media_uploader_image(obj) {
            media_uploader = wp.media({
                frame: "post",
                state: "insert",
                multiple: false
            });
            media_uploader.on("insert", function() {
                var json = media_uploader.state().get("selection").first().toJSON();
                var image_url = json.url;
                var html = '<img class="gallery_img_img" src="' + image_url + '" height="55" width="55" onclick="open_media_uploader_image_this(this)"/>';
                console.log(image_url);
                jQuery(obj).append(html);
                jQuery(obj).find('.meta_image_url').val(image_url);
            });
            media_uploader.open();
        }

        function open_media_uploader_image_this(obj) {
            media_uploader = wp.media({
                frame: "post",
                state: "insert",
                multiple: false
            });
            media_uploader.on("insert", function() {
                var json = media_uploader.state().get("selection").first().toJSON();
                var image_url = json.url;
                console.log(image_url);
                jQuery(obj).attr('src', image_url);
                jQuery(obj).siblings('.meta_image_url').val(image_url);
            });
            media_uploader.open();
        }

        function open_media_uploader_image_plus() {
            media_uploader = wp.media({
                frame: "post",
                state: "insert",
                multiple: true
            });
            media_uploader.on("insert", function() {

                var length = media_uploader.state().get("selection").length;
                var images = media_uploader.state().get("selection").models

                for (var i = 0; i < length; i++) {
                    var image_url = images[i].changed.url;
                    var box = jQuery('#master_box').html();
                    jQuery(box).appendTo('#img_box_container');
                    var element = jQuery('#img_box_container .gallery_single_row:last-child').find('.image_container');
                    var html = '<img class="gallery_img_img" src="' + image_url + '" height="55" width="55" onclick="open_media_uploader_image_this(this)"/>';
                    element.append(html);
                    element.find('.meta_image_url').val(image_url);
                    console.log(image_url);
                }
            });
            media_uploader.open();
        }
        jQuery(function() {
            jQuery("#img_box_container").sortable();
        });
    </script>
<?php
}
add_action('admin_head-post.php', 'property_gallery_styles_scripts');
add_action('admin_head-post-new.php', 'property_gallery_styles_scripts');

function property_gallery_save($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    $is_autosave = wp_is_post_autosave($post_id);
    $is_revision = wp_is_post_revision($post_id);
    $is_valid_nonce = isset($_POST['sample_nonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['sample_nonce'])), basename(__FILE__));

    if ($is_autosave || $is_revision || !$is_valid_nonce) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) !== 'jewelery') {
        return;
    }

    if (isset($_POST['gallery']) && is_array($_POST['gallery']) && isset($_POST['gallery']['image_url']) && is_array($_POST['gallery']['image_url'])) {

        // Build array for saving post meta
        $gallery_data = array();
        for ($i = 0; $i < min(30, count($_POST['gallery']['image_url'])); $i++) {
            if (is_scalar($_POST['gallery']['image_url'][$i])) {
                $url = esc_url_raw(wp_unslash($_POST['gallery']['image_url'][$i]));
                if ($url) $gallery_data['image_url'][] = $url;
            }
        }

        if ($gallery_data)
            update_post_meta($post_id, 'gallery_data', $gallery_data);
        else
            delete_post_meta($post_id, 'gallery_data');
    }
    // Nothing received, all fields are empty, delete option
    else {
        delete_post_meta($post_id, 'gallery_data');
    }
}
add_action('save_post', 'property_gallery_save');


// Create middle image for single jewelery

add_action('add_meta_boxes', 'listing_image_add_metabox');
function listing_image_add_metabox()
{
    add_meta_box('listingimagediv', __('Middle Image', 'text-domain'), 'listing_image_metabox', 'jewelery', 'side', 'low');
}

function listing_image_metabox($post)
{
    wp_nonce_field('jewp_listing_image_' . $post->ID, 'jewp_listing_image_nonce');
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta($post->ID, '_listing_image_id', true);

    $old_content_width = $content_width;
    $content_width = 254;

    if ($image_id && get_post($image_id)) {

        if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
            $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
        } else {
            $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
        }

        if (!empty($thumbnail_html)) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_listing_image_button" >' . esc_html__('Remove Middle image', 'text-domain') . '</a></p>';
            $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="' . esc_attr($image_id) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__('Set listing image', 'text-domain') . '" href="javascript:;" id="upload_listing_image_button" id="set-listing-image" data-uploader_title="' . esc_attr__('Choose an image', 'text-domain') . '" data-uploader_button_text="' . esc_attr__('Set Middle image', 'text-domain') . '">' . esc_html__('Set Middle image', 'text-domain') . '</a></p>';
        $content .= '<input type="hidden" id="upload_listing_image" name="_listing_cover_image" value="" />';
    }

    echo $content;
}

add_action('save_post', 'listing_image_save', 10, 1);
function listing_image_save($post_id)
{
    if (get_post_type($post_id) !== 'jewelery' || !current_user_can('edit_post', $post_id) || wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) return;
    if (!isset($_POST['jewp_listing_image_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['jewp_listing_image_nonce'])), 'jewp_listing_image_' . $post_id)) return;
    if (isset($_POST['_listing_cover_image'])) {
        $image_id = absint($_POST['_listing_cover_image']);
        if ($image_id && get_post_type($image_id) !== 'attachment') return;
        update_post_meta($post_id, '_listing_image_id', $image_id);
    }
}



add_action('add_meta_boxes', 'mobile_image_add_metabox');

function mobile_image_add_metabox()
{
    add_meta_box('mobileimagediv', __('Mobile Image', 'text-domain'), 'mobile_image_metabox', 'jewelery', 'side', 'low');
}

function mobile_image_metabox($post)
{
    wp_nonce_field('jewp_mobile_image_' . $post->ID, 'jewp_mobile_image_nonce');
    global $content_width, $_wp_additional_image_sizes;

    $image_id = get_post_meta($post->ID, '_mobile_image_id', true);

    $old_content_width = $content_width;
    $content_width = 254;

    if ($image_id && get_post($image_id)) {

        if (!isset($_wp_additional_image_sizes['post-thumbnail'])) {
            $thumbnail_html = wp_get_attachment_image($image_id, array($content_width, $content_width));
        } else {
            $thumbnail_html = wp_get_attachment_image($image_id, 'post-thumbnail');
        }

        if (!empty($thumbnail_html)) {
            $content = $thumbnail_html;
            $content .= '<p class="hide-if-no-js"><a href="javascript:;" id="remove_mobile_image_button" class="remove_image_button" data-field_id="upload_mobile_image">' . esc_html__('Remove Mobile image', 'text-domain') . '</a></p>';
            $content .= '<input type="hidden" id="upload_mobile_image" name="_mobile_cover_image" value="' . esc_attr($image_id) . '" />';
        }

        $content_width = $old_content_width;
    } else {

        $content = '<img src="" id="upload_mobile_image_preview" style="width:' . esc_attr($content_width) . 'px;height:auto;border:0;display:none;" />';
        $content .= '<p class="hide-if-no-js"><a title="' . esc_attr__('Set mobile image', 'text-domain') . '" href="javascript:;" id="upload_mobile_image_button" class="upload_image_button" data-uploader_title="' . esc_attr__('Choose an image', 'text-domain') . '" data-uploader_button_text="' . esc_attr__('Set Mobile image', 'text-domain') . '">' . esc_html__('Set Mobile image', 'text-domain') . '</a></p>';
        $content .= '<input type="hidden" id="upload_mobile_image" name="_mobile_cover_image" value="" />';
    }

    echo $content;
}


add_action('save_post', 'mobile_image_save', 10, 1);
function mobile_image_save($post_id)
{
    if (get_post_type($post_id) !== 'jewelery' || !current_user_can('edit_post', $post_id) || wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) return;
    if (!isset($_POST['jewp_mobile_image_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['jewp_mobile_image_nonce'])), 'jewp_mobile_image_' . $post_id)) return;
    if (isset($_POST['_mobile_cover_image'])) {
        $image_id = absint($_POST['_mobile_cover_image']);
        if ($image_id && get_post_type($image_id) !== 'attachment') return;
        update_post_meta($post_id, '_mobile_image_id', $image_id);
    }
}
