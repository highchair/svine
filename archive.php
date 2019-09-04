<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

if ( is_post_type_archive('vehicle') ) {
	$max_count = 9;
} else {
	$max_count = 12;
}

get_header();
?>

	<div id="primary" class="content-area">

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				static $count = 0;

				if ($count == $max_count) {
					break;
				} else {
					get_template_part( 'template-parts/content', 'archive' );
					$count++;
				}

			endwhile;

			the_posts_pagination( array(
				'mid_size'  => 3,
				'prev_text' => __( '<span aria-hidden="true">&lt;</span><span class="screen-reader-text">Previous Page</span>', 'svine' ),
				'next_text' => __( '<span class="screen-reader-text">Next Page</span><span aria-hidden="true">&gt;</span>', 'svine' )
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->

		<?php
		if ( is_post_type_archive() || is_tax() ) {
			get_sidebar();
		}
		?>

	</div><!-- #primary -->

<?php
get_footer();
