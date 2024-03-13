<?php // Add a option page

add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {

    // Check function exists.
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'page_title' 	=> 'Home Page',
            'menu_title'	=> 'Home Page',
            'menu_slug' 	=> 'home',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'position' => '2',
            'icon_url' => 'dashicons-admin-home'
        ));

        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Configurações do portal'),
            'menu_title'  => __('Configurações do portal'),
            'redirect'    => false,
            'capability'	=> 'edit_posts',
            'position' => '0',
            'icon_url' => 'dashicons-edit',
        ));

        // Add sub page.
        $child = acf_add_options_page(array(
            'page_title'  => __('Publicidade'),
            'menu_title'  => __('Publicidade'),
            'parent_slug' => $parent['menu_slug'],
            'capability'	=> 'edit_posts',
            'position' => '0',
		    'redirect'		=> false,
            'icon_url' => 'dashicons-images-alt2',
        ));

        // Add sub page.
        $child2 = acf_add_options_page(array(
            'page_title'  => __('Autores'),
            'menu_title'  => __('Autores'),
            'parent_slug' => $parent['menu_slug'],
            'capability'	=> 'edit_posts',
            'position' => '0',
		    'redirect'		=> false,
            'icon_url' => 'dashicons-images-alt2',
        ));
        
        // Especiais
        acf_add_options_page(array(
            'page_title' 	=> 'Especiais',
            'menu_title'	=> 'Especiais',
            'menu_slug' 	=> 'Especiais',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'position' => '3',
            'icon_url' => 'dashicons-grid-view'
        ));

        // Mais buscadas
        acf_add_options_page(array(
            'page_title' 	=> 'Mais buscadas no Google',
            'menu_title'	=> 'Mais buscadas',
            'menu_slug' 	=> 'mais-buscadas',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'position' => '3',
            'icon_url' => 'dashicons-list-view'
        ));

        // Mais Lidas
        acf_add_options_page(array(
            'page_title' 	=> 'Mais Lidas',
            'menu_title'	=> 'Mais Lidas',
            'menu_slug' 	=> 'Mais Lidas',
            'capability'	=> 'edit_posts',
            'redirect'		=> false,
            'position' => '3',
            'icon_url' => 'dashicons-list-view'
        ));
    }
}

?>