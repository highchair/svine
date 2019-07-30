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
	if ( is_post_type_archive('delivery') ) {
		dynamic_sidebar( 'sidebar-deliveries' );
	}
	elseif ( is_archive() || is_home() ) {
		dynamic_sidebar( 'sidebar-archive' );
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