<?php

add_action('wp_ajax_search_ajax', 'search_ajax');
add_action('wp_ajax_nopriv_search_ajax', 'search_ajax');

function search_ajax()
{
    global $post;

    $s = $_POST['s'];
    $query_args = array(
        's' => $s,
        'posts_per_page' => 9,
        'post_type' => array('post', 'quiz'),
        'post_status' => 'publish'
    );
    $query = new WP_Query($query_args);
    $posts = $query->posts;

    if (count($posts)) {
        ob_start();  // Start output buffering

        foreach ($posts as $post) {
            setup_postdata($post);
            include(__DIR__ . '/../alm_templates/card-vertical.php');
        }

        $output = ob_get_clean();
        echo $output;
    }

    wp_reset_postdata();
    wp_die();
}
