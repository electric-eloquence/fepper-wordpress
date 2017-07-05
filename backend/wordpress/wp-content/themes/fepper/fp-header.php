<!-- Begin .header -->
<style>
	<?php
		$text_color = get_theme_support( 'custom-header', 'default-text-color' );
		if ( $text_color ) :
	?>
		.header,
		.header a {
			color: #<?php echo $text_color; ?>;
		}
	<?php endif; ?>
</style>
<header class="header cf <?php
	$args = array(
		'category_name' => 'hero',
		'post_type'     => 'post',
		'post_status'   => 'publish',
	);
	$posts_hero = get_posts( $args );
	$posts_hero_count = count( $posts_hero );
	if ( ! $posts_hero_count ) {
		echo 'header-image';
	}
?>" role="banner">
	<div class="site-branding">
		<?php
			if ( has_custom_logo() ) :
				if ( is_front_page() ) :
					echo '<h1 class="site-title">';
				endif;
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$image_alt = get_post_meta( $custom_logo_id, '_wp_attachment_image_alt', true );
				if ( empty( $image_alt ) ) :
					$image_alt = get_bloginfo();
				endif;
		?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<img src="<?php echo $image[0]; ?>" alt="<?php echo $image_alt; ?>" />
			</a>
		<?php
				if ( is_front_page() ) :
					echo '</h1>';
				endif;
			else :
				if ( display_header_text() ) :
		?>
					<h1 class="site-title"><?php echo get_bloginfo(); ?></h1>
					<h2 class="site-description"><?php echo get_bloginfo( 'description' ); ?></h2>
		<?php
				endif;
			endif;
		?>
	</div>
	<a href="#" class="nav-toggle nav-toggle-search icon-search"></a>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"></a>
	<div
		id="widget-area"
		class="widget-area"
		role="complementary"
		<?php
			if ( ! $posts_hero_count ) :
				echo 'style="background: url(';
				if ( get_header_image() ) {
					header_image();
				} else {
					echo get_theme_root_uri() . '/fepper/_assets/src/landscape-16x9-mountains.jpg';
				}
				echo ') center no-repeat; background-size: cover;"';
			endif;
		?>
		>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .widget-area -->
	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
</header>
<!-- End .header -->
