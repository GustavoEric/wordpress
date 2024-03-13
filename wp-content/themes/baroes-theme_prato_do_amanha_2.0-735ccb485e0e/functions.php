<?php

define('THEME_WEB_ROOT', get_template_directory_uri());
define('THEME_DOCUMENT_ROOT', get_template_directory());

define('STYLE_WEB_ROOT', get_stylesheet_directory_uri());
define('STYLE_DOCUMENT_ROOT', get_stylesheet_directory());

add_theme_support('post-thumbnails');

function my_init()
{
    add_theme_support('post-thumbnails');

    if (!is_admin()) {
        //wp_deregister_script('jquery');
        //wp_deregister_script('jquery-migrate');

        wp_register_script('font-awesome', 'https://kit.fontawesome.com/fc9981068e.js', false, '1.0.0');
        wp_register_script('main-js', get_template_directory_uri() . '/assets/js/frontend.min.js', false, '1.2.0', true);
        wp_register_style('main-css', get_template_directory_uri() . '/assets/css/frontend.min.css?v=271123');

        wp_enqueue_style('material-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', false);

        wp_enqueue_script('main-js');
        wp_enqueue_script('font-awesome');


        wp_localize_script( 'main-js', 'my_ajax_object',
            array(
                'ajax_url' => admin_url( 'admin-ajax.php'),
                'baseUrl' => site_url(),
                'rest_url' => get_rest_url(),
                'nonce' => wp_create_nonce('ajax-nonce')
            )
        );

        wp_enqueue_style('main-css');
    }
}

function register_my_menu()
{
    register_nav_menu('main-menu', __('Main Menu'));
    register_nav_menu('second-menu', __('Second Menu'));
}

add_action('wp_enqueue_scripts', 'my_init');
add_action('init', 'register_my_menu');

//reserved words: ‘thumb’, ‘thumbnail’, ‘medium’, ‘large’, ‘post-thumbnail’
set_post_thumbnail_size(330, 186, true);
add_image_size('main-thumb', 740, 400, true);
add_image_size('vertical-thumb', 330, 430, true);
//
add_image_size('1440-560', 1440, 560, true);
add_image_size('1000-585', 1000, 585, true);
add_image_size('660-420', 660, 420, true);
add_image_size('376-244', 376, 244, true);
add_image_size('306-282', 306, 282, true);
// add_image_size('305-198', 305, 198, true);
add_image_size('87-55', 87, 55, true);


// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


// Load Components
require_once get_template_directory() . '/inc/acf-settings.php';
require_once get_template_directory() . '/inc/feature-custom-author.php';
require_once get_template_directory() . '/inc/acf-pages.php';
require_once get_template_directory() . '/inc/feature-quiz.php';
require_once get_template_directory() . '/inc/feature-search-ajax.php';
require_once get_template_directory() . '/inc/custom-og-archive-posts.php';
require_once get_template_directory() . '/inc/bootstrap-pagination.php';
require_once get_template_directory() . '/inc/custom-post-newsletter.php';
require_once get_template_directory() . '/inc/custom-post-sustainability.php';
require_once get_template_directory() . '/inc/utils.php';
require_once get_template_directory() . '/inc/custom-function-reset-acf-value.php';
require_once get_template_directory() . '/inc/event-tracker.php';


/*
	* COMMENTS
	* Remove comments in its entirety
	*/

// Removes from admin menu
add_action('admin_menu', 'pk_remove_admin_menus');
function pk_remove_admin_menus()
{
    remove_menu_page('edit-comments.php');
}

// Removes from post and pages
add_action('init', 'pk_remove_comment_support', 100);
function pk_remove_comment_support()
{
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}

// Removes from admin bar
add_action('wp_before_admin_bar_render', 'pk_remove_comments_admin_bar');
function pk_remove_comments_admin_bar()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}


/****************** */

function remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
}
add_action( 'wp_enqueue_scripts', 'remove_global_styles' );

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
   
/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
    return $urls;
}

function create_event_tracker_log($request) {
    $parameters = $request->get_json_params();
    date_default_timezone_set('America/Sao_Paulo');
    $file = './wp-content/logs/event-tracker/log'.date('Y-m-d H').'.txt';
    $content_to_append = date('Y-m-d H:i:s').' => '.json_encode($parameters)."\n";
    file_put_contents($file, $content_to_append, FILE_APPEND);
    return 'ok';
}

function register_routes() {
    register_rest_route( 'baroes/v1', '/event-tracker-log', array(
        'methods'  => WP_REST_Server::CREATABLE,
        'callback' => 'create_event_tracker_log',
    ));
}
add_action( 'rest_api_init', 'register_routes' );