<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Otzi
 * @since Otzi 2.1
 */



if ( !function_exists( 'otzi_lite_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook otzi_before_content.
*
* @since Otzi 2.1
*/
function otzi_lite_featured_content_display() {
	//otzi_lite_flush_transients();
	global $wp_query;

	// get data value from options
	$enable_content = otzi_lite_get_option( 'featured_content_option' );
	$content_select = otzi_lite_get_option( 'featured_content_type' );
	$slider_select  = otzi_lite_get_option( 'featured_content_slider' );

	// Front page displays in Reading Settings
	$page_for_posts = get_option('page_for_posts');

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	if ( otzi_lite_check_section( $enable_content ) ) {
		if ( !$output = get_transient( 'otzi_lite_featured_content' ) ) {
			$layouts 	 = otzi_lite_get_option( 'featured_content_layout' );
			$headline 	 = otzi_lite_get_option( 'featured_content_headline' );
			$subheadline = otzi_lite_get_option( 'featured_content_subheadline' );

			echo '<!-- refreshing cache -->';

			$classes = $layouts . ' ' . $content_select ;

			if ( 'demo' == $content_select ) {
				$headline    = esc_html__( 'Featured Content', 'otzi-lite' );
				$subheadline = esc_html__( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'otzi-lite' );
			}

			$position = otzi_lite_get_option( 'featured_content_position' );
			if ( $position ) {
				$classes .= ' border-top' ;
			}

			$output ='
				<div id="featured-content" class="' . esc_attr( $classes ) . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$output .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$output .='<h2 id="featured-heading" class="section-title">'.  $headline .'</h2>';
								}
								if ( !empty( $subheadline ) ) {
									$output .='<p>' . wp_kses_post( $subheadline ) . '</p>';
								}
							$output .='</div><!-- .featured-heading-wrap -->';
						}

						$output .='
						<div class="featured-content-wrap">';

							if ( $slider_select ) {
								$output .='
								<!-- prev/next links -->
								<div id="content-controls">
									<div id="content-prev"></div>
									<div id="content-next"></div>
								</div>
								<div class="cycle-slideshow"
								    data-cycle-log="false"
								    data-cycle-pause-on-hover="true"
								    data-cycle-swipe="true"
								    data-cycle-auto-height=container
									data-cycle-slides=".featured_content_slider_wrap"
									data-cycle-fx="scrollHorz"
									data-cycle-prev="#content-prev"
	    							data-cycle-next="#content-next"
									>';
							 }

							// Select content
							if ( 'demo' == $content_select ) {
								$output .= otzi_lite_demo_content();
							}
							elseif ( 'page' == $content_select ) {
								$output .= otzi_lite_post_page_category_content();
							}

							if ( $slider_select ) {
								$output .='
								</div><!-- .cycle-slideshow -->';
							}

			$output .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</div><!-- #featured-content -->';

			set_transient( 'otzi_lite_featured_content', $output, 86940 );
		}

		echo $output;
	}
}
endif;


