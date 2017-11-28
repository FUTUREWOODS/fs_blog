<?php
/**
* The template for adding additional theme options in Customizer
*
* @package Catch Themes
* @subpackage Otzi Lite
* @since Otzi Lite 0.1
*/

$wp_customize->add_panel( 'otzi_lite_theme_options', array(
    'description'    => esc_html__( 'Basic theme Options', 'otzi-lite' ),
    'capability'     => 'edit_theme_options',
    'priority'       => 200,
    'title'    		 => esc_html__( 'Theme Options', 'otzi-lite' ),
) );

// Breadcrumb Option
$wp_customize->add_section( 'otzi_lite_breadcrumb_options', array(
	'description'	=> esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance. You can enable/disable them on homepage and entire site.', 'otzi-lite' ),
	'panel'			=> 'otzi_lite_theme_options',
	'title'    		=> esc_html__( 'Breadcrumb Options', 'otzi-lite' ),
	'priority' 		=> 201,
) );

$wp_customize->add_setting( 'breadcrumb_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_option'],
	'sanitize_callback' => 'otzi_lite_sanitize_checkbox'
) );

$wp_customize->add_control( 'breadcrumb_options', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb', 'otzi-lite' ),
	'section'  => 'otzi_lite_breadcrumb_options',
	'settings' => 'breadcrumb_option',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'breadcrumb_on_homepage', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_on_homepage'],
	'sanitize_callback' => 'otzi_lite_sanitize_checkbox'
) );

$wp_customize->add_control( 'breadcrumb_on_homepage', array(
	'label'    => esc_html__( 'Check to enable Breadcrumb on Homepage', 'otzi-lite' ),
	'section'  => 'otzi_lite_breadcrumb_options',
	'settings' => 'breadcrumb_on_homepage',
	'type'     => 'checkbox',
) );

