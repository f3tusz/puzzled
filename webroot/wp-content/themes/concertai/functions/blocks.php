<?php

function register_acf_block_types()
{
  // Announcement
  acf_register_block_type(array(
    'name'              => 'announcement',
    'title'             => __('Announcement'),
    'description'       => __(''),
    'render_template'   => 'blocks/announcement.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Announcement'),
    'show_in_rest'      => true,
    'supports'          => array('editor'),
  ));
  
  // Slider
  acf_register_block_type(array(
    'name'              => 'slider',
    'title'             => __('Slider'),
    'description'       => __(''),
    'render_template'   => 'blocks/slider.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Slider','Slideshow','Carousel'),
  ));
  
  // List CTAs
  acf_register_block_type(array(
    'name'              => 'list-ctas',
    'title'             => __('List CTAs'),
    'description'       => __(''),
    'render_template'   => 'blocks/list-ctas.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('CTAs','List'),
  ));  
  
  // Large CTAs
  acf_register_block_type(array(
    'name'              => 'large-ctas',
    'title'             => __('Large CTAs'),
    'description'       => __(''),
    'render_template'   => 'blocks/large-ctas.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('CTAs','Links','Calls to Action'),
  ));   
  
  // Data Results
  acf_register_block_type(array(
    'name'              => 'data-results',
    'title'             => __('Data Results'),
    'description'       => __(''),
    'render_template'   => 'blocks/data-results.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Data Results'),
  ));

  // Hero
  acf_register_block_type(array(
    'name'              => 'hero',
    'title'             => __('Hero'),
    'description'       => __(''),
    'render_template'   => 'blocks/hero.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Hero'),
  ));

  // Hero
  acf_register_block_type(array(
    'name'              => 'columns',
    'title'             => __('Columns'),
    'description'       => __(''),
    'render_template'   => 'blocks/columns.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Columns'),
  ));
 
  // Basic Content
  acf_register_block_type(array(
    'name'              => 'basic-content',
    'title'             => __('Normal Content'),
    'description'       => __(''),
    'render_template'   => 'blocks/content-normal.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Basic content'),
  ));

  // Staff Block
  acf_register_block_type(array(
    'name'              => 'Staff',
    'title'             => __('Staff'),
    'description'       => __(''),
    'render_template'   => 'blocks/staff.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Staff'),
  ));

  // Wide Content
  acf_register_block_type(array(
    'name'              => 'wide-content',
    'title'             => __('Wide Content'),
    'description'       => __(''),
    'render_template'   => 'blocks/wide-content.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Wide Content'),
  ));

  // Tabs
  acf_register_block_type(array(
    'name'              => 'tabs',
    'title'             => __('Tabs'),
    'description'       => __(''),
    'render_template'   => 'blocks/tabs.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Tabs'),
  ));

  // Infographic
  acf_register_block_type(array(
    'name'              => 'infographics',
    'title'             => __('Infographics'),
    'description'       => __(''),
    'render_template'   => 'blocks/infographics.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Infographic'),
  ));

  // Box CTAs
  acf_register_block_type(array(
    'name'              => 'box-ctas',
    'title'             => __('Box CTAs'),
    'description'       => __(''),
    'render_template'   => 'blocks/box-ctas.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Box','CTA', 'Box CTA'),
  ));

  
  // Tooltips
  acf_register_block_type(array(
    'name'              => 'tooltips',
    'title'             => __('Tooltips'),
    'description'       => __(''),
    'render_template'   => 'blocks/tooltips.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Tooltips','Accordion'),
  ));
  
  // Subnav
  acf_register_block_type(array(
    'name'              => 'subnav',
    'title'             => __('Subnav'),
    'description'       => __(''),
    'render_template'   => 'blocks/subnav.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Subnav'),
  ));

  // Highlights
  acf_register_block_type(array(
    'name'              => 'highlights',
    'title'             => __('Highlights'),
    'description'       => __(''),
    'render_template'   => 'blocks/highlights.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Highlights'),
  ));

  
  // Featured Media
  acf_register_block_type(array(
    'name'              => 'featured-media',
    'title'             => __('Featured Media'),
    'description'       => __(''),
    'render_template'   => 'blocks/featured-media.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Featured Media'),
  ));
  
  // Content With Form
  acf_register_block_type(array(
    'name'              => 'content-with-form',
    'title'             => __('Content With Form'),
    'description'       => __(''),
    'render_template'   => 'blocks/content-with-form.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Content With Form'),
  ));

  
  // Open Jobs
  acf_register_block_type(array(
    'name'              => 'open-jobs',
    'title'             => __('Open Jobs'),
    'description'       => __(''),
    'render_template'   => 'blocks/open-jobs.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Open Jobs'),
  ));

  // Publication Archives (Landing page)
  acf_register_block_type(array(
    'name'              => 'archives-publications',
    'title'             => __('Publications Landing'),
    'description'       => __(''),
    'render_template'   => 'blocks/archives-publications.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('Publications Landing Archives'),
  ));

  // Publication Archives (Landing page)
  acf_register_block_type(array(
    'name'              => 'eureka',
    'title'             => __('eurekaHealth Graphic'),
    'description'       => __(''),
    'render_template'   => 'blocks/eureka.php',
    'category'          => 'formatting',
    'icon'              => 'admin-comments',
    'keywords'          => array('eurekaHealth'),
  ));
}

