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

	<footer id="colophon" class="site-footer">
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->

		<nav class="footer-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'depth'			 => 1
			) );
			?>
		</nav><!-- .footer-navigation -->

		<?php
		get_search_form();
		?>

		<?php dynamic_sidebar( 'footer' ); ?>

		<div class="site-info">
			<?php
			esc_html_e( 'All content', 'svine' );
			echo ' &copy; ' . date('Y') . ' ';
			bloginfo( 'name' );
			?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
