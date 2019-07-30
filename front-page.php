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

			<div>
				<h2><?php esc_html_e( 'Our Recent Deliveries', 'svine' ); ?></h2>
				<div>
					<?php

					$loop = new WP_Query( array(
						'post_type' => 'delivery',
						'posts_per_page' => 4, 
						'ignore_sticky_posts'=>true
					) );

					while ($loop->have_posts()) : 

						$loop->the_post();

						get_template_part( 'template-parts/content', 'archive' );

					endwhile; wp_reset_postdata();
					?>
				</div>
				<a class="button" href='<?php echo get_post_type_archive_link('delivery'); ?>'><?php esc_html_e( 'All Deliveries', 'svine' ); ?></a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
