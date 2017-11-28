<?php
/**
 * Otzi functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Otzi Lite
 */

if ( ! function_exists( 'otzi_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function otzi_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Otzi, use a find and replace
	 * to change 'otzi-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'otzi-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add tyles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', otzi_lite_fonts_url() ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Setup Custom Logo Support for theme
	 * Supported from WordPress version 4.5 onwards
	 * More Info: https://make.wordpress.org/core/2016/03/10/custom-logo/
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 135,
		'width'       => 300,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Archive Post Thumbnail 3:2
	set_post_thumbnail_size( 300, 200, true );

	// Single post - Content Width, Slider Content Width Layout, Ration 3:2
	add_image_size( 'otzi-featured-image', 807, 600, true );
	
	// Slider Full Width Layout, Ratio 21:9
    add_image_size( 'otzi-slider', 1680, 720, true);

    // Featured Image Full Width, Ratio 21:9
    add_image_size( 'otzi-featured-image-full', 1153, 494, true);

    // Featured Content, Ration 3:2
    add_image_size( 'otzi-featured-content', 559, 373, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'otzi-lite' ),
		'social'  => esc_html__( 'Social Menu', 'otzi-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'otzi_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // otzi_lite_setup
add_action( 'after_setup_theme', 'otzi_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function otzi_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'otzi_lite_content_width', 727 );
}
add_action( 'after_setup_theme', 'otzi_lite_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function otzi_lite_scripts() {

	wp_enqueue_style( 'otzi-lite-style', get_stylesheet_uri(), array(), '1.0.0' );

	wp_enqueue_style( 'otzi-lite-fonts', otzi_lite_fonts_url(), array(), '1.0.0' );

	// To avoid double loading, we don't prefix custom styles or scripts.
	wp_enqueue_style( 'typicons', get_template_directory_uri() . '/css/typicons.css', array(), '1.0.0' );

	wp_enqueue_script( 'otzi-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20170624', true );

	wp_localize_script( 'otzi-lite-navigation', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'otzi-lite' ),
		'collapse' => __( 'collapse child menu', 'otzi-lite' ),
	) );	

	wp_enqueue_script( 'otzi-lite-helpers', get_template_directory_uri() . '/js/helpers.js', array( 'jquery' ), '1.0.0', true );

	wp_enqueue_script( 'otzi-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true );

	// We localize only few lines from helpers.js
    wp_localize_script( 'otzi-lite-helpers', 'placeholder', array(
 	    'author'   => esc_html__( 'Name', 'otzi-lite' ),
 	    'email'    => esc_html__( 'Email', 'otzi-lite' ),
		'url'      => esc_html__( 'URL', 'otzi-lite' ),
		'comment'  => esc_html__( 'Comment', 'otzi-lite' )
 	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Loads up Scroll Up script
	 */
	$disable_scrollup = otzi_lite_get_option( 'disable_scrollup' );

	if ( !$disable_scrollup ) {
		wp_enqueue_script( 'otzi-lite-scrollup', get_template_directory_uri() . '/js/scrollup.js', array( 'jquery' ), '20160109	', true  );
	}

	/**
	 * Loads up Cycle JS
	 */
	$featured_slider_option  = otzi_lite_get_option( 'featured_slider_option' );
	$featured_content_slider = otzi_lite_get_option( 'featured_content_slider' );
	$transition_effect       = otzi_lite_get_option( 'featured_slider_transition_effect' );

	/**
	 * Loads up Cycle JS
	 */
	if ( 'disabled' != $featured_slider_option || $featured_content_slider ) {
		wp_enqueue_script( 'jquery-cycle2', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.min.js', array( 'jquery' ), '2.1.5', true );

		/**
		 * Condition checks for additional slider transition plugins
		 */
		// Scroll Vertical transition plugin addition.
		if ( 'scrollVert' == $transition_effect ) {
			wp_enqueue_script( 'jquery-cycle2-scrollVert', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.scrollVert.min.js', array( 'jquery.cycle2' ), '20140128', true );
		} elseif ( 'flipHorz' == $transition_effect || 'flipVert' == $transition_effect ) {
			// Flip transition plugin addition.
			wp_enqueue_script( 'jquery-cycle2-flip', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.flip.min.js', array( 'jquery.cycle2' ), '20140128', true );
		} elseif ( 'tileSlide' == $transition_effect || 'tileBlind' == $transition_effect ) {
			// Shuffle transition plugin addition.
			wp_enqueue_script( 'jquery-cycle2-tile', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.tile.min.js', array( 'jquery.cycle2' ), '20140128', true );
		} elseif ( 'shuffle' == $transition_effect ) {
			// Shuffle transition plugin addition.
			wp_enqueue_script( 'jquery-cycle2-shuffle', get_template_directory_uri() . '/js/jquery.cycle/jquery.cycle2.shuffle.min.js', array( 'jquery.cycle2' ), '20140128 ', true );
		}
	}

}
add_action( 'wp_enqueue_scripts', 'otzi_lite_scripts' );

/**
 * Register Google fonts.
 *
 */
function otzi_lite_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Montserrat, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$montserrat = _x( 'on', 'Montserrat font: on or off', 'otzi-lite' );

	/* Translators: If there are characters in your language that are not
	* supported by Playfair Display, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$playfair_display = _x( 'on', 'Playfair Display font: on or off', 'otzi-lite' );

	/* Translators: If there are characters in your language that are not
	* supported by Montserrat, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$rubik = _x( 'on', 'Rubik font: on or off', 'otzi-lite' );

	if ( 'off' !== $montserrat || 'off' !== $playfair_display || 'off' !== $rubik ) {
		$font_families = array();

		if ( 'off' !== $montserrat ) {
			$font_families[] = 'Montserrat:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,900,900italic';
		}

		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'Playfair Display:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,900,900italic';
		}

		if ( 'off' !== $rubik ) {
			$font_families[] = 'Rubik:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,900,900italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}


/**
 * Main navigation description.
 *
 * @author Bill Erickson
 *
 * @link http://www.billerickson.net/code/add-description-to-wordpress-menu-items/
 *
 */
function otzi_lite_main_nav_description ( $item_output, $item, $depth, $args ) {

	if( 'primary' == $args->theme_location && ! $depth && $item->description )
		$item_output = str_replace( '</a>', '<span class="menu-description">' . $item->description . '</span></a>', $item_output );

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'otzi_lite_main_nav_description', 10, 4 );

/**
 * Include Default Options for Otzi
 */
require trailingslashit( get_template_directory() ) . 'inc/default-options.php';

/**
 * Include Main Structure file
 */
require trailingslashit( get_template_directory() ) . 'inc/structure.php';

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Include breadcrumb
 */
require trailingslashit( get_template_directory() ) . 'inc/breadcrumb.php';

/**
 * Customizer additions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer-includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Include slider
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-slider.php';

/**
 * Include Featured Content
 */
require trailingslashit( get_template_directory() ) . 'inc/featured-content.php';

/**
 * Include Widgets
 */
require trailingslashit( get_template_directory() ) . 'inc/widgets/widgets.php';