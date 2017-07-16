<div class="page" id="page">
	<div role="main">
		<h1 class="section-title"><?php
			$page_for_posts_id = get_option( 'page_for_posts' );
			echo get_post_field( 'post_content', $page_for_posts_id );
		?></h1>
		<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-one-col">
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-two-col">
		<?php endif; ?>
			<div class="l-main">
				<section class="section hoagies">
					<ul class="post-list">
						<?php
							global $hero_filter_default;
							global $subs_filter_default;
							global $widgets;
							global $wp_registered_widgets;
							$hoagies_filter_reverse = [];
							if ( is_array( $widgets['hero'] ) && $widgets['hero'][0] ) :
								$widget_hero = $wp_registered_widgets[$widgets['hero'][0]]['callback'][0];
								$widget_hero_settings = $widget_hero->get_settings();
								if ( is_array( $widget_hero_settings ) ) :
									foreach ( $widget_hero_settings as $setting ) :
										if ( is_array( $setting ) && $setting['category'] ) :
											array_push( $hoagies_filter_reverse, get_cat_ID( $setting['category'] ) );
										else:
											array_push( $hoagies_filter_reverse, get_cat_ID( $hero_filter_default ) );
										endif;
									endforeach;
								endif;
							endif;
							if ( is_array( $widgets['subs'] ) && $widgets['subs'][0] ) :
								$widget_subs = $wp_registered_widgets[$widgets['subs'][0]]['callback'][0];
								$widget_subs_settings = $widget_subs->get_settings();
								if ( is_array( $widget_subs_settings ) ) :
									foreach ( $widget_subs_settings as $setting ) :
										if ( is_array( $setting ) && $setting['category'] ) :
											array_push( $hoagies_filter_reverse, get_cat_ID( $setting['category'] ) );
										else:
											array_push( $hoagies_filter_reverse, get_cat_ID( $subs_filter_default ) );
										endif;
									endforeach;
								endif;
							endif;
							$args = array(
								'category__not_in' => $hoagies_filter_reverse,
							);
							query_posts( $args );
							while ( have_posts() ) :
								the_post();
						?>
							<li>
								<div class="block block-hoagie">
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
	</div><!--End role=main-->
</div>
