<?php
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

/**
 * enqueue styles.
 */
function fepper_child_styles() {
	$parent_style = 'fepper-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/_styles/bld/style.css' );
	wp_enqueue_style( 'fepper-child-style',
		get_stylesheet_directory_uri() . '/_styles/bld/style-child.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}

/**
 * enqueue scripts.
 */
function fepper_child_scripts() {
	$parent_script = 'fepper-functions';

	// load our javascripts.
	wp_enqueue_script(
		'fepper-child-variables',
		get_stylesheet_directory_uri() . '/_scripts/src/variables.styl',
		array(),
		false,
		true
	);
	wp_enqueue_script(
		'fepper-child-fepper-obj',
		get_stylesheet_directory_uri() . '/_scripts/src/fepper-obj.js',
		array(),
		false,
		true
	);
	wp_enqueue_script(
		$parent_script,
		get_template_directory_uri() . '/_scripts/src/functions.js',
		array( 'jquery' ),
		false,
		true
	);
	wp_enqueue_script(
		'fepper-child-functions',
		get_stylesheet_directory_uri() . '/_scripts/src/functions-child.js',
		array( 'jquery', $parent_script ),
		false,
		true
	);
}

add_action( 'wp_enqueue_scripts', 'fepper_child_styles' );
add_action( 'wp_enqueue_scripts', 'fepper_child_scripts' );

/**
 * dequeue scripts.
 */
function fepper_child_dequeue_scripts() {
	wp_dequeue_script( 'fepper-variables' );
	wp_dequeue_script( 'fepper-fepper-obj' );
	wp_dequeue_script( 'fepper-functions' );
}
add_action( 'wp_enqueue_scripts', 'fepper_child_dequeue_scripts', 100 );
?>
