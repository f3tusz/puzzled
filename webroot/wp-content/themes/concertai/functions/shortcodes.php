<?php
// [button text="text" size="large" url="url" target="target"]
function button_func( $atts ) {
    $a = shortcode_atts( array(
        'text' => 'Button Text',
        'url' => '/',
        'target' => '_self',
        'size' => 'large',
    ), $atts );

    $s = "<a class='btn btn-primary btn-{$a['size']}' href='{$a['url']}' target='{$a['target']}'>{$a['text']}</a>";

    return $s;
}
add_shortcode( 'button', 'button_func' );

function video_func( $atts ) {
    $a = shortcode_atts( array(
        'url' => '',
        'poster' => '',
        'title' => '',
    ), $atts );

    //$s = "<a class='btn btn-primary btn-{$a['size']}' href='{$a['url']}' target='{$a['target']}'>{$a['text']}</a>";
    $s = '<div class="husl-block husl-block-featured-media">';
    $s .= ' <div class="padding-top-small padding-bottom-none bg-solid z-index">';
    $s .= '   <div class="">';
    $s .= '      <div class="row">';
    $s .= '        <div class="col-lg-12 poster-image">';
    $s .= '            <div class="video-wrap">';
    $s .= '              <div class="video-image bg-cover" style="background-image:url('.$a['poster'].');">';
    $s .= '              <div class="bottom-overlay"></div>';

    $s .= '            </div>';
    $s .= '          </div>';
      $s .= '              <a class="icon-play-wrap icon-play-wrap-shortcode mfp-pop mfp-iframe" href="'.$a['url'].'?autoplay=1"> ';
    $s .= '                <img class="icon-play" src="'.get_template_directory_uri().'/assets/img/icon-play.svg" alt="Play"> ';
    $s .= '                <img class="icon-play-hover" src="'.get_template_directory_uri().'/assets/img/icon-play-hover.svg" alt="Play"> ';
    $s .= '              </a> ';
    $s .= '          <h5 class="text-overlay">'.$a['title'].'</h5>';
    $s .= '        </div>';
    $s .= '      </div>';
    $s .= '   </div>';
    $s .= '  </div>';
    $s .= '</div>';

    return $s;
}
add_shortcode( 'video', 'video_func' );

// Add Counting Number shortcode to WYSIWYG
function video_func_add_mce_button() {
    // check user permissions
    if ( !current_user_can( 'edit_posts' ) &&  !current_user_can( 'edit_pages' ) ) {
               return;
       }
   // check if WYSIWYG is enabled
   if ( 'true' == get_user_option( 'rich_editing' ) ) {
       add_filter( 'mce_external_plugins', 'video_func_add_tinymce_plugin' );
       add_filter( 'mce_buttons_2', 'video_func_register_mce_button' );
       }
  }
  add_action('admin_head', 'video_func_add_mce_button');
  
  // register new button in the editor
  function video_func_register_mce_button( $buttons ) {
    array_push( $buttons, 'video_func_mce_button' );
    return $buttons;
  }
  
  // declare a script for the new button
  // the script will insert the shortcode on the click event
  function video_func_add_tinymce_plugin( $plugin_array ) {
  $plugin_array['video_func_mce_button'] = get_stylesheet_directory_uri() .'/assets/js/modules/video_func-mce-button.js';
  return $plugin_array;
  }


// [hubspot_cta id="123"]
function hubspot_cta_func( $atts ) {
    $a = shortcode_atts( array(
        'id' => '',
    ), $atts );

    $s = '<a class="cta" href="https://cta-redirect.hubspot.com/cta/redirect/5411893/'.$a['id'].'"  target="_blank" >Read More <svg class="arrow-svg" width="22" height="15" fill="none" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 21.4 14.2" style="enable-background:new 0 0 21.4 14.2;" xml:space="preserve">
<polygon points="14.3,0 12.9,1.4 17.6,6.1 0,6.1 0,8.1 17.6,8.1 12.9,12.8 14.3,14.2 21.4,7.1 "></polygon>
</svg></a><script charset="utf-8" src="https://js.hscta.net/cta/current.js"></script><script type="text/javascript"> hbspt.cta.load(5411893, "'.$a['id'].'", {}); </script>';
      //$a['id']
      //"<a class='btn btn-primary btn-{}' href='{$a['url']}' target='{$a['target']}'>{$a['text']}</a>";

    return $s;
}
add_shortcode( 'hubspot_cta', 'hubspot_cta_func' );