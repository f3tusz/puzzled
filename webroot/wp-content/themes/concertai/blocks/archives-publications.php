<?php 
    $ppp = 8;
    $post_type = 'publication';
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    $pub_query = new WP_Query($args);

    // Get the dropdown menus for the taxonomies we are filtering by
    $tax_terms_to_filter = array('research_type','cancer_type');
    $mobile_html_tax_filters_array = mobile_html_tax_filters($tax_terms_to_filter);
    $desktop_html_tax_filters_array = desktop_html_tax_filters($tax_terms_to_filter);

    ?>
    
<div class="husl-block block-publications-landing">
    <?php 
    // print the dropdowns. have not tested the layout with more than 2 dropdowns
    if (count($mobile_html_tax_filters_array) > 0) { ?>
        <div id="mobile_tax_filter_container" class="container <?php echo (wp_is_mobile() ? 'ismobile' : ''); ?>" >
            <div class="row publication-element tax-filter">
            <?php
                $count = 0;
                foreach( $mobile_html_tax_filters_array as $tax_dropdown_html ):
                ?>
                <div class="<?php echo ($count == 0) ? 'col-12 col-md-6 col-lg-4 offset-lg-2' : 'col-12 col-md-6 col-lg-4' ; ?>">
                    <?php echo $tax_dropdown_html; ?>
                </div>
                <?php
                $count++;
                endforeach;
            ?>
            </div>
        </div>
    <?php } 
    if (count($desktop_html_tax_filters_array) > 0) { ?>
        <div id="desktop_tax_filter_container" class="container <?php echo (wp_is_mobile() ? 'ismobile' : ''); ?>" >
            <div class="row publication-element tax-filter">
            <?php
                $count = 0;
                foreach( $desktop_html_tax_filters_array as $tax_dropdown_html ):
                ?>
                <div class="<?php echo ($count == 0) ? 'col-12 col-md-6 col-lg-4 offset-lg-2' : 'col-12 col-md-6 col-lg-4' ; ?>">
                    <?php echo $tax_dropdown_html; ?>
                </div>
                <?php
                $count++;
                endforeach;
            ?>
            </div>
        </div>
    <?php } 
    $nomoreposts = ($pub_query->max_num_pages > 1 ? '' : 'nomoreposts'); ?> 
    <div class="container <?= $nomoreposts; ?>" id="ajax-container"><?php     
    if ( $pub_query->have_posts() ) :
        while ( $pub_query->have_posts() ) : $pub_query->the_post();
            // Loop output goes here
            get_template_part('partials/archives/publication','archive');
        endwhile;
    endif; ?>
        
        <div class="row" id="nopostsfound">
            <div class="col-12 text-center">
                <h3>No results found. Please adjust the filters and try again.</h3>
            </div>
        </div>
    </div>
    
    <?php 
    if (  $pub_query->max_num_pages > 1 ) { ?>
        <div id="loadmore_container" class="container">
            <div class="row publication-element">
                <div class="col-12 text-center">
                    <a href="#" class="cta cta-small button_loadmore" id="more_posts">Load More<?php get_template_part('partials/svgs/arrow-down','svg'); ?></a>
                </div>
            </div>
        </div>
        <?php
    }

    // Reset postdata
wp_reset_postdata();
//var_dump($wp_query->query_vars);



// Custom query loop pagination
//previous_posts_link( 'Older Posts' );
//next_posts_link( 'Newer Posts', $pub_query->max_num_pages );

// Reset main query object
//$wp_query = NULL;
//$wp_query = $temp_query;


    /*
    while ( $loop->have_posts() ) { 
        $loop->the_post(); 

        get_template_part('partials/archives/publication','archive');
    }

    wp_reset_postdata(); 
*/
?>
</div>

