<?php
    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

    $alignment = get_field('alignment');
    $block_title_alignment = get_field('block_title_alignment');

    $col_class = "col-12 col-lg-offset-2 col-lg-8";
    if ($alignment == 'center' || $block_title_alignment == "center"){
        $col_class .= " align-center";
    }

    $svg_color_array = create_svg_color_array();
?>
<div class="husl-block husl-block-content-with-form">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?>" style="<?= $container_style; ?>">
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
        <div class="row">
            <div class="col-lg-6 col-md-12">
            <?php get_template_part('partials/title-fields'); ?>      
            </div>
            
            <div class="col-lg-5 col-md-12 offset-lg-1">
            <?php the_field('hubspot_form_embed_code'); ?>     
            </div>
        </div>
        <?php $cta_text = get_field('cta_text'); ?>
        <?php if (strlen($cta_text) > 0 ) { ?>
            <div class="row">
                <div class="<?= $col_class; ?>">
                    <?php get_template_part('partials/cta'); ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>