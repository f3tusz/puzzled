<div class="search-form">
    <form action="<?php echo home_url( '/' ); ?>" method="get">
        <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Enter keyword..." />
        <div class="hs-submit">
            <div class="actions">
                <input type="submit" value="Search" class="search-button hs-button" />
                <?php get_template_part('partials/svgs/arrow', 'svg'); ?>
            </div>
        </div>
    </form>
</div>