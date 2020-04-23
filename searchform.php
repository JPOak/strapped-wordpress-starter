<?php
/**
 * Search Form
 *
 * Styles the default WordPress search form according
 * to the markup in this file.
 * 
 * @author Andrea Musso
 *
 * @package foundry
 **/



if ( get_search_query() ) {
	$value = get_search_query();
} else {
	$value = '';
}
?>
<form role="search" method="get" class="search-form" id="searchform" action="<?php echo esc_url( home_url('/') ); ?>">

	<label for="s" class="screen-reader-text">
		<?php esc_html_e( 'What are you looking for?', 'foundry' ); ?>
	</label>

	<input type="text" value="<?php echo esc_attr( $value ); ?>" name="s" id="s" placeholder="<?php esc_html_e( 'What are you looking for?',
		'foundry' ); ?>" class="search-form-input" />

	<button type="submit" id="searchsubmit" class="search-form-button"><?php esc_html_e( 'Search', 'foundry' ); ?></button>

</form>
