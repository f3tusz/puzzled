<?php
    get_header();
    $count = $wp_query->found_posts;

    ?>
<main class="global-main">
    <article class="single-page">
        <div class="container-fluid pt-2 pb-7">
            <div class="row">
                <div class="col-12">
                    <?php get_search_form(); ?>
                    <p class="h6 pt-2"><?php
                        $count = $wp_query->found_posts;
                        echo $count;
                    ?> results for &ldquo;<?php echo get_search_query(); ?>&rdquo;</p>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-gray-light <?php echo ($count < 10) ? 'pb-100' : NULL; ?>">
            <div id="ajax-posts" class="container">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        $curPost = $wp_query->current_post + 1;
                ?>
                <div class="row py-5 <?php echo ($count != $curPost) ? 'border-bottom' : NULL; ?>">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="content-styled">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_date(); ?></p>
                            <a class="cta cta-small" href="<?php the_permalink(); ?>">
                                <span>Read More</span>
                                <?php get_template_part('partials/svgs/arrow','svg'); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
            </div>
            <?php if ($count > 10): ?>
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
            <?php endif; ?>
        </div>
    </article>
</main>
<?php get_footer(); ?>