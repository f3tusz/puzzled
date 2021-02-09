<?php    

    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];
    $alignment = 'left';
    $col_class_1 = "col-12 col-md-4 align-$alignment";
    $col_class_2 = "col-12 col-md-8";
?>
<div class="husl-block block-tooltips">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?>" style="<?= $container_style; ?>">
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="<?= $col_class_1; ?>">
                    <?php get_template_part('partials/title-fields'); ?>
                </div>
                <div class="<?= $col_class_2; ?>">
                    <?php 
                        $tooltip_columns = get_field('tooltip_columns');
                        $tooltip_color = get_field('tooltip_color');
                        if ($tooltip_color == null){
                            $tooltip_color = "rgba(223,50,240,0.25);";
                            $tooltip_class = "white";
                        } else {
                            $tooltip_class = "solid";
                        }
                        $tooltips = get_field('tooltips');

                        /*var_dump($tooltip_columns);
                        var_dump($tooltip_color);
                        var_dump($tooltips); */
                    ?>
                    <div class="tooltip_container tooltip_columns_<?= $tooltip_columns; ?> <?= $tooltip_class; ?>" >
                        <?php foreach ($tooltips as $tooltip){
                            $title = $tooltip['tooltip_title'];
                            $content = $tooltip['tooltip_content'];
                            $no_content = '';
                            if (strlen($content) == 0){
                                $no_content = 'no-content';
                            }
                            ?>
                            <div class="tooltip <?= $no_content; ?>" style="background-color:<?= $tooltip_color; ?>">
                                <div class="tooltip-text">
                                    <div class="tooltip-title">
                                        <h6><?= $tooltip['tooltip_title']; ?></h6>
                                    </div>
                                    <div class="tooltip-content">
                                        <?= $tooltip['tooltip_content']; ?>
                                    </div>
                                </div>
                                <div class="tooltip-info"><?php get_template_part('partials/svgs/info','svg'); ?></div>
                            </div>
                        <?php 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>