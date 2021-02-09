<div class="husl-block block-list-ctas <?php if(get_field('padding_top') != "custom") { ?>padding-top-<?php the_field('padding_top'); ?><?php } ?> <?php if(get_field('padding_top') != "custom") { ?>padding-bottom-<?php the_field('padding_bottom'); } ?>" style="
<?php if(get_field('padding_top') == "custom") { ?>
padding-top:<?php the_field('padding_top_value'); ?>px!important;<?php } ?>
<?php if(get_field('padding_bottom') == "custom") { ?> padding-bottom:<?php the_field('padding_bottom_value'); ?>px!important;<?php } ?>">
  <div class="container" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
     <div class="row">
      <div class="col-lg-5 col-md-12">
        <?php get_template_part('partials/title-fields'); ?>
        <?php if(get_field('body_copy')) { ?>
        <div class="text-wrap desktop-only">
          <?php the_field('body_copy'); ?>
        </div>
        <?php } ?>
       </div>
       <div class="col-lg-7 col-md-12">
         <ul>
         <?php 
          if( get_field('ctas') ){
            while( has_sub_field('ctas') ){ 
              $list_cta_title = get_sub_field('list_cta_title');
              $list_cta_image = get_sub_field('list_cta_image');
              $list_cta_link_label = get_sub_field('list_cta_link_label');
              $list_cta_link_url = get_sub_field('list_cta_link_url'); ?>
             <li>
               <?php if($list_cta_link_label && $list_cta_link_url) { ?>
                  <a class="row" href="<?php echo $list_cta_link_url; ?>">
                    <?php } ?>
               <div class="col-md-7 col-12 col-padding title">
                 <div class="bg-title bg-cover" style="background-image:url(<?php echo $list_cta_image['url']; ?>);"></div>
                 <h3><?php echo $list_cta_title; ?></h3>
               </div>
               <div class="col-md-5 col-4 col-padding view-details desktop-only">
                 <?php if($list_cta_link_label && $list_cta_link_url) { ?>
                  <span class="cta" href="<?= $list_cta_link_url; ?>">
                    <span>
                      <?php echo $list_cta_link_label; ?>
                      <?php get_template_part('partials/svgs/arrow'
,'svg'); ?>
                    </span>
                 </span>
                <?php } ?>
               </div>
                    <?php if($list_cta_link_label && $list_cta_link_url) { ?>
               </a>
               <?php } ?>
               <div class="listcta-arrow"><?php get_template_part('partials/svgs/arrow','svg'); ?></div>
             </li>
            <?php
            }
          } ?>
         </ul>
         
        <?php if(get_field('body_copy')) { ?>
        <div class="text-wrap mobile-only">
          <?php the_field('body_copy'); ?>
        </div>
        <?php } ?>
       </div>
    </div>
  </div>
  
</div>