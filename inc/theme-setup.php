<?php

/**
 * jeweleryTemplate's theme setup and definitions
 *
 * @package jeweleryTemplate theme setup
 * @since jeweleryTemplate 1.0
 */

// namespace jewp_theme;

if (!function_exists('jewp_theme_setup')) {

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function jewp_theme_setup()
	{
		load_theme_textdomain('jeweleryTemplate', get_template_directory() . '/languages');

		//ADD THUMB YO THEME
		add_theme_support('post-thumbnails');
		//ADD THUMB YO THEME
		add_theme_support('widgets');
		//CROP UPLOAD IMAGE
		add_image_size('my-size', '200', '200', array('center', 'center'));
		//ADD NAVWALKER MENU CLASS
		add_theme_support('woocommerce');
		date_default_timezone_set("Asia/Tehran");
		add_theme_support('automatic-feed-links');;
		register_nav_menus(
			array(
				'primary'   => __('منوی اصلی', 'jeweleryTemplate'),
				'secondary' => __('منوی ثانویه', 'jeweleryTemplate'),
			)
		);

		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
	}
}

add_action('after_setup_theme', 'jewp_theme_setup');

// Disable block editor for all posts
add_filter('use_block_editor_for_post', '__return_false');

// Enable admin bar only for administrators
if (!current_user_can('administrator')) {
	add_filter('show_admin_bar', '__return_false');
}
