<?php 
    function container_atts($fluid = false){
        $white_text_array = array('#F5F5F6','#DFE2F0','#FFFFFF');
        $hero_type = get_field('background_type');
        if ($hero_type == null){
            $hero_type = 'basic';
        }
        $background_image = get_field('background_image');
        $background_color = get_field('background_color');
        $container_class = "anchor container";
        if ($fluid == true || $hero_type == 'solid' || $hero_type == 'image' || $hero_type == 'gradient'){
            $container_class .= "-fluid";
        }
        $container_style = "";
        $background_style = "";
        if(get_field('padding_top') != "custom") {
            $container_class .= " padding-top-" . get_field('padding_top');
        } else {
            $container_style .= "padding-top:" . get_field('padding_top_value') . "px;";
        }
        if(get_field('padding_bottom') != "custom") {
            $container_class .= " padding-bottom-" . get_field('padding_bottom');
        } else {
            $container_style .= "padding-bottom:" . get_field('padding_bottom_value') . "px;";
        }
        if ($hero_type == 'basic'){
            $container_class .= " bg-basic";
            $background_style .= "background-color:white;";
        }
        if ($hero_type == 'solid'){
            $container_style .= "background-color:$background_color;";
            $background_style .= "background-color:$background_color;";
            $container_class .= " bg-solid";
            if (!in_array($background_color, $white_text_array)) {
                $container_class .= " dark-bg";
            }
        }
        if ($hero_type == 'image'){
            $has_gradient = get_field('has_background_overlay');
            if ($has_gradient == 'yes'){
                $gradient_color = get_field('background_overlay_color');
                $gradient_opacity = get_field('background_overlay_opacity');
                list($r, $g, $b) = sscanf($gradient_color, "#%02x%02x%02x");
                $gradient_color_rgb = "linear-gradient(180deg, rgba($r, $g, $b, $gradient_opacity) 0%, rgba($r, $g, $b, $gradient_opacity) 100%), url('" . $background_image['url'] . "')";
                $container_style .= "background: $gradient_color_rgb;";
            } else {
                $default_gradient = get_field('default_gradient');
                if ($default_gradient != 'no'){
                    $container_style .= "background: linear-gradient(180deg, rgba(0, 15, 140, 0.6) 0%, rgba(0, 15, 140, 0.6) 100%), url('" . $background_image['url'] . "');";
                } else {
                    $container_style .= "background: url('" . $background_image['url'] . "');";
                }
            }
            $container_class .= " bg-image dark-bg";
        }
        if ($hero_type == 'gradient'){
            $background_gradient_top = get_field('background_gradient_top');
            $background_gradient_bottom= get_field('background_gradient_bottom');
            $background_style = "background: linear-gradient(180deg, $background_gradient_top 0%, $background_gradient_bottom 100%);";
            $container_style .= $background_style;
            $container_class .= " bg-gradient dark-bg";
        }
        if(get_field('has_background_overlay') == "yes") { 
          $container_class .= " has-bg-overlay";
        }
        $ret = array(
            'container_class' => $container_class,
            'container_style' => $container_style,
            'background_style' => $background_style
        );
        return $ret;
    }
?>