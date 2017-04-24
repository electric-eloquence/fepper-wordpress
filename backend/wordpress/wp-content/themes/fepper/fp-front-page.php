<div class="page" id="page">
	<div role="main">
		<section class="hero-and-insets">
			<?php
query_posts( 'category_name=hero' );
global $wp_query;
$post_count_hero = $wp_query->post_count;
while ( have_posts() ) : the_post();
?>
				<div class="block block-hero">
	<a href="<?php the_permalink(); ?>" class="inner">
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post, 'full' ); ?>
		</div>
		<div class="b-text">
			<h2 class="headline"><?php the_title(); ?></h2>
		</div>
	</a>
</div>

			<?php endwhile; ?>

			<?php
query_posts( 'category_name=tout' );
$post_count_tout = $wp_query->post_count;
while ( have_posts() ) : the_post();
?>
				<div class="block block-inset">
	<a href="<?php the_permalink(); ?>" class="inner">
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post, 'full' ); ?>
		</div>
		<div class="b-text">
			<h2 class="headline"><?php the_title(); ?></h2>
		</div>
	</a>
</div>

			<?php endwhile; ?>
		</section>

		<?php if ( $post_count_hero || $post_count_tout ) : ?>
			<hr />
		<?php endif; ?>

		<div class="l-two-col">
			<div class="l-main">
				<section class="section latest-posts">
					<h2 class="section-title"><?php
query_posts( 'category_name=uncategorized' );
$post_count_uncat = $wp_query->post_count;
$post_count_uncat_max = 5;
$post_counter = 0;
echo _n('Latest Post', 'Latest Posts', $post_count_uncat, 'fepper'); ?></h2>
					<ul class="post-list">
						<?php
while ( have_posts() ) : the_post();
	if ( $post_counter >= $post_count_uncat_max ) {
		break;
	}
?>
							<li>
								<div class="block block-thumb">
	<a href="<?php the_permalink(); ?>" class="b-inner cf">
		<h2 class="headline"><?php the_title(); ?></h2>
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post, 'medium' ); ?>
		</div>
		<div class="b-text">
			<?php the_excerpt(); ?>
		</div>
	</a>
</div>

							</li>
						<?php $post_counter++; endwhile; ?>
					</ul>
					<?php
if ( get_page_by_path( blog ) && $post_count_uncat > $post_count_uncat_max ) :
?>
						<a href="<?php echo esc_url( home_url( 'blog' ) ); ?>" class="text-btn"><?php _e('View more posts', 'fepper'); ?></a>
					<?php endif; ?>
				</section>
			</div><!--end .l-main-->

			<div class="l-sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!--end .l-sidebar-->
		</div><!--end .l-two-col-->
	</div><!--End role=main-->
</div>
