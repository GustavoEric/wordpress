<?php
// Register Custom Post Type
function ebooks_post_type()
{

    $labels = array(
        'name'                  => 'E-books',
        'singular_name'         => 'E-books',
        'menu_name'             => 'E-books',
        'name_admin_bar'        => 'E-books'
    );

    $args = array(
        'label'                 => 'E-books',
        'labels'                => $labels,
        'supports'              => array('title', 'custom-fields', 'excerpt', 'thumbnail'),
        'taxonomies'            => array('category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-format-aside',
        'rewrite'            => array( 'slug' => 'ebooks' ),
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('ebooks', $args);
}
add_action('init', 'ebooks_post_type', 0);
