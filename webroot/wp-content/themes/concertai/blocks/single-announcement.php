<?php
    $announcement = $announcements[0];
    $image = $announcement['announcement_image']['url'];
    $pre_title = $announcement['announcement_pre_title'];
    $title = $announcement['announcement_title'];
    $description = $announcement['announcement_description'];
    $link_label = $announcement['announcement_link_label'];
    $link_url = $announcement['announcement_link_url'];
?>
<div class="col-12">
    <a class="link-wrap" href="<?php echo $link_url; ?>">
        <div class="row no-gutters">
            <div class="col-lg-4 d-flex">
                <div class="link-wrap-image flex-grow-1">
                    <figure>
                        <img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
                    </figure>
                </div>
            </div>
            <div class="col-lg-8 d-flex">
                <div class="link-wrap-content flex-grow-1 p-5">
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
            </div>
        </div>
    </a>
</div>