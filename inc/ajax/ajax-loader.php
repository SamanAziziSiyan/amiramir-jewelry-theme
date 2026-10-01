<?php
/** WordPress AJAX endpoints retained and hardened for the public theme export. */

function jewp_ajax_reply($success, $message, $status = 200)
{
    wp_send_json(array('success' => (bool) $success, 'message' => $message), $status);
}

function jewp_ajax_nonce($field, $action)
{
    return isset($_POST[$field]) && is_scalar($_POST[$field]) && wp_verify_nonce(sanitize_text_field(wp_unslash($_POST[$field])), $action);
}

function jewp_ajax_text($key)
{
    return isset($_POST[$key]) && is_scalar($_POST[$key]) ? sanitize_text_field(wp_unslash($_POST[$key])) : '';
}

function update_user_profile()
{
    if (!is_user_logged_in()) jewp_ajax_reply(false, 'Sign in to update your profile.', 403);
    if (!jewp_ajax_nonce('update_user_profile_nonce', 'update_user_profile_nonce')) jewp_ajax_reply(false, 'The form has expired.', 403);
    $user_id = get_current_user_id();
    if (!$user_id) jewp_ajax_reply(false, 'Sign in to update your profile.', 403);
    $email = sanitize_email(jewp_ajax_text('email'));
    if (!$email || !is_email($email)) jewp_ajax_reply(false, 'Enter a valid email address.', 400);
    $birthday = jewp_ajax_text('birthday');
    if ($birthday !== '' && strlen($birthday) > 30) jewp_ajax_reply(false, 'Invalid birthday.', 400);
    $result = wp_update_user(array(
        'ID' => $user_id,
        'first_name' => jewp_ajax_text('first_name'),
        'last_name' => jewp_ajax_text('second_name'),
        'user_email' => $email,
    ));
    if (is_wp_error($result)) jewp_ajax_reply(false, 'Could not update the profile.', 400);
    update_user_meta($user_id, 'phone_number', jewp_ajax_text('phone_number'));
    update_user_meta($user_id, 'birthday', $birthday);
    jewp_ajax_reply(true, 'Profile updated.');
}
add_action('wp_ajax_update_user_profile', 'update_user_profile');

function handle_like_button_click()
{
    if (!is_user_logged_in()) jewp_ajax_reply(false, 'Sign in to use the wishlist.', 403);
    if (!jewp_ajax_nonce('wishlist_nonce', 'jewp_wishlist')) jewp_ajax_reply(false, 'The request has expired.', 403);
    $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    if (!$product_id || get_post_type($product_id) !== 'jewelery' || get_post_status($product_id) !== 'publish') jewp_ajax_reply(false, 'Invalid item.', 400);
    $user_id = get_current_user_id();
    $wishlist = get_user_meta($user_id, 'wishlist', true);
    $wishlist = is_array($wishlist) ? array_values(array_unique(array_map('absint', $wishlist))) : array();
    $index = array_search($product_id, $wishlist, true);
    if ($index === false) {
        $wishlist[] = $product_id;
        $result = 'added';
    } else {
        unset($wishlist[$index]);
        $result = 'removed';
    }
    update_user_meta($user_id, 'wishlist', array_values($wishlist));
    wp_send_json($result);
}
add_action('wp_ajax_handle_like_button_click', 'handle_like_button_click');

function custom_user_login()
{
    if (!jewp_ajax_nonce('log-security', 'ajax-login-nonce')) jewp_ajax_reply(false, 'The form has expired.', 403);
    $login = jewp_ajax_text('log');
    $password = isset($_POST['pwd']) && is_scalar($_POST['pwd']) ? (string) wp_unslash($_POST['pwd']) : '';
    if ($login === '' || $password === '') jewp_ajax_reply(false, 'Enter your credentials.', 400);
    $user = wp_signon(array('user_login' => $login, 'user_password' => $password, 'remember' => true), is_ssl());
    if (is_wp_error($user)) jewp_ajax_reply(false, 'Invalid credentials.', 401);
    jewp_ajax_reply(true, 'Login successful.');
}
add_action('wp_ajax_custom_user_login', 'custom_user_login');
add_action('wp_ajax_nopriv_custom_user_login', 'custom_user_login');

function custom_user_registration()
{
    if (!jewp_ajax_nonce('reg-security', 'ajax-register-nonce')) jewp_ajax_reply(false, 'The form has expired.', 403);
    $email = sanitize_email(jewp_ajax_text('user_email'));
    $password = isset($_POST['user_password']) && is_scalar($_POST['user_password']) ? (string) wp_unslash($_POST['user_password']) : '';
    if (!is_email($email) || strlen($password) < 12 || strlen($password) > 128) jewp_ajax_reply(false, 'Enter a valid email and a password of at least 12 characters.', 400);
    if (!get_option('users_can_register')) jewp_ajax_reply(false, 'Registration is unavailable.', 403);
    if (email_exists($email) || username_exists($email)) jewp_ajax_reply(false, 'Could not create an account with these details.', 409);
    $user_id = wp_create_user($email, $password, $email);
    if (is_wp_error($user_id)) jewp_ajax_reply(false, 'Could not create an account with these details.', 400);
    wp_update_user(array('ID' => $user_id, 'first_name' => jewp_ajax_text('first_name'), 'last_name' => jewp_ajax_text('second_name')));
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id, true, is_ssl());
    jewp_ajax_reply(true, 'Registration successful.');
}
add_action('wp_ajax_custom_user_registration', 'custom_user_registration');
add_action('wp_ajax_nopriv_custom_user_registration', 'custom_user_registration');

function search_functionality()
{
    $term = jewp_ajax_text('search_query');
    if (strlen($term) > 100) wp_send_json(array('error' => 'Search is too long.'), 400);
    if (strlen($term) < 2) wp_send_json(array());
    $query = new WP_Query(array('s' => $term, 'post_type' => array('page', 'jewelery'), 'post_status' => 'publish', 'posts_per_page' => 10));
    $results = array();
    while ($query->have_posts()) {
        $query->the_post();
        $results[] = array(
            'title' => wp_strip_all_tags(get_the_title()),
            'thumbnail' => has_post_thumbnail() ? esc_url_raw(get_the_post_thumbnail_url()) : esc_url_raw(get_template_directory_uri() . '/assets/images/placeholder.svg'),
            'permalink' => esc_url_raw(get_permalink()),
            'type' => get_post_type(),
        );
    }
    wp_reset_postdata();
    wp_send_json($results);
}
add_action('wp_ajax_search_functionality', 'search_functionality');
add_action('wp_ajax_nopriv_search_functionality', 'search_functionality');

function forgot_password_ajax()
{
    if (!jewp_ajax_nonce('reset_nonce', 'jewp_reset_password')) jewp_ajax_reply(false, 'The request has expired.', 403);
    $email = sanitize_email(jewp_ajax_text('userEmail'));
    if (!is_email($email)) jewp_ajax_reply(false, 'Enter a valid email address.', 400);
    $rate_key = 'jewp_reset_' . hash('sha256', strtolower($email));
    if (!get_transient($rate_key)) {
        set_transient($rate_key, 1, MINUTE_IN_SECONDS);
        // WordPress handles reset-token generation and email delivery.
        retrieve_password($email);
    }
    jewp_ajax_reply(true, 'If this account exists, reset instructions will be sent.');
}
add_action('wp_ajax_forgot_password_ajax', 'forgot_password_ajax');
add_action('wp_ajax_nopriv_forgot_password_ajax', 'forgot_password_ajax');
