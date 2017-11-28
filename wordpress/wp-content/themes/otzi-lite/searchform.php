<?php
/**
 * The template for displaying search form
 *
 * @package Catch Themes
 * @subpackage Otzi Lite
 * @since Otzi Lite 0.1
 */
?>

<?php $search_text 	= otzi_lite_get_option( 'search_text' ); // Get options ?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'otzi-lite' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( $search_text ); ?>" value="<?php the_search_query(); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'otzi-lite' ); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'otzi-lite' ); ?>">
</form>
