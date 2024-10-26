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
	<?php
	if ( 'vehicle' === get_post_type() ) {
		svine_post_thumbnail( 'medium_large' );
	}
	echo '<a class="link" href="' . get_the_permalink() . '"><h3 class="h4">' . get_the_title() . '</h3></a>';
	if ( is_home() ) {
		svine_post_thumbnail( 'medium_wide' );
	}

	if ( is_home() ) {
		the_excerpt();
	}
	?>
</article>
