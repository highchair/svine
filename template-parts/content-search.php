<?php
/**
 * Template part for displaying results in search & archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php
	if ( 'vehicle' === get_post_type() ) {
		svine_post_thumbnail( 'medium' );
	}
	?>
	<div>
		<?php
		echo '<a class="link" href="' . get_the_permalink() . '"><h3 class="h4">' . get_the_title() . '</h3></a>';

		if ( 'post' === get_post_type() ) :
			echo svine_posted_on() . ' – ';
		endif;

		the_excerpt();
		?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->