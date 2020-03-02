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

		<div class="site-branding">
			<a href="<?php echo home_url(); ?>"><?php include get_stylesheet_directory() . '/img/logo-badge.svg'; ?></a>
			<div class="social-links">&nbsp;</div>
		</div><!-- .site-branding -->

		<div class="footer-widgets">
			<?php dynamic_sidebar( 'footer' ); ?>
		</div>

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
