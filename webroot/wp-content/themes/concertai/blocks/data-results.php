<?php
    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

    $alignment = get_field('alignment');
    $block_title_alignment = get_field('block_title_alignment');

    $col_class = "col-12 col-lg-offset-2 col-lg-8";
    if ($alignment == 'center' || $block_title_alignment == "center"){
        $col_class .= " align-center";
    }

    $svg_color_array = create_svg_color_array();
    $make_body_text_smaller = false;
    if (get_field('make_body_text_smaller') === true){
      $make_body_text_smaller = true;
    }
?>
<div class="husl-block block-data-results bg-cover dark-bg">
    <?php show_frames(); ?>
    <div class="<?= $container_class; ?>" style="<?= $container_style; ?>" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
      <div class="container">
    <div class="row pos-abs">
      <div class="col-xl-5 col-md-12 <?php if ($make_body_text_smaller) { echo 'smaller_body_text'; }?>">
        <?php get_template_part('partials/title-fields'); ?>
        <?php if(get_field('link_label') && get_field('link_url')) { ?>
          <a class="cta cta-small" href="<?php the_field('link_url'); ?>">
            <span>
            <?php the_field('link_label'); ?>
            <?php get_template_part('partials/svgs/arrow','svg'); ?>
            </span>
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-md-12 mobile-no-pad drop-below">
        &nbsp;
      </div>
      <div class="col-xl-9 col-md-12 mobile-no-pad mt-4 drop-below">
          <?php 
          $row = get_field( 'data_box');
          $rowsize = 0;
          if ($row[0]){
            $rowsize = count($row);
          } ?>
        <div class="row num_boxes_<?= $rowsize; ?>">
          <?php if($row[0] && !$row[3]){ ?>
          <div class="col-lg-4 col-md-12"></div>
          <?php } ?>
          <div class="col-lg-4 col-md-12">
            <?php if($row[0]) { ?>
            <div class="box white w-220 float-right bottom-align first-box" style="background-color:<?php echo $row[0]['background_color']; ?>;" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="100">
              <div class="text-wrap">
              <?php if($row[0]['data_options'] == "static-text") { ?>
                  <?php if($row[0]['static_text']) { ?>
                    <div class="static-text <?php if($row[0]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[0]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[0]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <?php echo $row[0]['symbol_before_number']; ?>
                      <span class="counter" data-count="<?php echo $row[0]['count_up_number']; ?>">0</span><?php echo $row[0]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[0]['small_text']) { ?>
                  <h4><?php echo $row[0]['small_text']; ?></h4>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <?php if($row[5]) { ?>
            <div class="box white w-300 float-left bottom-align-extra floater" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="400" style="background-color:<?php echo $row[5]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[5]['data_options'] == "static-text") { ?>
                  <?php if($row[5]['static_text']) { ?>
                    <div class="static-text <?php if($row[5]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[5]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[5]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[5]['count_up_number']; ?>">0</span><?php echo $row[5]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[5]['small_text']) { ?>
                  <h4><?php echo $row[5]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
            </div>
          <div class="col-lg-4 col-md-12">
            <?php if($row[1]) { ?>
          <div class="box white w-240 float-right" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="200" style="background-color:<?php echo $row[1]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[1]['data_options'] == "static-text") { ?>
                  <?php if($row[1]['static_text']) { ?>
                    <div class="static-text <?php if($row[1]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[1]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[1]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[1]['count_up_number']; ?>">0</span><?php echo $row[1]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[1]['small_text']) { ?>
                  <h4><?php echo $row[1]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
            <?php if($row[2]) { ?>
          <div class="box white w-300 float-right" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="300" style="background-color:<?php echo $row[2]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[2]['data_options'] == "static-text") { ?>
                  <?php if($row[2]['static_text']) { ?>
                    <div class="static-text <?php if($row[2]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[2]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[2]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[2]['count_up_number']; ?>">0</span><?php echo $row[2]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[2]['small_text']) { ?>
                  <h4><?php echo $row[2]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
            <?php if($row[6]) { ?>
            <div class="box white w-240 float-right" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="500" style="background-color:<?php echo $row[6]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[6]['data_options'] == "static-text") { ?>
                  <?php if($row[6]['static_text']) { ?>
                    <div class="static-text <?php if($row[6]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[6]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[6]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[6]['count_up_number']; ?>">0</span><?php echo $row[6]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[6]['small_text']) { ?>
                  <h4><?php echo $row[6]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
          </div>
            <?php if($row[3]) { ?>
          <div class="col-lg-4 col-md-12">
          <div class="box white w-300 float-left offset-top" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="400" style="background-color:<?php echo $row[3]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[3]['data_options'] == "static-text") { ?>
                  <?php if($row[3]['static_text']) { ?>
                    <div class="static-text <?php if($row[3]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[3]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[3]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[3]['count_up_number']; ?>">0</span><?php echo $row[3]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[3]['small_text']) { ?>
                  <h4><?php echo $row[3]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php if($row[4]) { ?>
          <div class="box white w-240 float-left offset-top" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="500" style="background-color:<?php echo $row[4]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[4]['data_options'] == "static-text") { ?>
                  <?php if($row[4]['static_text']) { ?>
                    <div class="static-text <?php if($row[4]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[4]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[4]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[4]['count_up_number']; ?>">0</span><?php echo $row[4]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[4]['small_text']) { ?>
                  <h4><?php echo $row[4]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
            <?php if($row[7]) { ?>
            <div class="box white w-220 float-left offset-top" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="500" style="background-color:<?php echo $row[7]['background_color']; ?>;">
            <div class="text-wrap">
              <?php if($row[7]['data_options'] == "static-text") { ?>
                  <?php if($row[7]['static_text']) { ?>
                    <div class="static-text <?php if($row[7]['make_text_large']) echo "large-text"; ?>">
                      <?php echo $row[7]['static_text']; ?>
                    </div>
                  <?php } ?>
                <?php } else { //count up number ?>
                  <?php if($row[7]['count_up_number']) { ?>
                    <div class="large-text count-up-number">
                      <span class="counter" data-count="<?php echo $row[7]['count_up_number']; ?>">0</span><?php echo $row[7]['symbol_after_number']; ?>
                    </div>
                  <?php } ?>
                <?php } ?>
                <?php if($row[7]['small_text']) { ?>
                  <h4><?php echo $row[7]['small_text']; ?></h4>
                <?php } ?>
              </div>
              </div>
            <?php } ?>
          </div>
            <?php } ?>
        </div>
      </div>
    </div>
    <?php 
      if( get_field('logos') ){ ?>
      <div class="text-logos">
        <div class="bg-overlay" style="background-color:<?php the_field('background_overlay_color'); ?>;opacity:0.5;"></div>
          <div class="row">
          <?php if(get_field('logo_text')) { ?>
          <div class="col-lg-6">
            <h3><?php the_field('logo_text'); ?></h3>
          </div>
          <?php } ?>
          <div class="col-lg-6">
              <div class="row">
            <?php 
            $delay = 1;
            if( get_field('logos') ){
              while( has_sub_field('logos') ){ 
                $logo_image = get_sub_field('logo_image'); ?>
                <div class="col-lg-6">
                  <img src="<?php echo $logo_image['url']; ?>" data-aos="fade-in"
           data-aos-easing="linear"
           data-aos-delay="<?php echo $delay++; ?>00" alt="<?php echo $logo_image['alt']; ?>" />
              </div>
              <?php
              }
            } ?>
              </div>
          </div>
        </div>
      </div>
    <?php } ?>
      </div>
</div>
</div>