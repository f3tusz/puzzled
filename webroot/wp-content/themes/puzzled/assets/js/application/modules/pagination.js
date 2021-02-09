$('#pagination').on('click', 'a', function(e){
    e.preventDefault();
    $(this).remove();
    $('#ajax-loader').load($(this).attr('href') + ' #ajax-posts>*', function(){
        $('#ajax-posts').append($('#ajax-loader').html());
    });
    $('#pagination').load($(this).attr('href') + ' #pagination>*');
});