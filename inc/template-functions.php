<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package SVINE
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function svine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'svine_pingback_header' );

/**
 * Alphabetize archive page posts
 */
function svine_modify_query_order( $query ) {
	if ( $query->is_archive() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
}
add_action( 'pre_get_posts', 'svine_modify_query_order' );