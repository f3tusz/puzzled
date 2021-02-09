<div class="husl-block block-infographic dark-bg padding-top-large padding-bottom-large">
    <div class="container" > <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
<?php $rows = get_field('row');
foreach ($rows as $row){ 
        $border_thickness = $row['border_thickness'];
        $column_type = $row['column_type'];
        $column_1 = $row['column_1'];
        $column_2 = $row['column_2'];

        //Column 1 stuff
        $content = $column_1['content'];
        $label = $column_1['column_label']; 
        
        if (strlen($label) > 0){?>
            <div class="row no-padding">
                <div class="col-12 label-container">
                    <?php echo $label; ?>
                </div>
            </div> <?php 
        } else { ?>
        <div class="row extra-padding"></div>

<?php        }
        
        ?>
    <div class="row infographic-border <?php echo $border_thickness; ?>"  >
        <?php if (get_field('section_id')){ ?> 
            <a class="anchor" id="<?= get_field('section_id'); ?>"></a>
        <?php } ?><?php
        
        if ($column_type == "col_1") { ?>
          <?php if($content) { ?>
            <div class="col-12 col-lg-offset-2 col-lg-8 align-center">
                <?php echo $content; ?>
            </div>
          <?php } ?>
      <?php 
        } elseif ($column_type == "col_1_2"){ ?>
        <?php if($content) { ?>
            <div class="col-lg-4 col-12">
                <?php echo $content; ?>
            </div>
        <?php } ?>
            <div class="col-lg-8 col-12"><?php
                $column = $column_2;
                include (locate_template('partials/infographic-partials/infographic.php', false, false));
//                get_infographic_content($column_2); ?>
            </div> <?php

        } elseif ($column_type == "col_2_1"){?> 
        <?php if($content) { ?>
            <div class="col-lg-8 col-12">
                <?php echo $content; ?>
            </div>
        <?php } ?>
            <div class="col-lg-4 col-12"><?php
                $column = $column_2;
                include (locate_template('partials/infographic-partials/infographic.php', false, false)); ?>
            </div> <?php
        }
        
        ?>
    </div> <?php
    
} ?>

    </div>
</div>