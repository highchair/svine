<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package SVINE
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* results count */
					echo $wp_query->found_posts . ' ';
					/* translators: %s: search query. */
					printf( esc_html__( 'Results for: %s', 'svine' ), '<span>&quot;' . get_search_query() . '&quot;</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

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
	</section><!-- #primary -->

<?php
get_footer();
