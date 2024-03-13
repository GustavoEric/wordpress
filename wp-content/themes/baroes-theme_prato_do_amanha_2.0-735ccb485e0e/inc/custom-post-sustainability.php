<?php
// Register Custom Post Type
function sustainability_post_type()
{

    $labels = array(
        'name'                  => 'Sustainability',
        'singular_name'         => 'Sustainability',
        'menu_name'             => 'Sustainability',
        'name_admin_bar'        => 'Sustainability'
    );

    $args = array(
        'label'                 => 'Sustainability',
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-admin-site-alt3',
        'rewrite'            => array( 'slug' => 'sustainability' ),
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('sustainability', $args);
}
add_action('init', 'sustainability_post_type', 0);

function sustainability_per_get_posts( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'sustainability' ) ) {
        // Not a query for an admin page.
        // It's the main query for a front end page of your site.

        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'sustainability_per_get_posts' );

add_filter( 'wpseo_sitemap_exclude_post_type', 'sustainability_sitemap_exclude', 10, 2 );
function sustainability_sitemap_exclude( $value, $post_type ) {
  $post_types = array('sustainability');
  if ( in_array( $post_type, $post_types ) ) { return true; }
}