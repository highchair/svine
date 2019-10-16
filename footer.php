<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SVINE
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer"><div class="wrap">

		<nav class="footer-navigation main-navigation">

			<div class="site-branding">
				<a href="<?php echo home_url(); ?>"><?php include get_stylesheet_directory() . '/img/logo-badge.svg'; ?></a>
			</div><!-- .site-branding -->

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
					'container_class'	 => 'main-menu',
					'depth'			 => 1
				) );

				get_search_form();
				?>
			</div>

		</nav><!-- .footer-navigation -->

		<?php dynamic_sidebar( 'footer' ); ?>

		<div class="site-info">
			<?php
			esc_html_e( 'All content', 'svine' );
			echo ' &copy; ' . date('Y') . ' ';
			bloginfo( 'name' );
			?>
		</div><!-- .site-info -->
	</div></footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
