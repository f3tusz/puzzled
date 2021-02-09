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
			$term_list = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'all' ) );
			$term_id =  $term_list[0]->term_taxonomy_id;
			$term_name = $term_list[0]->name;
			$term_obj_list = get_the_terms( $post->ID, 'type' );
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
                            <span class="opacity">BLOG</span>
                            <span class="spacer bg-white opacity"></span>
                            <span class="opacity mr"><?php echo $term_name; ?></span>
                            <span class="font-weight-normal"><?php echo $term_obj_list[0]->name; ?></span>
                        </div>
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
						<a class="cta cta-back" href="<?php echo home_url( '/blog' ); ?>">
							<span>
								<?php get_template_part('partials/svgs/arrow','svg'); ?>
								Back to Blog
							</span>
						</a>
					</div>
				</div>
			</div>
    </div>
    <?php
    $args = array(
        'category__in' => wp_get_post_categories($post->ID), 
        'post__not_in'          => array($post->ID),
        'posts_per_page'        => 2,
        'ignore_sticky_posts'   => 1
    );
    $rp_query = new WP_Query($args);
    if( $rp_query->have_posts() ) { ?>
    <div class="husl-block block-related-posts pt-5">
        <div class="container py-5">
            <h3 class="text-center text-white white-text">Related Posts</h3>
            <div class="row pt-2">
                <?php
                while ($rp_query->have_posts()) : $rp_query->the_post();
                    $term_list = wp_get_post_terms( $post->ID, 'category', array( 'fields' => 'all' ) );
                    $term_id =  $term_list[0]->term_taxonomy_id;
                    $term_name = $term_list[0]->name;
                    $term_obj_list = get_the_terms( $post->ID, 'type' );
                    $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                ?>
                <div class="col-12 col-lg-6 d-flex mb-3">
                    <a class="link-wrap d-flex flex-column w-100" href="<?php the_permalink(); ?>">
                        <div class="link-wrap-image image-short">
                            <figure>
                                <?php if(!$featured_image) {
                                    $default_image = get_field('default_image','option');
                                    $featured_image = $default_image['url'];
                                } ?>
                                <img src="<?php echo $featured_image; ?>" alt="">
                            </figure>
                        </div>
                        <div class="link-wrap-content d-flex flex-column flex-grow-1 p-5">
                            <div class="d-flex align-items-center" data-aos="fade" data-aos-duration="500">
                                <h6 class="mr-3"><?php echo $term_name; ?></h6>
                                <p class="small"><?php echo $term_obj_list[0]->name; ?></p>
                            </div>
                            <h3 data-aos="fade" data-aos-duration="500" data-aos-delay="300"><span><?php the_title(); ?></span></h3>
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
        </div>
    </div>
    <?php wp_reset_query();
    } 
    ?>
</main>
<?php get_footer(); ?>