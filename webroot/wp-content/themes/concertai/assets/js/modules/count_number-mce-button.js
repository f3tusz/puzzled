(function() {
    tinymce.PluginManager.add('count_number_mce_button', function( editor, url ) {
        editor.addButton('count_number_mce_button', {
                    text: 'Count Number',
                    icon: false,
                    onclick: function() {
                      // change the shortcode as per your requirement
                       editor.insertContent('[counting_number number="10" size="regular/large/xlarge" color="white" before_text="" after_text="%"]');
                   }
          });
    });
})();