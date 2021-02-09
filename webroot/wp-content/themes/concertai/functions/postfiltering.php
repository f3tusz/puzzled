<?php 
    // Create drop down filters for taxonomies
    function mobile_html_tax_filters($arr_tax){
        // make this an array if just a string was passed
        $arr_tax = (is_string($arr_tax) ? array($arr_tax) : $arr_tax);

        $html_array = array();
//        $arr_tax = array("not");
        foreach ($arr_tax as $tax){
            $terms = get_terms($tax);
            if (is_array($terms)){        
                $html = "";
                $taxonomy_details = get_taxonomy( $tax );
                $tax_name = $taxonomy_details->labels->singular_name;
                $html .= "<select class='select_filter' data-tax='" . $tax . "'data-value='all'><option selected disabled value='default'>Show by " . $tax_name . "</option><option value='all' class='clear_filter'>View All</option>";
                foreach ($terms as $term){
                    $html .= "<option value='" . $term->slug . "'>" . $term->name . "</option>";
                }
                $html .= "</select>";
                array_push($html_array, $html);
            } else {
                var_dump("ERROR");
                var_dump($terms);
            }
        }
        return $html_array;
    }
    
    function desktop_html_tax_filters($arr_tax){
        // make this an array if just a string was passed
        $arr_tax = (is_string($arr_tax) ? array($arr_tax) : $arr_tax);

        $html_array = array();
//        $arr_tax = array("not");
        foreach ($arr_tax as $tax){
            $terms = get_terms($tax);
            if (is_array($terms)){        
                $html = "";
                $taxonomy_details = get_taxonomy( $tax );
                $tax_name = $taxonomy_details->labels->singular_name;
                $html .= "<div class='select_controller'><div class='option init selected'>Show by $tax_name</div></div><ul class='select_filter select' data-tax='" . $tax ."' data-value='all'><li class='option data_selected clear_filter' data-value='all'>View All</li>";
                foreach ($terms as $term){
                    $html .= "<li class='option' data-value='" . $term->slug . "'>" . $term->name . "</li>";
                }
                $html .= "</ul>";
                array_push($html_array, $html);
            } else {
                var_dump("ERROR");
                var_dump($terms);
            }
        }
        return $html_array;
    }
?>