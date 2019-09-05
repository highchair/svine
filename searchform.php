<form class="search-form" role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
		<input type="search" class="search-field" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<button type="submit" class="icon-button">
		<?php
		include get_stylesheet_directory() . '/img/search-glass.svg';
		?>
		<span class="screen-reader-text">Submit</span>
	</button>
</form>