<?php get_header(); ?>

<main class="global-main">
    <article class="single-page">
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        else :
            _e('Sorry, there was an issue loading this page', 'concertai');
        endif;

        ?>
    </article>
</main>

<?php get_footer(); ?>