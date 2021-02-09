<?php get_header(); ?>
<main class="global-main">
  <?php

  $term = get_queried_object();
  $top_nav_bg_color = get_field( 'top_navigation_background_color' );
  if ( get_field( 'hero_image', $term ) ) {
    $hero_image = get_field( 'hero_image', $term );
  } else {
    $blog_id = get_page_by_path( 'blog' );
    $hero_image = get_field( 'background_image', $blog_id );
  }  ?>
  <div class="husl-block block-hero">
    <div class="hero-dark-bg">
      <div class="hero-dark-bg-white-container"></div>
    </div>
    <div class="anchor container-fluid padding-top-small padding-bottom-small bg-image dark-bg mobile-padding" style="background: linear-gradient(180deg, rgba(0, 15, 140, 0.6) 0%, rgba(0, 15, 140, 0.6) 100%), url('<?php echo $hero_image['url']; ?>');">
      <div class="row justify-content-center w-100 no-gutters">
        <div class="col-11 col-xl-12 hero-title-container">
          <div class="titles align-left">
            <h6 data-aos="fade" data-aos-duration="500" data-aos-once="true" class="aos-init aos-animate">From the Blog</h6>
            <h1 data-aos="fade" data-aos-duration="500" data-aos-once="true" data-aos-delay="300" class="aos-init aos-animate"><?php echo $term->name; ?></h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="block-category-navigation">
          <nav class="d-flex justify-content-center"> <a href="/blog">View All</a>
          <?php
            $categories = get_categories();
            foreach ( $categories as $category ) {
            ?>
            <a href="/blog/category/<?php echo $category->slug; ?>" <?php echo (is_category( $category->name )) ? 'class="is-active"' : null; ?>>
              <?php echo $category->name; ?>
            </a>
            <?php }
          ?>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container category-blog-post-container">
    <div id="ajax-posts" class="row">
      <?php
      $blog_query = new WP_Query( array(
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'desc',
        'paged' => $paged,
        'tax_query' => array(
          array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $term->term_id
          )
        )
      ) );

      $pg = ( $_GET[ "pg" ] ) ? $_GET[ "pg" ] : 1;
      while ( $blog_query->have_posts() ): $blog_query->the_post();
      ?>
      <?php 
      $featured_image = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
      $categories = get_the_category();

      $term_obj_list = get_the_terms( $post->ID, 'type' );
      ?>
      <div class="col-12 col-lg-6 d-flex mb-3"> <a class="link-wrap d-flex flex-column w-100" href="<?php the_permalink(); ?>">
        <div class="link-wrap-image image-short">
          <figure>
            <?php if(!$featured_image) {
              $default_image = get_field('default_image','option');
              $featured_image = $default_image['url'];
            } ?>
            <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
            <?php if(get_field('is_video') == "yes") { ?>
            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute; bottom:30px; left:30px;">
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
            <p class="small">
             <?php echo $term_obj_list[0]->name; ?></p>
          </div>
          <h3 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><span>
            <?php the_title(); ?>
            </span></h3>
          <span class="cta cta-small align-self-start mt-auto"> <span> Read More
          <?php get_template_part('partials/svgs/arrow','svg'); ?>
          </span> </span> </div>
        </a> </div>
      <?php endwhile; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>
