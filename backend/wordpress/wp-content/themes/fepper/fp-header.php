<!-- Begin .header -->
<header class="header cf" role="banner">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/_assets/src/logo.svg" alt="<?php echo get_bloginfo(); ?>" />

	</a>
<a href="#" class="nav-toggle nav-toggle-search icon-search"></a>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"></a>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>
	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
</header>
<!-- End .header -->