<script type="text/javascript">
    jQuery(function($){
    var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    var page = <?php echo $paged; ?>; // What page we are on.
    var ppp = <?php echo $ppp; ?>; // Post per page
    var tax_array = [];

    $(document).click(function(){
        $('ul.interacted').removeClass('interacted');
    });


    function ajaxPublications(tax_array){
        var offset = $('.publication-entry:not(.remove)').length;
        var ppp = <?php echo $ppp; ?> - offset;
        var page = 1;
        if (ppp <= offset){
            page = Math.floor(offset / ppp);
        }

        $.post(ajaxUrl, {
            action:"more_post_ajax",
            tax_query: tax_array,
            offset: offset,
            ppp: ppp,
            page: page
        }).success(function(posts){
          
            $('.publication-entry.remove').remove();
            var jsonObj = JSON.parse(posts);
            $("#ajax-container").append(jsonObj.content); 
            if ($('.publication-entry').length == 0){
                $('#nopostsfound').show();
            } else {
                $('#nopostsfound').hide();
            }
            $("#more_posts").attr("disabled",false);
            if (jsonObj.last_page == true || jsonObj.max == 0){
                $('#more_posts').hide();
                $('#ajax-container').addClass('nomoreposts');
            } else {
                $('#more_posts').show();
                $('#ajax-container').removeClass('nomoreposts');
            }
        }).error(function(posts){
            alert('Something went wrong trying to fetch more posts. Please check the console log for more info');
            console.log("Error trying to fetch posts.")
            console.log(posts);
        });
    }

    function getPubQuery(selects){
        tax_array = [];
        $.each(selects, function(key,value){
            var taxonomy = $(this).attr('data-tax');
            var field = 'slug';
            var terms = '';
            $('.publication-entry').addClass('filtered-result');
            if ($(this).prop('nodeName') == "UL"){
                terms = $(this).find('.data_selected').attr('data-value');
            } else {
                terms = $(this).find(':selected').val();
            }
            if (terms != undefined){
                if (terms != ''){
                    if (terms != 'all'){
                        if (terms != 'default') {
                            tax_array.push({
                                taxonomy : taxonomy,
                                field : field,
                                terms : terms
                            });
                        }
                    }
                }
            }
        });
        return tax_array;
    }

    function markForRemoval(tax_array){
        //find out how many posts on this page match what we have to use for the offset
        //Since we have multiple filters possibly that are AND joined, we will just filter OUT whatever doesn't match either 
        $.each(tax_array, function(key,value){
            if (value.terms != undefined){
                var data_str = '[data-' + value.taxonomy + '*="' + value.terms + '"]';
                $('.publication-entry').not(data_str).addClass('remove');
            }
        });
    }

    function filterFix(selector){
        var tax = $(selector).data('tax');
        var val = $(selector).data('value');
        var changedVal = '';
        var dataTax = '[data-tax=' + tax + ']';
        var text = '';
        if ($(selector).prop('nodeName') == "SELECT"){
            changedVal = $(selector).find(':selected').val();
            text = $(selector).find(':selected').text();
            $(dataTax).attr('data-value', changedVal);

            $('ul.select' + dataTax).find('.data_selected').removeClass('data_selected');
            $('ul.select' + dataTax).find('[data-value=' + changedVal + ']').addClass("data_selected");
            $('ul.select' + dataTax).siblings('.select_controller').find('.init').text(text);
        } else {
            changedVal = $(selector).find('.data_selected').data('value');
            text = $(selector).find('.data_selected').text();

            $('select.select_filter' + dataTax).val(changedVal);
            $('select.select_filter' + dataTax).attr('data-value', changedVal);
            $('ul.select_filter' + dataTax).siblings('.select_controller').find('.init').text(text);
        }

        if (changedVal =='all'){
            $('select.select_filter' + dataTax).val('default');
            $('ul.select_filter' + dataTax + ' .data_selected').removeClass('data_selected');
            $('ul.select_filter' + dataTax + ' .clear_filter').addClass('data_selected');
            $('.filtered-result').remove();

            if (tax == 'research_type') {
                $('ul.select_filter' + dataTax + ' .init').text('Show by Research Types');
                $('ul.select_filter' + dataTax).siblings('.select_controller').find('.init').text('Show by Research Types');
            }
            if (tax == 'cancer_type') {
                $('ul.select_filter' + dataTax + ' .init').text('Show by Cancer Types');
                $('ul.select_filter' + dataTax).siblings('.select_controller').find('.init').text('Show by Cancer Types');
            }
        }
    }
    
    
    $("#more_posts").on("click",function(){ // When btn is pressed.
        $("#more_posts").hide(); // Disable the button, temp.
        $.post(ajaxUrl, {
            action:"more_post_ajax",
            offset: (page * ppp),
            ppp: ppp,
            page: page + 1,
            tax_query : tax_array
        }).success(function(posts){
            var jsonObj = JSON.parse(posts);
            page++;
            $('.publication-entry.remove').remove();
            $("#ajax-container").append(jsonObj.content); 
            if (jsonObj.last_page != true  || jsonObj.max == 0){
                $('#more_posts').show();
                $('#ajax-container').removeClass('nomoreposts');
            } else {
                $('#ajax-container').addClass('nomoreposts');
            }

        }).error(function(posts){
            alert('Something went wrong trying to fetch more posts. Please check the console log for more info');
            console.log("Error trying to fetch posts.")
            console.log(posts);
        });
    });

    //mobile
    $('select.select_filter').change(function(){
        var selects = $(this).closest('.tax-filter').find('select');
        if (selects.length > 0){
            // build the tax_query 
            tax_array = getPubQuery(selects);
            markForRemoval(tax_array);
            ajaxPublications(tax_array);
            filterFix(this);
        }
        //1. Get all possible tax filters (changing this select doesn't get us any other filters in existence)

        // 2. Check the posts we have displayed. 
        // 2a. if it's more than ${POSTS_PER_PAGE}, we should just hide the stuff that is filtered out. need to make a special ajax call to see if we need the load more button
        // 2b. if it's less than ${POSTS_PER_PAGE}, we should hide the other posts, but only load enough posts to get us to ${POSTS_PER_PAGE}

        // need to pass more variables, specifically the tax filters

        // need to add the clear filters option from jobs
    });

    //desktop
    $("li.option.init, div.init").on("click", function(e) {
        e.stopPropagation();
        var select = $(this).parent().siblings('ul.select');
        if ($(select).hasClass('interacted')){
            $(select).removeClass('interacted');
        } else {
            $(this).closest('.tax-filter').find('.interacted').removeClass('interacted');
            $(select).addClass('interacted');
        }
    });
    $("li.option:not(.init)").on("click", function(){
        var select = $(this).closest('.select');
        if ($(this).hasClass('data_selected')){ // we don't want to filter if they're choosing what's already the filter
            $(select).removeClass("interacted");
            return false;
        }
        var li_init = $(select).find('.init');
        $(li_init).text($(this).text());
        $(li_init).attr("data-value", $(this).attr("data-value"));
        $(select).attr("data-value", $(this).attr("data-value"));
        $(select).removeClass("interacted");
        $(select).find('.data_selected').removeClass('data_selected');
        $(this).addClass('data_selected',true);
        $(select).trigger("datachange");

        //trigger filter
    });
    $('ul.select').on('datachange', function(){
        var selects = $(this).closest('.tax-filter').find('.select_filter');
        if (selects.length > 0){
            // build the tax_query 
            tax_array = getPubQuery(selects);
            markForRemoval(tax_array);
            ajaxPublications(tax_array);
            filterFix(this);
        }
    });

    /*var allOptions = $("ul").children('li:not(.init)');
    $("ul").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("ul").children('.init').html($(this).html());
        allOptions.toggle();
    });
*/





});
</script>