<?php
/**
 * Template part for displaying results in archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

?>

<article <?php post_class('card'); ?>>
	<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		if ( 'vehicle' === get_post_type() ) {
			svine_post_thumbnail( 'medium_large' );
		}

		the_title( '<h3 class="h4">', '</h3>' );

		if ( is_home() ) {
			svine_post_thumbnail( 'medium_wide' );
		}

		if ( is_home() ) {
			the_excerpt();
		}
		?>
	</a>
</article>
