<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package puzzled
 */

get_header();
?>
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h4>Innovative solution for sourcing candidates</h4>
        <h2>Help us find <strong>the missing puzzle, get rewarded</strong> properly.</h2>
        <?php get_search_form(); ?>
      </div>
      <div class="col-4">
        <img src="<?php echo get_template_directory_uri().'/assets/img/hero-graphic.svg';?>" alt="">
      </div>
    </div>
  </div>
</section>
<?php
the_content();
get_footer();