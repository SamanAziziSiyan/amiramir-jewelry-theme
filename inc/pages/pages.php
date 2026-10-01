<?php
// Create a new page with a location template
function create_location_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'Location';
    $template_name = 'Location.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_location_page_with_template');

// Create a new page with a index template
function create_index_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'main page';
    $template_name = 'index.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_index_page_with_template');


// Create a new page with a index template
function create_category_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'jewelery';
    $template_name = 'category-jewelery.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_category_page_with_template');


// Create a new page with a index template
function create_house_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'The House';
    $template_name = 'House.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
             'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_house_page_with_template');


// Create a new page with a index template
function create_collection_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'The collection';
    $template_name = 'Collection.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_collection_page_with_template');



// Create a new page with a index template
function create_high_jewelery_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'High Jewelery';
    $template_name = 'High-jewelery.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_high_jewelery_page_with_template');




// Create a new page with a index template
function create_high_jewelery_single_1_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'High Jewelery Single Page';
    $template_name = 'High-jewelery-single.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_high_jewelery_single_1_page_with_template');


// Create a new page with a index template
function create_high_jewelery_single_2_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'High Jewelery Single Page 2';
    $template_name = 'High-jewelery-single-2.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_high_jewelery_single_2_page_with_template');


// Create a new page with a index template
function create_high_jewelery_single_3_page_with_template()
{
    // Set the page content, title, and template name
    $page_content = '';
    $page_title = 'High Jewelery Single Page 3';
    $template_name = 'High-jewelery-single-3.php'; // Change this to your template file name

    // Check if the page already exists
    $existing_page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

    if ($existing_page === null) {
        // Prepare the page data
        $page_data = array(
            'post_content'   => $page_content,
            'post_title'     => $page_title,
            'post_status'    => 'publish',
            'post_type'      => 'page',
            'page_template'  => $template_name,
        );

        // Insert the page into the database
        $page_id = wp_insert_post($page_data);

        // Check if the page was created successfully
        if ($page_id) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Hook the function to an action or run it directly
// For example, you can use the 'init' action to run this function when WordPress initializes
add_action('init', 'create_high_jewelery_single_3_page_with_template');