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

			?>

			<div class="callout">
				<?php
				dynamic_sidebar( 'callout' );
				?>
			</div>

			<div class="recent-deliveries">
				<h2><?php esc_html_e( 'Our Recent Deliveries', 'svine' ); ?></h2>
				<div>
					<?php

					$loop = new WP_Query( array(
						'post_type' => 'vehicle',
						'tax_query' => array(
							array(
								'taxonomy' => 'vehicle_type',
								'field'    => 'slug',
								'terms'    => 'deliveries',
							),
						),
						'posts_per_page' => 4
					) );

					if ( $loop->have_posts() ) {
						while ( $loop->have_posts() ) {
							$loop->the_post();
							get_template_part( 'template-parts/content', 'archive' );
						}
					}

					wp_reset_postdata();

					?>
				</div>
				<a class="button cta" href="<?php echo get_term_link('deliveries', 'vehicle_type'); ?>">
					<?php esc_html_e( 'All Deliveries', 'svine' ); ?>
				</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
