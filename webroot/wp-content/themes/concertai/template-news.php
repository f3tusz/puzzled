<?php /* Template Name: News */ ?>
<?php get_header(); ?>
<main class="global-main">
  <?php 
    $top_nav_bg_color = get_field('top_navigation_background_color');
    $subnavigation = get_field('subnavigation');
    $subnav_menu = get_field('subnavigation_menu');
    $frame = get_field('frame_color');

    echo "<div style='display:none;'>";
    var_dump_pre($top_nav_bg_color);
    var_dump_pre($subnavigation);
    var_dump_pre($subnav_menu);
    var_dump_pre($color_bars);
    var_dump_pre($color_bars_color);
    echo "</div>"; 

    $container_atts = container_atts(false);
    $container_class = $container_atts['container_class'];
    $container_style = $container_atts['container_style'];

?>

<div class="husl-block block-hero" style="position: relative;" >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?>
    <?php if ($top_nav_bg_color == 'dark') { ?>
        <div class="hero-dark-bg">
            <div class="hero-dark-bg-white-container"></div> 
        </div>
    <?php } ?>
    <?php show_frames(); ?>
    <div class="<?php echo $container_class; ?> mobile-padding" style="<?php echo $container_style; ?>">
        <div class="row justify-content-center w-100 no-gutters">
            <div class="col-11 col-xl-12 hero-title-container">
                <?php get_template_part('partials/title-fields'); ?>
            </div>
        </div>
    </div>
    <?php 
    if (($subnavigation != 'off')){
        get_template_part('partials/subnavigation'); 
    } ?>
</div>
    <article class="single-page">
        <div class="container pt-4">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged' => $paged,
                'post_type' => 'news_post',
                'posts_per_page' => 12
            );
            $wp_query = new WP_Query($args); ?>
            <div id="ajax-posts" class="masonry news-post-container">
            <?php while ( have_posts() ) : the_post(); 
                $term_obj_list = get_the_terms( $post, 'news_type' ); ?>
                <div class="masonry-item">
                    <a class="link-wrap masonry-content" href="<?php the_permalink(); ?>">
                        <?php
                            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                            $featured_image_type = get_field('featured_image_type');
                            if (!$featured_image):
                                $default_image = get_field('default_image','option');
                                $featured_image = $default_image['url'];
                            endif;
                        ?>
                        <div class="link-wrap-image <?php if($featured_image_type != "fullsize") { ?> image-logo<?php } ?> ">
                            <figure>
                                <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
                            </figure>
                        </div>
                        <div class="link-wrap-content">
                            <h6 class="mb-0"><?php echo $term_obj_list[0]->name; ?></h6>
                            <p><small><?php echo get_the_date(); ?></small></p>
                            <h3><?php the_title(); ?></h3>
                            <span class="cta cta-small">
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
    </article>
</main>
<?php get_footer(); ?>