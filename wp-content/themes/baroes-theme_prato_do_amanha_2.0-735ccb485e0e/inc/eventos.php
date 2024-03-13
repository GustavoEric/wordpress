<?php
// Register Custom Post Type
function eventos_post_type()
{

    $labels = array(
        'name'                  => 'Eventos',
        'singular_name'         => 'Eventos',
        'menu_name'             => 'Eventos',
        'name_admin_bar'        => 'Eventos'
    );

    $args = array(
        'label'                 => 'Eventos',
        'labels'                => $labels,
        'supports'              => array('title', 'custom-fields', 'excerpt', 'thumbnail'),
        'taxonomies'            => array('category'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-star-half',
        'rewrite'            => array( 'slug' => 'eventos' ),
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('eventos', $args);
}
add_action('init', 'eventos_post_type', 0);
