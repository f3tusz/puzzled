<?php
/**
 * Initial setup and constants
 */
function nylon_theme_setup() {
    // Enable plugins to manage the document title
    // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support('title-tag');

    // Add post thumbnails
    // http://codex.wordpress.org/Post_Thumbnails
    // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

    // Add HTML5 markup for captions
    // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
    add_theme_support('html5', array('caption', 'comment-form', 'comment-list'));
}
add_action('after_setup_theme', 'nylon_theme_setup');


/*
* Removing WP Cruft for security and aesthetics
*/

add_action( 'wp_head', 'nylon_remove_actions', 1);

add_action( 'wp_print_styles', 'wps_deregister_styles', 100 );
function wps_deregister_styles() {
    wp_dequeue_style( 'wp-block-library' );
}


function nylon_remove_actions(){
    // REMOVE WP EMOJI
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');

    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

    // Extra links
    remove_action( 'wp_head', 'rsd_link'); // Weblog Client
    remove_action( 'wp_head', 'wlwmanifest_link'); // Windows Livewriter
    remove_action( 'wp_head', 'wp_shortlink_wp_head'); // Auto shortlink
    remove_action( 'wp_head', 'wp_generator'); // WordPress Meta Generator
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); // REST url
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 ); // Oembed URLs

    remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
    remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
    remove_action( 'wp_head', 'index_rel_link' ); // index link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
    remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
}

// Remove Admin Menus
function nylon_remove_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'nylon_remove_menus' );

// Remove <link rel='dns-prefetch' href='//s.w.org' />
add_filter( 'emoji_svg_url', '__return_false' );


// Hide WordPress Version Info
function nylon_hide_wordpress_version() {
    return '';
}
add_filter('the_generator', 'nylon_hide_wordpress_version');
// Remove WordPress Version Number In URL Parameters From JS/CSS
function nylon_hide_wordpress_version_in_script($src, $handle) {
    $src = remove_query_arg('ver', $src);
    return $src;
}
//add_filter( 'style_loader_src', 'nylon_hide_wordpress_version_in_script', 10, 2 );
//add_filter( 'script_loader_src', 'nylon_hide_wordpress_version_in_script', 10, 2 );

// Remove Recent Comments style
add_action( 'widgets_init', 'nylon_remove_recent_comments_style' );
function nylon_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}

// Bonus, remove Yoast comments
if (defined('WPSEO_VERSION')) {
    add_action('wp_head',function() { ob_start(function($o) {
        return preg_replace('/^\n?<!--.*?[Y]oast.*?-->\n?$/mi','',$o);
    }); }, ~PHP_INT_MAX);
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

// Adding Theme Support
add_theme_support( 'custom-logo' );