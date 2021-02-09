<?php 
    foreach ($data_sets as $data_set){ 
        $circle_size = (isset($data_set['circle_size']) ? $data_set['circle_size'] : 'regular');
        ?>
        <div class="data-circle <?= $circle_size; ?>" style="background-color:<?php echo $data_set['background_color']; ?>">
        <?php
            $data_wrapper_class = "data-wrapper";
            if (isset($data_set['use_small_text']) && 
                $data_set['use_small_text'] == true && 
                $circle_size == 'large'){
                    $data_wrapper_class .= " small-text";
                    if (isset($data_set['extra_room']) && $data_set['extra_room'] == true){
                        $data_wrapper_class .= " extra-room";
                    }
            } ?>
            <div class="<?= $data_wrapper_class; ?>">
                <?php echo $data_set['content']; ?>
            </div>
        </div> <?php
    }
    ?>