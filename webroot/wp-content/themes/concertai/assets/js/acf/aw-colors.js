jQuery(document).ready(function($) {
  
  acf.add_filter('color_picker_args', function( args, $field ){
    
    args.palettes = ['#C20DD1', '#000F8C', '#3AD0F9', '#F86864', '#7311F2', '#000255', '#0C3675', '#A0A6CA', '#DFE2F0', '#F5F5F6']
    
    return args;

  });
  
});