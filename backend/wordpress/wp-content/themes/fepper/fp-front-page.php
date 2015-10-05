<div class="page" id="page">
	<div role="main">
		<?php
query_posts( 'cat=6' );
while ( have_posts() ) : the_post();
			echo get_the_post_thumbnail( $post->ID, 'full' );
the_title();
		endwhile;
?>

		<div class="g g-3up">
			<?php
query_posts( 'cat=11' );
while ( have_posts() ) : the_post();
?>
				<div class="gi">
					<?php
echo get_the_post_thumbnail( $post->ID, 'full' );
the_title();
?>
				</div>
			<?php endwhile; ?>
		</div><!--end 3up-->

		<hr />

		<div class="l-two-col">
			<div class="l-main">
				<section class="section latest-posts">
					<h2 class="section-title">Latest Posts</h2>
					<ul class="post-list">
						<?php
query_posts( 'cat=1' );
while ( have_posts() ) : the_post();
?>
							<li><?php
echo get_the_post_thumbnail( $post->ID, 'medium' );
the_title();
the_excerpt();
?></li>
						<?php endwhile; ?>
					</ul>
					<a href="<?php echo esc_url( site_url( 'blog' ) ); ?>" class="text-btn">View more posts</a>
				</section>
			</div><!--end .l-main-->

			<div class="l-sidebar">
				<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <div id="widget-area" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </div><!-- .widget-area -->
<?php endif; ?>
			</div><!--end .l-sidebar-->
		</div><!--end .l-two-col-->
	</div><!--End role=main-->
</div>

