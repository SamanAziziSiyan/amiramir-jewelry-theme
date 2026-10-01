<?php

/**
 * jeweleryTemplate's functions and definitions
 *
 * @package jeweleryTemplate
 * @since jeweleryTemplate 1.0
 */

/**
 * Sets up theme defaults and registers support for various
 * WordPress features.
 */
function jewp_front_add_theme_scripts()
{
    wp_register_style('main-style', get_stylesheet_directory_uri() . '/style.css', '', '1.0.0');

    wp_register_style('flatpicker-style', get_stylesheet_directory_uri() . '/assets/css/flatpicker.css', '', '1.0.0');


    wp_register_style('swiper-style', get_stylesheet_directory_uri() . '/assets/css/swiper.css', '', '1.0.0');
    wp_enqueue_style('flatpicker-style');
    wp_enqueue_style('swiper-style');
    wp_enqueue_style('main-style');

    wp_register_script('main-script', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery'), '1.0.0', array(
        'in_footer' => true,
    ));

    wp_register_script('flags-script', get_stylesheet_directory_uri() . '/assets/js/flags.js', array('jquery'), '1.0.0', array(
        'in_footer' => true,
    ));


    wp_register_script('flatpicker-script', get_stylesheet_directory_uri() . '/assets/js/flatpicker.js', array('jquery'), '1.0.0', array(
        'in_footer' => true,
    ));

    wp_localize_script(
        'main-script',
        'my_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php'), 'wishlist_nonce' => wp_create_nonce('jewp_wishlist'), 'reset_nonce' => wp_create_nonce('jewp_reset_password'))
    );
    wp_enqueue_script('main-script');
    wp_register_script('swiper-script', get_template_directory_uri() . '/assets/js/swiper.js', array('jquery'), '1.0.0',  array(
        'in_footer' => true,
    ));

    wp_enqueue_script('swiper-script');
    wp_enqueue_script('flags-script');
    wp_enqueue_script('flatpicker-script');
}

function jewp_admin_add_theme_scripts()
{
    // Only enqueue styles in the admin area if needed
    //wp_enqueue_style( 'main-style' );
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }

    wp_register_style('admin-style', get_stylesheet_directory_uri() . '/assets/css/admin.css', '', '1.0.0');
    wp_enqueue_style('admin-style');
    wp_register_script('admin-script', get_stylesheet_directory_uri() . '/assets/js/admin.js', array('jquery'), '1.0.0', array(
        'in_footer' => true,
    ));

    wp_localize_script(
        'admin-script',
        'admin_ajax_object',
        array('ajax_url' => admin_url('admin-ajax.php'), 'upload_nonce' => wp_create_nonce('jewp_admin_upload'))
    );

    wp_enqueue_script('admin-script');
}


add_action('wp_enqueue_scripts', 'jewp_front_add_theme_scripts');
add_action('admin_enqueue_scripts', 'jewp_admin_add_theme_scripts');
