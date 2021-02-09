<?php
/**
 * puzzled functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package puzzled
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'puzzled_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function puzzled_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on puzzled, use a find and replace
		 * to change 'puzzled' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'puzzled', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'puzzled' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'puzzled_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'puzzled_setup' );

function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function puzzled_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'puzzled_content_width', 640 );
}
add_action( 'after_setup_theme', 'puzzled_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function puzzled_scripts() {
  
	$rand = rand(0,99999);
  wp_enqueue_script('manifest', get_template_directory_uri() . "/assets/build/manifest.js",'',$rand, true);
  wp_enqueue_script('vendor', get_template_directory_uri() .   "/assets/build/vendor.js",'',$rand, true);
  wp_enqueue_script('theme', get_template_directory_uri() .    "/assets/build/main.js",'',$rand, true);
  wp_enqueue_style('master', get_template_directory_uri()  .   "/assets/build/style.css", true, $rand, 'all');
	
}
add_action( 'wp_enqueue_scripts', 'puzzled_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function my_myme_types($mime_types){
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
				'name'              => 'jobs',
				'title'             => __('Jobs'),
				'description'       => __('A custom jobs block repetaer.'),
				'render_template'   => 'blocks/jobs.php',
				'category'          => 'formatting',
				'icon'              => 'admin-comments',
				'keywords'          => array( 'jobs' ),
		));
	}
}