if ( ! function_exists( 'otzi_lite_featured_content_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action otzi_content, otzi_after_secondary
 *
 * @since Otzi 2.1
 */
function otzi_lite_featured_content_display_position() {
	// Getting data from Theme Options
	$position = otzi_lite_get_option( 'featured_content_position' );

	if ( $position ) {
		add_action( 'otzi_lite_after_content', 'otzi_lite_featured_content_display', 30 );
	}
	else {
		add_action( 'otzi_lite_before_content', 'otzi_lite_featured_content_display', 40 );
	}
}
endif; // otzi_lite_featured_content_display_position
add_action( 'otzi_lite_before_header', 'otzi_lite_featured_content_display_position' );


if ( ! function_exists( 'otzi_lite_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Otzi 2.1
 *
 */
function otzi_lite_demo_content() {
	$output = '
	<div class="featured_content_slider_wrap">
		<article id="featured-post-1" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a href="#" rel="bookmark">
					<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured1-708x472.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#" rel="bookmark">Brooke Cagle</a>
					</h2>
				</header>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a href="#" rel="bookmark">
					<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured2-708x472.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#" rel="bookmark">Felix Russell</a>
					</h2>
				</header>
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a href="#" rel="bookmark">
					<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured3-708x472.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#" rel="bookmark">River Rocks</a>
					</h2>
				</header>
			</div><!-- .entry-container -->
		</article>';

	$layout = otzi_lite_get_option( 'featured_content_layout' );
	if ( 'layout-four' == $layout ) {
		$output .= '
		<article id="featured-post-4" class="post hentry post-demo">
			<figure class="featured-content-image">
				<a href="#" rel="bookmark">
					<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured4-708x472.jpg" />
				</a>
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a href="#" rel="bookmark">Sports SUV</a>
					</h2>
				</header>
			</div><!-- .entry-container -->
		</article>';
	}
	$output .= '</div><!-- .featured_content_slider_wrap -->';

	$slider = otzi_lite_get_option( 'featured_content_slider' );
	if ( $slider ) {
		$output .= '
		<div class="featured_content_slider_wrap">
			<article id="featured-post-5" class="post hentry post-demo">
				<figure class="featured-content-image">
					<a href="#" rel="bookmark">
						<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured2-708x472.jpg" />
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="#" rel="bookmark">Felix Russell</a>
						</h2>
					</header>
				</div><!-- .entry-container -->
			</article>

			<article id="featured-post-6" class="post hentry post-demo">
				<figure class="featured-content-image">
					<a href="#" rel="bookmark">
						<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured4-708x472.jpg" />
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="#" rel="bookmark">Sports SUV</a>
						</h2>
					</header>
				</div><!-- .entry-container -->
			</article>

			<article id="featured-post-7" class="post hentry post-demo">
				<figure class="featured-content-image">
					<a href="#" rel="bookmark">
						<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured3-708x472.jpg" />
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="#" rel="bookmark">River Rocks</a>
						</h2>
					</header>
				</div><!-- .entry-container -->
			</article>';

		if ( 'layout-four' == $layout ) {
			$output .= '
			<article id="featured-post-8" class="post hentry post-demo">
				<figure class="featured-content-image">
					<a href="#" rel="bookmark">
						<img class="wp-post-image" src="'.get_template_directory_uri() . '/images/featured1-708x472.jpg" />
					</a>
				</figure>
				<div class="entry-container">
					<header class="entry-header">
						<h2 class="entry-title">
							<a href="#" rel="bookmark">Brooke Cagle</a>
						</h2>
					</header>
				</div><!-- .entry-container -->
			</article>';
		}
		$output .= '</div><!-- .featured_content_slider_wrap -->';
	}

	return $output;
}
endif; // otzi_lite_demo_content


if ( ! function_exists( 'otzi_lite_post_page_category_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @since Otzi 2.1
 */
function otzi_lite_post_page_category_content() {
	$no_of_post   = 0; // for number of posts
	$post_list    = array();// list of valid post/page ids
	$quantity     = otzi_lite_get_option( 'featured_content_number' );
	$type         = otzi_lite_get_option( 'featured_content_type' );
	$layout_value = otzi_lite_get_option( 'featured_content_layout' );

	$output     = '<div class="featured_content_slider_wrap">';

	$layouts    = 3;

	if ( 'layout-four' == $layout_value ) {
		$layouts = 4;
	}

	$args = array(
		'post_type'           => 'any',
		'orderby'             => 'post__in',
		'ignore_sticky_posts' => 1 // ignore sticky posts
	);

	//Get valid number of posts
	if ( 'post' == $type || 'page' == $type  ) {
		for( $i = 1; $i <= $quantity; $i++ ){
			$post_id = '';

			if ( 'post' == $type ) {
				$post_id = otzi_lite_get_option( 'featured_content_post_' . $i );
			}
			elseif ( 'page' == $type ) {
				$post_id = otzi_lite_get_option( 'featured_content_page_' . $i );
			}

			if ( $post_id && '' != $post_id ) {
				$post_list = array_merge( $post_list, array( $post_id ) );

				$no_of_post++;
			}
		}

		$args['post__in'] = $post_list;
	}
	elseif ( 'category' == $type ) {
		$no_of_post = $quantity;

		$args['category__in'] = otzi_lite_get_option( 'featured_content_select_category' );
	}

	if ( 0 == $no_of_post ) {
		return;
	}

	$args['posts_per_page'] = $no_of_post;

	$loop = new WP_Query( $args );

	while ( $loop->have_posts() ) {

		$loop->the_post();

		$title_attribute = the_title_attribute( 'echo=0' );

		$output .= '
			<article id="featured-post-' . esc_attr( get_the_ID() ) . '" class="post hentry featured-post-content">';

			//Default value if there is no first image
			$image = '<img class="wp-post-image" src="'.get_template_directory_uri().'/images/no-featured-image-708x472.jpg" >';

			if ( has_post_thumbnail() ) {
				$image = get_the_post_thumbnail( get_the_ID(), 'otzi-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );
			}
			else {
				//Get the first image in page, returns false if there is no image
				$first_image = otzi_lite_get_first_image( get_the_ID(), 'otzi-featured-content', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );

				//Set value of image as first image if there is an image present in the page
				if ( '' != $first_image ) {
					$image = $first_image;
				}
			}

			$output .= '
				<figure class="featured-homepage-image">
					<a href="' . esc_url( get_permalink() ) . '">
					'. $image .'
					</a>
				</figure>';

			$enable_title = otzi_lite_get_option( 'featured_content_enable_title' );
			$content_show = otzi_lite_get_option( 'featured_content_show' );

			if ( $enable_title || 'hide-content' != $content_show ) {
			$output .= '
				<div class="entry-container">';
				if ( $enable_title ) {
					$output .= '
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h2>
						</header>';
				}

				if ( 'excerpt' == $content_show ) {
					//Show Excerpt
					$output .= '<div class="entry-excerpt"><p>' . get_the_excerpt() . '</p></div><!-- .entry-excerpt -->';
				}
				elseif ( 'full-content' == $content_show ) {
					//Show Content
					$content = apply_filters( 'the_content', get_the_content() );
					$content = str_replace( ']]>', ']]&gt;', $content );
					$output .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
				}
			}
			$output .= '
			</article><!-- .featured-post-' . esc_attr( get_the_ID() ) . ' -->';

			if ( 0 == ( ( $loop->current_post + 1 ) % $layouts ) && ( $loop->current_post + 1 ) < $no_of_post ) {
				//end and start featured_content_slider	_wrap div based on logic
				$output .= '
			</div><!-- .featured_content_slider_wrap -->

			<div class="featured_content_slider_wrap">';
			}
		} //endwhile

		wp_reset_postdata();

	$output .= '</div><!-- .featured_content_slider_wrap -->';

	return $output;
}
endif; // otzi_lite_post_page_category_content
