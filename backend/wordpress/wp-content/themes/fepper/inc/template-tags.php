<?php
if ( ! function_exists( 'fepper_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 */
function fepper_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

if ( ! function_exists( 'fepper_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own fepper_categorized_blog() function to override in a child theme.
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function fepper_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fepper_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fepper_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fepper_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fepper_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'fepper_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own fepper_entry_taxonomies() function to override in a child theme.
 */
function fepper_entry_taxonomies() {
	$categories_list = get_the_category_list(
		_x( ', ', 'Used between list items, there is a space after the comma.', 'fepper' )
	);
	if ( $categories_list && fepper_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'fepper' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list(
		'',
		_x( ', ', 'Used between list items, there is a space after the comma.', 'fepper' )
	);
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'fepper' ),
			$tags_list
		);
	}
}
endif;

/**
 * Change excerpt length to 35 words
 */
function fepper_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'fepper_excerpt_length', 999 );
