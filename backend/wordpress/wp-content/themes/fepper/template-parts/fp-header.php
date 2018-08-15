<!-- Begin .header -->
<style type="text/css">
	<?php
		$text_color = get_theme_mod( 'header_textcolor', get_theme_support( 'custom-header', 'default-text-color' ) );
		if ( $text_color ) :
	?>
		.header,
		.header a {
			color: #<?php echo esc_html( $text_color ); ?>;
		}
	<?php endif; ?>
</style>
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
<header class="header cf" role="banner">
	<div class="site-branding">
		<?php if ( $has_custom_logo ) :
			if ( $is_front_page ) :
				echo '<h1 class="site-title">';
			endif;
			the_custom_logo();
			if ( $is_front_page ) :
				echo '</h1>'; ?>
		<?php
			endif;
		endif; ?>
		<?php if ( ! $has_custom_logo ) :
			if ( display_header_text() ) :
		?>
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			</h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<?php
			endif;
		endif; ?>
	</div>
	<?php if ( $has_search ) : ?>
		<a href="#" class="nav-toggle nav-toggle-search icon-search"></a>
	<?php endif; ?>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"></a>
	<div
		id="widget-area"
		class="widget-area cf"
		role="complementary"
		<?php
			echo 'style="background: url(';
			header_image();
			echo ') center no-repeat; background-attachment: fixed; background-size: cover;"';
		?>
	>
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .widget-area -->
	<?php wp_nav_menu( array( 'menu_class' => 'nav', 'theme_location' => 'primary' ) ); ?>
</header>
<!-- End .header -->
