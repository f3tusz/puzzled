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

    $svg_color_array = create_svg_color_array();
?>
<div class="husl-block husl-block-highlights">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?>" style="<?= $container_style; ?>">
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
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
            <?php 
                $highlights = get_field('highlights');
                $highlight_icons_color = get_field('highlight_icons_color');
                
                //var_dump($highlights);
                //var_dump($highlight_icons_color);
                
                ?>
            <?php if ($highlights){ 
                $total_highlights = count($highlights);
                $col_class = "highlight col-12";
                if ($total_highlights == 2 || $total_highlights == 3 || $total_highlights == 6){
                    $col_class .= " col-sm-4";
                } elseif ($total_highlights == 4 || $total_highlights == 7){
                    $col_class .= " col-sm-3";
                } elseif ($total_highlights == 5){
                    $col_class .= " col-flex-5col";
                } else {
                    $col_class .= " col-sm-3";
                }
                
                ?>
                <div class="row center-sm">
                    <?php 
                    $counter = 0;
                    $delay = 0;
                    foreach ($highlights as $highlight){
                        $delay += 100; ?>
                        <div class="<?= $col_class; ?>">
                        <?php //var_dump($highlight); ?>
                            <div class="highlight-icon aos-init aos-animate" data-aos="fade" data-aos-once="true" data-aos-duration="500" data-aos-delay="<?= $delay; ?>">
                                <img src="<?= $highlight['highlights_icon']; ?>" style="<?= $svg_color_array[$highlight_icons_color]; ?>" />
                            </div>
                            <div class="highlight-title">
                                <h5><?= $highlight['highlights_title']; ?></h5>
                            </div>
                            <div class="highlight-content">
                                <?= $highlight['highlights_content']; ?>
                            </div>
                        </div>
                    <?php 
                        $counter++;
                    }
                    ?>
            </div> <?php
            } ?>
        </div>
    </div>
</div>