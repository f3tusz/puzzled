(function() {
    tinymce.PluginManager.add('cta_arrow_mce_button', function( editor, url ) {
        editor.addButton('cta_arrow_mce_button', {
                    text: "CTA With Arrow",
                    icon: false,
                    onclick: function() {
                      // change the shortcode as per your requirement
                       editor.insertContent('[cta_arrow text="Lorem Ipsum" size="small/large" url="#" target="_blank"]');
                   }
          });
    });
})();