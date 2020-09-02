<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package SVINE
 */

if ( ! function_exists( 'svine_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function svine_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf( esc_html_x( '%s', 'post date', 'svine' ), $time_string);

		echo '<span class="posted-on">' . $posted_on . '.</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'svine_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function svine_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'svine' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'svine_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function svine_entry_footer() {

		if ( 'vehicle' === get_post_type() ) {

			global $post;

			echo '<p class="term-links">';

			$location_list = get_the_term_list( $post->ID, 'location', '<strong>Location</strong>: ', ', ' );
			$model_list = get_the_term_list( $post->ID, 'model', '<strong>Model</strong>: ', ', ' );
			$tag_list = get_the_tag_list( '<strong>Tags</strong>: ', ', ' );

			if ( $location_list ) {
				echo '<span>' . $location_list . '</span>';
			}

			if ( $model_list ) {
				echo '<span>' . $model_list . '</span>';
			}

			if ( $tag_list ) {
				echo '<span>' . $tag_list . '</span>';
			}

			echo '</p>';
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'svine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

	} // end svine_entry_footer()
endif;

if ( ! function_exists( 'svine_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in a div element when on single views.
	 */
	function svine_post_thumbnail( $size = 'post-thumbnail' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() && ! is_front_page() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( $size ); ?>
			</div><!-- .post-thumbnail -->

		<?php
		else :
			the_post_thumbnail( $size, array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
		endif;
	}
endif;
