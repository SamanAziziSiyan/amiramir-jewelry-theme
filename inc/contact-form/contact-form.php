<?php
/** Administrator-only appointment list and deletion. */
add_action('admin_menu', 'jewp_register_appointments_admin');
add_action('admin_post_jewp_delete_appointment', 'jewp_delete_appointment');

function jewp_register_appointments_admin()
{
    add_menu_page('Appointments', 'Appointments', 'manage_options', 'jewp-appointments', 'jewp_appointments_admin_page', 'dashicons-calendar', 30);
}

function jewp_delete_appointment()
{
    if (!current_user_can('manage_options')) wp_die('Not authorized.', '', array('response' => 403));
    $id = isset($_POST['appointment_id']) ? absint($_POST['appointment_id']) : 0;
    check_admin_referer('jewp_delete_appointment_' . $id);
    if ($id) {
        global $wpdb;
        $wpdb->delete($wpdb->prefix . 'appointment', array('id' => $id), array('%d'));
    }
    wp_safe_redirect(admin_url('admin.php?page=jewp-appointments'));
    exit;
}

function jewp_appointments_admin_page()
{
    if (!current_user_can('manage_options')) wp_die('Not authorized.', '', array('response' => 403));
    global $wpdb;
    $table = $wpdb->prefix . 'appointment';
    $page = isset($_GET['paged']) ? max(1, absint($_GET['paged'])) : 1;
    $rows = $wpdb->get_results($wpdb->prepare("SELECT id, name, location, product, mobile, created_at FROM `$table` ORDER BY id DESC LIMIT %d OFFSET %d", 20, ($page - 1) * 20), ARRAY_A);
    echo '<div class="wrap"><h1>Appointments</h1><table class="widefat striped"><thead><tr><th>ID</th><th>Name</th><th>Location</th><th>Product</th><th>Phone</th><th>Date</th><th>Action</th></tr></thead><tbody>';
    foreach ($rows as $row) {
        $id = absint($row['id']);
        echo '<tr><td>' . esc_html((string) $id) . '</td><td>' . esc_html($row['name']) . '</td><td>' . esc_html($row['location']) . '</td><td>' . esc_html($row['product']) . '</td><td>' . esc_html($row['mobile']) . '</td><td>' . esc_html($row['created_at']) . '</td><td>';
        echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '"><input type="hidden" name="action" value="jewp_delete_appointment"><input type="hidden" name="appointment_id" value="' . esc_attr((string) $id) . '">';
        wp_nonce_field('jewp_delete_appointment_' . $id);
        echo '<button class="button" type="submit">Delete</button></form></td></tr>';
    }
    echo '</tbody></table></div>';
}
