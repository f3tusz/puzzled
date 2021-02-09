<?php 
/*
Template Name: Job Detail
*/
get_header(); ?>
<script type='text/javascript'>
    window.leverJobsOptions = {accountName: 'concertai', includeCss: false, mode: 'JSON', fx: 'singlejob'};
</script>
<main class="global-main" id="job-detail-main">
    <div class="container" id="jobLoading">
        <div class="row">
            <div class="col-12 text-center" id="lever-jobs-container">Loading job posting...</div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container" id="jobLoaded">
            <?php 
            $jobid = $_GET['jobid']; ?>
            <div class="row">
                <div class="col-12 col-md-8 col-md-offset-2 text-center">
                    <h6 id="job-meta"><span id="job-location"></span><span id="job-team"></span><span id="job-commitment"></span></h6>
                    <h2 id="job-title">Customer Success Account Lead</h2>
                    <a class="cta cta-small" id="job-apply" href="<?php echo get_home_url() . "/job-application/?jobid=" . $jobid; ?>">Apply for this Job <?php get_template_part('partials/svgs/arrow','svg'); ?></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8 col-md-offset-2">
                    <section id="job-description"></section>
                    <section id="job-lists"></section>
                    <section id="job-additional"></section>
                    <section id="job-apply-container">
                        <a class="cta cta-small" id="job-apply-2" href="<?php echo get_home_url() . "/job-application/?jobid=" . $jobid; ?>">Apply for this Job <?php get_template_part('partials/svgs/arrow','svg'); ?></a>
                    </section>
                </div>
            </div>
        </div>
        <div class="container" id="jobLinks">
            <div class="row">
                <div id="job-social-links" class="col-12 text-center"><?php get_template_part('partials/social'); ?></div>
            </div>
            <div class="row">
                <div id="job-back-button" class="col-12 col-md-8 col-md-offset-2 text-center">
                    <a class="cta cta-small flipsvg flipsvg-180" href="<?= get_home_url() . '/open-jobs'; ?>"><?php get_template_part('partials/svgs/arrow','svg'); ?>Back to Open Positions</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>