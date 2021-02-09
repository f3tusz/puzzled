<div class="eureka-accordion">
        <div class="row no-gutters justify-content-center">
          <div class="col-lg-12">
            <?php /*?>
              Available color classes for div.panels-wrap
              – scheme-redish (current)
              – scheme-purple
              – scheme-pink
              – scheme-blue
              – scheme-cyan
            <?php */
                $total_count = count(get_sub_field('panel_columns'));?>
            <div class="panels-wrap scheme-<?php echo $color_scheme;  if($total_count == 1) { echo ' single-col'; } ?>">
              <?php 
              if( get_sub_field('panel_columns') ){
                $j = 1;
                while( has_sub_field('panel_columns') ){ 
                  $column_icon = get_sub_field('column_icon');
                  $column_title = get_sub_field('column_title');
                  $column_counter = $j++;
                  if($column_counter == 1) {
                    $column_class = 'bg-high ';
                  }elseif($column_counter == 2) {
                    $column_class = 'bg-mid ';
                  }elseif($column_counter == 3) {
                    $column_class = 'bg-low ';
                  } ?>
                  <div class="panel-container <?php echo $column_class; if($total_count == 1) { echo 'single-col'; } ?>">
                    <div class="panel heading-click">
                      <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                        <div class="icon">
                          <?php echo file_get_contents($column_icon['url']);?>
                        </div>
                        <hr>
                        <h6><?php echo $column_title; ?></h6>
                      </div>
                      <ul class="panel-menu">
                      <?php 
                      if( get_sub_field('column_list_items') ){
                        $k = 1;
                        while( has_sub_field('column_list_items') ){ 
                          $list_item_title = get_sub_field('list_item_title');
                          $is_indented = get_sub_field('is_indented');
                          $make_unclickable = get_sub_field('make_unclickable');
                          $sub_content_icon = get_sub_field('sub_content_icon');
                          $sub_content_title = get_sub_field('sub_content_title');
                          $sub_content = get_sub_field('sub_content'); 
                          $panel_menu_counter = $k++; ?>
                          <li class="<?php /*if($panel_menu_counter == 1 && $column_counter == 1) { ?> is-active <?php }*/ ?><?php if($is_indented) { ?> is-indented <?php } ?><?php if($make_unclickable) { ?> unclickable <?php } ?>">
                          <a href="" <?php if( get_sub_field('subset_list') ){ ?>data-panel-class="panel-opened" <?php } else { ?> data-class="panel-opened" <?php } ?>>
                            <?php echo $list_item_title; ?>
                            <div class="icon">
                              <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                            </div>
                          </a>
                      <?php
                      if( get_sub_field('subset_list') ){   ?>
                      <div class="panel">
                        <div class="d-flex">
                          <hr>
                        </div>
                        <ul class="panel-menu">
                          <?php while( has_sub_field('subset_list') ){ 
                          $subset_list_item_title = get_sub_field('subset_list_item_title');
                          $subset_content_icon = get_sub_field('subset_content_icon');
                          $subset_content_title = get_sub_field('subset_content_title');
                          $subset_content = get_sub_field('subset_content'); ?>
                          <li>
                            <a href="" data-panel-class="panel-expanded"><?php echo $subset_list_item_title; ?>
                              <div class="icon">
                                <?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon_info.svg');?>
                              </div>
                            </a>
                            <div class="panel">
                              <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                                <div class="icon">
                                  <?php echo file_get_contents($subset_content_icon['url']);?>
                                </div>
                                <hr>
                                <h6><?php echo $subset_content_title; ?></h6>
                              </div>
                              <div class="chevron-bullet">
                                <?php echo $subset_content; ?>
                              </div>
                            </div>
                          </li>
                          <?php
                          }
                          ?>
                        </ul>
                      </div>

                            <?php } else { ?>
                          <div class="panel">
                            <div class="d-flex align-items-center justify-content-start align-items-lg-start flex-lg-column">
                              <div class="icon">
                                <?php echo file_get_contents($sub_content_icon['url']);?>
                              </div>
                              <hr>
                              <h6><?php echo $sub_content_title; ?></h6>
                            </div>
                            <div class="chevron-bullet">
                              <?php echo $sub_content; ?>
                          </div>
                            </div>
                            <?php } ?>
                        </li>
                      <?php
                        }
                      } ?>
                      </ul>
                    </div>
                  </div>
              	<?php
                }
              } ?>
              <a class="back-button">
                <?php get_template_part('partials/svgs/arrow','svg'); ?>
                <span>Back</span>
              </a>
            </div>
          </div>
        </div>
      </div>