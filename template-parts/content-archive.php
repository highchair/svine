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
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<?php
	if ( is_home() || 'vehicle' === get_post_type() ) {
		svine_post_thumbnail();
	}
	?>

	<div class="entry-summary">
		<?php
		if ( is_search() && 'post' === get_post_type() ) {
			echo svine_posted_on() . ' – ' . get_the_excerpt();
		} else {
			the_excerpt();
		}
		?>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->
