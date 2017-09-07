<main id="main" class="fp-home" role="main">
	<h1 class="section-title"><?php
			$page_for_posts_id = get_option( 'page_for_posts' );
			echo get_post_field( 'post_title', $page_for_posts_id );
		?></h1>
	<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="l-one-col">
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="l-two-col">
	<?php endif; ?>
		<div class="l-main">
			<section class="section hoagies <?php
					$is_two_col = false;
					while ( have_posts() ) : the_post();
						if ( has_post_thumbnail() ) :
							$is_two_col = true;
							break;
						endif;
					endwhile;
					rewind_posts();
					if ( $is_two_col ) :
						echo 'hoagies-two-col ';
					endif;
				?>">
				<ul class="post-list">
					<?php while ( have_posts() ) : the_post(); ?>
						<li>
							<div class="block block-hoagie">
									<a href="<?php the_permalink(); ?>" class="b-inner cf">
										<h2 class="headline"><?php the_title(); ?></h2>
										<?php if ( has_post_thumbnail() ) : ?>
											<div class="b-thumb">
												<?php the_post_thumbnail( 'medium' ); ?>
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
							// Previous/Next page navigation.
							the_posts_pagination();
						?>
				</ul>
			</section>
			</div><!--end l-main-->
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-sidebar l-sidebar-1">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!--end l-sidebar-->
		<?php endif; ?>
	</div>
</main><!--End role=main-->
