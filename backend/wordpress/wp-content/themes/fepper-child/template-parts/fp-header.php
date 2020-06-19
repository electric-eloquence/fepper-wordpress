<!-- Begin .header -->
<?php
	$has_custom_logo = has_custom_logo();
	$is_front_page = is_front_page();
	$widgets = wp_get_sidebars_widgets();
	$has_search = false;
	if ( is_array( $widgets ) ) :
		foreach ( $widgets['sidebar'] as $widget ) :
			if ( strpos( $widget, 'search' ) === 0 ) :
				$has_search = true;
				break;
			endif;
		endforeach;
	endif;
?>
<div class="header-container">
	<header id="header" class="header cf" role="banner">
		<div class="site-branding">
			<?php
			if ( $has_custom_logo ) :
				if ( $is_front_page ) :
		?>
				<?php
					echo '<h1 class="site-title">';
				endif;
				the_custom_logo();
				if ( $is_front_page ) :
					echo '</h1>';
			?>
			<?php
				endif;
			endif;
		?>
			<?php
			if ( ! $has_custom_logo ) :
				if ( display_header_text() ) :
		?>
				<?php
					if ( $is_front_page ) :
			?>
					<h1 class="site-title">
				<?php
					endif;
			?>
				<?php
					if ( ! $is_front_page ) :
			?>
					<div class="site-title">
				<?php
					endif;
			?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
				<?php
					if ( $is_front_page ) :
			?>
					</h1>
				<?php
					endif;
			?>
				<?php
					if ( ! $is_front_page ) :
			?>
					</div>
				<?php
					endif;
			?>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			<?php
				endif;
			endif;
		?>
		</div>
		<?php if ( $has_search ) : ?>
			<a href="#" class="nav-toggle nav-toggle-search icon-search"></a>
		<?php endif; ?>
		<a href="#" class="nav-toggle nav-toggle-menu icon-menu"></a>
		<div
		id="widget-area"
		class="widget-area"
		role="complementary"
		<?php
			if ( wp_get_theme()->get( 'Name' ) == 'Fepper' ) :
				echo 'style="background: url(';
				header_image();
				echo ') 0 0 / cover no-repeat fixed;"';
			endif;
		?>
	>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .widget-area -->
		<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
	</header>
</div>
<!-- End .header -->
