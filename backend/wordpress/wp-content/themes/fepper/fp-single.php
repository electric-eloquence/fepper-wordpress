<div class="page" id="page">
	<div role="main">
		<div class="l-two-col">
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

			<div class="l-sidebar">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
				</div><!--end l-sidebar-->
		</div><!--end l-two-col-->
	</div><!--End role=main-->
</div>
