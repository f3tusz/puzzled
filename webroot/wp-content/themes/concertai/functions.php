<?php
/**
 * Includes
 *
 * The $nylon_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */
$nylon_includes = array(
    'functions/utils.php',           // Utility functions
    'functions/init.php',            // Initial theme setup and constants
    'functions/menus.php',           // Removing unneeded WP defaults
    'functions/config.php',          // Configuration
    'functions/scripts.php',         // Scripts and stylesheets
    'functions/security.php',        // Security focused settings
    'functions/forms.php',           // Gravity Forms settings
    'functions/blocks.php',          // ACF blocks settings
    'functions/cpt.php',             // Custom Post Types
    'functions/options.php',         // ACF Theme Options
    'functions/shortcodes.php',      // Custom Wordpress Shortcodes for WYSIWYGs
    'functions/postfiltering.php',   // Dropdown Filtering within a page 
    'functions/lever_functions.php'  // Lever Careers functions
);

function nylon_include( $includes ){
  if( !is_array( $includes ) ){
    $includes = array( $includes );
  }
  foreach ($includes as $file) {
    if (!$filepath = locate_template($file)) {
      trigger_error(sprintf(__('Error locating %s for inclusion', 'nylon'), $file), E_USER_ERROR);
    }
    require_once $filepath;
  }
}
nylon_include( $nylon_includes );

add_theme_support('editor-styles');
add_editor_style('/assets/build/style-editor.css');


add_action('admin_head', 'custom_admin_styles');
function custom_admin_styles() {
  echo '<style>
    .short-wysiwyg .mce-edit-area {
      height:100px;
    }     
    ul.acf-radio-list, ul.acf-checkbox-list {
      padding-left:0!important;
      margin-left:0!important;
    }
    .acf-actions {
      position:relative;
    }
  </style>';
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
    return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
  .attachment-266x266, .thumbnail img {
        width: 100% !important;
        height: auto !important;
  }
  </style>';
}
add_action( 'admin_head', 'fix_svg' );

//ACF Color Picker Options
add_action( 'acf/input/admin_enqueue_scripts', function() {
  wp_enqueue_script( 'acf-custom-colors', get_template_directory_uri() . '/assets/js/acf/aw-colors.js', 'acf-input', '1.0', true );
});

// Add the anchor link option to menus
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
	foreach( $items as &$item ) {
		$anchor = get_field('anchor_link', $item);
    //var_dump($item);
		// append icon
		if( $anchor ) {
			$item->url = '#' . $anchor;	
		}	
	}
		
	// return
	return $items;
}

function var_dump_pre($mixed = null){
  echo '<pre>';
  var_dump($mixed);
  echo '</pre>';
  return null;
}

// Counting number shortcode 
function shortcode_counting_number($atts, $content=null){
  $shortcode_atts = shortcode_atts(array(
    'number' => null,
    'size' => 'regular',
    'color' => 'white',
    'after_text' => '',
    'before_text' => '',
  ), $atts);

  if ($shortcode_atts['number'] == null){
    return false;
  }

  $number = $shortcode_atts['number'];
  $size = $shortcode_atts['size'];
  $color = $shortcode_atts['color'];
  $after_text = $shortcode_atts['after_text'];
  $before_text = $shortcode_atts['before_text'];
  $html = "<div class='aos-init aos-animate' data-aos='fade-in' data-aos-easing='linear' data-aos-once='true' data-aos-delay='100'><div class='$size-text count-up-number'><span style='color:$color;'>$before_text</span><span class='counter' data-count='$number' style='color:$color;'>0</span><span style='color:$color;'>$after_text</span></div></div>";

  return $html;
}
add_shortcode('counting_number', 'shortcode_counting_number');

// Add Counting Number shortcode to WYSIWYG
function count_number_add_mce_button() {
  // check user permissions
  if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
             return;
     }
 // check if WYSIWYG is enabled
 if ( 'true' == get_user_option( 'rich_editing' ) ) {
     add_filter( 'mce_external_plugins', 'count_number_add_tinymce_plugin' );
     add_filter( 'mce_buttons_2', 'count_number_register_mce_button' );
     }
}
add_action('admin_head', 'count_number_add_mce_button');

// register new button in the editor
function count_number_register_mce_button( $buttons ) {
  array_push( $buttons, 'count_number_mce_button' );
  return $buttons;
}

// declare a script for the new button
// the script will insert the shortcode on the click event
function count_number_add_tinymce_plugin( $plugin_array ) {
$plugin_array['count_number_mce_button'] = get_stylesheet_directory_uri() .'/assets/js/modules/count_number-mce-button.js';
return $plugin_array;
}




