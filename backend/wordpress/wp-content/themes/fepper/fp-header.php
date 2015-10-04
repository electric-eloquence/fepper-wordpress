<!-- Begin .header -->
<header class="header cf" role="banner">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo.png" class="logo" alt="Logo Alt Text" /></a>
<a href="#" class="nav-toggle nav-toggle-search icon-search"><span class="is-vishidden">Search</span></a>
	<a href="#" class="nav-toggle nav-toggle-menu icon-menu"><span class="is-vishidden">Menu</span></a>
<nav id="nav" class="nav">
	<ul>
		<li><a href="">Home</a></li>
		<li><a href="#">About</a></li>
		<li><a href="">Blog</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</nav><!--end .nav-->

<form action="#" method="post" class="inline-form search-form">
	<fieldset>
		<legend class="is-vishidden">Search</legend>
		<label for="search-field" class="is-vishidden">Search</label>
		<input type="search" placeholder="Search" id="search-field" class="search-field" />
		<button class="search-submit">
			<span class="icon-search" aria-hidden="true"></span>
			<span class="is-vishidden">Search</span>
		</button>
	</fieldset>
</form>

</header>
<!-- End .header -->

