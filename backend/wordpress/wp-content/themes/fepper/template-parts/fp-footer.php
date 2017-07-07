<!-- Begin Footer -->
<footer class="footer" role="contentinfo">
	<div class="footer-content">
		<div class="site-title"><?php echo get_bloginfo(); ?></div>
		<?php
			$locations = get_nav_menu_locations();
			$theme_location = 'footer';
			if ( isset( $locations[ $theme_location ] ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-footer', 'theme_location' => 'footer' ) );
			endif;
		?>
		<?php
			$theme_location = 'social';
			if ( isset( $locations[ $theme_location ] ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-social', 'theme_location' => 'social' ) );
			endif;
		?>
	</div>
</footer>
<!-- End Footer -->
