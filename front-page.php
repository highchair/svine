<?php
/**
 * Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

$related_vehicles = get_field('related_vehicles');

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

			<?php
			if ( $related_vehicles ):
			?>
				<div class="recent-deliveries">
					<h2><?php _e('Our Recent Deliveries', 'svine'); ?></h2>
					<div>
						<?php
						foreach( $related_vehicles as $post ):
							setup_postdata($post);
							get_template_part( 'template-parts/content', 'archive' );
						endforeach;
						wp_reset_postdata();
						?>
					</div>
				</div>
			<?php
			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
