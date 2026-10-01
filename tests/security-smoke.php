<?php
/** Run with `php tests/security-smoke.php`; small WordPress-boundary behavior checks. */
const MINUTE_IN_SECONDS = 60;
class AjaxResult extends Exception
{
    public $body;
    public $status;
    public function __construct($body, $status) { $this->body = $body; $this->status = $status; }
}
class FakeDb
{
    public $prefix = 'wp_';
    public $prepared = array();
    public $inserted = array();
    public $existing = null;
    public function prepare($query, ...$args) { $this->prepared = array($query, $args); return $query; }
    public function get_var($query) { return $this->existing; }
    public function insert($table, $row, $formats) { $this->inserted = array($table, $row, $formats); return 1; }
}
$wpdb = new FakeDb();
$state = array('logged_in' => false, 'user_id' => 0, 'can_register' => false, 'can_admin' => false, 'nonce' => true, 'meta' => array(), 'updates' => array(), 'reset_calls' => 0, 'transients' => array());
function add_action($hook, $callback) { $GLOBALS['hooks'][$hook] = $callback; }
function wp_send_json($body, $status = 200) { throw new AjaxResult($body, $status); }
function wp_verify_nonce($value, $action) { return $value === 'valid'; }
function wp_unslash($value) { return is_string($value) ? stripslashes($value) : $value; }
function sanitize_text_field($value) { return trim(strip_tags((string) $value)); }
function sanitize_email($value) { return filter_var((string) $value, FILTER_SANITIZE_EMAIL); }
function is_email($value) { return (bool) filter_var($value, FILTER_VALIDATE_EMAIL); }
function is_user_logged_in() { return $GLOBALS['state']['logged_in']; }
function get_current_user_id() { return $GLOBALS['state']['user_id']; }
function wp_update_user($data) { $GLOBALS['state']['updates'][] = $data; return $data['ID']; }
function is_wp_error($value) { return false; }
function update_user_meta($id, $key, $value) { $GLOBALS['state']['meta'][$id][$key] = $value; }
function get_user_meta($id, $key, $single) { return $GLOBALS['state']['meta'][$id][$key] ?? array(); }
function get_post_type($id) { return $id === 7 ? 'jewelery' : 'page'; }
function get_post_status($id) { return $id === 7 ? 'publish' : 'draft'; }
function absint($value) { return abs((int) $value); }
function get_option($name) { return $name === 'users_can_register' ? $GLOBALS['state']['can_register'] : null; }
function get_transient($key) { return $GLOBALS['state']['transients'][$key] ?? false; }
function set_transient($key, $value, $seconds) { $GLOBALS['state']['transients'][$key] = $value; }
function retrieve_password($email) { $GLOBALS['state']['reset_calls']++; return true; }
function wp_timezone() { return new DateTimeZone('UTC'); }
function current_user_can($capability) { return $GLOBALS['state']['can_admin']; }
function wp_die($message, $title = '', $args = array()) { throw new AjaxResult(array('success' => false), $args['response'] ?? 500); }
function check_admin_referer($action) { if (($_POST['_wpnonce'] ?? '') !== 'valid') wp_die('Invalid nonce.', '', array('response' => 403)); }

require dirname(__DIR__) . '/inc/ajax/ajax-loader.php';
require dirname(__DIR__) . '/inc/contact-form/ajax.php';
require dirname(__DIR__) . '/inc/contact-form/contact-form.php';

function check_case($label, $callback, $expected_status, $expected_success)
{
    try { $callback(); throw new Exception($label . ': handler returned without JSON'); }
    catch (AjaxResult $result) {
        if ($result->status !== $expected_status || ($result->body['success'] ?? null) !== $expected_success) {
            throw new Exception($label . ': unexpected response ' . json_encode($result->body) . ' (' . $result->status . ')');
        }
    }
    echo "PASS $label\n";
}

$_POST = array('update_user_profile_nonce' => 'valid', 'email' => 'test@example.org', 'user_id' => '999');
check_case('anonymous profile blocked', 'update_user_profile', 403, false);
$state['logged_in'] = true; $state['user_id'] = 5;
$_POST['update_user_profile_nonce'] = 'bad';
check_case('profile invalid nonce blocked', 'update_user_profile', 403, false);
$_POST['update_user_profile_nonce'] = 'valid';
check_case('own profile succeeds', 'update_user_profile', 200, true);
if ($state['updates'][0]['ID'] !== 5) throw new Exception('Manipulated user ID was accepted');

$_POST = array('product_id' => 7);
check_case('wishlist missing nonce blocked', 'handle_like_button_click', 403, false);
$_POST['wishlist_nonce'] = 'valid'; $_POST['product_id'] = 8;
check_case('wishlist invalid object blocked', 'handle_like_button_click', 400, false);
$_POST['product_id'] = 7;
try { handle_like_button_click(); } catch (AjaxResult $result) { if ($result->body !== 'added') throw new Exception('Wishlist update failed'); }
echo "PASS own wishlist succeeds\n";

$_POST = array('userEmail' => 'unknown@example.org');
check_case('reset missing nonce blocked', 'forgot_password_ajax', 403, false);
$_POST['reset_nonce'] = 'valid';
check_case('reset response is generic', 'forgot_password_ajax', 200, true);
check_case('reset throttles repeat', 'forgot_password_ajax', 200, true);
if ($state['reset_calls'] !== 1) throw new Exception('Reset rate limit failed');

$_POST = array('reg-security' => 'valid', 'user_email' => 'new@example.org', 'user_password' => 'long-enough-password');
check_case('registration setting enforced', 'custom_user_registration', 403, false);

$_POST = array('name_of_nonce_field' => 'bad');
check_case('appointment invalid nonce blocked', 'jewp_submit_appointment', 403, false);
$_POST = array('name_of_nonce_field' => 'valid', 'name' => 'Guest', 'location' => 'Dubai', 'product' => 'Ring', 'phone' => "12345' OR 1=1", 'Appointment' => date('Y/m/d'));
check_case('appointment SQL-shaped phone rejected', 'jewp_submit_appointment', 400, false);
$_POST['phone'] = '1234567890'; $_POST['Appointment'] = '2026/99/99';
check_case('appointment invalid date rejected', 'jewp_submit_appointment', 400, false);
$_POST['Appointment'] = (new DateTimeImmutable('today', wp_timezone()))->format('Y/m/d');
check_case('appointment succeeds', 'jewp_submit_appointment', 200, true);
if (strpos($wpdb->prepared[0], '%s') === false || $wpdb->inserted[1]['mobile'] !== '1234567890') throw new Exception('Appointment query/insert was not parameterized');

if (isset($GLOBALS['hooks']['wp_ajax_nopriv_update_user_profile']) || isset($GLOBALS['hooks']['wp_ajax_nopriv_handle_like_button_click']) || isset($GLOBALS['hooks']['wp_ajax_nopriv_jewp_handle_image_upload'])) throw new Exception('Sensitive unauthenticated hook exists');
echo "PASS sensitive anonymous hooks absent\n";

$_POST = array('appointment_id' => 1, '_wpnonce' => 'valid');
check_case('low-privilege admin delete blocked', 'jewp_delete_appointment', 403, false);
$state['can_admin'] = true; $_POST['_wpnonce'] = 'bad';
check_case('admin delete invalid nonce blocked', 'jewp_delete_appointment', 403, false);
