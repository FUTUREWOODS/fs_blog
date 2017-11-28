<?php
/**
 * Beta functions and definitions
 *
 * @package Beta
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function beta_theme_setup() {
	
	/* Load the primary menu. */
	remove_action( 'omega_before_header', 'omega_get_primary_menu' );	
	add_action( 'omega_header', 'omega_get_primary_menu' );
	add_filter( 'omega_site_description', 'beta_site_description' );

	add_theme_support( 'omega-footer-widgets', 3 );

}

add_action( 'after_setup_theme', 'beta_theme_setup', 11 );


function beta_site_description($desc) {
	$desc = "";
	return $desc;
}

/**
 * Enqueue scripts and styles
 */
function beta_scripts() {
	$query_args = array(
	 'family' => 'Ubuntu:400'
	);
 	wp_enqueue_style('google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null  );
 	wp_enqueue_script('beta-init', get_stylesheet_directory_uri() . '/js/init.js', array('jquery'));

}

add_action( 'wp_enqueue_scripts', 'beta_scripts' );