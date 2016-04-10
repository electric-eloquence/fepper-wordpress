<div class="page" id="page">
	<div role="main">
		<h1 class="section-title"><?php
$page_for_posts_id = get_option('page_for_posts');
echo get_post_field( 'post_content', $page_for_posts_id );
?></h1>
		<div class="l-two-col">
			<div class="l-main">
				<section class="section latest-posts">
					
					<ul class="post-list">
						<?php
query_posts( 'cat=1&paged='.get_query_var('paged') );
while ( have_posts() ) : the_post();
?>
							<li>
								<div class="block block-thumb">
	<a href="<?php the_permalink(); ?>" class="b-inner">
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
		</div>
		<div class="b-text">
			<h2 class="headline"><?php the_title(); ?></h2>
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
			<div class="l-sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!--end l-sidebar-->
		</div><!--end two-col-->
	</div><!--End role=main-->
</div>
