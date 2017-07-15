<?php
	global $hero_categories;
	global $hero_filter;
	global $hoagies_offset;
	global $subs_filter;
	$posts_per_page = 3;
	$args = array(
		'category_name'       => $subs_filter,
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $posts_per_page,
	);
	$query = new WP_Query( $args );
	if ( ! $query->post_count ) :
		$offset = 0;
		if (
			is_array( $hero_categories ) &&
			( ! in_array( $hero_filter, $hero_categories ) || in_array( $subs_filter, $hero_categories ) )
		) :
			$offset = 1;
		endif;
		$args = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $posts_per_page,
			'ignore_sticky_posts' => true,
			'category__not_in'    => array( get_cat_ID( $hero_filter ) ),
			'offset'              => $offset,
		);
		$query = new WP_Query( $args );
		$hoagies_offset += $query->post_count;
	endif;
	while ( $query->have_posts() ) :
		$query->the_post();
?>
		<div class="block block-sub">
			<a href="<?php the_permalink(); ?>" class="inner">
				<?php
					$post_thumbnail = get_the_post_thumbnail( $query->post, 'full' );
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

<?php
	endwhile;
?>
