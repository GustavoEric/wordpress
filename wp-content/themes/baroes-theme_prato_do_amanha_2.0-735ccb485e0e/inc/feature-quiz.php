<?php 
// Custom post type quiz
add_action('init', 'type_post_quiz');
 
function type_post_quiz() { 
    $labels = array(
        'name' => _x('Quiz', 'post type general name'),
        'singular_name' => _x('Quiz', 'post type singular name'),
        'add_new' => _x('Adicionar Novo', 'Novo item'),
        'add_new_item' => __('Novo Item'),
        'edit_item' => __('Editar Item'),
        'new_item' => __('Novo Item'),
        'view_item' => __('Ver Item'),
        'search_items' => __('Procurar Itens'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Quiz'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,           
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'taxonomies'  => array( 'category' ),
        'has_archive' => false,
        'hierarchical' => false,
        'menu_position' => null,
        'register_meta_box_cb' => 'noticias_meta_box',       
        'supports' => array('title','editor','thumbnail','comments', 'excerpt', 'custom-fields', 'revisions', 'trackbacks')
      );

register_post_type( 'quiz' , $args );
flush_rewrite_rules();
}