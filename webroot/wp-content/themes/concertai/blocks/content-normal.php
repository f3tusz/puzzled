<?php
    $container_atts = container_atts(true);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

    $alignment = get_field('alignment');
    $block_title_alignment = get_field('block_title_alignment');

    $col_class = "col-12 col-lg-offset-2 col-lg-8";
    if ($alignment == 'center' || $block_title_alignment == "center"){
        $col_class .= " align-center";
    }
    $frames = get_field('frame_color');
?>
<div class="husl-block husl-block-normal-content" >
    <?php if (get_field('section_id')){ ?> 
        <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
    <?php } ?>
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?> <?php if ($frames && $frames != "none") { ?>has-color-bars-inner-container<?php } ?>" style="<?= $container_style; ?>">
        <div class="container">
            <div class="row">
                <div class="<?= $col_class; ?>">
                    <?php get_template_part('partials/title-fields'); ?>
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
</div>