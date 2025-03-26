<?php
/**
 * The template for displaying search forms in vw-home-renovation
 *
 * @package VW Home Renovation 
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'vw-home-renovation' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','vw-home-renovation' ); ?>" value="<?php echo esc_attr( get_search_query()); ?>" name="s">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','vw-home-renovation' ); ?>">
</form> 