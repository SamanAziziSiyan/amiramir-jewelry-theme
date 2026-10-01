<?php
/** Public appointment request endpoint. */
add_action('wp_ajax_custom_action', 'jewp_submit_appointment');
add_action('wp_ajax_nopriv_custom_action', 'jewp_submit_appointment');

function jewp_submit_appointment()
{
    if (!jewp_ajax_nonce('name_of_nonce_field', 'custom_action_nonce')) jewp_ajax_reply(false, 'The form has expired.', 403);
    $name = jewp_ajax_text('name');
    $location = jewp_ajax_text('location');
    $product = jewp_ajax_text('product');
    $phone = jewp_ajax_text('phone');
    $raw_date = jewp_ajax_text('Appointment');
    if ($name === '' || strlen($name) > 255 || $location === '' || strlen($location) > 255 || strlen($product) > 255 || !preg_match('/^[0-9+()\s-]{7,20}$/', $phone)) {
        jewp_ajax_reply(false, 'Please check the submitted fields.', 400);
    }
    $date = DateTimeImmutable::createFromFormat('!Y/m/d', $raw_date, wp_timezone()) ?: DateTimeImmutable::createFromFormat('!Y-m-d', $raw_date, wp_timezone());
    if (!$date || $date->format(strpos($raw_date, '/') !== false ? 'Y/m/d' : 'Y-m-d') !== $raw_date) jewp_ajax_reply(false, 'Enter a valid appointment date.', 400);
    $today = new DateTimeImmutable('today', wp_timezone());
    if ($date < $today || $date > $today->modify('+1 year')) jewp_ajax_reply(false, 'Choose a date within the next year.', 400);

    global $wpdb;
    $table = $wpdb->prefix . 'appointment';
    $date_sql = $date->format('Y-m-d');
    $existing = $wpdb->get_var($wpdb->prepare("SELECT id FROM `$table` WHERE mobile = %s AND created_at = %s LIMIT 1", $phone, $date_sql));
    if ($existing) jewp_ajax_reply(false, 'An appointment already exists for this date.', 409);
    $inserted = $wpdb->insert($table, array('name' => $name, 'location' => $location, 'product' => $product, 'mobile' => $phone, 'created_at' => $date_sql), array('%s', '%s', '%s', '%s', '%s'));
    if (!$inserted) jewp_ajax_reply(false, 'Could not save the appointment.', 500);
    jewp_ajax_reply(true, 'Appointment request received.');
}
