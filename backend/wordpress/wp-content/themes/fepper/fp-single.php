<div class="page" id="page">
	<div role="main">
		<?php if ( ! is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="l-one-col">
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
			<div class="l-two-col">
		<?php endif; ?>
			<div class="l-main">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="article">
						<header class="article-header">
							<h1><?php the_title(); ?></h1>
							<div class="byline">By <?php the_author(); ?> on <?php the_date(); ?></div>
						</header>
						<?php the_content(); ?>
					</article><!--end .article-->
					<?php
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php endwhile; ?>
			</div><!--end l-main-->

			<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<div class="l-sidebar">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</div><!--end l-sidebar-->
			<?php endif; ?>
		</div>
	</div><!--End role=main-->
</div>
