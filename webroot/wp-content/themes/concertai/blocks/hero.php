<?php 
    $top_nav_bg_color = get_field('top_navigation_background_color');
    $subnavigation = get_field('subnavigation');
    $subnav_menu = get_field('subnavigation_menu');
    $frame = get_field('frame_color');

    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

?>

<div class="husl-block block-hero" style="position: relative;" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
    <?php if ($top_nav_bg_color == 'dark') { ?>
        <div class="hero-dark-bg">
            <div class="hero-dark-bg-white-container"></div> 
        </div>
    <?php } ?>
    <?php show_frames(); ?>
    <div class="<?php echo $container_class; ?> mobile-padding" style="<?php echo $container_style; ?>">
        <div class="row justify-content-center w-100 no-gutters">
            <div class="col-11 col-xl-12 hero-title-container">
                <?php get_template_part('partials/title-fields'); ?>
            </div>
        </div>
    </div>
    <?php 
    if (($subnavigation != 'off')){
        get_template_part('partials/subnavigation'); 
    } ?>
</div>