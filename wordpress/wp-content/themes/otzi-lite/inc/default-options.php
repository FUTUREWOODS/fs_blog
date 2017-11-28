<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Otzi Lite
 * @since Otzi Lite 0.1
 */


/**
 * Returns the default options for otzi.
 *
 * @since Otzi Lite 0.1
 */
function otzi_lite_get_default_theme_options( $parameter = null ) {
	$default_theme_options = array(
		//Site Info
		'disable_tagline_header'            => 0,
		'disable_tagline_footer'            => 0,

		//Breadcrumb Options
		'breadcrumb_option'                 => 0,
		'breadcrumb_on_homepage'            => 0,
		'breadcrumb_seperator'              => '/',

		//Custom CSS
		'custom_css'                        => '',

		//Excerpt Options
		'excerpt_length'                    => '40',
		'excerpt_more_text'                 => esc_html__( 'Continue', 'otzi-lite' ),

		//Homepage / Frontpage Settings
		'front_page_category'               => '0',

		//Pagination Options
		'pagination_type'                   => 'default',

		//Search Options
		'search_text'                       => esc_html__( 'Search...', 'otzi-lite' ),

		//Scrollup Options
		'disable_scrollup'                  => 0,

		//Footer Editor Options
		'footer_content'                    => '<a target="_blank" href="' . esc_url( __( 'https://wordpress.org/', 'otzi-lite' ) ) . '">'. sprintf( esc_html__( 'Proudly powered by %s', 'otzi-lite' ), 'WordPress' ) . '</a><span class="sep"> | </span>' . sprintf( esc_html__( 'Theme: %1$s by %2$s', 'otzi-lite' ), 'Otzi', '<a target="_blank" href="https://catchthemes.com/" rel="designer">Catch Themes</a>' ),

		//Featured Slider Options
		'featured_slider_option'            => 'disabled',
		'featured_slider_image_loader'      => 'true',
		'featured_slider_transition_effect' => 'fade',
		'featured_slider_transition_delay'  => '4',
		'featured_slider_transition_length' => '1',
		'featured_slider_type'              => 'demo',
		'featured_slider_number'            => '4',
		'featured_slider_select_category'   => array(),
		'exclude_slider_post'               => 0,
		'featured_slider_layout'            => 'content-width',
		'featured_slider_disable_content'   => 1,

		//Featured Content Options
		'featured_content_option'           => 'disabled',
		'featured_content_layout'           => 'layout-three',
		'featured_content_position'         => 0,
		'featured_content_slider'           => 0,
		'featured_content_headline'         => '',
		'featured_content_subheadline'      => '',
		'featured_content_type'             => 'demo',
		'featured_content_number'           => '3',
		'featured_content_enable_title'     => 1,
		'featured_content_show'             => 'hide-content',
		'featured_content_select_category'  => '0',

		//Reset all settings
		'reset_all_settings'     => 0,
	);

	if ( null == $parameter ) {
		return apply_filters( 'otzi_lite_default_theme_options', $default_theme_options );
	}
	else {
		return isset( $default_theme_options[ $parameter ] ) ? $default_theme_options[ $parameter ] : '';
	}
}

/**
 * Returns an array of pagination schemes registered for otzi.
 *
 * @since Otzi Lite 0.1
 */
