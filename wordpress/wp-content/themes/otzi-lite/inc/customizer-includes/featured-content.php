<?php
/**
 * Add Featured Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Otzi
 * @since Otzi 2.1
 */

$wp_customize->add_section( 'otzi_lite_featured_content', array(
	'priority' => 800,
	'title'    => esc_html__( 'Featured Content', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'featured_content_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_option'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_content_option', array(
	'choices'  => otzi_lite_featured_section_display_options(),
	'label'    => esc_html__( 'Enable on', 'otzi-lite' ),
	'section'  => 'otzi_lite_featured_content',
	'settings' => 'featured_content_option',
	'type'     => 'select',
) );

$wp_customize->add_setting( 'featured_content_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_layout'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_content_layout', array(
	'active_callback' => 'otzi_lite_is_featured_content_active',
	'choices'         => otzi_lite_featured_content_layout_options(),
	'label'           => esc_html__( 'Select Featured Content Layout', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_layout',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'featured_content_position', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_content_position'],
	'sanitize_callback' => 'otzi_lite_sanitize_checkbox'
) );

$wp_customize->add_control( 'featured_content_position', array(
	'active_callback' => 'otzi_lite_is_featured_content_active',
	'label'           => esc_html__( 'Check to Move above Footer', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_position',
	'type'            => 'checkbox',
) );

$wp_customize->add_setting( 'featured_content_slider', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_slider'],
	'sanitize_callback' => 'otzi_lite_sanitize_checkbox'
) );

$wp_customize->add_control( 'featured_content_slider', array(
	'active_callback' => 'otzi_lite_is_featured_content_active',
	'label'           => esc_html__( 'Check to Enable Slider', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_slider',
	'type'            => 'checkbox',
) );

$wp_customize->add_setting( 'featured_content_type', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_type'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_content_type', array(
	'active_callback' => 'otzi_lite_is_featured_content_active',
	'choices'         => otzi_lite_featured_section_types(),
	'label'           => esc_html__( 'Select Content Type', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_type',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'featured_content_headline', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_headline'],
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'featured_content_headline' , array(
	'active_callback' => 'otzi_lite_is_demo_featured_content_inactive',
	'description'     => esc_html__( 'Leave field empty if you want to remove Headline', 'otzi-lite' ),
	'label'           => esc_html__( 'Headline for Featured Content', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_headline',
	'type'            => 'text',
	)
);

$wp_customize->add_setting( 'featured_content_subheadline', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_subheadline'],
	'sanitize_callback' => 'wp_kses_post',
) );

$wp_customize->add_control( 'featured_content_subheadline' , array(
	'active_callback' => 'otzi_lite_is_demo_featured_content_inactive',
	'description'     => esc_html__( 'Leave field empty if you want to remove Sub-headline', 'otzi-lite' ),
	'label'           => esc_html__( 'Sub-headline for Featured Content', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_subheadline',
	'type'            => 'text',
	)
);

$wp_customize->add_setting( 'featured_content_number', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_number'],
	'sanitize_callback' => 'otzi_lite_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_content_number' , array(
		'active_callback' => 'otzi_lite_is_demo_featured_content_inactive',
		'description'     => esc_html__( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'otzi-lite' ),
		'input_attrs'     => array(
			'style' => 'width: 45px;',
			'min'   => 0,
			'max'   => 20,
			'step'  => 1,
		),
		'label'           => esc_html__( 'No of Featured Content', 'otzi-lite' ),
		'section'         => 'otzi_lite_featured_content',
		'settings'        => 'featured_content_number',
		'type'            => 'number',
		)
);

$wp_customize->add_setting( 'featured_content_enable_title', array(
		'default'           => $defaults['featured_content_enable_title'],
		'sanitize_callback' => 'otzi_lite_sanitize_checkbox',
	) );

$wp_customize->add_control(  'featured_content_enable_title', array(
	'active_callback' => 'otzi_lite_is_demo_featured_content_inactive',
	'label'           => esc_html__( 'Check to Enable Title', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_enable_title',
	'type'            => 'checkbox',
) );

$wp_customize->add_setting( 'featured_content_show', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_content_show'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_content_show', array(
	'active_callback' => 'otzi_lite_is_demo_featured_content_inactive',
	'choices'         => otzi_lite_featured_content_show(),
	'label'           => esc_html__( 'Display Content', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_content',
	'settings'        => 'featured_content_show',
	'type'            => 'select',
) );

$number =otzi_lite_get_option( 'featured_content_number' );
for ( $i=1; $i <= $number ; $i++ ) {
	$wp_customize->add_setting( 'featured_content_page_'. $i, array(
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'otzi_lite_sanitize_page',
	) );

	$wp_customize->add_control( 'otzi_lite_featured_content_page_'. $i, array(
		'active_callback'	=> 'otzi_lite_is_demo_featured_content_inactive',
		'label'    	=> esc_html__( 'Featured Page', 'otzi-lite' ) . ' ' . $i ,
		'section'  	=> 'otzi_lite_featured_content',
		'settings' 	=> 'featured_content_page_'. $i,
		'type'	   	=> 'dropdown-pages',
	) );
}