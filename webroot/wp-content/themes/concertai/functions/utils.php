<?php
/**
 * Utility functions
 */
function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

/**
 * Add page slug to body_class() classes if it doesn't exist
 */
function theme_body_class($classes) {
  // Add post/page slug
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }
  return $classes;
}
add_filter('body_class', 'theme_body_class');

$external_scripts = null;
/**
 * Print External Scripts
 * @global type $external_scripts
 * @param type $location
 */
function print_external_scripts( $location ) {
  global $external_scripts;
  if ( $external_scripts == null ) {
    $external_scripts['header'] = "";
    $external_scripts['body'] = "";
    $external_scripts['footer'] = "";
    $scripts = get_field( 'scripts', 'options');
    if( is_array( $scripts ) ){
      foreach( $scripts as $script ) {
        if( $script['script_enabled'] ) {
          $external_scripts[$script['script_location']] .= "\r\n<!-- External Script : " . $script['script_name'] . " -->\r\n" . $script['script_code'] . "\r\n";
        }
      }
    }
  }
  if( array_key_exists( $location, $external_scripts) ) {
    echo $external_scripts[$location];
  }
}