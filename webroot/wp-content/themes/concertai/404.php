<?php get_header(); ?>
<div class="husl-block husl-block-centered-content py-8 text-center" style="<?php echo $block_inline_style; ?>">
	<div class="container">
		<div class="row no-gutters justify-content-center">
			<div class="col-12 col-md-6">
				<h6 class="text-pre-header mb-3" data-aos="fade" data-aos-duration="500">Error 404</h6>
				<h1 class="mb-9" data-aos="fade" data-aos-duration="500" data-aos-delay="300">Page Not Found</h1>
				<p class="h3 mb-4">We&#8217;re sorry, but the page you&#8217;re looking for can&#8217;t be found.</p>
				<a class="cta cta-small" href="<?php echo esc_url('/'); ?>">
					<span>Return to our Home Page</span>
					<?php get_template_part('partials/svgs/arrow','svg'); ?>
				</a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>