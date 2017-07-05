<div class="page" id="page">
	<div role="main">
		<section class="hero-and-subs">
			<?php
				global $post;
				$args = array(
					'category_name'  => 'hero',
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => 1,
				);
				$posts_hero = get_posts( $args );
				foreach ( $posts_hero as $post ) :
					setup_postdata( $post );
			?>
				<div class="block block-hero">
					<a href="<?php the_permalink(); ?>" class="inner">
						<?php
							$post_thumbnail = get_the_post_thumbnail( $post, 'full' );
							if ( $post_thumbnail ) :
						?>
							<div class="b-thumb">
								<?php echo $post_thumbnail; ?>
							</div>
						<?php endif; ?>
						<div class="b-text">
							<h2 class="headline"><?php the_title(); ?></h2>
						</div>
					</a>
				</div>

			<?php endforeach; ?>

			<?php
				$args = array(
					'category_name'  => 'sub',
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => 3,
				);
				$posts_sub = get_posts( $args );
				foreach ( $posts_sub as $post ) :
					setup_postdata( $post );
			?>
				<div class="block block-sub">
					<a href="<?php the_permalink(); ?>" class="inner">
						<?php
							$post_thumbnail = get_the_post_thumbnail( $post, 'full' );
							if ( $post_thumbnail ) :
						?>
							<div class="b-thumb">
								<?php echo $post_thumbnail; ?>
							</div>
						<?php endif; ?>
						<div class="b-text">
							<h2 class="headline"><?php the_title(); ?></h2>
						</div>
					</a>
				</div>

			<?php endforeach; ?>
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
						$posts_hoagie_count_max = 5;
						$posts_hoagie_counter = 0;
						$args = array(
							'category_name'  => 'uncategorized',
							'post_type'      => 'post',
							'post_status'    => 'publish',
							'posts_per_page' => $posts_hoagie_count_max + 1,
						);
						$posts_hoagie = get_posts( $args );
						$posts_hoagie_count = count( $posts_hoagie );
						echo _n('Latest Post', 'Latest Posts', $posts_hoagie_count, 'fepper');
					?></h2>
					<ul class="post-list">
						<?php
							foreach ( $posts_hoagie as $post ) :
								if ( $posts_hoagie_counter >= $posts_hoagie_count_max ) {
									break;
								}
								setup_postdata( $post );
						?>
							<li>
								<div class="block block-hoagie">
									<a href="<?php the_permalink(); ?>" class="b-inner cf">
										<h2 class="headline"><?php the_title(); ?></h2>
										<?php
											$post_thumbnail = get_the_post_thumbnail( $post, 'medium' );
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
							$posts_hoagie_counter++;
							endforeach;
						?>
					</ul>
					<?php
						if ( get_page_by_path( 'blog' ) && $posts_hoagie_count > $posts_hoagie_count_max ) :
					?>
						<a href="<?php echo esc_url( home_url( 'blog' ) ); ?>" class="text-btn"><?php _e('View more posts', 'fepper'); ?></a>
					<?php endif; ?>
				</section>
			</div><!--end .l-main-->

			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="l-sidebar">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!--end .l-sidebar-->
			<?php endif; ?>
		</div>
	</div><!--End role=main-->
</div>
