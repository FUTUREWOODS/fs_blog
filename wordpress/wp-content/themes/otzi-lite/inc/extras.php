<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Otzi Lite
 */

/**
 * fet option from theme mods
 * @param  option key
 * @return option value
 */
function otzi_lite_get_option( $value ) {
	return get_theme_mod( $value, otzi_lite_get_default_theme_options( $value ) );
}

/**
 * Check if a section is enabled or not based on the $value parameter
 * @param  string $value Value of the section that is to be checked
 * @return boolean return true if section is enabled otherwise false
 */
function otzi_lite_check_section( $value ) {
	global $wp_query;
	
	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	
	// Front page displays in Reading Settings
	$page_for_posts = get_option('page_for_posts');

	return ( 'entire-site' == $value  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $value  ) );
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function otzi_lite_body_classes( $classes ) {
	global $wp_query;

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_for_posts = get_option('page_for_posts');

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'otzi_lite_body_classes' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since Otzi 1.1
 */
function otzi_lite_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'footer-widget-1' ) )
		$count++;

	if ( is_active_sidebar( 'footer-widget-2' ) )
		$count++;

	if ( is_active_sidebar( 'footer-widget-3' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'one';
			break;
		case '2':
			$class = 'two';
			break;
		case '3':
			$class = 'three';
			break;
		case '4':
			$class = 'four';
			break;
	}

	if ( $class )
		echo 'class="widget-area-footer ' . $class . '"';
}

if ( ! function_exists( 'otzi_lite_continue_reading' ) && ! is_admin() ) :
/**
 * Adds a "Continue" link to all instances of the_excerpt
 *
 * @return string The excerpt with a 'Continue' link appended.
 */
function otzi_lite_continue_reading( $the_excerpt ) {
	$more_tag_text	= otzi_lite_get_option( 'excerpt_more_text' );

	$the_excerpt = sprintf( '%1$s <div class="more-button"><a href="%2$s ">%3$s</a></div>',
		$the_excerpt,
		esc_url( get_permalink( get_the_ID() ) ),
		$more_tag_text
	);
	return $the_excerpt;
}
add_filter( 'the_excerpt', 'otzi_lite_continue_reading', 9 );
endif;

/**
 * Custom lenght of the excerpt depending on the post.
 */
function otzi_lite_excerpt_length( $length ) {
	// Getting data from Customizer Options
	$length	= otzi_lite_get_option( 'excerpt_length' );

	return $length;
}
add_filter( 'excerpt_length', 'otzi_lite_excerpt_length', 999 );

if ( ! function_exists( 'otzi_lite_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with a blank space.
 *
 */
function otzi_lite_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'otzi_lite_excerpt_more' );
endif;

/**
 * Alter the query for the main loop in homepage
 *
 * @action pre_get_posts
 *
 * @since Otzi Lite 0.1
 */
function otzi_lite_alter_home( $query ){
	if( $query->is_main_query() && $query->is_home() ) {
		$cats = otzi_lite_get_option( 'front_page_category' );

	    if ( is_array( $cats ) && !in_array( '0', $cats ) ) {
			$query->query_vars['category__in'] =  $cats;
		}
	}
}
add_action( 'pre_get_posts','otzi_lite_alter_home' );


if ( ! function_exists( 'otzi_lite_footer_content' ) ) :
	/**
	 * Return footer content
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_footer_content() {
		echo otzi_lite_get_default_theme_options( 'footer_content' );
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_footer_content', 50 );

if ( ! function_exists( 'otzi_lite_scrollup' ) ) {
	/**
	 * This function loads Scroll Up Navigation
	 */
	function otzi_lite_scrollup() {
		$disable_scrollup = otzi_lite_get_option( 'disable_scrollup' );

		if ( $disable_scrollup ) {
			//Bail if scroll up is disabled
			return;
		}

		echo '<a href="#masthead" id="scrollup" class="genericon"><span class="screen-reader-text">' . esc_html__( 'Scroll Up', 'otzi-lite' ) . '</span></a>' ;
	}
}
add_action( 'wp_footer', 'otzi_lite_scrollup', 10 );


if ( ! function_exists( 'otzi_lite_page_post_meta' ) ) :
	/**
	 * Post/Page Meta for Google Structure Data
	 */
	function otzi_lite_page_post_meta() {
		$author_url = esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) );

		$output = '<span class="post-time">' . esc_html__( 'Posted on', 'otzi-lite' ) . ' <time class="entry-date updated" datetime="' . esc_attr( get_the_date( 'c' ) ) . '" pubdate>' . esc_html( get_the_date() ) . '</time></span>';
	    $output .= '<span class="post-author">' . esc_html__( 'By', 'otzi-lite' ) . ' <span class="author vcard"><a class="url fn n" href="' . $author_url . '" title="View all posts by ' . get_the_author() . '" rel="author">' .get_the_author() . '</a></span>';

		return $output;
	}
endif; //otzi_lite_page_post_meta

/**
 * Return the first image in a post. Works inside a loop.
 * @param [integer] $post_id [Post or page id]
 * @param [string/array] $size Image size. Either a string keyword (thumbnail, medium, large or full) or a 2-item array representing width and height in pixels, e.g. array(32,32).
 * @param [string/array] $attr Query string or array of attributes.
 * @return [string] image html
 *
 * @since Otzi 2.1
 */

function otzi_lite_get_first_image( $postID, $size, $attr ) {
	ob_start();

	ob_end_clean();

	$image 	= '';

	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_post_field('post_content', $postID ) , $matches);

	if ( isset( $matches [1] [0] ) ) {
		//Get first image
		$first_img = $matches [1] [0];

		return '<img class="pngfix wp-post-image" src="'. $first_img .'">';
	}

	return false;
}