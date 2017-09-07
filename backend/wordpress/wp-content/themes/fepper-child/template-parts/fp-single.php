<main id="main" class="fp-single" role="main">
	<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="l-one-col">
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="l-two-col">
	<?php endif; ?>
		<div class="l-main">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="article">
					<header class="article-header">
						<h1><?php the_title(); ?></h1>
						<div class="byline">
								<?php echo __( 'By', 'fepper' ) . ' ' . get_the_author() . ' '; ?>
								<?php echo __( 'on', 'fepper' ) . ' ' . get_the_date(); ?>
							</div>
					</header>
					<?php the_content(); ?>
				</article><!--end .article-->
				<div class="page-links">
						<?php
							wp_link_pages( array(
								'before'      => '<span class="page-links-title">' . __( 'Pages:', 'fepper' ) . '</span>',
								'after'       => '',
								'link_before' => '<span class="page-link">',
								'link_after'  => '</span>',
								'separator'   => ' | ',
							) );
						?>
					</div>
				<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
			<?php endwhile; ?>
			<?php
					if ( is_singular( 'attachment' ) ) :
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x(
								'<span class="meta-nav">Published in</span><span class="post-title">%title</span>',
								'Parent post link',
								'fepper'
							),
						) );
					elseif ( is_singular( 'post' ) ) :
						// Previous/next post navigation.
						the_post_navigation( array(
							'prev_text' => '<span class="meta-nav">' . __( 'Previous post:', 'fepper' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'next_text' => '<span class="meta-nav">' . __( 'Next post:', 'fepper' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );
					endif;
				?>
		</div><!--end l-main-->

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-sidebar l-sidebar-1">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!--end l-sidebar-->
		<?php endif; ?>
	</div>
</main><!--End role=main-->
