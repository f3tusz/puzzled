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
<div class="husl-block husl-block-featured-media">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?> z-index" style="<?= $container_style; ?>">
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
        <div class="container">
            <div class="row">
                <div class="<?= $col_class; ?>">
                    <?php get_template_part('partials/title-fields'); ?>
                </div>
            </div>
            <?php $poster_image = get_field('poster_image'); ?>
            <?php if($poster_image) {?>
              <div class="row">
                <div class="col-lg-10 poster-image">
                  <?php if(get_field('video_url')) { ?>
                  <div class="video-wrap">
                  <div class="video-image bg-cover" style="background-image:url(<?php echo $poster_image['url']; ?>);"0>
                  <div class="bottom-overlay"></div>
                  </div>
                    
                  </div>
                  <a class="icon-play-wrap mfp-pop mfp-iframe" href="<?php the_field('video_url'); ?>">
                    <img class="icon-play" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-play.svg" alt="Play" />
                    <img class="icon-play-hover" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-play-hover.svg" alt="Play" />
                  </a>
                  <?php } else { ?>
                  
                  <img src="<?php echo $poster_image['url']; ?>" alt="<?php echo $poster_image['alt']; ?>" />
                  <div class="bottom-overlay"></div>
                  <?php } ?>
                  <?php if(get_field('text_overlay')) { ?>
                    <h5 class="text-overlay"><?php the_field('text_overlay'); ?></h5>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
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
  <?php if(get_field('color_block') == "yes") { ?>
  <div class="color-block" style="background-color:<?php the_field('color_block_color'); ?>"></div>
  <?php } ?>
</div>