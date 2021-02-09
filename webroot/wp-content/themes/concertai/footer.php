    <footer class="global-footer">
        <div class="container-fluid">
            <div class="row main-footer">
                <div class="col-lg-3 col-xl-3 col-6" id="footer-column-logo">
                    <a href="<?= home_url(); ?>" class="nohoversvg">
                        <div id="footer-logo">
                            <?php get_template_part( 'partials/site', 'logo' ); ?>
                        </div>
                    </a>
                </div>
                <div class="col-lg-9 col-xl-1 col-6 desktop-only" id="footer-column-social">
                    <div class="d-flex align-items-center justify-content-end">
                        <?php get_template_part('partials/svgs/twitter', 'svg'); ?>
                        <?php get_template_part('partials/svgs/linkedin', 'svg'); ?>
                    </div>
                </div>
                <div class="col-xl-8 col-12" id="footer-column-menu">
                    <div id="footer-navigation-menu" class="primary-navigation-menu">
                        <?php
                            for ($i=1;$i<5;$i++){
                                wp_nav_menu( array(
                                    'theme_location'    => 'primary_navigation_column_' . $i,
                                    'depth'             => 0,
                                    'container'         => 'div',
                                    'container_id'      => 'footerNav' . $i,
                                    'container_class'   => 'primary-navigation-column'
                                ));
                            }
                        ?>
                    </div>
                </div>
            </div>
          <div class="mobile-only">
            <div class="row">
                <div class="col-lg-9 col-xl-1 col-6" id="mobile-footer-column-social">
                    <div class="d-flex">
                        <?php get_template_part('partials/svgs/twitter', 'svg'); ?>
                        <?php get_template_part('partials/svgs/linkedin', 'svg'); ?>
                    </div>
                </div>
            </div>
          </div>
            <div class="row padding-top-medium">
                <div class="col-12">
                    <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                    <script data-hubspot-rendered="true">
                        hbspt.forms.create({
                        portalId: "5411893",
                        formId: "548d0f96-85e2-47d4-85d0-1adf3ede0bbe",
                        css: ' ',
                        cssClass: 'email-subscribe'
                        });
                    </script>
                </div>
            </div>
            <div class="row">
                <div class="col-12" id="footer-policy">
                    <p class="inline-p">&copy; 2017-<?php echo date('Y'); ?> ConcertAI. All Rights Reserved. ConcertAI is a <a href="https://symphonyai.com" target="_blank" class="inline-a">SymphonyAI</a> company.</p>
                    <a href="/privacy-policy/">Privacy Policy</a>
                    <a href="/terms-of-use/">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <?php print_external_scripts('footer'); ?>
</body>
</html>
