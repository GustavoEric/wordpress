<?php
// The custom function MUST be hooked to the init action hook
add_action( 'init', 'register_post_type_author' );
// A custom function that calls register_post_type
function register_post_type_author() {
  $postTypeTextDomain = 'theme_post_type_author';
  $singular = 'Autor';
  $plural = 'Autores';
  $slug = 'Autor';
  $urlSlug = 'autores';
  
  // Set various pieces of text, $labels is used inside the $args array
  $labels = array(
    'name'               => _x( "{$plural}", 'post type general name', $postTypeTextDomain ),
    'singular_name'      => _x( "{$singular}", 'post type singular name', $postTypeTextDomain ),
    'menu_name'          => _x( "{$plural}", 'admin menu', $postTypeTextDomain ),
    'name_admin_bar'     => _x( "{$singular}", 'add new on admin bar', $postTypeTextDomain ),
    'add_new'            => _x( 'Add New', 'book', $postTypeTextDomain ),
    'add_new_item'       => __( "Add {$singular}", $postTypeTextDomain ),
    'new_item'           => __( "New {$singular}", $postTypeTextDomain ),
    'edit_item'          => __( "Edit {$singular}", $postTypeTextDomain ),
    'view_item'          => __( "View {$singular}", $postTypeTextDomain ),
    'all_items'          => __( "All {$plural}", $postTypeTextDomain ),
    'search_items'       => __( "Search {$plural}", $postTypeTextDomain ),
    'parent_item_colon'  => __( "Parent {$plural}:", $postTypeTextDomain ),
    'not_found'          => __( "No {$plural} found.", $postTypeTextDomain ),
    'not_found_in_trash' => __( "No {$plural} found in Trash.", $postTypeTextDomain )
  );
  
  // Set various pieces of information about the post type
  $args = array(
    'labels' => $labels,
    'description'        => __( $singular, $postTypeTextDomain ),
    'public'             => false,
    'publicly_queryable' => false,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => false,
    'rewrite'            => array( 'slug' => $urlSlug ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon' => "dashicons-embed-photo",
    'supports'           => array( 'title', 'custom-fields' )
  );

  // Register the movie post type with all the information contained in the $arguments array
  register_post_type( $slug, $args );
  //add_post_type_support( $slug, 'wps_subtitle' );
}