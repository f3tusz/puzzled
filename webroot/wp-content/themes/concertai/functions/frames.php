<?php 
    function show_frames(){
        if (get_field('frame_color')) {
            $frames = get_field('frame_color');
            $bg_type = get_field('background_type');
            if ($bg_type != 'solid') {
                $og_bg = "#FFFFFF";
            } else {
                $og_bg = get_field('background_color');
            }
            if ($frames != 'none') { ?>
                <div class="hero-color-bars" style="background-color:<?=  $frames; ?>">
                    <div class="hero-color-bars-og-bg" style="background-color:<?= $og_bg; ?>"></div>
                </div>
            <?php } 
        }
    }
?>