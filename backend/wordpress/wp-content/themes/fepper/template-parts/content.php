<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header headline">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
				);
			endif;
		?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="b-thumb">
			<?php the_post_thumbnail( 'medium' ); ?>
		</div>
	<?php endif; ?>

	<div class="entry-content b-text">
		<?php
			the_content( sprintf(
				__( 'Continue reading %s', 'fepper' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'fepper' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'fepper' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>

	<?php
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer b-text">
		<?php edit_post_link( __( 'Edit', 'fepper' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>

</article>
