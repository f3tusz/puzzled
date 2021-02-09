<div class="husl-block block-large-ctas <?php if(get_field('padding_top') != "custom") { ?>padding-top-<?php the_field('padding_top'); ?><?php } ?> <?php if(get_field('padding_top') != "custom") { ?>padding-bottom-<?php the_field('padding_bottom'); } ?>" style="
<?php if(get_field('padding_top') == "custom") { ?>
padding-top:<?php the_field('padding_top_value'); ?>px!important;<?php } ?>
<?php if(get_field('padding_bottom') == "custom") { ?> padding-bottom:<?php the_field('padding_bottom_value'); ?>px!important;<?php } ?>">
<?php show_frames(); ?>
  <div class="container" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
     <div class="row">
      <div class="col-lg-6 col-md-12 mx-auto">
         <?php get_template_part('partials/title-fields'); ?>
       </div>
    </div>
  </div>
  <div class="container">
    <div class="row display-flex">
      <?php 
      $delay = 1;
      $number_of_rows = count(get_field('ctas'));
      if( get_field('ctas') ){ 
        $i = 1;
        while( has_sub_field('ctas') ){ 
          $cta_text = get_sub_field('cta_text');
          $cta_body_copy = get_sub_field('cta_body_copy');
          $cta_icon = get_sub_field('cta_icon');
          $background_image = get_sub_field('background_image');
          $cta_link_label = get_sub_field('cta_link_label');
          $cta_link_url = get_sub_field('cta_link_url');  ?>
       <?php $cta_id = rand(0,999999); ?>

      <style type="text/css">
          .husl-block.block-large-ctas .large-cta.cta-<?php echo $cta_id; ?>:before {
            background-color:<?php the_sub_field('border_color'); ?>!important;
          }
          .husl-block.block-large-ctas .large-cta.cta-<?php echo $cta_id; ?> {
            border-image: linear-gradient(<?php the_sub_field('border_color'); ?>, #fff) 0 70%;
          }
        </style>
      <?php if($number_of_rows % 2 == 0){ 
              $odd = false;
            } else {
              $odd = true;
            }
          if($i < $number_of_rows) {
            $last_row = false;
          } else {
            $last_row = true;
          } ?>
          <div class="<?php if($odd == true && $last_row == true) { ?>odd-last-row <?php }?><?php if($number_of_rows > 1) { ?>col-lg-6 <?php } else { ?> single-col <?php } ?><?php if($cta_icon) { ?>cta-icon <?php } ?>
                      <?php if(get_sub_field('has_background_overlay') == "yes") { ?>has-bg-overlay <?php } ?>col-md-12" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="<?php echo $delay++; ?>00">
            <div class="cta-<?php echo $cta_id; ?> large-cta text-<?php the_sub_field('text_color'); ?> <?php if(get_sub_field('background_color') != '#FFFFFF') { ?>bg-not-white show-cta <?php } else { ?>bg-white <?php } ?>" style="background-color:<?php the_sub_field('background_color'); ?>;background-image:url(<?php echo $background_image['url']; ?>);">
               <div class="bg-overlay" style="background-color:<?php the_sub_field('background_overlay_color'); ?>;opacity:0.5;"></div>
              
              
              <?php if($cta_link_label && $cta_link_url) { ?>
              <a class="all-link" href="<?php echo $cta_link_url; ?>"></a>
                <?php } ?>
              <?php if($cta_text) { ?>
                <?php if($cta_link_label && $cta_link_url) { ?>
                  <a class="h3a" href="<?php echo $cta_link_url; ?>">
                <?php } ?><h3><?php echo $cta_text; ?></h3><?php if($cta_link_label && $cta_link_url) { ?>
                  </a>
                <?php } ?>
              <?php } ?>
               <?php if($cta_body_copy) { ?>
                <?php echo $cta_body_copy; ?>
              <?php } ?>
              <?php if($cta_link_label && $cta_link_url) { ?>
                <div class="<?php if($cta_icon) { ?>absolute-cta<?php } else { ?>float-cta<?php } ?>">
                  <a class="cta cta-small" href="<?php echo $cta_link_url; ?>">
                    <span>
                      <?php echo $cta_link_label; ?>
                      <?php get_template_part('partials/svgs/arrow','svg'); ?>
                    </span>
                  </a>
                  <?php if($cta_icon) { ?>
                    <img src="<?php echo $cta_icon['url']; ?>" alt="<?php echo $cta_icon['alt']; ?>" />
                  <?php } ?>
                </div>
              <?php } ?>
              
            </div>
            
          </div>
       <?php 
        $i++; 
        } 
      } ?>
    </div>
  </div>
</div>