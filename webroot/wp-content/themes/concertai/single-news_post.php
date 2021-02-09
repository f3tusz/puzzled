<?php get_header(); ?>
<!-- <section class="global-hero">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>
</section> -->
<main class="global-main">
<?php
  if (have_posts()) {
    while (have_posts()) {
      the_post();
      $term_list = wp_get_post_terms( $post->ID, 'news_type', array( 'fields' => 'all' ) );
      $term_id =  $term_list[0]->term_taxonomy_id;
      $term_name = $term_list[0]->name != '' ? $term_list[0]->name : 'UNCATEGORIZED';
  ?>
  <div class="husl-block block-hero" style="position: relative;">
    <div class="anchor container-fluid padding-top-small padding-bottom-small bg-image dark-bg mobile-padding">
      <div class="row justify-content-center w-100 no-gutters">
        <div class="col-11 col-xl-12 hero-title-container">
          <div class="titles align-left">
            <h6 class="post-meta text-white" data-aos="fade" data-aos-duration="500">
              <span class="font-weight-normal"><?php the_date(); ?></span>
            </h6>
            <h2 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_title(); ?></h2>
            <h6 class="post-meta d-flex align-items-center text-white" data-aos="fade" data-aos-duration="500">
              <span class="opacity">NEWS</span>
              <span class="spacer bg-white opacity"></span>
              <span class="opacity"><?php echo $term_name; ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center has-content">
      <div class="col-md-8">
        <?php the_content(); ?>
      </div>
    </div>
  </div>
  <?php
      }
    }
  ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 pt-5 border-top">
          <?php get_template_part('partials/social'); ?>
        </div>
      </div>
      <div class="row py-5">
        <div class="col-12 py-5 text-center">
          <a class="cta cta-back" href="<?php echo home_url( '/news' ); ?>">
            <span>
              <?php get_template_part('partials/svgs/arrow','svg'); ?>
              Back to News
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>