<?php
// Register Custom Post Type
function newsletter_post_type()
{

    $labels = array(
        'name'                  => 'Newsletter',
        'singular_name'         => 'Newsletter',
        'menu_name'             => 'Newsletter Info',
        'name_admin_bar'        => 'Newsletter'
    );

    $args = array(
        'label'                 => 'Newsletter',
        'labels'                => $labels,
        'supports'              => array('title'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-text-page',
        'rewrite'            => array( 'slug' => 'newsletter' ),
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type('newsletter', $args);
}
add_action('init', 'newsletter_post_type', 0);

function newsletter_per_get_posts( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_post_type_archive( 'newsletter' ) ) {
        // Not a query for an admin page.
        // It's the main query for a front end page of your site.

        $query->set( 'posts_per_page', 12 );
    }
}
add_action( 'pre_get_posts', 'newsletter_per_get_posts' );

add_filter( 'wpseo_sitemap_exclude_post_type', 'newsletter_sitemap_exclude', 10, 2 );
function newsletter_sitemap_exclude( $value, $post_type ) {
  $post_types = array('newsletter');
  if ( in_array( $post_type, $post_types ) ) { return true; }
}