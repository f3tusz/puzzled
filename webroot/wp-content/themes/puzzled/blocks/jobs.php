<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package puzzled
 */

?>

<section class="jobs">
  <div class="container">
    <h4>Recently added jobs:</h4>
	<?php if( have_rows('jobs') ): ?>
		<div class="row">
		<?php while( have_rows('jobs') ) : the_row(); 
		$company_logo = get_sub_field('company_logo');
		$company_name = get_sub_field('company_name');
		$job_position = get_sub_field('job_position');
		$job_location = get_sub_field('job_location');
		$hiring_reward = get_sub_field('hiring_reward');
		?>
			<div class="col-3">
				<div class="job-card">
					<div class="job-card_logo">
						<img src="<?= $company_logo; ?>" alt="">
					</div>
					<div class="job-card_content">
						<h2><?= $job_position; ?></h2>
						<h3><?= $company_name; ?></h3>
						<p><?php echo file_get_contents(get_template_directory_uri().'/assets/img/placeholder.svg');?> <?= $job_location; ?></p>
					</div>
					<div class="job-card_bottom">
						<div>
							<h2>$<?= $hiring_reward; ?></h2>
							<p>of hiring reward</p>
						</div>
						<a href="#">
							<?php echo file_get_contents(get_template_directory_uri().'/assets/img/puzzle-icon.svg');?>
						</a>
					</div>
					<div class="job-card_recommend">
						<p>Be the first one to recommend!</p>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>
		<?php endif; ?>
  </div>
</section>
