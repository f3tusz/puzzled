<?php

/**
 * Scripts and stylesheets
 */


function get_theme_assets_staging()
{
  $manifest_url = get_template_directory_uri() . '/assets/build/mix-manifest.json';
  $username = 'uptrending';
  $password = 'trendup21';

  $context = stream_context_create(array(
    'http' => array(
      'header'  => "Authorization: Basic " . base64_encode("$username:$password")
    )
  ));
  $get_url = file_get_contents($manifest_url, false, $context);
  $manifest = json_decode($get_url, true);
  return $manifest;
}

function get_theme_assets()
{

  $manifest_url = get_template_directory_uri() . '/assets/build/mix-manifest.json';
  $get_url = file_get_contents($manifest_url);
  $manifest = json_decode($get_url, true);
  return $manifest;
}

function getCorrectManifestFile()
{
  if (WP_ENVIRONMENT == 'STAGING') {
    return get_theme_assets_staging();
  } else {
    return get_theme_assets();
  }
}

function theme_scripts()
{
  $manifest = getCorrectManifestFile();

  if (is_single() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
  }
  // Assets
  $rand = rand(0,99999);
  wp_enqueue_script('manifest', get_template_directory_uri() . "/assets/build/manifest.js",'',$rand, true);
  wp_enqueue_script('vendor', get_template_directory_uri() .   "/assets/build/vendor.js",'',$rand, true);
  wp_enqueue_script('theme', get_template_directory_uri() .    "/assets/build/main.js",'',$rand, true);
  wp_enqueue_style('master', get_template_directory_uri()  .   "/assets/build/style.css", true, $rand, 'all');
  wp_enqueue_style('list', '//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js','jQuery',$rand, true );
}

add_action('wp_enqueue_scripts', 'theme_scripts');
