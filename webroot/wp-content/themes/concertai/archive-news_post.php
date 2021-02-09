<?php get_header(); ?>
<main class="global-main">
    <article class="single-page">
        <div class="container pt-4">
            <div id="ajax-posts" class="masonry">
            <?php 
            // WP_Query arguments
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $display_count = get_option( 'posts_per_page' );
            $page_offset = ($paged - 1) * $display_count;
            $args = array(
                'posts_per_page' => $display_count,
                'post_type' => 'news_post',
                'paged' => $paged,
                'offset' => $page_offset
            );
            
            $news_query = new WP_Query( $args );
            if ( $news_query->have_posts() ) :
                while ( $news_query->have_posts() ) : $news_query->the_post();
                $term_list = wp_get_post_terms( $post->ID, 'news_type', array( 'fields' => 'all' ) );
                $term_id =  $term_list[0]->term_taxonomy_id;
                $term_name = $term_list[0]->name;
                $term_featured_image  = get_field('category_featured_image', 'category_'.$term_id);
                $category_icon  = get_field('category_icon', 'category_'.$term_id); 
                ?>
                <div class="masonry-item">
                    <a class="link-wrap masonry-content" href="<?php the_permalink(); ?>">
                        <?php
                            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
                            if ($featured_image):
                        ?>
                        <div class="link-wrap-image image-tall">
                            <figure>
                                <img src="<?php echo $featured_image; ?>" alt="<?php the_title(); ?>" />
                            </figure>
                        </div>
                        <?php endif; ?>
                        <div class="link-wrap-content p-5 border">
                            <h6><?php echo $term_name; ?></h6>
                            <h3><span><?php the_title(); ?></span></h3>
                            <span class="cta cta-small">
                                <span>
                                    Read More
                                    <?php get_template_part('partials/svgs/arrow','svg'); ?>
                                </span>
                            </span>
                        </div>
                    </a>
                </div>
                <?php
                endwhile;
            endif;
            ?> 
            </div>
            <div class="ajax-loader" id="ajax-loader"></div>
            <div class="row py-5">
                <div class="col-12 py-5">
                    <div class="pagination text-center" id="pagination">
                        <a class="cta cta-load" href="<?php echo get_next_posts_page_link(); ?>">
                            <span>
                                Load More
                                <?php get_template_part('partials/svgs/arrow-down','svg'); ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
<?php get_footer(); ?>