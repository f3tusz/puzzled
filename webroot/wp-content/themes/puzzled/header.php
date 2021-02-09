<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package puzzled
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="icon" type="image/png" href="<?php bloginfo('template_directory');?>/assets/img/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
		<div class="navbar">
			<div class="container">
				<a class="navbar-brand">
				<?php echo file_get_contents(get_template_directory_uri().'/assets/img/puzzle-icon.svg');?>
				</a>
				<button class="navbar-toggle">
					<?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon-hamburger.svg');?>
					<?php echo file_get_contents(get_template_directory_uri().'/assets/img/icon-close.svg');?>
				</button>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'container' => 'nav',
							'container_class' => 'navbar-menu'
						)
					);
				?>
			</div>
		</div>
	</header>
