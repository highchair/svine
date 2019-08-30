<?php
/**
 * Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				the_content();
			endwhile;

			dynamic_sidebar( 'callout' );

			?>

			<div>
				<h2><?php esc_html_e( 'Our Recent Vehicles', 'svine' ); ?></h2>
				<div>
					<?php

					$loop = new WP_Query( array(
						'post_type' => 'vehicle',
						'posts_per_page' => 4, 
						'ignore_sticky_posts'=>true
					) );

					while ($loop->have_posts()) : 

						$loop->the_post();

						get_template_part( 'template-parts/content', 'archive' );

					endwhile; wp_reset_postdata();
					?>
				</div>
				<a class="button" href='<?php echo get_post_type_archive_link('vehicle'); ?>'><?php esc_html_e( 'All Vehicles', 'svine' ); ?></a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
