<?php 
$cta_text = get_field('cta_text');
$temp_url = get_field('cta_url');
$cta_url_external = get_field('cta_url_external');
$cta_size = get_field('cta_size');
$class = "class='cta cta-$cta_size'"; 
if($temp_url != '' && $temp_url != null){
    $href = "href='$temp_url'";
    $target = "target=_blank";
} else  {
    $href = "href='$cta_url_external'";
    $target = "";
} ?>

<?php if (strlen($cta_text) > 0 ) { ?>
    <a <?php echo "$href $target $class"; ?>>
        <span><?php echo $cta_text; ?></span>
        <?php get_template_part('partials/svgs/arrow','svg'); ?>
    </a>
<?php } ?>