<?php 
    $label = $column['column_label'];
    $type = $column['column_type'];
    $bg_color = $column['background_color'];
    $content = $column['content'];
    $right_content = $column['right_content'];
    $data_set_type = $column['data_set_type'];
    $data_sets = $column['data_sets'];
    
    $info_class = "infographic-box";
    if ($bg_color != "#F5F5F6") {
        $info_class .= " dark-bg";
    }
    ?>

<?php
    if ($type == 'box'){ ?>
        <div class="<?= $info_class; ?>" style="background-color:<?= $bg_color; ?>">
    <div class="left-box <?php if (strlen($right_content) == 0) {?>full<?php } ?>"><?php echo $content; ?></div>
            <?php if (strlen($right_content) > 0){ ?>
            <div class="right-box"><?php echo $right_content; ?></div>
            <?php } ?>
        </div><?php
    } elseif ($type == 'data') {
        echo $label;
        if ($data_set_type == 'standard') { ?>
            <div class="infographic-standard"> <?php
                include (locate_template('partials/infographic-partials/data-standard.php', false, false)); ?>
            </div><?php
        } elseif ($data_set_type == 'circle'){?>
            <div class="infographic-circles"><?php
                include (locate_template('partials/infographic-partials/data-circles.php', false, false)); ?>
            </div> <?php 
        } ?><?php 

    } elseif ($type == 'editor') {
        echo $label;
        echo $content;
    }
?>