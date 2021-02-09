<?php 
//print the_title(); 
//the_excerpt(); 
$source_types = get_the_terms(get_the_ID(), 'source');
$research_list = wp_get_post_terms( $post->ID, 'research_type', array( 'fields' => 'all' ) );
$cancer_list = wp_get_post_terms( $post->ID, 'cancer_type', array( 'fields' => 'all' ) );
$publication_type = get_the_terms(get_the_ID(), 'publication-type');

$html_research = $html_cancer = $html_source = $data_cancer_type = $data_research_type = "";

if (count($research_list) > 0):
    $research_name = implode(', ', wp_list_pluck($research_list,'name'));
else:
    $research_name = $research_list[0]->name;
endif;

if (count($cancer_list) > 0):
    $cancer_name = implode(', ', wp_list_pluck($cancer_list,'name'));
else:
    $cancer_name = $cancer_list[0]->name;
endif;

if(is_array($source_types)){
    $html_source = $source_types[0]->name;
}

if(is_array($publication_type)){
    $html_type = $publication_type[0]->name;
}

$year_override = get_field('year_override',get_the_ID());
$journal_name = get_field('journal_name',get_the_ID());
$conference_name = get_field('conference_name',get_the_ID());

$external_URL = get_field('external_url',get_the_ID());
if ($external_URL != '' && $external_URL != null) {
    $href = $external_URL;
    $target = "_blank";
} else {
    $href = get_permalink();
    $target = "_self";
}
?>
<div class="publication-entry" data-cancer_type="<?= $data_cancer_type; ?>" data-research_type="<?= $data_research_type; ?>">
    <a class="publication-entry-link" href="<?php echo $href; ?>" target="<?php echo $target; ?>">
        <div class="row publication-taxonomy">
            <div class="col-12 col-md-10 col-md-offset-2 publication-details">
                <h6 class="post-meta h6" data-aos="fade" data-aos-duration="500">
                    <span class="font-weight-normal">Research</span>
                    <span><?php echo $research_name; ?></span>
                    <span class="spacer"></span>
                    <span class="font-weight-normal">Cancer</span>
                    <span><?php echo $cancer_name; ?></span>
                </h6>
            </div>
        </div>
        <div class="row publication-content">
            <div  data-aos="fade" data-aos-duration="500" data-aos-once="true" data-aos-delay="0" class="aos-init aos-animate col-12 col-md-2 publication-source">
              <?php if($journal_name) { ?>
                <?php echo $journal_name; ?>
              <?php } else { ?>
                <?php echo $conference_name; ?>
              <?php } ?>
              <span class="small-text">
                <?php if($year_override) { ?>
                  <?php echo $year_override; ?>
                <?php } else { ?>
                  <?php the_date('Y'); ?>
                <?php } ?>
              </span>
              <span class="small-text light-text">
                <?php echo $html_type; ?>
              </span>
            </div>
            <div class="col-12 col-md-10">
                <div class="publication-title link-wrap">
                    <h3 data-aos="fade" data-aos-once="true" data-aos-duration="500" data-aos-delay="0" class="aos-init aos-animate"><?php the_title(); ?></h3>
                </div>
                <div class="publication-cta">
                    <span  data-aos="fade" data-aos-duration="500" data-aos-delay="0" data-aos-once="true" class="aos-init aos-animate cta cta-small">Read More<?php get_template_part('partials/svgs/arrow','svg'); ?></span>
                </div>
            </div>
        </div>
    </a>
</div>