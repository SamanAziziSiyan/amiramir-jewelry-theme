<?php
add_action('admin_init', 'jewp_product_theme_settings_init');


function jewp_product_setting_main_page()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    include_once 'settings.php';
}


function jewp_product_theme_settings_init()
{
    register_setting('theme_settings_group', 'theme_settings', 'theme_settings_validate');

    add_settings_section(
        'theme_settings_section',
        __('هدر صفحه اصلی', 'textdomain'),
        'jewp_theme_settings_section_callback',
        'theme-settings'
    );

    add_settings_field(
        'main_page_header_title',
        __('عنوان محصول', 'textdomain'),
        'jewp_main_page_header_title_render',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'main_page_header_link',
        __('لینک محصول', 'textdomain'),
        'jewp_main_page_header_link_render',
        'theme-settings',
        'theme_settings_section'
    );

    add_settings_field(
        'main_page_header_desc',
        __('توضیح محصول', 'textdomain'),
        'jewp_main_page_header_desc_render',
        'theme-settings',
        'theme_settings_section'
    );


    add_settings_field(
        'main_images',
        __('تصویر', 'textdomain'),
        'jewp_main_images_render',
        'theme-settings',
        'theme_settings_section'
    );

    add_settings_field(
        'main_video',
        __('ویدیو', 'textdomain'),
        'jewp_main_video_render',
        'theme-settings',
        'theme_settings_section'
    );
    add_settings_field(
        'main_video_mobile',
        __('ویدیو موبایل', 'textdomain'),
        'jewp_main_video_mobile_render',
        'theme-settings',
        'theme_settings_section'
    );
}

function jewp_theme_settings_section_callback()
{
}

function jewp_main_page_header_title_render()
{
    $options = get_option('theme_settings');
?>
    <input name="theme_settings[main_page_header_title]" value="<?php echo isset($options['main_page_header_title']) ? esc_html($options['main_page_header_title']) : ''; ?>">
<?php
}
function jewp_main_page_header_link_render()
{
    $options = get_option('theme_settings');
?>
    <input name="theme_settings[main_page_header_link]" value="<?php echo isset($options['main_page_header_link']) ? esc_html($options['main_page_header_link']) : ''; ?>">
<?php
}
function jewp_main_page_header_desc_render()
{
    $options = get_option('theme_settings');
?>
    <textarea style="resize: none;" name="theme_settings[main_page_header_desc]" rows="5" cols="50"><?php echo isset($options['main_page_header_desc']) ? esc_textarea($options['main_page_header_desc']) : ''; ?></textarea>
    <textarea style="resize: none;" name="theme_settings[main_page_header_desc_short]" rows="5" cols="10"><?php echo isset($options['main_page_header_desc_short']) ? esc_textarea($options['main_page_header_desc_short']) : ''; ?></textarea>
<?php
}

function jewp_main_images_render()
{
    $options = get_option('theme_settings');
?>
    <input type="file" name="main_images[]" id="main_images" multiple onchange="previewImages()" />
    <label for="">ابعاد پیشنهادی 1080*1920</label>
    <div id="image_preview_container" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
    <?php
    if (isset($options['main_images']) && !empty($options['main_images'])) {
        foreach ($options['main_images'] as $image) {
            echo '<div style="margin-right: 10px;"><img src="' . esc_url($image) . '" style="max-width:150px;"></div>';
        }
    }
}


function jewp_main_video_render()
{
    $options = get_option('theme_settings');
    ?>
    <input type="file" name="main_video" id="main_video" onchange="previewVideo()" />
    <label for="">ابعاد پیشنهادی 1080*1920</label>
    <div id="video_preview_container"></div>
    <?php
    if (isset($options['main_video'])) {
        echo '<div><video width="320" height="240" controls><source src="' . esc_url($options['main_video']) . '" type="video/mp4"></video></div>';
    }
}
function jewp_main_video_mobile_render()
{
    $options = get_option('theme_settings');
    ?>
    <input type="file" name="main_video_mobile" id="main_video_mobile" onchange="previewVideo()" />
    <label for="">ابعاد پیشنهادی 1080*600</label>
    <div id="video_preview_container"></div>
    <?php
    if (isset($options['main_video_mobile'])) {
        echo '<div><video width="320" height="240" controls><source src="' . esc_url($options['main_video_mobile']) . '" type="video/mp4"></video></div>';
    }
}

function jewp_theme_settings_validate($input)
{
    $options = get_option('theme_settings');

    if (isset($input['main_page_header_title'])) {
        $options['main_page_header_title'] = sanitize_textarea_field($input['main_page_header_title']);
    }
    if (isset($input['main_page_header_link'])) {
        $options['main_page_header_link'] = sanitize_textarea_field($input['main_page_header_link']);
    }
    if (isset($input['main_page_header_desc'])) {
        $options['main_page_header_desc'] = sanitize_textarea_field($input['main_page_header_desc']);
    }
    if (isset($input['main_page_header_desc_short'])) {
        $options['main_page_header_desc_short'] = sanitize_textarea_field($input['main_page_header_desc_short']);
    }

    if (!empty($_FILES['main_images']['name'][0])) {
        foreach ($_FILES['main_images']['name'] as $key => $value) {
            if ($_FILES['main_images']['name'][$key]) {
                $file = array(
                    'name' => $_FILES['main_images']['name'][$key],
                    'type' => $_FILES['main_images']['type'][$key],
                    'tmp_name' => $_FILES['main_images']['tmp_name'][$key],
                    'error' => $_FILES['main_images']['error'][$key],
                    'size' => $_FILES['main_images']['size'][$key]
                );
                $_FILES = array("upload_attachment" => $file);
                $attachment_id = media_handle_upload("upload_attachment", 0);
                if (is_wp_error($attachment_id)) {
                    continue;
                }
                $image_url = wp_get_attachment_url($attachment_id);
                $options['main_images'][] = $image_url;
            }
        }
    }


    if (!empty($_FILES['main_video']['name'])) {
        $file = array(
            'name' => $_FILES['main_video']['name'],
            'type' => $_FILES['main_video']['type'],
            'tmp_name' => $_FILES['main_video']['tmp_name'],
            'error' => $_FILES['main_video']['error'],
            'size' => $_FILES['main_video']['size']
        );
        $_FILES = array("upload_attachment" => $file);
        $attachment_id = media_handle_upload("upload_attachment", 0);
        if (!is_wp_error($attachment_id)) {
            $options['main_video'] = wp_get_attachment_url($attachment_id);
        }
    }

    if (!empty($_FILES['main_video_mobile']['name'])) {
        $file = array(
            'name' => $_FILES['main_video_mobile']['name'],
            'type' => $_FILES['main_video_mobile']['type'],
            'tmp_name' => $_FILES['main_video_mobile']['tmp_name'],
            'error' => $_FILES['main_video_mobile']['error'],
            'size' => $_FILES['main_video_mobile']['size']
        );
        $_FILES = array("upload_attachment" => $file);
        $attachment_id = media_handle_upload("upload_attachment", 0);
        if (!is_wp_error($attachment_id)) {
            $options['main_video_mobile'] = wp_get_attachment_url($attachment_id);
        }
    }

    return $options;
}
