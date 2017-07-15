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
						global $cat_excludes;
						global $hoagies_offset;
						$args = array(
							'post_type'        => 'post',
							'post_status'      => 'publish',
							'posts_per_page'   => get_option( 'posts_per_page' ),
							'category__not_in' => $cat_excludes,
							'offset'           => $hoagies_offset,
						);
						$query = new WP_Query( args );
						echo _n( 'Latest Post', 'Latest Posts', $query->post_count, 'fepper' );
					?></h2>
					<ul class="post-list">
						<?php
							while ( $query->have_posts() ) :
								$query->the_post();
						?>
							<li>
								<div class="block block-hoagie">
									<a href="<?php the_permalink(); ?>" class="b-inner cf">
										<h2 class="headline"><?php the_title(); ?></h2>
										<?php
											$post_thumbnail = get_the_post_thumbnail( $query->post, 'medium' );
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