function otzi_lite_get_pagination_types() {
	$pagination_types = array(
		'default'                => esc_html__( 'Default(Older Posts/Newer Posts)', 'otzi-lite' ),
		'numeric'                => esc_html__( 'Numeric', 'otzi-lite' ),
		'infinite-scroll-click'  => esc_html__( 'Infinite Scroll (Click)', 'otzi-lite' ),
		'infinite-scroll-scroll' => esc_html__( 'Infinite Scroll (Scroll)', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_get_pagination_types', $pagination_types );
}

/**
 * Returns an array of avaliable fonts registered for otzi
 *
 * @since Otzi Lite 0.1
 */
function otzi_lite_avaliable_fonts() {
	$avaliable_fonts = array(
		'arial-black' => array(
			'value' => 'arial-black',
			'label' => '"Arial Black", Gadget, sans-serif',
		),
		'allan' => array(
			'value' => 'allan',
			'label' => '"Allan", sans-serif',
		),
		'allerta' => array(
			'value' => 'allerta',
			'label' => '"Allerta", sans-serif',
		),
		'amaranth' => array(
			'value' => 'amaranth',
			'label' => '"Amaranth", sans-serif',
		),
		'arial' => array(
			'value' => 'arial',
			'label' => 'Arial, Helvetica, sans-serif',
		),
		'bitter' => array(
			'value' => 'bitter',
			'label' => '"Bitter", sans-serif',
		),
		'cabin' => array(
			'value' => 'cabin',
			'label' => '"Cabin", sans-serif',
		),
		'cantarell' => array(
			'value' => 'cantarell',
			'label' => '"Cantarell", sans-serif',
		),
		'century-gothic' => array(
			'value' => 'century-gothic',
			'label' => '"Century Gothic", sans-serif',
		),
		'courier-new' => array(
			'value' => 'courier-new',
			'label' => '"Courier New", Courier, monospace',
		),
		'crimson-text' => array(
			'value' => 'crimson-text',
			'label' => '"Crimson Text", sans-serif',
		),
		'cuprum' => array(
			'value' => 'cuprum',
			'label' => '"Cuprum", sans-serif',
		),
		'dancing-script' => array(
			'value' => 'dancing-script',
			'label' => '"Dancing Script", sans-serif',
		),
		'droid-sans' => array(
			'value' => 'droid-sans',
			'label' => '"Droid Sans", sans-serif',
		),
		'droid-serif' => array(
			'value' => 'droid-serif',
			'label' => '"Droid Serif", sans-serif',
		),
		'exo' => array(
			'value' => 'exo',
			'label' => '"Exo", sans-serif',
		),
		'exo-2' => array(
			'value' => 'exo-2',
			'label' => '"Exo 2", sans-serif',
		),
		'georgia' => array(
			'value' => 'georgia',
			'label' => 'Georgia, "Times New Roman", Times, serif',
		),
		'helvetica' => array(
			'value' => 'helvetica',
			'label' => 'Helvetica, "Helvetica Neue", Arial, sans-serif',
		),
		'helvetica-neue' => array(
			'value' => 'helvetica-neue',
			'label' => '"Helvetica Neue",Helvetica,Arial,sans-serif',
		),
		'istok-web' => array(
			'value' => 'istok-web',
			'label' => '"Istok Web", sans-serif',
		),
		'impact' => array(
			'value' => 'impact',
			'label' => 'Impact, Charcoal, sans-serif',
		),
		'josefin-sans' => array(
			'value' => 'josefin-sans',
			'label' => '"Josefin Sans", sans-serif',
		),
		'lato' => array(
			'value' => 'lato',
			'label' => '"Lato", sans-serif',
		),
		'lucida-sans-unicode' => array(
			'value' => 'lucida-sans-unicode',
			'label' => '"Lucida Sans Unicode", "Lucida Grande", sans-serif',
		),
		'lucida-grande' => array(
			'value' => 'lucida-grande',
			'label' => '"Lucida Grande", "Lucida Sans Unicode", sans-serif',
		),
		'lobster' => array(
			'value' => 'lobster',
			'label' => '"Lobster", sans-serif',
		),
		'lora' => array(
			'value' => 'lora',
			'label' => '"Lora", serif',
		),
		'monaco' => array(
			'value' => 'monaco',
			'label' => 'Monaco, Consolas, "Lucida Console", monospace, sans-serif',
		),
		'montserrat' => array(
			'value' => 'montserrat',
			'label' => '"Montserrat", sans-serif',
		),
		'nobile' => array(
			'value' => 'nobile',
			'label' => '"Nobile", sans-serif',
		),
		'noto-serif' => array(
			'value' => 'noto-serif',
			'label' => '"Noto Serif", serif',
		),
		'neuton' => array(
			'value' => 'neuton',
			'label' => '"Neuton", serif',
		),
		'open-sans' => array(
			'value' => 'open-sans',
			'label' => '"Open Sans", sans-serif',
		),
		'oswald' => array(
			'value' => 'oswald',
			'label' => '"Oswald", sans-serif',
		),
		'palatino' => array(
			'value' => 'palatino',
			'label' => 'Palatino, "Palatino Linotype", "Book Antiqua", serif',
		),
		'patua-one' => array(
			'value' => 'patua-one',
			'label' => '"Patua One", sans-serif',
		),
		'playfair-display' => array(
			'value' => 'playfair-display',
			'label' => '"Playfair Display", sans-serif',
		),
		'pt-sans' => array(
			'value' => 'pt-sans',
			'label' => '"PT Sans", sans-serif',
		),
		'pt-serif' => array(
			'value' => 'pt-serif',
			'label' => '"PT Serif", serif',
		),
		'quattrocento-sans' => array(
			'value' => 'quattrocento-sans',
			'label' => '"Quattrocento Sans", sans-serif',
		),
		'roboto' => array(
			'value' => 'roboto',
			'label' => '"Roboto", sans-serif',
		),
		'roboto-slab' => array(
			'value' => 'roboto-slab',
			'label' => '"Roboto Slab", serif',
		),
		'rubik' => array(
			'value' => 'rubik',
			'label' => '"Rubik", serif',
		),
		'sans-serif' => array(
			'value' => 'sans-serif',
			'label' => 'Sans Serif, Arial',
		),
		'source-sans-pro' => array(
			'value' => 'source-sans-pro',
			'label' => '"Source Sans Pro", sans-serif',
		),
		'tahoma' => array(
			'value' => 'tahoma',
			'label' => 'Tahoma, Geneva, sans-serif',
		),
		'trebuchet-ms' => array(
			'value' => 'trebuchet-ms',
			'label' => '"Trebuchet MS", "Helvetica", sans-serif',
		),
		'times-new-roman' => array(
			'value' => 'times-new-roman',
			'label' => '"Times New Roman", Times, serif',
		),
		'ubuntu' => array(
			'value' => 'ubuntu',
			'label' => '"Ubuntu", sans-serif',
		),
		'varela' => array(
			'value' => 'varela',
			'label' => '"Varela", sans-serif',
		),
		'verdana' => array(
			'value' => 'verdana',
			'label' => 'Verdana, Geneva, sans-serif',
		),
		'yanone-kaffeesatz' => array(
			'value' => 'yanone-kaffeesatz',
			'label' => '"Yanone Kaffeesatz", sans-serif',
		),
	);

	return apply_filters( 'otzi_lite_avaliable_fonts', $avaliable_fonts );
}

/**
 * Returns an array of content and slider layout options
 *
 * @since Otzi 1.0.0
 */
function otzi_lite_featured_section_display_options() {
	$options = array(
		'homepage'    => esc_html__( 'Homepage / Frontpage', 'otzi-lite' ),
		'entire-site' => esc_html__( 'Entire Site', 'otzi-lite' ),
		'disabled'    => esc_html__( 'Disabled', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_section_display_options', $options );
}

/**
 * Returns an array of feature slider transition effects
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_slider_transition_effects() {
	$options = array(
		'fade' 		=> esc_html__( 'Fade', 'otzi-lite' ),
		'fadeout' 	=> esc_html__( 'Fade Out', 'otzi-lite' ),
		'none' 		=> esc_html__( 'None', 'otzi-lite' ),
		'scrollHorz'=> esc_html__( 'Scroll Horizontal', 'otzi-lite' ),
		'scrollVert'=> esc_html__( 'Scroll Vertical', 'otzi-lite' ),
		'flipHorz'	=> esc_html__( 'Flip Horizontal', 'otzi-lite' ),
		'flipVert'	=> esc_html__( 'Flip Vertical', 'otzi-lite' ),
		'tileSlide'	=> esc_html__( 'Tile Slide', 'otzi-lite' ),
		'tileBlind'	=> esc_html__( 'Tile Blind', 'otzi-lite' ),
		'shuffle'	=> esc_html__( 'Shuffle', 'otzi-lite' )
	);

	return apply_filters( 'otzi_lite_featured_slider_transition_effects', $options );
}

/**
 * Returns an array of featured slider image loader options
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_slider_image_loader() {
	$options = array(
		'true'  => esc_html__( 'True', 'otzi-lite' ),
		'wait'  => esc_html__( 'Wait', 'otzi-lite' ),
		'false' => esc_html__( 'False', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_slider_image_loader', $options );
}

/**
 * Returns an array of featured content options registered for fabulous fluid.
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_slider_layout_options() {
	$options = array(
		'content-width' => esc_html__( 'Content Width', 'otzi-lite' ),
		'full-width'    => esc_html__( 'Full Width', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_slider_layout_options', $options );
}


/**
 * Returns an array of feature slider types registered for fabulous fluid.
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_section_types() {
	$options = array(
		'demo'     => esc_html__( 'Demo', 'otzi-lite' ),
		'page'     => esc_html__( 'Page', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_section_types', $options );
}

/**
 * Returns an array of featured content options registered for fabulous fluid.
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_content_layout_options() {
	$options = array(
		'layout-three' => esc_html__( '3 columns', 'otzi-lite' ),
		'layout-four'  => esc_html__( '4 columns', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_content_layout_options', $options );
}

/**
 * Returns an array of featured content show registered for fabulous fluid.
 *
 * @since Otzi 1.2
 */
function otzi_lite_featured_content_show() {
	$options = array(
		'excerpt'      => esc_html__( 'Show Excerpt', 'otzi-lite' ),
		'full-content' => esc_html__( 'Show Full Content', 'otzi-lite' ),
		'hide-content' => esc_html__( 'Hide Content', 'otzi-lite' ),
	);

	return apply_filters( 'otzi_lite_featured_content_show', $options );
}