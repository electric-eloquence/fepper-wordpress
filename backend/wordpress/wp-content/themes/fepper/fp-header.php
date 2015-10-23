<!-- Begin .header -->
<header class="header cf" role="banner">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/logo.png" class="logo" alt="Logo Alt Text" /></a>
<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
  <div id="widget-area" class="widget-area" role="complementary">
    <?php dynamic_sidebar( 'sidebar' ); ?>
  </div><!-- .widget-area -->
<?php endif; ?>
</header>
<!-- End .header -->
