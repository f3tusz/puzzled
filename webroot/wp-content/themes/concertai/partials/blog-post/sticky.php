<div class="col-12">
    <div class="card">
        <div class="post-thumbnail" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>');">&nbsp;</div>
        <div class="content-wrapper">
            <div class="post-meta">
                <ul class="categories">
                    <?php foreach (wp_get_post_terms(get_the_ID(), 'category') as $cat) { ?>
                        <li><a href="/category/<?php echo $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="content-styled excerpt">
                <?php the_excerpt(); ?>
            </div>
            <a class="post-link" href="<?php the_permalink(); ?>">Read More</a>
        </div>
    </div>
</div>