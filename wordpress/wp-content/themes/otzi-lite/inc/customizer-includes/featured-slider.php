<?php
/**
 * Add Featured Slider Options in Customizer
 *
 * @package Catch Themes
 * @subpackage Otzi
 * @since Otzi 2.1
 */
	
$wp_customize->add_section( 'otzi_lite_featured_slider', array(
	'priority'		=> 400,
	'title'			=> esc_html__( 'Featured Slider', 'otzi-lite' ),
) );

$wp_customize->add_setting( 'featured_slider_option', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_option'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_slider_option', array(
	'choices'  => otzi_lite_featured_section_display_options(),
	'label'    => esc_html__( 'Enable on', 'otzi-lite' ),
	'section'  => 'otzi_lite_featured_slider',
	'settings' => 'featured_slider_option',
	'type'     => 'select',
) );

$wp_customize->add_setting( 'featured_slider_type', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_type'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_slider_type', array(
	'active_callback' => 'otzi_lite_is_slider_active',
	'choices'         => otzi_lite_featured_section_types(),
	'label'           => esc_html__( 'Select Slider Type', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_type',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'featured_slider_number', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_number'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_slider_number' , array(
	'active_callback' => 'otzi_lite_is_demo_slider_inactive',
	'description'     => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'otzi-lite' ),
	'input_attrs'     => array(
	'style'           => 'width: 45px;',
		'min'  => 0,
		'max'  => 20,
		'step' => 1,
	),
	'label'           => esc_html__( 'No of Slides', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_number',
	'type'            => 'number',
	)
);

$wp_customize->add_setting( 'featured_slider_disable_content', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_disable_content'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_checkbox',
) );

$wp_customize->add_control(  'featured_slider_disable_content', array(
	'active_callback' => 'otzi_lite_is_demo_slider_inactive',
	'label'           => esc_html__( 'Check to Disable Slider content', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_disable_content',
	'type'            => 'checkbox',
) );

//loop for featured post sliders
$number = otzi_lite_get_option( 'featured_slider_number' );
for ( $i=1; $i <= $number ; $i++ ) {
	$wp_customize->add_setting( 'featured_slider_page_'. $i, array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback'	=> 'otzi_lite_sanitize_page',
	) );

	$wp_customize->add_control( 'featured_slider_page_'. $i, array(
		'active_callback' => 'otzi_lite_is_demo_slider_inactive',
		'label'           => esc_html__( 'Featured Page', 'otzi-lite' ) . ' # ' . $i ,
		'section'         => 'otzi_lite_featured_slider',
		'settings'        => 'featured_slider_page_'. $i,
		'type'            => 'dropdown-pages',
	) );
}

$wp_customize->add_setting( 'featured_slider_layout', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_layout'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_slider_layout' , array(
	'active_callback' => 'otzi_lite_is_slider_active',
	'choices'         => otzi_lite_featured_slider_layout_options(),
	'label'           => esc_html__( 'Slider Layout', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_layout',
	'type'            => 'radio',
) );

$wp_customize->add_setting( 'featured_slider_transition_effect', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_transition_effect'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_slider_transition_effect' , array(
	'active_callback' => 'otzi_lite_is_slider_active',
	'choices'         => otzi_lite_featured_slider_transition_effects(),
	'label'           => esc_html__( 'Transition Effect', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_transition_effect',
	'type'            => 'select',
) );

$wp_customize->add_setting( 'featured_slider_transition_delay', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_transition_delay'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_slider_transition_delay' , array(
	'active_callback' => 'otzi_lite_is_slider_active',
	'description'     => esc_html__( 'seconds(s)', 'otzi-lite' ),
	'input_attrs'     => array(
		'style' => 'width: 100px;'
		),
	'label'           => esc_html__( 'Transition Delay', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_transition_delay',
) );

$wp_customize->add_setting( 'featured_slider_transition_length', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['featured_slider_transition_length'],
	'sanitize_callback'	=> 'otzi_lite_sanitize_number_range',
) );

$wp_customize->add_control( 'featured_slider_transition_length' , array(
		'active_callback' => 'otzi_lite_is_slider_active',
		'description'     => esc_html__( 'seconds(s)', 'otzi-lite' ),
		'input_attrs'     => array(
			'style' => 'width: 100px;'
		),
		'label'           => esc_html__( 'Transition Length', 'otzi-lite' ),
		'section'         => 'otzi_lite_featured_slider',
		'settings'        => 'featured_slider_transition_length',
	)
);

$wp_customize->add_setting( 'featured_slider_image_loader', array(
	'capability'        => 'edit_theme_options',
	'default'           => $defaults['featured_slider_image_loader'],
	'sanitize_callback' => 'otzi_lite_sanitize_select',
) );

$wp_customize->add_control( 'featured_slider_image_loader', array(
	'active_callback' => 'otzi_lite_is_slider_active',
	'description'     => esc_html__( 'True: Fixes the height overlap issue. Slideshow will start as soon as two slider are available. Slide may display in random, as image is fetch. Wait: Fixes the height overlap issue. Slideshow will start only after all images are available.', 'otzi-lite' ),
	'choices'         => otzi_lite_featured_slider_image_loader(),
	'label'           => esc_html__( 'Image Loader', 'otzi-lite' ),
	'section'         => 'otzi_lite_featured_slider',
	'settings'        => 'featured_slider_image_loader',
	'type'            => 'select',
) );