// Check if function exists and hook into setup.
if (function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}


//
// Set custom Padding to Pagebuilder sections
//
function padding()
{
  if (get_field('padding_top') == 'custom') {
    $top = 'padding-top: ' . get_field('padding_top_value') . 'px; ';
  } else {
    $top = '';
  }
  if (get_field('padding_bottom') == 'custom') {
    $bottom = 'padding-bottom: ' . get_field('padding_bottom_value') . 'px; ';
  } else {
    $bottom = '';
  }
  return  $top . $bottom;
}

function generatePictureElement($image, $lazyload)
{
  $islazyload = $lazyload;

  if ($islazyload) {
    $element = '<picture>' .
      '<source data-srcset="' . $image['sizes']['medium'] . '" media="--small" > ' .
      '<source data-srcset="' . $image['sizes']['medium_large'] . '" media="--medium">' .
      '<source data-srcset="' . $image['sizes']['medium_large'] . '" media="--large">' .
      '<img class="lazyload img-fluid" src="' . $image['url'] . '"' .
      '</picture>';
  } else {
    $element = '<picture>' .
      '<source srcset="' . $image['sizes']['medium'] . '" media="(max-width: 320px)" > ' .
      '<source srcset="' . $image['sizes']['medium_large'] . '" media="(min-width: 321px) and (max-width: 768px)">' .
      '<source srcset="' . $image['sizes']['medium_large'] . '" media="(min-width: 769px) and (max-width: 1024px)">' .
      '<img class="img-fluid" src="' . $image['url'] . '"' .
      '</picture>';
  }

  return $element;
}


add_filter( 'allowed_block_types', 'concert_allowed_block_types' );
 
function concert_allowed_block_types( $allowed_blocks ) {
 
	return array(
    'acf/eureka',
    'acf/archive-publications',
    'acf/open-jobs',
    'acf/content-with-form',
    'acf/featured-media',
    'acf/highlights',
    'acf/subnav',
    'acf/tooltips',
    'acf/box-ctas',
    'acf/infographics',
    'acf/tabs',
    'acf/wide-content',
    'acf/Staff',
    'acf/basic-content',
    'acf/columns',
    'acf/hero',
    'acf/data-results',
    'acf/large-ctas',
    'acf/list-ctas',
    'acf/slider',
    'acf/announcement'
	);
}


function concert_disable_gutenberg( $current_status, $post_type ) {

    // Disabled post types
    $disabled_post_types = array( 'news_post', 'publication', 'post' );

    // Change $can_edit to false for any post types in the disabled post types array
    if ( in_array( $post_type, $disabled_post_types, true ) ) {
        $current_status = false;
    }

    return $current_status;
}
add_filter( 'use_block_editor_for_post_type', 'concert_disable_gutenberg', 10, 2 );
