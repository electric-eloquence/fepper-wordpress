<?php
/**
 * Fepper functions and definitions
 *
 * @package WordPress
 * @subpackage Fepper
 */

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
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 40,
		'flex-width' => true,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in three locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'fepper' ),
		'footer'  => __( 'Footer Menu',       'fepper' ),
		'social'  => __( 'Social Links Menu', 'fepper' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Visual editor styles.
	 */
	add_editor_style( array( '_styles/bld/style.css', '_styles/bld/editor-style.css' ) );
}
endif; // fepper_setup
add_action( 'after_setup_theme', 'fepper_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fepper_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fepper_content_width', 840 );
}
add_action( 'after_setup_theme', 'fepper_content_width', 0 );

/**
 * enqueue styles.
 */
function fepper_styles() {
	// load our main stylesheet.
	wp_enqueue_style( 'fepper-style', get_template_directory_uri() . '/_styles/bld/style.css' );
}

/**
 * enqueue scripts.
 */
function fepper_scripts() {
	// load our javascripts.
	wp_enqueue_script(
		'fepper-functions',
		get_template_directory_uri() . '/_scripts/src/functions.js',
		array(),
		false,
		true
	);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'fepper_styles' );
add_action( 'wp_enqueue_scripts', 'fepper_scripts' );

/**
 * register widget area.
 *
 * @link https://codex.wordpress.org/function_reference/register_widget
 * @link https://codex.wordpress.org/function_reference/register_sidebar
 */
function fepper_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'header sidebar', 'fepper' ),
		'id'            => 'sidebar',
		'description'   => __( 'add widgets here to appear in your header.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	register_sidebar( array(
		'name'          => __( 'side sidebar', 'fepper' ),
		'id'            => 'sidebar-1',
  		'description'   => __( 'add widgets here to appear in your sidebar.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fepper_widgets_init' );

/**
 * custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
