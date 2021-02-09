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
?>

<div class="husl-block husl-block-staff" >
  <?php if (get_field('section_id')){ ?> 
      <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
  <?php } ?>
  <?php show_frames(); ?>
  <div class="<?= $container_class; ?>" style="<?= $container_style; ?>">
    <div class="container">
      <div class="row">
          <div class="<?= $col_class; ?>">
              <?php get_template_part('partials/title-fields'); ?>
          </div>
      </div>
      <?php if ( have_rows('members') ): ?>
      <div class="row justify-content-center text-center">
        <?php
        while ( have_rows('members') ) : the_row();
        $picture = get_sub_field('picture'); 
        $name = get_sub_field('name'); 
        $position = get_sub_field('position'); 
        $linkedin_url = get_sub_field('linkedin');
        $aos_delay = 100 * get_row_index() ?>
        <div class="col-sm-12 col-md-6 col-lg-3 staff-member" data-aos="fade" data-aos-duration="500" data-aos-delay="<?= $aos_delay ?>">
          <figure class="d-block mx-25px">
            <img src="<?php echo $picture['url']; ?>" alt="" class="img-fluid">
          </figure>
          <h5><?php echo $name; ?></h5>
          <p><?php echo $position; ?></p>
          <?php if ( $linkedin_url ): ?>
          <a href="<?php echo $linkedin_url; ?>" target="_blank">
            <?php get_template_part('partials/svgs/linkedin', 'svg'); ?>
          </a>
          <?php endif; ?>
        </div>
        <?php endwhile; ?>
      </div>
      <?php endif;?>
    </div>
  </div>
</div>