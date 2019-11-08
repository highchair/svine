<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SVINE
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'svine' ); ?></a>

	<header id="masthead" class="site-header">

		<nav id="site-navigation" class="main-navigation wrap">

			<?php
			if ( is_front_page() ) :
				?>
				<h1 class="site-branding"><a href="<?php echo home_url(); ?>">
					<?php include get_stylesheet_directory() . '/img/logo-badge.svg'; ?>
					<span class="screen-reader-text"><?php bloginfo(); ?></span>	
				</a></h1>
				<?php
			else :
				?>
				<p class="site-branding"><a href="<?php echo home_url(); ?>">
					<?php include get_stylesheet_directory() . '/img/logo-badge.svg'; ?>
					<span class="screen-reader-text"><?php bloginfo(); ?></span>	
				</a></p>
				<?php
			endif;
			?>

			<button class="menu-toggle icon-button" aria-controls="mobile-menu" aria-expanded="false">
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'svine' ); ?></span>
			</button>
			<div id="mobile-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'mobile-menu',
					'depth'		 	 => 0
				) );
				get_search_form();
				?>
			</div>

			<div class="desktop-nav">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container_class'	 => 'main-menu'
				) );

				get_search_form();
				?>
			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content wrap">
