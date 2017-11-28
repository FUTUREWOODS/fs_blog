<?php
/**
 * The template for adding Custom Sidebars and Widgets
 *
 * @package Catch Themes
 * @subpackage Otzi
 * @since Otzi 1.2
 */

/**
 * Register widgetized area
 *
 * @since Otzi 1.2
 */
function otzi_lite_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'otzi-lite' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Located on the right side.', 'otzi-lite' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Instagram', 'otzi-lite' ),
        'id'            => 'instagram-widget',
        'description'   => esc_html__( 'Located above footer.', 'otzi-lite' ),
        'before_widget' => '<aside id="%1$s" class="widget-instagram %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h6 class="widget-title-instagram">',
        'after_title'   => '</h6>',
    ) );    

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'otzi-lite' ),
        'id'            => 'footer-widget-1',
        'description'   => esc_html__( 'First widget', 'otzi-lite' ),
        'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h6 class="widget-title-footer">',
        'after_title'   => '</h6>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'otzi-lite' ),
        'id'            => 'footer-widget-2',
        'description'   => esc_html__( 'Second widget.', 'otzi-lite' ),
        'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h6 class="widget-title-footer">',
        'after_title'   => '</h6>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'otzi-lite' ),
        'id'            => 'footer-widget-3',
        'description'   => esc_html__( 'Third widget.', 'otzi-lite' ),
        'before_widget' => '<aside id="%1$s" class="widget-footer %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h6 class="widget-title-footer">',
        'after_title'   => '</h6>',
    ) );
}
add_action( 'widgets_init', 'otzi_lite_widgets_init' );

/**
 * Instagram Widget
 */
require trailingslashit( get_template_directory() ) . 'inc/widgets/instagram.php';