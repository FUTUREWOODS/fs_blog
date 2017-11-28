<?php
/**
 * The sidebar containing Instagram widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otzi Lite
 */

if ( ! is_active_sidebar( 'instagram-widget' ) ) {
	return;
}
?>

<div id="tertiary" class="widget-area-instagram" role="complementary">
    <div class="instagram-content">
	    <?php dynamic_sidebar( 'instagram-widget' ); ?>
    </div><!-- .instagram-content -->
</div><!-- #tertiary -->
