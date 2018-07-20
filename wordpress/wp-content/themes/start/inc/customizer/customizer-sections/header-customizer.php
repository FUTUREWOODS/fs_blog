<?php

/****************************************************
* Header Section
****************************************************/

// Header Tabs
start_tabs('header_setting', 'header');

start_shortcuts('header_shortcut', 'header', 'partial_header', '.site-header .container');

Kirki::add_field( 'start', array(
    'type'        => 'select',
    'settings'    => 'header_width',
    'label'       => __( 'Header Width', 'start' ),
    'section'     => 'header',
    'transport' => 'auto',
    'default'     => 'full',
    'choices'     => array(
        'full'   => esc_attr__( 'Full', 'start' ),
        'contained' => esc_attr__( 'Contained', 'start' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'general',
        ),
    ),
) );

Kirki::add_field( 'start', array(
    'type'        => 'select',
    'settings'    => 'header_layout',
    'label'       => __( 'Select a Header Layout', 'start' ),
    'section'     => 'header',
    'transport' => 'auto',
    'default'     => 'header-left',
    'choices'     => array(
        'header-left'   => esc_attr__( 'Left', 'start' ),
        'header-center' => esc_attr__( 'Center', 'start' ),
        'header-right'  => esc_attr__( 'Right', 'start' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'general',
        ),
    ),
) );


// Site Title Styles
start_headlines('site_title_styles', 'header', 'header_setting', 'style', 'Site Title', '10px');

// Site Title Color
Kirki::add_field( 'start', array(
    'type'        => 'color',
    'settings'    => 'site_title_color',
    'label'       => __( 'Title', 'start' ),
    'section'     => 'header',
    'transport' => 'postMessage',
    'default'     => '#000000',
    'output' => array(
        array(
            'element'  => '.site-header .site-title a',
            'property' => 'color',
        ),
    ),
    'js_vars'   => array(
    array(
        'element'  => '.site-header .site-title a',
        'function' => 'css',
        'property' => 'color',
    ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

// Site Title Hover Color
Kirki::add_field( 'start', array(
    'type'        => 'color',
    'settings'    => 'site_title_hover_color',
    'label'       => __( 'Title Hover', 'start' ),
    'section'     => 'header',
    'transport' => 'postMessage',
    'default'     => '#000000',
    'output' => array(
        array(
            'element'  => '.site-header .site-title a:hover',
            'property' => 'color',
        ),
    ),
    'js_vars'   => array(
    array(
        'element'  => '.site-header .site-title a:hover',
        'function' => 'css',
        'property' => 'color',
    ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

// Site Title Typography
Kirki::add_field( 'start', array(
    'type'        => 'typography',
    'settings'    => 'header_site_title',
    'section'     => 'header',
    'transport' => 'auto',
    'default'     => array(
        'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
        'variant'        => '700',
        'font-size'      => '45px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
    'output'      => array(
        array(
            'element' => '.site-title a',
        ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

// Site Description Styles
start_headlines('site_desc_styles', 'header', 'header_setting', 'style', 'Site Description', '35px');

// Site Description Color
Kirki::add_field( 'start', array(
    'type'        => 'color',
    'settings'    => 'site_description_color',
    'label'       => __( 'Description', 'start' ),
    'section'     => 'header',
    'transport' => 'postMessage',
    'default'     => '#000000',
    'output' => array(
        array(
            'element'  => '.site-description',
            'property' => 'color',
        ),
    ),
    'js_vars'   => array(
    array(
        'element'  => '.site-description',
        'function' => 'css',
        'property' => 'color',
    ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

// Site Description Typography
Kirki::add_field( 'start', array(
    'type'        => 'typography',
    'settings'    => 'header_site_description',
    'section'     => 'header',
    'transport' => 'auto',
    'default'     => array(
        'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
        'font-size'      => '14px',
        'line-height'    => '1.5',
        'letter-spacing' => '0',
        'text-transform' => 'none',
    ),
    'output'      => array(
        array(
            'element' => '.site-description',
        ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

// Header Backgrounds
start_headlines('header_backgrounds', 'header', 'header_setting', 'style', 'Backgrounds', '35px');

Kirki::add_field( 'start', array(
    'type'        => 'color',
    'settings'    => 'header_bg',
    'label'       => __( 'Header', 'start' ),
    'section'     => 'header',
    'transport' => 'postMessage',
    'default'     => '#E5E8E8',
    'choices'     => array(
        'alpha' => true,
    ),
    'output' => array(
        array(
            'element'  => '.site-header',
            'property' => 'background-color',
        ),
    ),
    'js_vars'   => array(
    array(
        'element'  => '.site-header',
        'function' => 'css',
        'property' => 'background-color',
    ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'style',
        ),
    ),
) );

Kirki::add_field( 'start', array(
  'settings'  => 'header_spacing',
  'section'   => 'header',
  'label'     => esc_html__( 'Header Padding', 'start' ),
  'type'      => 'spacing',
  'default'   => array(
    'top'    => '20px',
    'right'  => '15px',
    'bottom' => '20px',
    'left'   => '15px',
  ),
  'transport' => 'auto',
  'output'    => array(
    array(
      'element'  => '.site-header .header-left, .site-header .header-center, .site-header .header-right',
      'property' => 'padding',
    ),
  ),
  'active_callback'  => array(
        array(
            'setting'  => 'header_setting',
            'operator' => '==',
            'value'    => 'advanced',
        ),
    ),
) );
