<div class="husl-block husl-block-centered-content block-box-cta">
    <?php show_frames(); ?>
<?php 
    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];
    ?>
    <div class="<?php echo $container_class; ?>" style="<?php echo $container_style; ?>" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
        <div class="row">
            <div class="col-12 col-lg-offset-2 col-lg-8">
                <?php get_template_part('partials/title-fields'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12 box-cta-wrapper row">
                <?php 
                    $ctas = get_field('box_ctas');
                    $delay = 0;
                    foreach ($ctas as $cta){
                        $delay += 150; ?>
                        <a href="<?php echo $cta['url']; ?>" class="box-cta col-lg-5ths aos-init aos-animate" data-aos-once="true" data-aos="fade" data-aos-duration="300" data-aos-delay="<?= $delay; ?>">
                            <div class="box-cta-container">
                              <div class="text-wrap">
                                <h4><?php echo $cta['title']; ?></h4> <?php 
                            echo '<div class="svg-container"><img src="' . $cta['svg'] . '" /></div>'; ?>
                              </div>
                            </div>
                        </a> <?php
                    }
                ?>
            </div>
        </div>
    <?php if(get_field('cta_text')){ ?>
        <div class="row box-cta-final-cta">
            <div class="col-12 align-center">
                <?php echo get_template_part('partials/cta'); ?>
            </div>
        </div> <?php 
    } ?>
    </div>



</div>