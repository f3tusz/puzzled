<?php
    $image = get_field('image');

    $container_atts = container_atts(true);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];
    $background_style = $container_atts['background_style'];

    $background_type = get_field('background_type');
    $zoom_bg = get_field('custom_background_on_zoom');
    $zoom_html = false;
    if ($background_type == 'image') {
        $zoom_html = '';
        if ($zoom_bg == 'color') {
            $color = get_field('custom_background_color');
            $zoom_html = "background-color:$color;";
        } elseif ($zoom_bg == 'white'){
            $zoom_html = "background-color:white;";
        } elseif ($zoom_bg == 'gradient'){
            $grad1 = get_field('custom_background_gradient_1');
            $grad2 = get_field('custom_background_gradient_2');
            $zoom_html = "background: linear-gradient(180deg, $grad1 0%, $grad2 100%);";
        }
    }
?>
<div class="husl-block block-wide-content">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?> <?php if (get_field('frame_color') != "none") { ?>has-color-bars-inner-container<?php } ?>" style="<?= $container_style; ?>">
            <div class="container" >
            <?php if (get_field('section_id')){ ?> 
                <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
            <?php } ?>
                <div class="row">
                    <div class="col-12 col-lg-offset-2 col-lg-8">
                        <?php get_template_part('partials/title-fields'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php 
                            $wide_content_classes = "wide-content-image";
                            if(get_field('desktop_max_width_60')){  
                                $wide_content_classes .= " max-width-60"; 
                            }
                            if(get_field('multiple_images')){
                                $wide_content_classes .= " multiple-images"; 
                            }
                        ?>

                        <div class="<?php echo $wide_content_classes; ?>">

                            <div class="magnifier"></div><?php 

                            if($image && !get_field('multiple_images')){ ?>
                                <img src="<?php echo $image['url']; ?>" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="modal-image" />
                            <?php } 
                            if( get_field('multiple_images') ){
                                $i = 1;
                                while( has_sub_field('multiple_images') ){ 
                                    $images = get_sub_field('images'); 
                                    $row_count = count(get_field('multiple_images'));
                                    $aos_delay = 300 * get_row_index(); ?>

                                    <img src="<?php echo $images['url']; ?>" alt="<?php echo $images['alt']; ?>" data-aos="fade" data-aos-duration="500" data-aos-delay="<?= $aos_delay ?>"<?php if($i == $row_count) { ?> class="modal-image"<?php } ?> data-src="<?php echo $image['url']; ?>" data-row="id-<?php echo $row_index; ?>" /><?php
                                    
                                    $i++;
                                }
                            } ?>
                        </div>
                        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="<?php if ($zoom_html != false) { echo $zoom_html; } else { echo $background_style; } ?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-svg nav-svg close-svg" id="close-modal">
                                            <?php get_template_part('partials/svgs/menu-close', 'svg'); ?>
                                        </div>
                                    </div>
                                    <div class="modal-body" id="modalbody">
                                        <img src="" id="imagepreview" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>