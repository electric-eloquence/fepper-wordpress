<?php
	global $hero_categories;
	global $hero_filter;
	global $hoagies_offset;
	$posts_per_page = 1;
	$args = array(
		'category_name'       => $hero_filter,
		'post_type'           => 'post',
		'post_status'         => 'publish',
		'posts_per_page'      => $posts_per_page,
	);
	$query = new WP_Query( $args );
	if ( ! $query->post_count ) :
		$args = array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $posts_per_page,
			'ignore_sticky_posts' => true,
		);
		$query = new WP_Query( $args );
		$hoagies_offset += $query->post_count;
	endif;
	$hero_categories = [];
	while ( $query->have_posts() ) :
		$query->the_post();
		foreach( get_the_category() as $category ) :
			array_push( $hero_categories, $category->cat_name );
		endforeach;
?>
		<div class="block block-hero">
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
