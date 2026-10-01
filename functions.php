<?php

/**
 * jeweleryTemplate's functions and definitions
 *
 * @package jeweleryTemplate theme setup
 * @since jeweleryTemplate 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width)) {
    $content_width = 1200; /* pixels */
}


require_once 'inc/theme-assets.php';
require_once 'inc/theme-setup.php';
include_once 'inc/helper-functions.php';
include_once 'inc/Duplicate/Duplicate.php';
include_once 'inc/project-custom-post-type-taxonomy/project-custom-post-type-taxonomy.php';
include_once 'inc/polylang/polylang.php';
include_once 'inc/pages/pages.php';
include_once 'inc/meta-box/meta-box.php';
include_once 'inc/contact-form/db_table.php';

include_once 'inc/contact-form/contact-form.php';
include_once 'inc/contact-form/ajax.php';

include_once 'inc/ajax/ajax-loader.php';


// Admin Theme Settings --------------------------------
include_once 'admin/setting-menu.php';
