<?php
//Includes

//Hoockes
//Carregar Arquivos css e js
function gm_scripts() {
    wp_enqueue_style('main',get_template_directory_uri().'/assets/css/main.css',array(),'1.0','all');
}
add_action('wp_enqueue_scripts','gm_scripts');

//Adicionar ou liberar recursos no wp
function gm_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom_logo');
    add_theme_support('post_thumbnails');

    register_nav_menu('primary',__('Menu Principal','GustavoTema'));
}
add_action('after_setup_theme', 'gm_theme_support');
add_action('wp_enqueue_style','gm_scripts');
?>