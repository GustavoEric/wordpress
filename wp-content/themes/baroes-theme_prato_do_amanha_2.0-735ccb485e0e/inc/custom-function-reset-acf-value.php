<?php

// Reset 'aprovacao_web_stories' ACF to default value -> Field que seleciona status Aprovado ou aguardando aprov
add_action('admin_init', 'set_default_webstory_acf_values');

function set_default_webstory_acf_values() {

    $args = [
        'post_type'      => 'web-story',
        'posts_per_page' => -1,
    ];

    $posts = get_posts($args);

    foreach($posts as $post) {
        if (empty(get_field('aprovacao_web_stories', $post->ID))) {
             update_field('aprovacao_web_stories', 'aprovado', $post->ID);
        }  
    }
}