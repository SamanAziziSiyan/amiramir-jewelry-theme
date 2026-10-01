<?php

// Rewrite rules are refreshed on theme activation, not on every request.
add_action('after_switch_theme', 'jewp_refresh_rewrites');
function jewp_refresh_rewrites()
{
    flush_rewrite_rules();
}


function jewp_get_post_tags($limit = 10)
{
    $post_tags = get_the_tags();
    return $post_tags;
}


// Add custom field for category image to 'jewelry' custom post type
function add_category_image_field()
{
    add_action('jewelery-cat_add_form_fields', 'category_image_field');
    add_action('jewelery-cat_edit_form_fields', 'category_image_field');
    add_action('edited_jewelery-cat', 'save_category_image_meta_box');
    add_action('create_jewelery-cat', 'save_category_image_meta_box');
}
add_action('init', 'add_category_image_field');

function category_image_field($tag)
{
    $tag = get_queried_object(); // This assumes you are using this within a taxonomy template or on a term archive page.
    $category_image = ''; // Initialize $category_image variable

    if ($tag instanceof WP_Term) { // Check if $tag is an instance of WP_Term to ensure it's a term object.
        $category_image = get_term_meta($tag->term_id, 'category_image', true);
        // Proceed with the rest of your code using $category_image.
    } ?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="category_image"><?php _e('Category Image', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="text" name="category_image" id="category_image" value="<?php echo esc_attr($category_image); ?>" class="regular-text" />
            <?php wp_nonce_field('jewp_category_image', 'jewp_category_image_nonce'); ?>
            <button class="button button-secondary" id="category_image_button"><?php _e('Select Image', 'textdomain'); ?></button>
            <p class="description"><?php _e('Enter the URL of the category image or use the media uploader.', 'textdomain'); ?></p>
        </td>
    </tr>
    <script>
        jQuery(document).ready(function($) {
            var frame;

            $('#category_image_button').on('click', function(e) {
                e.preventDefault();

                // If the media frame already exists, reopen it.
                if (frame) {
                    frame.open();
                    return;
                }

                // Create a new media frame.
                frame = wp.media({
                    title: 'Select or Upload Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                // When an image is selected in the media frame...
                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    $('#category_image').val(attachment.url);
                });

                // Finally, open the modal.
                frame.open();
            });
        });
    </script>
<?php
}

function save_category_image_meta_box($term_id)
{
    if (!current_user_can('edit_term', $term_id) || !isset($_POST['jewp_category_image_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['jewp_category_image_nonce'])), 'jewp_category_image')) return;
    if (isset($_POST['category_image']) && is_scalar($_POST['category_image'])) {
        update_term_meta($term_id, 'category_image', esc_url_raw(wp_unslash($_POST['category_image'])));
    }
}



//DEFAULT IMAGE FOR POSTS
function jewp_default_jew_thumbnail(): string
{
    $thumb_logo = get_template_directory_uri() . '/assets/images/placeholder.svg';
    return $thumb_logo;
}

//GET POST THUMBNAIL
function jewp_jew_thumbnail()
{

    if (has_post_thumbnail()) {
        return esc_url(get_the_post_thumbnail_url());
    } else {
        return jewp_default_jew_thumbnail();
    }
}


function jewp_jew_first_gallery_image($post_id)
{
    $postData = get_post_meta($post_id);
    $first_image_url = '';
    // Check if the key 'gallery_data' exists in $postData
    if (isset($postData['gallery_data'])) {
        $photos_array = get_post_meta($post_id, 'gallery_data', true);

        // Check if 'image_url' key exists in $photos_array and if it's an array
        if (isset($photos_array['image_url']) && is_array($photos_array['image_url'])) {
            // Get the array of image URLs
            $url_array = $photos_array['image_url'];

            // Check if there are any images in the array
            if (!empty($url_array)) {
                // Get the first image URL
                $first_image_url = $url_array[0];
            }
        }
    }
    return esc_url($first_image_url);
}
function jewp_get_page_url_by_template($template_name)
{
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => $template_name
    ));

    if (!empty($pages)) {
        // Assuming the first page found with the specified template is the one you want
        $first_page = $pages[0];
        return get_permalink($first_page->ID);
    }

    return false; // Return false if no pages are found with the specified template
}


function jewp_shortTitle()
{
    $title = get_the_title();
    $title = trim($title);
    $limited_title = (strlen($title) > 10) ? substr($title, 0, 10)  . "..." : $title;
    return $limited_title;
}
