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


		<header class="page-header">
			<?php
			the_title( '<h1 class="page-title">', '</h1>' );
			?>
		</header><!-- .page-header -->

		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			if ( 'post' === get_post_type() ) :

				svine_post_thumbnail();
			?>
				<p class="entry-meta">
					<?php
					svine_posted_on();
					$categories_list = get_the_category_list( esc_html__( ', ', 'svine' ) );
					if ( $categories_list ) {
						printf( '<span class="cat-links"><strong>' . esc_html__( 'Category: ', 'svine' ) . '</strong>' .  '%1$s' . '</span>', $categories_list ); // WPCS: XSS OK.
					}
					?>
				</p><!-- .entry-meta -->
			<?php
			endif;

			get_template_part( 'template-parts/content', get_post_type() );

		?>

		<nav class="navigation post-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'svine' ); ?></h2>
			<?php
			if ( get_previous_post() ) :
			?>
				<div class="nav-previous">
					<h3><?php esc_html_e( 'Previous', 'svine' ); ?></h3>
					<p><?php previous_post_link( '%link' ); ?></p>
				</div>
			<?php
			endif;
			?>
			<?php
			if ( get_next_post() ) :
			?>
				<div class="nav-next">
					<h3><?php esc_html_e( 'Next', 'svine' ); ?></h3>
					<p><?php next_post_link( '%link' ); ?></p>
				</div>
			<?php
			endif;
			?>
		</nav>

		<?php
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->

		<?php
		if ( 'post' === get_post_type() ) {
			get_sidebar();
		}
		?>
	</div><!-- #primary -->

<?php
get_footer();
