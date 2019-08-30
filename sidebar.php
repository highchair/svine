<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SVINE
 */

if ( is_active_sidebar( 'sidebar-default' ) || is_active_sidebar( 'sidebar-archive' ) ) :
?>

<aside id="secondary" class="widget-area">
	<?php
	if ( is_post_type_archive('vehicle') ) {
		dynamic_sidebar( 'sidebar-vehicles' );
	} else {
		dynamic_sidebar( 'sidebar-default' );
	}
	?>
</aside><!-- #secondary -->

<?php
else :
	return;
endif;
?>