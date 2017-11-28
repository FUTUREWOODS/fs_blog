<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otzi Lite
 */

/**
 * otzi_lite_after_content hook
 *
 * @hooked otzi_lite_content_end - 10
 * @hooked otzi_lite_sidebar - 20
 *
 */
do_action( 'otzi_lite_after_content' );

/**
 * otzi_lite_footer hook
 *
 * @hooked otzi_lite_footer_content_start - 10
 * @hooked otzi_lite_site_info_start - 20
 * @hooked otzi_lite_footer_site_description - 30
 * @hooked otzi_lite_social_menu - 40
 * @hooked otzi_lite_footer_content - 50
 * @hooked otzi_lite_site_info_end - 60
 * @hooked otzi_lite_footer_content_end - 190
 * @hooked otzi_lite_page_end - 200
 *
 */
do_action( 'otzi_lite_footer' );

/**
 * otzi_lite_after hook
 *
 */
do_action( 'otzi_lite_after' );

/**
 * otzi_lite_after hook
 *
 * @hooked otzi_lite_scrollup - 10
 *
 */
wp_footer(); ?>

</body>
</html>