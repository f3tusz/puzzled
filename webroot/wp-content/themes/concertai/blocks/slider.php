<div class="husl-block block-slider <?php if(get_field('padding_top') != "custom") { ?>padding-top-<?php the_field('padding_top'); ?><?php } ?> <?php if(get_field('padding_top') != "custom") { ?>padding-bottom-<?php the_field('padding_bottom'); } ?>" style="
<?php if(get_field('padding_top') == "custom") { ?>
padding-top:<?php the_field('padding_top_value'); ?>px!important;<?php } ?>
<?php if(get_field('padding_bottom') == "custom") { ?> padding-bottom:<?php the_field('padding_bottom_value'); ?>px!important;<?php } ?>">
  <?php 
  if( get_field('slide') ){ ?>
    <div class="swiper-container" data-aos="fade" data-aos-duration="500" data-aos-delay="500">
      <div class="swiper-wrapper">
      <?php
      while( has_sub_field('slide') ){ 
        $slider_image = get_sub_field('slider_image');
        $slider_title = get_sub_field('slider_title');
        $slider_link_label = get_sub_field('slider_link_label');
        $slider_link_url = get_sub_field('slider_link_url'); ?>
        <div class="swiper-slide bg-cover dark-bg" style="background-image:url(<?php echo $slider_image['url']; ?>);">
          <div class="hover-overlay"></div>
          <div class="slide-content">
            <div class="text-wrap">
              <span class="h2 heading-text">
                <?php echo $slider_title; ?>
              </span>
              <?php if($slider_link_url && $slider_link_label) { ?>
                <a class="cta cta-large" href="<?php echo $slider_link_url; ?>">
                  <span>
                    <?php echo $slider_link_label; ?>
                    <?php get_template_part('partials/svgs/arrow-large','svg'); ?>
                  </span>
                </a>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php
      } ?>
    </div>
      <div class="swiper-button-next">
         <span>
          <svg width="35" height="64" viewBox="0 0 35 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 62L32 32L2 2" stroke="white" stroke-width="4"/>
          </svg>
        </span> 
      </div>
      <div class="swiper-button-prev">
        <!-- <span>
          <svg width="35" height="64" viewBox="0 0 35 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M33 62L3 32L33 2" stroke="white" stroke-width="4"/>
          </svg>
        </span> -->
      </div>
  </div>
    <?php
  } ?>
</div>