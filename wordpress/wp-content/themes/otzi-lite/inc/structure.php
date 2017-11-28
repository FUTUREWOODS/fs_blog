<?php
/**
 * The template for Managing Theme Structure
 *
 * @package Catch Themes
 * @subpackage Otzi Lite
 * @since Otzi Lite 0.1
 */

if ( ! function_exists( 'otzi_lite_doctype' ) ) :
	/**
	 * Doctype Declaration
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_doctype() {
		?>
		<!DOCTYPE html>
		<html <?php language_attributes(); ?>>
		<?php
	}
endif;
add_action( 'otzi_lite_doctype', 'otzi_lite_doctype', 10 );


if ( ! function_exists( 'otzi_lite_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
		}
	}
endif;
add_action( 'otzi_lite_before_wp_head', 'otzi_lite_head', 10 );


if ( ! function_exists( 'otzi_lite_page_start' ) ) :
	/**
	 * Start div id #page
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_page_start() {
		?>
		<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'otzi-lite' ); ?></a>
		<?php
	}
endif;
add_action( 'otzi_lite_before_header', 'otzi_lite_page_start', 10 );


if ( ! function_exists( 'otzi_lite_header_start' ) ) :
	/**
	 * Start Header id #masthead
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_header_start() {
		?>
		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'otzi_lite_header', 'otzi_lite_header_start', 10 );

if ( ! function_exists( 'otzi_lite_primary_menu' ) ) :
	/**
	 * Add Primary Menu #primary-menu
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_primary_menu() { ?>

		<div id="site-header-menu" class="site-header-menu">
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'otzi-lite' ); ?>">
				<h3 class="screen-reader-text"><?php _e( 'Primary menu', 'otzi-lite' ); ?></h3>
				<button id="menu-toggle" class="menu-toggle menu-icon"><?php _e( 'Menu', 'otzi-lite' ); ?></button>
				<?php
                    if ( has_nav_menu( 'primary' ) ) {
                        $args = array(
                            'theme_location'    => 'primary',
                            'menu_class'        => 'menu primary-menu',
                            'container'         => false
                        );
                        wp_nav_menu( $args );
                    }
                    else {
                        wp_page_menu( array( 'menu_class'  => 'default-page-menu menu primary-menu' ) );
                    }
                ?>
             </nav><!-- .main-navigation -->
        </div><!-- .site-header-menu -->
    <?php
    }
endif;
add_action( 'otzi_lite_header', 'otzi_lite_primary_menu', 20 );

if ( ! function_exists( 'otzi_lite_site_branding_start' ) ) :
	/**
	 * Start in header class .site-branding
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_site_branding_start() {
		?>
		<div class="site-branding">
		<?php
	}
endif;
add_action( 'otzi_lite_header', 'otzi_lite_site_branding_start', 30 );

if ( ! function_exists( 'otzi_lite_site_branding_wrap' ) ) :
	/**
	 * Add Site Title and Tagline
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_site_branding_wrap() {
		$sitedescription    = otzi_lite_get_option( 'disable_tagline_header' );
		if ( '1' != $sitedescription  ) {
			$titleclass = "site-branding-wrap enable-description";
			$sitedescription = '<p class="site-description">' . get_bloginfo( 'description' ) . '</p>';
		}
		else {
			$titleclass = "site-branding-wrap disable-description";
			$sitedescription = '';
		}
		?>
			<div class="<?php echo $titleclass; ?>">
				<?php
				if ( function_exists( 'the_custom_logo' ) ) {
					the_custom_logo();
				}

				if ( is_front_page() && is_home() ) {
				?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
				}
				else {
				?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
				}

				echo $sitedescription; ?>
			</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'otzi_lite_header', 'otzi_lite_site_branding_wrap', 40 );


if ( ! function_exists( 'otzi_lite_site_branding_end' ) ) :
	/**
	 * End in header class .site-branding
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_site_branding_end() {
		?>
		</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'otzi_lite_header', 'otzi_lite_site_branding_end', 50 );

if ( ! function_exists( 'otzi_lite_header_end' ) ) :
	/**
	 * End in header class .site-banner and class .wrapper
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'otzi_lite_header', 'otzi_lite_header_end', 200 );

if ( ! function_exists( 'otzi_lite_content_start' ) ) :
	/**
	 * Start div id #content
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_content_start() {
		?>
		<div id="content" class="site-content">
	<?php
	}
endif;
add_action('otzi_lite_content', 'otzi_lite_content_start', 10 );

if ( ! function_exists( 'otzi_lite_content_end' ) ) :
	/**
	 * End div id #content
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_content_end() {
		?>
	    </div><!-- #content -->
		<?php
	}
endif;
add_action( 'otzi_lite_after_content', 'otzi_lite_content_end', 10 );

if ( ! function_exists( 'otzi_lite_instagram_sidebar' ) ) :
	/**
	 * Instagram Widget
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_instagram_sidebar() {
		get_sidebar( 'instagram' );
	}
	endif;
add_action( 'otzi_lite_after_content', 'otzi_lite_instagram_sidebar', 20 );

if ( ! function_exists( 'otzi_lite_sidebar' ) ) :
	/**
	 * Footer Sidebar
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_sidebar() {
		get_sidebar( 'footer' );
	}
	endif;
add_action( 'otzi_lite_after_content', 'otzi_lite_sidebar', 20 );

if ( ! function_exists( 'otzi_lite_footer_content_start' ) ) :
	/**
	 * Start footer id #colophon
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_footer_content_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
	    <?php
	}
endif;
add_action('otzi_lite_footer', 'otzi_lite_footer_content_start', 10 );

if ( ! function_exists( 'otzi_lite_site_info_start' ) ) :
	/**
	 * Site Info start
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_site_info_start() { ?>
		<div class="site-info">
	<?php
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_site_info_start', 20 );

if ( ! function_exists( 'otzi_lite_footer_site_description' ) ) :
	/**
	 * Footer Site Description
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_footer_site_description() {
		if ( otzi_lite_get_option( 'disable_tagline_footer' ) ) {
			return;
		}
		?>
        	<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		<?php
		?>
	<?php
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_footer_site_description', 30 );

if ( ! function_exists( 'otzi_lite_social_menu' ) ) :
	/**
	 * Social Menu
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_social_menu() {
		if ( has_nav_menu( 'social' ) ) {
		?>
			<nav class="social-menu" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'otzi-lite' ); ?>">
				<?php wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => '1',
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' )
					);
				?>
			</nav><!-- .social-menu -->
		<?php
        }
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_social_menu', 40 );

if ( ! function_exists( 'otzi_lite_site_info_end' ) ) :
	/**
	 * Site Info end
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_site_info_end() { ?>
		</div><!-- .site-info -->
	<?php
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_site_info_end', 60 );

if ( ! function_exists( 'otzi_lite_footer_content_end' ) ) :
	/**
	 * End footer id #colophon
	 *
	 * @since Otzi Lite 0.1
	 */
	function otzi_lite_footer_content_end() {
		?>
		</footer><!-- #colophon -->
		<?php
	}
	endif;
add_action( 'otzi_lite_footer', 'otzi_lite_footer_content_end', 190 );

if ( ! function_exists( 'otzi_lite_page_end' ) ) :
	/**
	 * End div id #page
	 *
	 * @since Otzi Lite 0.1
	 *
	 */
	function otzi_lite_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'otzi_lite_footer', 'otzi_lite_page_end', 200 );
