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
// $breakpoints['bp_md_max'] = 1024;
// $breakpoints['bp_sm_max'] = 767;
// $breakpoints['bp_xs_max'] = 480;
// $breakpoints['bp_xx_max'] = 320;
// $breakpoints['bp_xx_min'] = 0;
$bp_ini = get_template_directory() . '/_scripts/src/variables.styl';
if ( file_exists( $bp_ini ) ) {
	$GLOBALS['breakpoints'] = parse_ini_file( $bp_ini );
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

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', fepper_fonts_url() ) );
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

if ( ! function_exists( 'fepper_fonts_url' ) ) :
/**
 * register google fonts.
 *
 * create your own fepper_fonts_url() function to override in a child theme.
 *
 * @return string google fonts url for the theme.
 */
function fepper_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: if there are characters in your language that are not supported by merriweather, translate this to 'off'. do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'merriweather font: on or off', 'fepper' ) ) {
		$fonts[] = 'merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: if there are characters in your language that are not supported by montserrat, translate this to 'off'. do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'montserrat font: on or off', 'fepper' ) ) {
		$fonts[] = 'montserrat:400,700';
	}

	/* translators: if there are characters in your language that are not supported by inconsolata, translate this to 'off'. do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'inconsolata font: on or off', 'fepper' ) ) {
		$fonts[] = 'inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * javascript detection.
 *
 * adds a `js` class to the root `<html>` element when javascript is detected.
 */
function fepper_javascript_detection() {
	echo "<script>(function(html){html.classname = html.classname.replace(/\bno-js\b/,'js')})(document.documentelement);</script>\n";
}
add_action( 'wp_head', 'fepper_javascript_detection', 0 );

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
	wp_enqueue_script( 'fepper-variables', get_template_directory_uri() . '/_scripts/src/variables.styl', array(), false, true );
	wp_enqueue_script( 'fepper-fepper-obj', get_template_directory_uri() . '/_scripts/src/fepper-obj.js', array(), false, true );
	wp_enqueue_script( 'fepper-functions', get_template_directory_uri() . '/_scripts/src/functions.js', array( 'jquery' ), false, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'fepper_styles' );
add_action( 'wp_enqueue_scripts', 'fepper_scripts' );

/**
 * register widget area.
 *
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
		'name'          => __( 'side sidebar 1', 'fepper' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'add widgets here to appear in your sidebar.', 'fepper' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'side sidebar 2', 'fepper' ),
		'id'            => 'sidebar-2',
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
