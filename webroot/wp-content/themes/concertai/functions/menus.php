<?php
/**
 * Add Menus
 */
function nylon_nav_menus() {
    // Register wp_nav_menu() menus
    // http://codex.wordpress.org/Function_Reference/register_nav_menus
    register_nav_menus(array(
        'primary_navigation' => __('Primary Navigation', 'nylon'),
        'mobile_navigation' => __('Mobile Navigation', 'nylon'),
        'footer_navigation' => __('Footer Navigation', 'nylon'),
        'primary_navigation_column_1' => __('Primary Navigation Column 1', 'nylon'),
        'primary_navigation_column_2' => __('Primary Navigation Column 2', 'nylon'),
        'primary_navigation_column_3' => __('Primary Navigation Column 3', 'nylon'),
        'primary_navigation_column_4' => __('Primary Navigation Column 4', 'nylon'),
        'category_navigation' => __('Category Navigation', 'nylon'),
    ));
}

add_action('after_setup_theme', 'nylon_nav_menus');