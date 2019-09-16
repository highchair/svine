<?php
/**
 * Template part for displaying results in archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

?>

<article <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		if ( is_home() || 'vehicle' === get_post_type() ) {
			svine_post_thumbnail( 'medium_large' );
		}

		the_title( sprintf( '<h2>', esc_url( get_permalink() ) ), '</h2>' );

		if ( is_home() ) {
			the_excerpt();
		}
		?>
	</a>
</article>
