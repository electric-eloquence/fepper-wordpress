<div class="page" id="page">
	<div role="main">
		<section class="hero-and-subs">
			<?php if ( is_active_sidebar( 'hero' ) ) : ?>
				<?php dynamic_sidebar( 'hero' ); ?>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'subs' ) ) : ?>
				<?php dynamic_sidebar( 'subs' ); ?>
			<?php endif; ?>
		</section>

		<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-one-col">
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-two-col">
		<?php endif; ?>
			<div class="l-main">
				<section class="section hoagies">
					<h2 class="section-title"><?php
						global $hoagies_filter_reverse;
						global $hoagies_offset;
						global $wp_query;
						$args = array(
							'category__not_in' => $hoagies_filter_reverse,
							'offset'           => $hoagies_offset,
						);
						query_posts( $args );
						echo _n( 'Latest Post', 'Latest Posts', $wp_query->post_count, 'fepper' );
					?></h2>
					<ul class="post-list">
						<?php
							while ( have_posts() ) :
								the_post();
						?>
							<li>
								<div class="block block-hoagie">
									<a href="<?php the_permalink(); ?>" class="b-inner cf">
										<h2 class="headline"><?php the_title(); ?></h2>
										<?php
											$post_thumbnail = get_the_post_thumbnail( $wp_query->post, 'medium' );
											if ( $post_thumbnail ) :
										?>
											<div class="b-thumb">
												<?php echo $post_thumbnail; ?>
											</div>
										<?php endif; ?>
										<div class="b-text">
											<?php the_excerpt(); ?>
										</div>
									</a>
								</div>

							</li>
						<?php
							endwhile;
						?>
					</ul>
				</section>
			</div><!--end .l-main-->

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="l-sidebar l-sidebar-1">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!--end .l-sidebar-->
			<?php endif; ?>
		</div>
	</div><!--End role=main-->
</div>
