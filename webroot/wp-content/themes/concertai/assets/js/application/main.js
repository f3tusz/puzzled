import 'bootstrap';

/*
 Async Webfont loader.
 Documentation: https://github.com/typekit/webfontloader
 */ 
let WebFont = require('webfontloader');

WebFont.load({
  google: {
    families: ['Roboto', 'Questrial']
  }
})


jQuery(function($){
	console.log('this is working.')
})
