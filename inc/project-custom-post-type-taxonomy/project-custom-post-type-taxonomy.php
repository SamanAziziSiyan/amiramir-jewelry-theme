<?php
function jewp_register_jewelery_post_type()
{
    $labels = array(
        'name'                  => 'jewelery',
        'singular_name'         => 'jewelery',
        'menu_name'             => 'jewelery',
        'name_admin_bar'        => 'jewelery',
        'add_new'               => 'add new jewelery',
        'add_new_item'          =>  'اضافه کردن مطلب جدید',
        'new_item'              => 'New Jewelery',
        'edit_item'             => 'Edit Jewelery',
        'view_item'             => 'view',
        'all_items'             => 'all Jeweleries',
        'search_items'          => 'search',
        'parent_item_colon'     => 'post parent:',
        'not_found'             => 'no Post Found.',
        'not_found_in_trash'    => 'No post Found in trash.',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    =>  'Select Featured Image',
        'remove_featured_image' => 'remove Featured Image',
        'use_featured_image'    => 'use as Featured Image',
        'archives'              => 'jew Archive',
        'insert_into_item'      => 'add to jew',
        'uploaded_to_this_item' => 'Upload',
        'filter_items_list'     => 'Filter Jewes',
        'items_list_navigation' => 'پیمایش لیست مطالب',
        'items_list'            => 'jewelery list'
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'jewelery'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => null,
        /*'taxonomies'=>['category','post_tag'],*/
        'supports'           => array('title', 'editor', 'author', 'excerpt', 'comments', 'thumbnail'),
    );

    register_post_type('jewelery', $args);
}
function jewp_register_jewelery_taxonomy()
{
    $labels = array(
        'name'              => 'categories',
        'singular_name'     => 'category',
        'search_items'      => 'search categories',
        'all_items'         => 'all categories',
        'parent_item'       => 'category parent item',
        'parent_item_colon' => 'والد دسته بندی',
        'edit_item'         => 'edit category',
        'update_item'       => 'update category',
        'add_new_item'      => 'add new category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'categories',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'jewelerys'),
    );
    register_taxonomy('jewelery-cat', 'jewelery', $args);
    unset($args);
    unset($labels);
    $labels = array(
        'name'              => 'tags',
        'singular_name'     => 'tag',
        'all_items'         => 'all Tags',
        'parent_item'       => 'tags Parent Item',
        'parent_item_colon' => 'tag parent',
        'edit_item'         => 'edit tag',
        'update_item'       => 'update tag',
        'add_new_item'      => 'add new tag',
        'new_item_name'     => 'New tag name',
        'menu_name'         => 'tags',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'jewelery-tag'),
    );

    register_taxonomy('jewelery-tag', 'jewelery', $args);
}
add_action('init', 'jewp_register_jewelery_taxonomy');
add_action('init', 'jewp_register_jewelery_post_type');
