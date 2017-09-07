<!-- Begin Footer -->
<footer class="footer" role="contentinfo">
	<div class="footer-content">
		<div class="site-title"><?php bloginfo( 'name' ); ?></div>
		<?php
			if ( has_nav_menu( 'footer' ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-footer', 'theme_location' => 'footer' ) );
			endif;
			if ( has_nav_menu( 'social' ) ) :
				wp_nav_menu( array( 'menu_class' => 'menu-social', 'theme_location' => 'social' ) );
			endif;
		?>
	</div>
</footer>
<!-- End Footer -->
