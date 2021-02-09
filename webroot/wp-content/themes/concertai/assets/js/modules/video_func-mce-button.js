(function() {
    tinymce.PluginManager.add('video_func_mce_button', function( editor, url ) {
        editor.addButton('video_func_mce_button', {
                    text: 'Video',
                    icon: false,
                    onclick: function() {
                      // change the shortcode as per your requirement
                       editor.insertContent('[video title="Lorem ipsum dolor" url="https://vimeo.com/435831960" poster="/wp-content/uploads/2020/07/ed-stepanski.jpg"][/video]');
                   }
          });
    });
})();