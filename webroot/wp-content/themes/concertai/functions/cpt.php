<?php
function post_types() {
  $post_tax_type_labels = array(
    'name'                => 'Types',
    'add_new_item'        => 'Add Type',
    'new_item_name'       => 'New Type'
  );
  $post_tax_type_args = array(
    'labels'              => $post_tax_type_labels,
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_in_rest '       => true,
    'show_admin_column'   => true,
    'show_tagcloud'       => true,
    'rewrite' => array('slug' => 'type')
  );
  register_taxonomy( 'type', 'post', $post_tax_type_args );
  
  
  

  $news_post_labels = array(
		'name'                  => _x( 'Posts', 'Post Type General Name', 'concert-ai' ),
		'singular_name'         => _x( 'Post', 'Post Type Singular Name', 'concert-ai' ),
		'menu_name'             => __( 'News', 'concert-ai' ),
		'name_admin_bar'        => __( 'News', 'concert-ai' ),
		'archives'              => __( 'Item Archives', 'concert-ai' ),
		'attributes'            => __( 'Item Attributes', 'concert-ai' ),
		'parent_item_colon'     => __( 'Parent Post:', 'concert-ai' ),
		'all_items'             => __( 'All Posts', 'concert-ai' ),
		'add_new_item'          => __( 'Add New Post', 'concert-ai' ),
		'add_new'               => __( 'Add New', 'concert-ai' ),
		'new_item'              => __( 'New Post', 'concert-ai' ),
		'edit_item'             => __( 'Edit Post', 'concert-ai' ),
		'update_item'           => __( 'Update Post', 'concert-ai' ),
		'view_item'             => __( 'View Post', 'concert-ai' ),
		'view_items'            => __( 'View Posts', 'concert-ai' ),
		'search_items'          => __( 'Search Post', 'concert-ai' ),
		'not_found'             => __( 'Not found', 'concert-ai' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'concert-ai' ),
		'featured_image'        => __( 'Featured Image', 'concert-ai' ),
		'set_featured_image'    => __( 'Set featured image', 'concert-ai' ),
		'remove_featured_image' => __( 'Remove featured image', 'concert-ai' ),
		'use_featured_image'    => __( 'Use as featured image', 'concert-ai' ),
		'insert_into_item'      => __( 'Insert into item', 'concert-ai' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'concert-ai' ),
		'items_list'            => __( 'Items list', 'concert-ai' ),
		'items_list_navigation' => __( 'Items list navigation', 'concert-ai' ),
		'filter_items_list'     => __( 'Filter items list', 'concert-ai' ),
	);
	$news_post_rewrite = array(
		'slug'                  => 'news/' . date('Y') . '/' . date('m'),
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$news_posts_args = array(
		'label'                 => __( 'Post', 'concert-ai' ),
		'labels'                => $news_post_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'news_type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg id="Capa_1" enable-background="new 0 0 512.005 512.005" height="512" viewBox="0 0 512.005 512.005" width="512" xmlns="http://www.w3.org/2000/svg"><g><path fill="#FFFFFF" d="m383 449.286c0-12.242 0-408.136 0-418 0-8.284-6.716-15-15-15h-353c-8.284 0-15 6.716-15 15v388c0 41.355 33.645 75 75 75h323.041c-9.438-12.545-15.041-28.13-15.041-45zm-303-145h48c8.284 0 15 6.716 15 15s-6.716 15-15 15h-48c-8.284 0-15-6.716-15-15s6.716-15 15-15zm-15-49c0-8.284 6.716-15 15-15h48c8.284 0 15 6.716 15 15s-6.716 15-15 15h-48c-8.284 0-15-6.716-15-15zm239 167h-224c-8.284 0-15-6.716-15-15s6.716-15 15-15h224c8.284 0 15 6.716 15 15s-6.716 15-15 15zm15-79c0 8.284-6.716 15-15 15h-112c-8.284 0-15-6.716-15-15v-112c0-8.284 6.716-15 15-15h112c8.284 0 15 6.716 15 15zm-15-161h-224c-8.284 0-15-6.716-15-15s6.716-15 15-15h224c8.284 0 15 6.716 15 15s-6.716 15-15 15zm0-64h-224c-8.284 0-15-6.716-15-15s6.716-15 15-15h224c8.284 0 15 6.716 15 15s-6.716 15-15 15z"/><path fill="#FFFFFF" d="m207 246.286h82v82h-82z"/><path fill="#FFFFFF" d="m497 120.286h-84c0 339.893-.05 329.01.09 329.01 1.294 20.941 15.606 38.347 34.94 44.246 30.926 9.437 62.634-12.935 63.92-45.352.078 0 .05 7.494.05-312.904 0-8.284-6.716-15-15-15z"/></g></svg>'),
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $news_post_rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
  );
  register_post_type( 'news_post', $news_posts_args );

  $news_posts_category_labels = array(
    'name'                => 'Types',
    'add_new_item'        => 'Add Type',
    'new_item_name'       => 'New Type'
  );
  $news_posts_category_args = array(
    'labels'              => $news_posts_category_labels,
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'show_tagcloud'       => false
  );
  register_taxonomy( 'news_type', 'news_post', $news_posts_category_args );
  
  $publication_labels = array(
		'name'               => __( 'Publications' ),
    'singular_name'      => __( 'Publication' ),
    'menu_name'          => __( 'Publications' ),
    'name_admin_bar'     => __( 'Publications' ),
    'add_new'            => __( 'Add New' ),
    'add_new_item'       => __( 'Add New Publication' ),
    'new_item'           => __( 'New Publication' ),
    'edit_item'          => __( 'Edit Publication' ),
    'view_item'          => __( 'View Publication' ),
    'all_items'          => __( 'All Publications' ),
    'search_items'       => __( 'Search Publication' ),
    'parent_item_colon'  => __( 'Parent Publication:' ),
    'not_found'          => __( 'No Publication found.' ),
    'not_found_in_trash' => __( 'No Publication found in Trash.' )
  );
  $publication_rewrite = array(
		'slug'                  => 'publications/' . date('Y') . '/' . date('m'),
		'with_front'            => false,
		'pages'                 => true,
		'feeds'                 => true,
  );
	$publication_args = array(
		'label'                 => __( 'Post', 'concert-ai' ),
		'labels'                => $publication_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'research_type', 'cancer_type', 'source' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'data:image/svg+xml;base64,' . base64_encode('<svg xmlns="http://www.w3.org/2000/svg" height="512pt" version="1.1" viewBox="-55 0 512 512" width="512pt"><g id="surface1"><path d="M 231.34375 238.890625 L 329.851562 238.890625 L 329.851562 233.105469 L 292.675781 199.300781 Z M 231.34375 238.890625 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /><path d="M 220.160156 175.566406 L 195.046875 192.609375 L 195.046875 226.21875 L 242.429688 195.636719 Z M 220.160156 175.566406 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /><path d="M 53.144531 385.632812 C 69.023438 385.632812 83.722656 390.746094 95.707031 399.398438 L 95.707031 44.210938 C 93.808594 19.515625 73.121094 0 47.949219 0 C 39.160156 0 30.925781 2.390625 23.835938 6.535156 C 9.378906 17.34375 0 34.589844 0 53.988281 L 0 408.714844 C 13.308594 394.523438 32.203125 385.632812 53.144531 385.632812 Z M 53.144531 385.632812 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /><path d="M 126.035156 443.355469 L 402.433594 443.355469 L 402.433594 38.273438 L 126.035156 38.273438 Z M 359.238281 400.472656 L 165.835938 400.472656 L 165.835938 370.144531 L 359.238281 370.144531 Z M 359.238281 335.769531 L 165.835938 335.769531 L 165.835938 305.441406 L 359.238281 305.441406 Z M 164.71875 81.988281 L 360.179688 81.988281 L 360.179688 269.21875 L 164.71875 269.21875 Z M 164.71875 81.988281 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /><path d="M 95.703125 458.519531 C 95.703125 435.054688 76.613281 415.960938 53.144531 415.960938 C 29.675781 415.960938 10.582031 435.054688 10.582031 458.519531 C 10.582031 481.480469 25.132812 501.105469 45.492188 508.671875 C 48.960938 509.871094 52.558594 510.800781 56.257812 511.425781 C 58.808594 511.800781 61.410156 512 64.0625 512 L 369.167969 512 L 369.167969 473.6875 L 95.703125 473.6875 Z M 95.703125 458.519531 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /><path d="M 195.046875 155.953125 L 222.804688 137.121094 L 268.828125 178.597656 L 295.824219 161.171875 L 329.851562 192.113281 L 329.851562 112.316406 L 195.046875 112.316406 Z M 272.578125 126.46875 C 281.078125 126.46875 287.375 133.414062 287.742188 141.632812 C 288.109375 149.820312 280.511719 156.796875 272.578125 156.796875 C 264.078125 156.796875 257.78125 149.847656 257.414062 141.632812 C 257.046875 133.441406 264.648438 126.46875 272.578125 126.46875 Z M 272.578125 126.46875 " style=" stroke:none;fill-rule:nonzero;fill:#FFF;fill-opacity:1;" /></g></svg>'),
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $publication_rewrite,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
  );
  register_post_type( 'publication', $publication_args );

  $publication_research_type_labels = array(
    'name'                => 'Research Types',
    'add_new_item'        => 'Add Research Type',
    'new_item_name'       => 'New Research Type'
  );
  $publication_research_type_args = array(
    'labels'              => $publication_research_type_labels,
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'show_tagcloud'       => false
  );
  register_taxonomy( 'research_type', 'publication', $publication_research_type_args );

  $publication_cancer_type_labels = array(
    'name'                => 'Cancer Types',
    'add_new_item'        => 'Add Cancer Type',
    'new_item_name'       => 'New Cancer Type'
  );
  $publication_cancer_type_args = array(
    'labels'              => $publication_cancer_type_labels,
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'show_tagcloud'       => false
  );
  register_taxonomy( 'cancer_type', 'publication', $publication_cancer_type_args );

  $publication_source_labels = array(
    'name'                => 'Sources',
    'add_new_item'        => 'Add Source',
    'new_item_name'       => 'New Source'
  );
  $publication_source_args = array(
    'labels'              => $publication_source_labels,
    'hierarchical'        => true,
    'public'              => true,
    'show_ui'             => true,
    'show_admin_column'   => true,
    'show_tagcloud'       => false
  );
  register_taxonomy( 'source', 'publication', $publication_source_args );


     register_taxonomy(
      'publication-type',
      'publication',
      array(
        'hierarchical' => true,
        'label' => 'Publication Types',
        'publicly_queryable' => true,
        'show_admin_column'   => true,
        'show_ui' => true, 
        'query_var' => true,
        'rewrite' => array('slug' => 'publication-type')
      )
    );
  
} 
add_action('init', 'post_types');

/*
  Filter for tags (as a taxonomy) with comma
  replace '--' with ', ' in the output - allow tags with comma this way
*/
if(!is_admin()){	

  $custom_taxonomy_type = 'research_type';
  function comma_taxonomy_filter($tag_arr){
		global $custom_taxonomy_type;
		$tag_arr_new = $tag_arr;
		if($tag_arr->taxonomy == $custom_taxonomy_type && strpos($tag_arr->name, '--')){
			$tag_arr_new->name = str_replace('--',', ',$tag_arr->name);
		}
		return $tag_arr_new;	
	}
  add_filter('get_'.$custom_taxonomy_type, 'comma_taxonomy_filter');
  
}