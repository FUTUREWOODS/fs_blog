<?php
/**
 * start Theme Customizer
 *
 * @package start
 */

/****************************************************
* Customizer controls
****************************************************/

// Configuration
Kirki::add_config( 'start', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/****************************************************
* Panels
****************************************************/

Kirki::add_panel( 'theme_styles', array(
    'priority'    => 10,
    'title'       => __( 'Theme Options', 'start' ),
    'description' => __( 'Theme Options', 'start' ),
) );

/****************************************************
* Sections
****************************************************/

// General Section
Kirki::add_section( 'general', array(
    'title'          => __( 'General', 'start' ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

// Header Section
Kirki::add_section( 'header', array(
    'title'          => __( 'Header', 'start' ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

// Menu Section
Kirki::add_section( 'start_menu', array(
    'title'          => __( 'Menu', 'start' ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );


// Blog Section
Kirki::add_section( 'blog_archive', array(
    'title'          => __( 'Blog / Archive / Single', 'start' ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

// Sidebar Section
Kirki::add_section( 'sidebar', array(
    'title'          => __( 'Sidebar', 'start' ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

// Footer Section
Kirki::add_section( 'footer', array(
    'title'          => __( 'Footer', 'start'  ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );

// Footer Copyright
Kirki::add_section( 'copyright', array(
    'title'          => __( 'Copyright', 'start'  ),
    'panel'          => 'theme_styles',
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
) );



/******************************************************************************************
* Fields
*******************************************************************************************/

// Global Start Tabs
function start_tabs($setting, $section){
  Kirki::add_field( 'start', array(
    'type'        => 'radio-buttonset',
    'settings'    => $setting,
    'section'     => $section,
    'default'     => 'general',
    'transport'   => 'postMessage',
    'choices'     => array(
        'general'   => __( 'General', 'start' ),
        'style' => __( 'Style', 'start' ),
        'advanced'  => esc_attr__( 'Advanced', 'start' ),
    ),
) );  
}

// Shortcuts
function start_shortcuts($setting, $section, $partial_id, $partial_selector){
Kirki::add_field( 'start', array(
    'type'        => 'custom',
    'settings'    => $setting,
    'section'     => $section,
    'partial_refresh' => array(
        $partial_id => array(
            'selector'        => $partial_selector,
            'render_callback' => '__return_false',
        ),
     ),
) );
}


// Global Customizer Headlines
function start_headlines($setting, $section, $radio_setting, $tab, $text, $margin){
Kirki::add_field( 'start', array(
    'type'        => 'custom',
    'settings'    => $setting,
    'section'     => $section,
    'default'     => '<div style="border-bottom: 2px solid #00a0d2; line-height: 2em; font-size: 16px; background: #d6d6d6; color: #555d66; padding: 0 10px; cursor: auto; margin-top: ' . $margin .'">' . esc_html__( $text, 'start' ) . '</div>',
    'active_callback'  => array(
        array(
            'setting'  => $radio_setting,
            'operator' => '==',
            'value'    => $tab,
        ),
    ),
) );
}


// No Options Text
function start_no_options($setting, $section, $radio_setting, $tab){
Kirki::add_field( 'start', array(
    'type'        => 'custom',
    'settings'    => $setting,
    'section'     => $section,
    'default'     => '<div style="padding: 20px;background-color: #333; color: #fff;">' . esc_html__( 'There are currently no options here.', 'start' ) . '</div>',
    'active_callback'  => array(
        array(
            'setting'  => $radio_setting,
            'operator' => '==',
            'value'    => $tab,
        ),
   ),
) );
}

// Include files
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/general-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/header-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/menu-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/blog-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/sidebar-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/footer-customizer.php' );
include_once( dirname( __FILE__ ) . '/customizer/customizer-sections/copyright-customizer.php' );