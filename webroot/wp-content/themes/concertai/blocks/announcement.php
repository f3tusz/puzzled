<?php
    $background_image = get_field('background_image');
    $announcements = get_field('announcement');
    $col_class = "col-12 col-lg-offset-2 col-lg-8";
    if ($alignment == 'center' || $block_title_alignment == "center"){
        $col_class .= " align-center";
    }
    if (get_field('block_pre_title') || get_field('block_title')){
        $col_class .= " pb-7";
    }
    ?>
<div class="husl-block block-announcement<?php if(get_field('has_background_overlay') == "yes") { ?> has-bg-overlay <?php } ?> <?php if(get_field('padding_top') != "custom") { ?>padding-top-<?php the_field('padding_top'); ?><?php } ?> <?php if(get_field('padding_top') != "custom") { ?>padding-bottom-<?php the_field('padding_bottom'); } ?>" style="background-image:url(<?php echo $background_image['url']; ?>);
<?php if(get_field('padding_top') == "custom") { ?>
padding-top:<?php the_field('padding_top_value'); ?>px!important;<?php } ?>
<?php if(get_field('padding_bottom') == "custom") { ?> padding-bottom:<?php the_field('padding_bottom_value'); ?>px!important;<?php } ?>">
    <div class="bg-overlay" style="background-color:<?php the_field('background_overlay_color'); ?>;opacity:<?php the_field('background_overlay_opacity'); ?>;"></div>
    <?php show_frames(); ?>
    <div class="container" >
    <?php
        if (get_field('section_id')) { ?> 
        <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
    <?php
        } ?>
        <div class="row">
        <div class="<?= $col_class; ?>">
        <?php get_template_part('partials/title-fields'); ?>      
        </div>
    </div>
        <?php
        $count = count($announcements);
        set_query_var('announcements', $announcements);
        set_query_var('count', $count);
        if ($count == 1){
            get_template_part( 'blocks/single', 'announcement');
        } else {
            get_template_part( 'blocks/more', 'announcements');
        } ?>
  </div>
</div>