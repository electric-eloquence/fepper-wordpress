<!-- Begin .header -->
<header class="header cf" role="banner">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/src/logo.png" class="logo" alt="Logo Alt Text" /></a>
<a href="#" class="nav-toggle nav-toggle-search icon-search"><span class="is-vishidden">Search</span></a>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"><span class="is-vishidden">Menu</span></a>
	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div id="widget-area" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>
</header>
<!-- End .header -->