// CTA with Arrow shortcode 
function shortcode_cta_arrow($atts, $content=null){
  $shortcode_atts = shortcode_atts(array(
    'url' => null,
    'size' => 'small',
    'target' => '_blank',
    'text' => $content
  ), $atts);

  $text = $shortcode_atts['text'];
  $url = $shortcode_atts['url'];
  $size = $shortcode_atts['size'];
  $target = $shortcode_atts['target'];

  if ($text == null || $url == null){
    return false;
  }

  ob_start();
  if ($size == 'small'){
    get_template_part('partials/svgs/arrow','svg');
  } elseif ($size == 'large'){
    get_template_part('partials/svgs/arrow-large','svg');
  }
  $svg = ob_get_contents();
  ob_end_clean();
  $html = "<a href='$url' class='cta-shortcode cta cta-$size' target='$target'><span>$text$svg</span></a>";

  return $html;
}
add_shortcode('cta_arrow', 'shortcode_cta_arrow');

// Add CTA with ARrow shortcode to WYSIWYG
function cta_arrow_add_mce_button() {
  // check user permissions
  if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
             return;
     }
 // check if WYSIWYG is enabled
 if ( 'true' == get_user_option( 'rich_editing' ) ) {
     add_filter( 'mce_external_plugins', 'cta_arrow_add_tinymce_plugin' );
     add_filter( 'mce_buttons_2', 'cta_arrow_register_mce_button' );
     }
}
add_action('admin_head', 'cta_arrow_add_mce_button');

// register new button in the editor
function cta_arrow_register_mce_button( $buttons ) {
  array_push( $buttons, 'cta_arrow_mce_button' );
  return $buttons;
}


// declare a script for the new button
// the script will insert the shortcode on the click event
function cta_arrow_add_tinymce_plugin( $plugin_array ) {
$plugin_array['cta_arrow_mce_button'] = get_stylesheet_directory_uri() .'/assets/js/modules/cta_arrow-mce-button.js';
return $plugin_array;
}

// these values were calculated at https://codepen.io/sosuke/pen/Pjoqqp
function create_svg_color_array(){
  return array(
    '#C20DD1' => 'filter: brightness(0) saturate(100%) invert(19%) sepia(72%) saturate(6173%) hue-rotate(289deg) brightness(92%) contrast(107%);',
    '#7311F2' => 'filter: brightness(0) saturate(100%) invert(15%) sepia(86%) saturate(7453%) hue-rotate(269deg) brightness(92%) contrast(107%);',
    '#3AD0F9' => 'filter: brightness(0) saturate(100%) invert(77%) sepia(40%) saturate(4150%) hue-rotate(163deg) brightness(105%) contrast(95%);',
    '#F86864' => 'filter: brightness(0) saturate(100%) invert(56%) sepia(7%) saturate(4598%) hue-rotate(314deg) brightness(96%) contrast(102%);',
    '#000F8C' => 'filter: brightness(0) saturate(100%) invert(12%) sepia(47%) saturate(4094%) hue-rotate(226deg) brightness(110%) contrast(135%);',
    '#0C3675' => 'filter: brightness(0) saturate(100%) invert(18%) sepia(36%) saturate(3054%) hue-rotate(200deg) brightness(92%) contrast(103%);',
    '#000255' => 'filter: brightness(0) saturate(100%) invert(11%) sepia(45%) saturate(3253%) hue-rotate(225deg) brightness(99%) contrast(132%);',
    '#A0A6CA' => 'filter: brightness(0) saturate(100%) invert(71%) sepia(52%) saturate(152%) hue-rotate(194deg) brightness(85%) contrast(93%);',
    '#DFE2F0' => 'filter: brightness(0) saturate(100%) invert(92%) sepia(8%) saturate(259%) hue-rotate(192deg) brightness(99%) contrast(90%);',
    '#F5F5F6' => 'filter: brightness(0) saturate(100%) invert(89%) sepia(4%) saturate(25%) hue-rotate(202deg) brightness(107%) contrast(100%);',
    '#FFFFFF' => 'filter: brightness(0) invert(100%);'
  );
}


include_once('functions/container.php');
include_once('functions/frames.php');



function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');



/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
    $style_formats = array(  
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/
        array(  
            'title' => 'Large Text',  
            'block' => 'span',  
            'classes' => 'large-text',
            'wrapper' => true,
             
        ),  
        array(  
            'title' => 'Opaque Text',  
            'block' => 'span',  
            'classes' => 'opaque-text',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Extra Large Text',  
            'block' => 'span',  
            'classes' => 'xlarge-text',
            'wrapper' => true,
        ),
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

function more_post_ajax(){
  $offset = $_POST["offset"];
  $ppp = $_POST["ppp"];
  $page = $_POST["page"];
  $tax_query = $_POST["tax_query"];

  header("Content-Type: text/html");

  $args = array(
      'post_type' => 'publication',
      'posts_per_page' => $ppp,
      'offset' => $offset,
      'tax_query' => $tax_query
      // need to add tax options
  );

  $loop = new WP_Query($args);
  ob_start();
  while ($loop->have_posts()) { $loop->the_post(); 
    get_template_part('partials/archives/publication','archive');
  }
  $html = ob_get_clean();
  ob_end_clean();

  wp_reset_postdata();
  $last_page = (intval($page) == intval($loop->max_num_pages));

  $to_encode = array(
    'content' => $html,
    'last_page' => $last_page,
    'args' => $args,
    'page' => $page,
    'max' => $loop->max_num_pages,
  );
  echo json_encode($to_encode);
  exit; 
}
add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');