$wp_customize->add_setting( 'breadcrumb_seperator', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['breadcrumb_seperator'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'breadcrumb_seperator', array(
	'input_attrs' => array(
    		'style' => 'width: 40px;'
		),
	'label'    	=> esc_html__( 'Seperator between Breadcrumbs', 'otzi-lite' ),
	'section' 	=> 'otzi_lite_breadcrumb_options',
	'settings' 	=> 'breadcrumb_seperator',
	'type'     	=> 'text'
	)
);
// Breadcrumb Option End


// Excerpt Options
$wp_customize->add_section( 'otzi_lite_excerpt_options', array(
	'panel'  	=> 'otzi_lite_theme_options',
	'priority' 	=> 204,
	'title'    	=> esc_html__( 'Excerpt Options', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'excerpt_length', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_length'],
	'sanitize_callback' => 'absint',
) );

$wp_customize->add_control( 'excerpt_length', array(
	'description' => esc_html__('Excerpt length. Default is 40 words', 'otzi-lite'),
	'input_attrs' => array(
        'min'   => 10,
        'max'   => 200,
        'step'  => 5,
        'style' => 'width: 60px;'
        ),
    'label'    => esc_html__( 'Excerpt Length (words)', 'otzi-lite' ),
	'section'  => 'otzi_lite_excerpt_options',
	'settings' => 'excerpt_length',
	'type'	   => 'number',
	)
);

$wp_customize->add_setting( 'excerpt_more_text', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['excerpt_more_text'],
	'sanitize_callback'	=> 'sanitize_text_field',
) );

$wp_customize->add_control( 'excerpt_more_text', array(
	'label'    => esc_html__( 'Read More Text', 'otzi-lite' ),
	'section'  => 'otzi_lite_excerpt_options',
	'settings' => 'excerpt_more_text',
	'type'	   => 'text',
) );
// Excerpt Options End

//Homepage / Frontpage Options
$wp_customize->add_section( 'otzi_lite_homepage_options', array(
	'description'	=> esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'otzi-lite' ),
	'panel'			=> 'otzi_lite_theme_options',
	'priority' 		=> 209,
	'title'   	 	=> esc_html__( 'Homepage / Frontpage Options', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'front_page_category', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['front_page_category'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_category_list',
) );

$wp_customize->add_control( new otzi_lite_customize_dropdown_categories_control( $wp_customize, 'front_page_category', array(
    'label'   	=> esc_html__( 'Select Categories', 'otzi-lite' ),
    'name'	 	=> 'front_page_category',
	'priority'	=> '6',
    'section'  	=> 'otzi_lite_homepage_options',
    'settings' 	=> 'front_page_category',
    'type'     	=> 'dropdown-categories',
) ) );
//Homepage / Frontpage Settings End

// Pagination Options
$pagination_type	= get_theme_mod( 'pagination_type' );

$nav_description = sprintf(
	wp_kses(
		__( '<a target="_blank" href="%1$s">WP-PageNavi Plugin</a> is recommended for Numeric Option(But will work without it).<br/>Infinite Scroll Options requires <a target="_blank" href="%2$s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'otzi-lite' ),
		array(
			'a' => array(
				'href' => array(),
				'target' => array(),
			),
			'br'=> array()
		)
	),
	esc_url( 'https://wordpress.org/plugins/wp-pagenavi' ),
	esc_url( 'https://wordpress.org/plugins/jetpack/' )
);

/**
* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
*/
if ( ( 'infinite-scroll-click' == $pagination_type || 'infinite-scroll-scroll' == $pagination_type ) ) {
	if ( ! (class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'infinite-scroll' ) ) ) {
		$nav_description = sprintf(
			wp_kses(
				__( 'Infinite Scroll Options requires <a target="_blank" href="%s">JetPack Plugin</a> with Infinite Scroll module Enabled.', 'otzi-lite' ),
				array(
					'a' => array(
						'href' => array(),
						'target' => array()
					)
				)
			),
			esc_url( 'https://wordpress.org/plugins/jetpack/' )
		);
	}
	else {
		$nav_description = '';
	}
}

$wp_customize->add_section( 'otzi_lite_pagination_options', array(
	'description'	=> $nav_description,
	'panel'  		=> 'otzi_lite_theme_options',
	'priority'		=> 212,
	'title'    		=> esc_html__( 'Pagination Options', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'pagination_type', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['pagination_type'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'pagination_type', array(
	'choices'  => otzi_lite_get_pagination_types(),
	'label'    => esc_html__( 'Pagination type', 'otzi-lite' ),
	'section'  => 'otzi_lite_pagination_options',
	'settings' => 'pagination_type',
	'type'	   => 'select',
) );
// Pagination Options End

// Search Options
$wp_customize->add_section( 'otzi_lite_search_options', array(
	'description'=> esc_html__( 'Change default placeholder text in Search.', 'otzi-lite'),
	'panel'  => 'otzi_lite_theme_options',
	'priority' => 216,
	'title'    => esc_html__( 'Search Options', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'search_text', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['search_text'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'search_text', array(
	'label'		=> esc_html__( 'Default Display Text in Search', 'otzi-lite' ),
	'section'   => 'otzi_lite_search_options',
    'settings'  => 'search_text',
	'type'		=> 'text',
) );
// Search Options End

// Scrollup
$wp_customize->add_section( 'otzi_lite_scrollup', array(
	'panel'    => 'otzi_lite_theme_options',
	'priority' => 215,
	'title'    => esc_html__( 'Scrollup Options', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'disable_scrollup', array(
	'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['disable_scrollup'],
	'sanitize_callback' => 'otzi_lite_sanitize_checkbox',
) );

$wp_customize->add_control( 'disable_scrollup', array(
	'label'		=> esc_html__( 'Check to disable Scroll Up', 'otzi-lite' ),
	'section'   => 'otzi_lite_scrollup',
    'settings'  => 'disable_scrollup',
	'type'		=> 'checkbox',
) );
// Scrollup End