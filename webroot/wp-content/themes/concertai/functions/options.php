<?php
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
      'page_title'  => 'Global Settings',
      'menu_title'  => 'Global Settings',
      'menu_slug'   => 'theme-general-options',
      'capability'  => 'edit_posts',
      'redirect'    => true,
      'icon_url'    => 'dashicons-admin-site',
      'position'    => 58 // End of the menu, before the separator at 59
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'External Scripts',
      'menu_title'  => 'External Scripts',
      'parent_slug' => 'theme-general-options',
    ));


    acf_add_options_sub_page(array(
      'page_title'  => 'Theme Options',
      'menu_title'  => 'Theme Options',
      'parent_slug' => 'theme-general-options',
    ));

    acf_add_options_sub_page(array(
      'page_title'  => 'Default Image',
      'menu_title'  => 'Default Image',
      'parent_slug' => 'theme-general-options',
    ));
    
  }
