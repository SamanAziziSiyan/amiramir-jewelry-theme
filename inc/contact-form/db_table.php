<?php
function create_appointment_table()
{
  global $wpdb;

  $table_name = $wpdb->prefix . 'appointment';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      name VARCHAR(255) NOT NULL,
      location VARCHAR(255) NOT NULL,
      product VARCHAR(255) DEFAULT '',
      mobile VARCHAR(20) NOT NULL,
      created_at DATE NOT NULL,
      PRIMARY KEY (id)
  ) $charset_collate;";

  require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
  dbDelta($sql);
  $errors = $wpdb->last_error;
  if (!empty($errors)) {
    error_log('Error creating custom table: ' . $errors);
  }

}

// Hook the function to run on theme activation
add_action('after_switch_theme', 'create_appointment_table');
