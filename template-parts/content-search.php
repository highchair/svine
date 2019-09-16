<?php
/**
 * Template part for displaying results in search & archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package SVINE
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
		<?php
		if ( 'vehicle' === get_post_type() ) {
			svine_post_thumbnail();
		}
		?>
		<div>
			<?php
			the_title( sprintf( '<h2 class="h4">', esc_url( get_permalink() ) ), '</h2>' );

			if ( 'post' === get_post_type() ) :
				echo svine_posted_on() . ' – ';
			endif;

			the_excerpt();
			?>
		</div>
	</a>
</article><!-- #post-<?php the_ID(); ?> -->