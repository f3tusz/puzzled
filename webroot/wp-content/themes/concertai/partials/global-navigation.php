<?php  
  if (!is_home() && !is_search()){
    global $post;
    $blocks = parse_blocks($post->post_content);
    $navbar_color = 'light';
    foreach ($blocks as $block){
      //if ($block['blockName'] == 'acf/hero'){ // the hero or slider could change the nav
        if (!empty($block['attrs']['data']['top_navigation_background_color'])){
          $navbar_color = $block['attrs']['data']['top_navigation_background_color'];
          break;
        }
      //}
    }
  }

//  $bgmode = is_404() || is_search() ? 'light' : $navbar_color;
    $bgmode = is_front_page() || is_home() || is_page('news') || is_page('blog') || is_category() ? 'dark' : $navbar_color;
if( is_search() || is_single() ) { 
  $bgmode = 'light';
}
?>
<nav class="navbar is-fixed-top <?php echo $bgmode; ?>" role="navigation">
  <div class="container-fluid">
    <div class="navbar-brand menu-to-fix">
      <a class="menu-item <?= $bgmode; ?>" id="navlogo" href="<?php echo home_url(); ?>">
        <img class="dark" src="<?php bloginfo('template_directory');?>/assets/img/logo-dark.svg" alt="<?php bloginfo('name') ?>" />
        <img class="light" src="<?php bloginfo('template_directory');?>/assets/img/logo-light.svg" alt="<?php bloginfo('name') ?>" />
      </a><?php if(is_front_page()){ ?>
      <span class="white tagline animate-sentence" data-aos="fade-in"
      data-aos-easing="linear"
      data-aos-duration="1000"><?php bloginfo('description') ?></span><?php } ?>
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div id="navbar-menu" class="menu-to-fix">
      <div id="search-svg" class="nav-svg">
        <?php get_template_part('partials/svgs/search', 'svg'); ?>
      </div>
      <div id="menu-trigger">
        <div id="close-svg" class="nav-svg">
          <?php get_template_part('partials/svgs/menu-close', 'svg'); ?>
        </div>
        <div id="hamburger-svg" class="nav-svg">
          <?php get_template_part('partials/svgs/hamburger-menu', 'svg'); ?>
        </div>
      </div>
    </div>
    
  </div>
</nav>
<div id="popouts" class="dark-bg">
  <div id="popout-search-container" class="popout-menu">
    <?php get_search_form(); ?>
  </div>
  <div id="popout-menu-container" class="popout-menu">
    <div class="row main-footer">
      <div class="col-xl-8 col-12" id="header-column-menu">
        <div id="header-navigation-menu" class="primary-navigation-menu">
          <?php
              for ($i=1;$i<5;$i++){
                  wp_nav_menu( array(
                    'theme_location'    => 'primary_navigation_column_' . $i,
                    'depth'             => 0,
                    'container'         => 'div',
                    'container_id'      => 'headerNav' . $i,
                    'container_class'   => 'primary-navigation-column'
                  ));
              }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>