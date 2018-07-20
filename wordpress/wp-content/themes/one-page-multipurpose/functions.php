<?php
/**
 * Loads the child theme textdomain.
 */
function onepagemultipurpose_child_theme_setup() {
    load_child_theme_textdomain('onepagemultipurpose');
}
add_action( 'after_setup_theme', 'onepagemultipurpose_child_theme_setup' );

function onepagemultipurpose_child_enqueue_styles() {
    $parent_style = 'onepagemultipurpose-parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	 wp_enqueue_style( 'onepagemultipurpose-style',get_stylesheet_directory_uri() . '/onepagemultipurpose.css');
}
add_action( 'wp_enqueue_scripts', 'onepagemultipurpose_child_enqueue_styles',99);
?>