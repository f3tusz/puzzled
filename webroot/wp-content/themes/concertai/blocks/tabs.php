<?php    

    $container_atts = container_atts(true);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];
?>
<?php $alignment = 'left';
if (get_field('block_title_alignment') != ''){
  $alignment = get_field('block_title_alignment');
} 

?>
<div class="husl-block block-tabs">
    <div class="<?= $container_class; ?>" style="<?= $container_style; ?>" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
        <div class="title-fields-container row justify-content-center">
            <div class="col-10 <?php /*?>col-offset-1 col-lg-offset-3<?php */?> col-lg-6" >
                <div class="titles align-<?= $alignment ?>">
                    <?php if(get_field('block_pre_title')) { ?>
                        <h6 data-aos="fade" data-aos-duration="500"><?php the_field('block_pre_title'); ?></h6>
                    <?php } ?>
                    <?php if(get_field('block_title')) { ?>
                        <h2 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_field('block_title'); ?></h2>
                    <?php } else { ?>
                        <h1 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_title(); ?></h1>
                    <?php } ?>
                  <?php if(get_field('body_text')) { ?>
                    <?php the_field('body_text'); ?>
                  <?php } ?>
                </div>
            </div>
        </div>
        <div class="tab-container container">
            <ul class="nav nav-pills col-12 col-lg-5" id="pills-tab" role="tablist">
            <?php 
                $tabs = get_field('tabs');
                $active = 'active'; 
                $mactive = 'active show';
                $ix = 1;
                foreach ($tabs as $tab){ ?>
                    <li class="nav-item <?= $active; ?>">
                        <a class="nav-link noscroll  <?= $active; ?>" id="pills-tab-<?= $ix; ?>" data-toggle="pill" role="tab" aria-controls="pills-<?= $ix; ?>">
                            <span><?php echo $tab['tab_title']; ?></span>
                        </a>
                    </li>
                    <li class="mobile-nav-item">
                        <div class="tab-pane fade <?= $mactive; ?>" id="mpills-<?= $ix; ?>" role="tabpanel" aria-labelledby ="mpills-tab-<?= $ix; ?>">
                            <?php echo $tab['tab_content']; ?>
                            <?php if (strlen($tab['tab_cta_text']) > 0){
                                $cta_text = $tab['tab_cta_text'];
                                $temp_url = $tab['tab_cta_url'];
                                $cta_url_external = $tab['tab_cta_external_url'];
                                $cta_size = $tab['tab_cta_size'];
                                $class = "class='cta cta-$cta_size'"; 
                                if($temp_url != '' && $temp_url != null){
                                    $href = "href='$temp_url'";
                                    $target = "target=_blank";
                                } else  {
                                    $href = "href='$cta_url_external'";
                                    $target = "";
                                } ?>
                                
                                <a <?php echo "$href $target $class"; ?>>
                                    <span><?php echo $cta_text; ?></span>
                                    <?php get_template_part('partials/svgs/arrow','svg'); ?>
                                </a><?php 
                            }  ?>
                        </div>

                    </li>
                    
                    
                    
                    
                    <?php 
                    
                    $active = "";
                    $mactive = "";
                    $ix++; 
                } ?>
            </ul>
            <div class="tab-content col-12 col-md-6 col-md-offset-1">
            <?php 
                $tabs = get_field('tabs');
                $active = 'show active'; 
                $ix = 1;
                foreach ($tabs as $tab){ ?>
                    <div class="tab-pane fade <?= $active; ?>" id="pills-<?= $ix; ?>" role="tabpanel" aria-labelledby ="pills-tab-<?= $ix; ?>">
                        <?php echo $tab['tab_content']; ?>
                        <?php if (strlen($tab['tab_cta_text']) > 0){
                            $cta_text = $tab['tab_cta_text'];
                            $temp_url = $tab['tab_cta_url'];
                            $cta_url_external = $tab['tab_cta_external_url'];
                            $cta_size = $tab['tab_cta_size'];
                            $class = "class='cta cta-$cta_size'"; 
                            if($temp_url != '' && $temp_url != null){
                                $href = "href='$temp_url'";
                                $target = "target=_blank";
                            } else  {
                                $href = "href='$cta_url_external'";
                                $target = "";
                            } ?>
                            
                            <a <?php echo "$href $target $class"; ?>>
                                <span><?php echo $cta_text; ?></span>
                                <?php get_template_part('partials/svgs/arrow','svg'); ?>
                            </a><?php 
                        }  ?>
                    </div><?php 
                    
                    $active = "";
                    $ix++; 
                } ?>

            </div>
        </div>
    </div>
</div>
