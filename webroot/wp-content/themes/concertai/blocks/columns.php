<?php


    $row_of_columns = get_field('row_of_columns');

    $colClassArray = array();
    $colClassArray[2] = "col-12 col-md-6";
    $colClassArray[3] = "col-12 col-md-4";
    $colClassArray[4] = "col-12 col-lg-3 col-md-6";
    $colClassArray[5] = "col-12 col-flex-5col"; 

    $container_atts = container_atts();
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

    $alignment = 'left';
    if (get_field('block_title_alignment') != ''){
        $alignment = get_field('block_title_alignment');
    } 

    $white_text_array = array('#F5F5F6','#DFE2F0','#FFFFFF', "transparent");

    $pre_title = get_field('block_pre_title');
    $title = get_field('block_title');
    $body_text = get_field('body_text');
    $cta_text = get_field('cta_text');

?>
<div class="husl-block block-columns">
    <?php show_frames(); ?>
    <div class="<?php echo $container_class; ?> <?php if (get_field('frame_color')) { ?>has-color-bars-inner-row<?php } ?>" style="<?php echo $container_style; ?>">
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
            <!-- <div class="container"> -->
                <?php if ( $pre_title || $title): ?>
                <div class="row justify-content-center">

                    <div class="col-10 <?php /*?>col-offset-1 col-lg-offset-3<?php */?> col-lg-6" >
                        <div class="titles align-<?= $alignment; ?>">
                            <?php if ( $pre_title ) { ?>
                                <h6 data-aos="fade" data-aos-duration="500"><?php $pre_title; ?></h6>
                            <?php } ?>
                            <?php if(get_field('block_title')) { ?>
                                <h2 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_field('block_title'); ?></h2>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if (get_field('body_text')) { ?>
                    <div class="titles col-10 col-offset-1 col-lg-offset-2 col-lg-8 align-<?php the_field('block_title_alignment'); ?>" >
                        <div class="titles align-<?= $alignment; ?>">
                            <?php the_field('body_text'); ?>
                        </div>
                    </div>
                <?php } ?>
                <?php if (get_field('cta_text')) { ?>
                    <div class="titles col-10 col-offset-1 col-lg-offset-2 col-lg-8 align-<?php the_field('block_title_alignment'); ?>" >
                        <?php get_template_part('partials/cta'); ?>
                    </div>
                <?php } ?>
            
                
                <?php 
                foreach ($row_of_columns as $row){ ?>
                    <div class="row"> <?php
                        $columns = $row['column'];
                        $num_columns = sizeof($columns);
                        $colClass = $colClassArray[$num_columns];
                        foreach ($columns as $column){ 
                            $column_type = $column['column_type'];
                            $column_text = $column['text'];
                            $column_image = $column['image'];
                            $text_alignment = $column['text_alignment'];
                            $bg_color = $column['background_color'];
                            if ($bg_color == null || $bg_color == "#FFFFFF"){
                                $bg_color = "transparent";
                            }
                            $thisClass = "$colClass cta-$column_type text-$text_alignment";
                            $thisStyle = "background-color:$bg_color;";
                            if (!in_array($bg_color, $white_text_array)) {
                                $thisClass .= " dark-bg";
                            }
                            ?>
                            <div class="<?= $thisClass; ?>" style="<?= $thisStyle; ?>"><?php
                                if ($column_type == 'text'){
                                    echo $column_text; 
                                } else { ?>
                                    <img src="<?= $column_image['url']; ?>" alt="<?= $column_image['alt']; ?>" />
                                <?php } ?>
                            </div> <?php 
                        } //end foreach ?>
                    </div> <?php
                } ?>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>