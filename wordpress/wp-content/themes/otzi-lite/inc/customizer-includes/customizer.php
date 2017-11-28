<?php
/**
 * Otzi Theme Customizer.
 *
 * @package Otzi Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function otzi_lite_customize_register( $wp_customize ) {
	$defaults = otzi_lite_get_default_theme_options();

	$wp_customize->get_setting( 'blogname' )->transport              = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport       = 'postMessage';
	$wp_customize->get_control( 'blogdescription' )->active_callback = 'otzi_lite_blogdescription_active_callback';
	$wp_customize->get_setting( 'header_textcolor' )->transport      = 'postMessage';

	$wp_customize->add_setting( 'disable_tagline_header', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['disable_tagline_header'],
		'sanitize_callback' => 'otzi_lite_sanitize_checkbox',
		'transport'			=> 'refresh',
	) );

	$wp_customize->add_control( 'disable_tagline_header', array(
		'label'    => esc_html__( 'Check to disable Tagline/Site Description in header', 'otzi-lite' ),
		'section'  => 'title_tagline',
		'settings' => 'disable_tagline_header',
		'type'     => 'checkbox',
	) );

	$wp_customize->add_setting( 'disable_tagline_footer', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['disable_tagline_footer'],
		'sanitize_callback' => 'otzi_lite_sanitize_checkbox',
		'transport'			=> 'refresh',
	) );

	$wp_customize->add_control( 'disable_tagline_footer', array(
		'label'    => esc_html__( 'Check to disable Tagline/Site Description in footer', 'otzi-lite' ),
		'section'  => 'title_tagline',
		'settings' => 'disable_tagline_footer',
		'type'     => 'checkbox',
	) );

	//Include Custom Controls
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/custom-controls.php';

	//Include Theme Options
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/theme-options.php';

	//Include Slider
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/featured-slider.php';

	//Include Featured Content
	require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/featured-content.php';

	// Reset all settings to default
	$wp_customize->add_section( 'otzi_lite_reset_all_settings', array(
		'description'	=> esc_html__( 'Caution: Reset all settings to default. Refresh the page after save to view full effects.', 'otzi-lite' ),
		'priority' 		=> 900,
		'title'    		=> esc_html__( 'Reset all settings', 'otzi-lite' ),
	) );

	$wp_customize->add_setting( 'reset_all_settings', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['reset_all_settings'],
		'sanitize_callback' => 'otzi_lite_sanitize_checkbox',
		'transport'			=> 'postMessage',
	) );

	$wp_customize->add_control( 'reset_all_settings', array(
		'label'    => esc_html__( 'Check to reset all settings to default', 'otzi-lite' ),
		'section'  => 'otzi_lite_reset_all_settings',
		'settings' => 'reset_all_settings',
		'type'     => 'checkbox',
	) );
	// Reset all settings to default end

	$wp_customize->add_section( 'important_links', array(
		'priority' 		=> 999,
		'title'   	 	=> esc_html__( 'Important Links', 'otzi-lite' ),
	) );

	/**
	 * Has dummy Sanitizaition function as it contains no value to be sanitized
	 */
	$wp_customize->add_setting( 'important_links', array(
		'sanitize_callback'	=> 'sanitize_text_field',
	) );

	$wp_customize->add_control( new otzi_lite_important_links( $wp_customize, 'important_links', array(
        'label'   	=> esc_html__( 'Important Links', 'otzi-lite' ),
        'section'  	=> 'important_links',
        'settings' 	=> 'important_links',
        'type'     	=> 'important_links',
    ) ) );
    //Important Links End
 }
add_action( 'customize_register', 'otzi_lite_customize_register' );

/**
 * Function to reset date with respect to condition
 */
function otzi_lite_reset_data() {
	$reset_all  = otzi_lite_get_option( 'reset_all_settings' );
    if ( $reset_all ) {
    	remove_theme_mods();

        return;
    }
}
add_action( 'customize_save_after', 'otzi_lite_reset_data' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function otzi_lite_customize_preview_js() {
	wp_enqueue_script( 'otzi-lite-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'otzi_lite_customize_preview_js' );

/**
 * Active Callback function for site description
 */
function otzi_lite_blogdescription_active_callback( $control ){
	return !( $control->manager->get_setting( 'disable_tagline_header' )->value() && $control->manager->get_setting( 'disable_tagline_footer' )->value() ) ;
}

//Sanitize functions for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/sanitize-functions.php';

//Active Callback functions for customizer
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/active-callbacks.php';

/**
 * Custom scripts and styles on customize.php for otzi.
 *
 * @since Clean Business 0.1
 */
function otzi_lite_customize_scripts() {
	wp_enqueue_script( 'otzi-lite-customizer-custom', get_template_directory_uri() . '/js/customizer-custom-script.js', array( 'jquery' ), '20160802', true );

	$otzi_data = array(
		'reset_message'     => esc_html__( 'Refresh the customizer page after saving to view reset effects', 'otzi-lite' )
	);

	// Send list of color variables as object to custom customizer js
	wp_localize_script( 'otzi-lite-customizer-custom', 'otzi_data', $otzi_data );
}
add_action( 'customize_controls_enqueue_scripts', 'otzi_lite_customize_scripts');

//Add Upgrade To Pro button
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/upgrade-button/class-customize.php';

/**
 * Flush out all transients
 */
function otzi_lite_flush_transients() {
	delete_transient( 'otzi_lite_featured_slider' );
	delete_transient( 'otzi_lite_featured_content' );
}
add_action( 'customize_save', 'otzi_lite_flush_transients' );
add_action( 'customize_preview_init', 'otzi_lite_flush_transients' );