<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>
<main class="global-main">
  <?php
  $top_nav_bg_color = get_field( 'top_navigation_background_color' );
  $subnavigation = get_field( 'subnavigation' );
  $subnav_menu = get_field( 'subnavigation_menu' );
  $frame = get_field( 'frame_color' );

  echo "<div style='display:none;'>";
  var_dump_pre( $top_nav_bg_color );
  var_dump_pre( $subnavigation );
  var_dump_pre( $subnav_menu );
  var_dump_pre( $color_bars );
  var_dump_pre( $color_bars_color );
  echo "</div>";

  $container_atts = container_atts( false );
  $container_class = $container_atts[ 'container_class' ];
  $container_style = $container_atts[ 'container_style' ];

  ?>
  <div class="husl-block block-hero" style="position: relative;" >
    <?php if (get_field('section_id')){ ?>
    <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
    <?php } ?>
    <div class="hero-dark-bg">
      <div class="hero-dark-bg-white-container"></div>
    </div>
    <?php show_frames(); ?>
    <div class="<?php echo $container_class; ?> mobile-padding" style="<?php echo $container_style; ?>">
      <div class="row justify-content-center w-100 no-gutters">
        <div class="col-11 col-xl-12 hero-title-container">
          <?php get_template_part('partials/title-fields'); ?>
        </div>
      </div>
    </div>
    <?php
    if ( ( $subnavigation != 'off' ) ) {
      get_template_part( 'partials/subnavigation' );
    }
    ?>
  </div>
  <div class="container-fluid">
    <div class="container py-50">
    <?php
      $sticky = get_option( 'sticky_posts' );
      $args = array(
        'post__in'  => $sticky,
        'posts_per_page' => 1,
        'ignore_sticky_posts' => 1
      );
      $sticky_query = new WP_Query($args);
      while ( $sticky_query->have_posts() ): $sticky_query->the_post();
      $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post ) );
      $categories = get_the_category();
      $term_obj_list = get_the_terms( $post, 'type' );
      ?>
      <a class="link-wrap dark-bg" href="<?php the_permalink(); ?>">
        <div class="row">
          <div class="col-lg-6 d-flex">
            <div class="link-wrap-image flex-grow-1">
              <?php if(!$featured_image) {
                $default_image = get_field('default_image','option');
                $featured_image = $default_image['url'];
              } ?>
              <figure>
                <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" /></div>
              </figure>
          </div>
          <div class="col-lg-6">
            <div class="link-wrap-content p-5">
              <div class="d-flex align-items-center" data-aos="fade" data-aos-duration="500">
                <h6 class="mr-3">
                  <?php
                  if ( !empty( $categories ) ) {
                    echo esc_html( $categories[ 0 ]->name );
                  }
                  ?>
                </h6>
                <p class="small" style="color: rgba(255, 255, 255, 1);"> <?php echo $term_obj_list[0]->name; ?> </p>
              </div>
              <h3 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><span>
                <?php the_title(); ?>
                </span></h3>
              <span class="cta cta-small align-self-start mt-auto"> <span> Read More
              <?php get_template_part('partials/svgs/arrow','svg'); ?>
              </span> </span> </div>
          </div>
        </div>
      </a>
      <?php
      endwhile;
      wp_reset_postdata();
    ?>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="block-category-navigation">
          <nav class="d-flex justify-content-center flex-wrap">
            <a href="/blog" class="is-active">View All</a>
            <?php $categories = get_categories();
            foreach ( $categories as $category ) { ?>
            <a href="/blog/category/<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
            <?php } ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-4">
    <div id="ajax-posts" class="row blog-post-container">
    <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $args = array(
        'paged' => $paged,
        'post_type' => 'post',
        'posts_per_page' => 8,
        'post__not_in' => get_option( 'sticky_posts' )
      );
      $wp_query = new WP_Query($args);
      while ( have_posts() ): the_post();
      $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
      $categories = get_the_category();
      $term_obj_list = get_the_terms( $post->ID, 'type' );
      ?>
      <div class="col-12 col-lg-6 d-flex mb-3">
        <a class="link-wrap d-flex flex-column w-100" href="<?php the_permalink(); ?>">
          <div class="link-wrap-image image-short">
            <figure>
              <?php if(!$featured_image) {
                $default_image = get_field('default_image','option');
                $featured_image = $default_image['url'];
              } ?>
              <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
              <?php if(get_field('is_video') == "yes") { ?>
                <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <circle cx="30" cy="30" r="30" fill="#3AD0F9"/>
                  <path d="M43.0435 29.837L23.2337 41.2742V18.3998L43.0435 29.837Z" fill="white"/>
                </svg>
              <?php } ?>
            </figure>
          </div>
          <div class="link-wrap-content d-flex flex-column flex-grow-1 p-5">
            <div class="d-flex align-items-center" data-aos="fade" data-aos-duration="500">
              <h6 class="mr-3">
                <?php
                if ( !empty( $categories ) ) {
                  echo esc_html( $categories[ 0 ]->name );
                }
                ?>
              </h6>
              <p class="small"> <?php echo $term_obj_list[0]->name; ?> </p>
            </div>
            <h3 data-aos="fade" data-aos-duration="500" data-aos-delay="300">
              <span><?php the_title(); ?></span>
            </h3>
            <span class="cta cta-small align-self-start mt-auto">
              <span>
                Read More
                <?php get_template_part('partials/svgs/arrow','svg'); ?>
              </span>
            </span>
          </div>
        </a>
      </div>
      <?php endwhile; ?>
    </div>
    <div class="ajax-loader" id="ajax-loader"></div>
    <div class="row py-5">
      <div class="col-12 py-5 text-center">
      <?php if ($next_url = next_posts($wp_query->max_num_pages, false)): ?>
        <div class="pagination text-center" id="pagination">
          <a class="cta cta-load text-center" href="<?php echo get_next_posts_page_link(); ?>">
            <span>
              Load More
              <?php get_template_part('partials/svgs/arrow-down','svg'); ?>
            </span>
          </a>
        </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>