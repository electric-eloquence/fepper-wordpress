<?php
/**
 * Sets up the WordPress core custom header and custom background features.
 */
function fepper_custom_header_and_background() {
	$color_scheme             = fepper_get_color_scheme();
	$default_background_color = trim( $color_scheme[1], '#' );
	$default_text_color       = trim( $color_scheme[1], '#' );

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
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support.
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'fepper_custom_header_args', array(
		'default-text-color'     => $default_text_color,
		'width'                  => 1200,
		'height'                 => 675,
		'flex-height'            => true
	) ) );
}
add_action( 'after_setup_theme', 'fepper_custom_header_and_background' );

/**
 * Registers color schemes.
 *
 * Can be filtered with {@see 'fepper_color_schemes'}.
 *
 * The order of colors in a colors array:
 * 1. Main Background Color.
 * 2. Page Background Color.
 * 3. Link Color.
 * 4. Main Text Color.
 * 5. Secondary Text Color.
 *
 * @return array An associative array of color scheme options.
 */
function fepper_get_color_schemes() {
	/**
	 * Filter the color schemes.
	 *
	 * The default schemes include 'default', 'dark', 'gray', 'red', and 'yellow'.
	 *
	 * @param array $schemes {
	 *     Associative array of color schemes data.
	 *
	 *     @type array $slug {
	 *         Associative array of information for setting up the color scheme.
	 *
	 *         @type string $label  Color scheme label.
	 *         @type array  $colors HEX codes for default colors prepended with a hash symbol ('#').
	 *                              Colors are defined in the following order: Main background, page
	 *                              background, link, main text, secondary text.
	 *     }
	 * }
	 */
	return apply_filters( 'fepper_color_schemes', array(
		'default' => array(
			'label'  => __( 'Default', 'fepper' ),
			'colors' => array(
				'#1a1a1a',
				'#ffffff',
				'#007acc',
				'#1a1a1a',
				'#686868',
			),
		),
		'dark' => array(
			'label'  => __( 'Dark', 'fepper' ),
			'colors' => array(
				'#262626',
				'#1a1a1a',
				'#9adffd',
				'#e5e5e5',
				'#c1c1c1',
			),
		),
		'gray' => array(
			'label'  => __( 'Gray', 'fepper' ),
			'colors' => array(
				'#616a73',
				'#4d545c',
				'#c7c7c7',
				'#f2f2f2',
				'#f2f2f2',
			),
		),
		'red' => array(
			'label'  => __( 'Red', 'fepper' ),
			'colors' => array(
				'#ffffff',
				'#ff675f',
				'#640c1f',
				'#402b30',
				'#402b30',
			),
		),
		'yellow' => array(
			'label'  => __( 'Yellow', 'fepper' ),
			'colors' => array(
				'#3b3721',
				'#ffef8e',
				'#774e24',
				'#3b3721',
				'#5b4d3e',
			),
		),
	) );
}

if ( ! function_exists( 'fepper_get_color_scheme' ) ) :
/**
 * Retrieves the current color scheme.
 *
 * Create your own fepper_get_color_scheme() function to override in a child theme.
 *
 * @return array An associative array of either the current or default color scheme HEX values.
 */
function fepper_get_color_scheme() {
	$color_scheme_option = get_theme_mod( 'color_scheme', 'default' );
	$color_schemes       = fepper_get_color_schemes();

	if ( array_key_exists( $color_scheme_option, $color_schemes ) ) {
		return $color_schemes[ $color_scheme_option ]['colors'];
	}

	return $color_schemes['default']['colors'];
}
endif; // fepper_get_color_scheme
