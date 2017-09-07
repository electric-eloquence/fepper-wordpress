<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Fepper
 */

get_header(); ?>

	<main id="main" role="main">

		<section class="error-404 not-found">
			<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'fepper' ); ?></h1>

			<div class="page-content">
				<p>
					<?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'fepper' ); ?>
				</p>
				<div class="right-search">
					<?php get_search_form(); ?>
				</div>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main>

<?php get_footer(); ?>
