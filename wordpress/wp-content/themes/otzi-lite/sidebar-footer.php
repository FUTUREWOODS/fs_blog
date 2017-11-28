<?php
/**
 * The sidebar containing the only widget areas.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otzi Lite
 */

if ( ! is_active_sidebar( 'footer-widget-1' )  
  && ! is_active_sidebar( 'footer-widget-2' )
  && ! is_active_sidebar( 'footer-widget-3' ) ) {
    return;
}
?>

<div id="quaternary" <?php otzi_lite_footer_sidebar_class(); ?> role="complementary">
    <div class="footer-content">
        <?php if ( is_active_sidebar( 'footer-widget-1' ) ) : ?>
            <div class="footer-col">
                <?php dynamic_sidebar( 'footer-widget-1' ); ?>
            </div><!-- .footer-col -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-widget-2' ) ) : ?>
        <div class="footer-col">
            <?php dynamic_sidebar( 'footer-widget-2' ); ?>
        </div><!-- .footer-col -->
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-widget-3' ) ) : ?>
        <div class="footer-col">
            <?php dynamic_sidebar( 'footer-widget-3' ); ?>
        </div><!-- .footer-col -->
        <?php endif; ?>      
    </div><!-- .footer-content -->
</div><!-- #quaternary -->