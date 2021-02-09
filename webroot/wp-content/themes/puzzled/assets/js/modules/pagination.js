import Masonry from "masonry-layout";
import Splitting from "splitting";

export default {
  init() {
    //console.log('sihay');
    var newsMasonry;
    
    function updateMasonry() {
      var newsMasonry = new Masonry( '.masonry', {
        gutter: 30,
        itemSelector: '.masonry-item',
        percentPosition: true
      });
    }
    
    $('#pagination').on('click', 'a', function(e){
      e.preventDefault();
      $(this).remove();
      $('#ajax-loader').load($(this).attr('href') + ' #ajax-posts>*', function(){
        $('#ajax-posts').append($('#ajax-loader').html());
        Splitting({ target: $('.link-wrap h3'), by: 'chars' });
        if ($('.masonry').length > 0){
          updateMasonry();
        }
      });
      $('#pagination').load($(this).attr('href') + ' #pagination>*');
    });

    if ($('.masonry').length > 0){
      updateMasonry();
    }

  }
};