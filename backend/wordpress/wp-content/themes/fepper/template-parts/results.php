<?php
/**
 * The template for generic query results included by other templates
 *
 * @package WordPress
 * @subpackage Fepper
 */
?>

<main id="main" role="main">

	<?php if ( is_search() ) : ?>
		<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'fepper' ), get_search_query() ); ?></h1>

	<?php elseif ( is_home() && ! is_front_page() ) : ?>
		<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>

	<?php elseif ( is_archive() ) : ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>

	<?php endif; ?>

	<?php
		if ( have_posts() ) :
			// Start the loop.
			while ( have_posts() ) : the_post();
	?>
				<a href="<?php the_permalink(); ?>">
					<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				</a>
	<?php
			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'fepper' ),
				'next_text'          => __( 'Next page', 'fepper' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fepper' ) . ' </span>',
			) );

		// If no content:
		else :
	?>
			<p>
				<?php
					if ( is_search() ) :
						_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'fepper' );
					else :
						_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'fepper' );
					endif;
				?>
			</p>
			<div class="right-search">
				<?php get_search_form(); ?>
			</div>

	<?php
		endif;
	?>

</main>
