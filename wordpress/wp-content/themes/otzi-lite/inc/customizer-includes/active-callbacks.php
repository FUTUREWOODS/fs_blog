<?php
/**
 * Active callbacks for Theme/Customzer Options
 *
 * @package Catch Themes
 * @subpackage Otzi
 * @since Otzi 1.2
 */


if( ! function_exists( 'otzi_lite_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Otzi 1.2
	*/
	function otzi_lite_is_slider_active( $control ) {
		$enable = $control->manager->get_setting( 'featured_slider_option' )->value();

		return otzi_lite_check_section( $enable ) ;
	}
endif;


if( ! function_exists( 'otzi_lite_is_demo_slider_inactive' ) ) :
	/**
	* Return true if demo slider is inactive
	*
	* @since Otzi 1.2
	*/
	function otzi_lite_is_demo_slider_inactive( $control ) {
		$type 	= $control->manager->get_setting( 'featured_slider_type' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected and is not demo slider
		return ( otzi_lite_is_slider_active( $control )  && !( 'demo' == $type ) );
	}
endif;


if( ! function_exists( 'otzi_lite_is_featured_content_active' ) ) :
	/**
	* Return true if featured content is active
	*
	* @since Otzi 1.2
	*/
	function otzi_lite_is_featured_content_active( $control ) {
		$enable = $control->manager->get_setting( 'featured_content_option' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return otzi_lite_check_section( $enable) ;
	}
endif;


if( ! function_exists( 'otzi_lite_is_demo_featured_content_inactive' ) ) :
	/**
	* Return true if demo featured content is inactive
	*
	* @since Otzi 1.2
	*/
	function otzi_lite_is_demo_featured_content_inactive( $control ) {
		$type = $control->manager->get_setting( 'featured_content_type' )->value();

		//return true only if previwed page on customizer matches the type of content option selected and is not demo content
		return ( otzi_lite_is_featured_content_active( $control ) && !( 'demo' == $type ) );
	}
endif;