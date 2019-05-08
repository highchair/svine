<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package SVINE
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		?>

		<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'svine' ); ?></h2>
			<?php
			if ( get_previous_post() ) :
			?>
				<div class="nav-previous">
					<h3><?php esc_html_e( 'Previous', 'svine' ); ?></h3>
					<?php previous_post_link( '%link' ); ?>
				</div>
			<?php
			endif;
			?>
			<?php
			if ( get_next_post() ) :
			?>
				<div class="nav-next">
					<h3><?php esc_html_e( 'Next', 'svine' ); ?></h3>
					<?php next_post_link( '%link' ); ?>
				</div>
			<?php
			endif;
			?>
		</nav>

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( 'post' === get_post_type() ) {
	get_sidebar();
}
get_footer();
