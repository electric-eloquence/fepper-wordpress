<?php
/**
 * Sets up the WordPress core custom header and custom background features.
 */
function fepper_custom_header_and_background() {
	/**
	 * Filter the arguments used when adding 'custom-background' support.
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'fepper_custom_background_args', array(
		'default-color' => 'ffffff',
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support.
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-image      Default background-image of the header.
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int    $width              Width in pixels of the custom header image. Default 1200.
	 *     @type int    $height             Height in pixels of the custom header image. Default 280.
	 *     @type bool   $flex-height        Whether to allow flexible-height header images. Default true.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'fepper_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/_assets/src/landscape-2x1-mountains.jpg',
		'default-text-color'     => 'ffffff',
		'width'                  => 1200,
		'height'                 => 675,
		'flex-height'            => true
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/_assets/src/landscape-2x1-mountains.jpg',
			'thumbnail_url' => '%s/_assets/src/landscape-2x1-mountains.jpg',
			'description'   => __( 'Default Header Image', 'fepper' ),
		),
	) );
}
add_action( 'after_setup_theme', 'fepper_custom_header_and_background' );
