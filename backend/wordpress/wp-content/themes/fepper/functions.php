<?php
/**
 * Fepper functions and definitions
 *
 * @package WordPress
 * @subpackage Fepper
 */

// Parse variables.styl for breakpoints. Create a global $breakpoints array and
// add these values to it. Do this in the global scope so any and all functions
// can access them.
// Out of the box, they will be:
// $breakpoints['bp_lg_max'] = -1;
// $breakpoints['bp_lg_min'] = 1024;
// $breakpoints['bp_md_min'] = 768;
// $breakpoints['bp_sm_min'] = 480;
// $breakpoints['bp_xs_min'] = 0;
$bp_ini = get_template_directory() . '/scripts/src/variables.styl';
if (file_exists($bp_ini)) {
  $GLOBALS['breakpoints'] = parse_ini_file($bp_ini);
}

if ( ! function_exists( 'fepper_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fepper_setup() {

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'fepper' ),
		'social'  => __( 'Social Links Menu', 'fepper' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );
}
endif; // fepper_setup
add_action( 'after_setup_theme', 'fepper_setup' );

/**
 * Change excerpt length to 35 words
 */
function fepper_excerpt_length( $length ) {
  return 35;
}
add_filter( 'excerpt_length', 'fepper_excerpt_length', 999 );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function fepper_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'fepper_javascript_detection', 0 );

/**
 * Enqueue styles.
 */
function fepper_styles() {
	// Load our main stylesheet.
	wp_enqueue_style( 'fepper-style', get_template_directory_uri() . '/styles/style.css' );
}

/**
 * Enqueue scripts.
 */
function fepper_scripts() {
	// Load our JavaScripts.
	wp_enqueue_script( 'fepper-variables', get_template_directory_uri() . '/scripts/src/variables.styl', array(), false, true );
	wp_enqueue_script( 'fepper-fepper-obj', get_template_directory_uri() . '/scripts/min/fepper-obj.min.js', array(), false, true );
	wp_enqueue_script( 'fepper-functions', get_template_directory_uri() . '/scripts/min/functions.min.js', array( 'jquery' ), false, true );
}

add_action( 'wp_enqueue_scripts', 'fepper_styles' );
add_action( 'wp_enqueue_scripts', 'fepper_scripts' );

/**
 * Register widget area.
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fepper_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Sidebar', 'fepper' ),
		'id'            => 'sidebar',
		'description'   => __( 'Add widgets here to appear in your header.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => __( 'Side Sidebar 1', 'fepper' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Side Sidebar 2', 'fepper' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fepper_widgets_init' );
