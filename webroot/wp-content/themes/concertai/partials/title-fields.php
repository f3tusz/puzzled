<?php $alignment = 'left';
if (get_field('block_title_alignment') != ''){
  $alignment = get_field('block_title_alignment');
} 
if(get_field('left_image_flag') === true){
  $alignment .= ' nci-left';
}
$h_type = (null !== get_field('h_type') ? get_field('h_type') : 'h2');

?>
<div class="titles align-<?= $alignment ?>">
  <?php if(get_field('left_image_flag')) { 
    if(get_field('left_image_flag') === true){
      $img = get_field('left_aligned_image'); ?>
      <div class="nci-container">
      <img src="<?= $img; ?>" class="normal_content_image" /></div>
      <div class="nci-container-2"> <?php 
    }
  } ?>
  <?php if(get_field('block_pre_title')) { ?>
    <h6 data-aos="fade" data-aos-duration="500"><?php the_field('block_pre_title'); ?></h6>
  <?php } ?>
  <?php if(get_field('block_title')) { ?>
      <<?= $h_type; ?> data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_field('block_title'); ?></<?= $h_type; ?>><?php 
  } ?>
  <?php if (get_field('body_text')) { ?>
    <?php the_field('body_text'); ?>
  <?php } ?>
  <?php if(get_field('left_image_flag') === true){ ?>
  </div>
  <?php } ?>
</div>