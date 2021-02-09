<?php
/**
 * Enable theme features
 */

// Limit revisions
function nylon_revision_limit( $num, $post ) {
    return 5;
}
add_filter( 'wp_revisions_to_keep', 'nylon_revision_limit', 10, 2 );

// Add Support for SVGs
function nylon_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'nylon_mime_types');


function my_mce4_options($init) {

    $custom_colours = '
        "C20DD1", "Magenta",
        "000F8C", "Bright Blue",
        "3AD0F9", "Cyan",
        "F86864", "Orange",
        "7311F2", "Purple",
        "000255", "Dark Blue",
        "0C3675", "Deep Slate",
        "A0A6CA", "Gray",
        "DFE2F0", "Medium Gray",
        "F5F5F6", "Light Gray"
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');