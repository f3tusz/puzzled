<?php 
$subnavigation = get_field('subnavigation');
$subnav_menu = get_field('subnavigation_menu');

$container_type = ($subnavigation == 'sticky' ? 'container-fluid' : 'container'); 
$container_type = 'container';
        ?> 
        <div class="<?= $container_type; ?> subnavigation subnav-<?php echo $subnavigation; ?>">
            <div class="row">
                <div class="col-12 col-lg-10 col-lg-offset-1">
                    <?php 
                        wp_nav_menu(array(
                            'menu' => $subnav_menu,
                            'depth' => 1,
                            'container' => 'div'          
                        ));
                    ?>
                </div>
            </div>
        </div>