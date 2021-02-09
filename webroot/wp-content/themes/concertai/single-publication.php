<?php get_header(); ?>
<main class="global-main">
<?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      $external_URL = get_field('external_url');
      if ($external_URL != null && $external_URL != ''){
        header("Location: $external_URL");
      }

      $source_list = wp_get_post_terms( $post->ID, 'source', array( 'fields' => 'all' ) );
      $source_id =  $source_list[0]->source_taxonomy_id;
      $source_name = $source_list[0]->name;
      
      $research_list = wp_get_post_terms( $post->ID, 'research_type', array( 'fields' => 'all' ) );
      if (count($research_list) > 0):
        $research_name = implode(', ', wp_list_pluck($research_list,'name'));
      else:
        $research_name = $research_list[0]->name;
      endif;

      $cancer_list = wp_get_post_terms( $post->ID, 'cancer_type', array( 'fields' => 'all' ) );
      if (count($cancer_list) > 0):
        $cancer_name = implode(', ', wp_list_pluck($cancer_list,'name'));
      else:
        $cancer_name = $cancer_list[0]->name;
      endif;
  ?>
  <div class="husl-block block-hero">
    <div class="anchor container-fluid padding-top-small padding-bottom-small">
      <div class="row justify-content-center w-100 no-gutters">
        <div class="col-11 col-xl-12 hero-title-container">
          <div class="titles">
            <h6 class="post-meta text-center" data-aos="fade" data-aos-duration="500">
              <span><?php echo $source_name; ?></span> <span class="font-weight-normal">
                <?php if(get_field('year_override')) { ?>
                  <?php the_field('year_override'); ?>
                <?php } else { ?>
                  <?php the_date('Y'); ?>
                <?php } ?>
              </span>
            </h6>
            <h1 class="h2 text-center" data-aos="fade" data-aos-duration="500" data-aos-delay="300"><?php the_title(); ?></h1>
            <h6 class="post-meta text-center h6 mb-0" data-aos="fade" data-aos-duration="500">
              <span class="font-weight-normal">Research</span>
              <span><?php echo $research_name; ?></span>
              <span class="spacer"></span>
              <span class="font-weight-normal">Cancer</span>
              <span><?php echo $cancer_name; ?></span>
            </h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container has-content">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <?php
    endwhile;
  endif;
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
          <a class="cta cta-back" href="<?php echo home_url( '/publications' ); ?>">
            <span>
              <?php get_template_part('partials/svgs/arrow','svg'); ?>
              Back to Publications
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>