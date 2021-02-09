<?php if ( get_field('announcement') ): ?>
<div class="row">
<?php
    if ($count == 3):
        $class = 'col-lg-4';
    elseif ($count == 2):
        $class = 'col-lg-6'; 
    endif;
    while( has_sub_field('announcement') ){ 
        $image = get_sub_field('announcement_image')['url'];
        $pre_title = get_sub_field('announcement_pre_title');
        $title = get_sub_field('announcement_title');
        $description = get_sub_field('announcement_description');
        $link_label = get_sub_field('announcement_link_label');
        $link_url = get_sub_field('announcement_link_url'); ?>
    <div class="<?php echo $class; ?> col-md-12 d-flex mb-4">
        <a class="link-wrap d-flex flex-column w-100 bg-white count-<?php echo $count; ?>" href="<?php echo $link_url; ?>">
            <div class="link-wrap-image image-tall">
                <figure>
                    <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                </figure>
            </div>
            <div class="link-wrap-content d-flex flex-column flex-grow-1 p-5">
                <?php if($pre_title) : ?>
                <div class="d-flex align-items-center" data-aos="fade" data-aos-duration="500">
                    <h6 class="mr-3"><?php echo $pre_title; ?></h6>
                </div>
                <?php endif;
                if ($title): ?>
                <h3 data-aos="fade" data-aos-duration="500" data-aos-delay="300">
                    <span><?php echo $title; ?></span>
                </h3>
                <?php endif;
                if ($link_label && $link_url): ?>
                <span class="cta cta-small align-self-start mt-auto">
                    <span>
                        <?php echo $link_label; ?>
                        <?php get_template_part('partials/svgs/arrow','svg'); ?>
                    </span>
                </span>
                <?php endif; ?>
            </div>
        </a>
    </div>
    <?php } ?>
</div>
<?php endif; ?>