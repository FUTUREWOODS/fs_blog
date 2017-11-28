<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otzi Lite
 */
/**
 * otzi_lite_doctype hook
 *
 * @hooked otzi_lite_doctype -  10
 *
 */
do_action( 'otzi_lite_doctype' );
?>

<head>
	<?php
	/**
	 * otzi_lite_before_wp_head hook
	 *
	 * @hooked otzi_lite_head -  10
	 *
	 */
	do_action( 'otzi_lite_before_wp_head' );

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * otzi_lite_before_header hook
	 *
	 * @hooked otzi_lite_page_start -  10
	 *
	 */
	do_action( 'otzi_lite_before_header' );


	/**
	 * otzi_lite_header hook
	 *
	 * @hooked otzi_lite_header_start -  10
	 * @hooked otzi_lite_primary_menu -  20
	 * @hooked otzi_lite_site_branding_start -  30
	 * @hooked otzi_lite_site_branding_wrap -  40
	 * @hooked otzi_lite_site_branding_end -  50
	 * @hooked otzi_lite_header_end -  200
	 *
	 */
	do_action( 'otzi_lite_header' );


	/**
	 * otzi_lite_after_header hook
	 *
	 * @hooked otzi_lite_add_breadcrumb - 10
	 *
	 */
	do_action( 'otzi_lite_after_header' );

	/**
	 * otzi_after_header hook
	 *
	 * @hooked otzi_featured_slider - 10
	 *
	 */
	do_action( 'otzi_lite_before_content' );

	/**
	 * otzi_lite_content hook
	 *
	 * @hooked otzi_lite_content_start - 10
	 *
	 */
	do_action( 'otzi_lite_content' );
