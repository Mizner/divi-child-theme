<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		<input type="search" class="search-field"
		       placeholder="<?php echo esc_attr_x( 'Search…', 'placeholder' ) ?>"
		       value="<?php echo get_search_query() ?>" name="s"
		       title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	<button type="submit" name="button"><i class="fa fa-angle-right"></i></button>
</form>
