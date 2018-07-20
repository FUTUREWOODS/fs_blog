<?php
add_action( 'wp_enqueue_scripts', 'shk_corporate_theme_css',999);
function shk_corporate_theme_css() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme-menu', get_template_directory_uri() . '/css/theme-menu.css' );
	wp_enqueue_style( 'default-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_enqueue_style( 'element-style', get_template_directory_uri() . '/css/element.css' );
	wp_enqueue_style( 'media-responsive' ,get_template_directory_uri() . '/css/media-responsive.css');
	wp_dequeue_style('appointment-default',get_template_directory_uri() .'/css/default.css');
}

require( get_stylesheet_directory() . '/header-widget.php' );
require( get_stylesheet_directory() . '/customizer/customizer-pro.php' );


add_action( 'customize_register','shk_corporate_remove_custom', 1000 );
function shk_corporate_remove_custom($wp_customize) {
  $wp_customize->remove_control('upgrade_pro');
}


function shk_corporate_theme_setup(){
	load_theme_textdomain('shk-corporate', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'shk_corporate_theme_setup');	

 /*
 * Let WordPress manage the document title.
 */
	function shk_corporate_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'shk_corporate_setup' );

add_action( 'widgets_init', 'shk_corporate_widgets_init');
function shk_corporate_widgets_init() {

	register_sidebar( array(
		'name' => __('Sidebar widget area', 'shk-corporate' ),
		'id' => 'sidebar-primary',
		'description' => __( 'Sidebar widget area', 'shk-corporate' ),
		'before_widget' => '<div class="sidebar-widget">',
		'after_widget' => '</div>',
		'before_title' => '<div class="sidebar-widget-title"><h3>',
		'after_title' => '</h3></div>',
	) );

//Header sidebar
	register_sidebar( array(
		'name' => __( 'Top header left area', 'shk-corporate' ),
		'id' => 'home-header-sidebar_left',
		'description' => __('Top header left area', 'shk-corporate' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Top header center area','shk-corporate' ),
		'id' => 'home-header-sidebar_center',
		'description' => __( 'Top header center area', 'shk-corporate' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Top header right area', 'shk-corporate' ),
		'id' => 'home-header-sidebar_right',
		'description' => __( 'Top header right area', 'shk-corporate' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );	
}

function shk_corporate_import_files() {
  return array(
    array(
      'import_file_name'           => 'Demo Import 1',
      'categories'                 => array( 'Category 1', 'Category 2' ),
      'import_file_url'            => 'https://webriti.com/themes/dummydata/appointment/lite/appointment-content.xml',
      'import_widget_file_url'     => 'https://webriti.com/themes/dummydata/appointment/lite/shkcorporate-widget.json',
      'import_customizer_file_url' => 'https://webriti.com/themes/dummydata/appointment/lite/appointment-customize.dat',
      'import_notice'              => sprintf(__( 'Click the large blue button to start the dummy data import process.</br></br>Please be patient while WordPress imports all the content.</br></br>
			<h3>Recommended Plugins</h3>Shk Corporate theme supports the following plugins:</br> </br><li> <a href="https://wordpress.org/plugins/contact-form-7/"> Contact form 7</a> </l1> </br></br> <li> <a href="https://wordpress.org/plugins/bootstrap-3-shortcodes/"> Bootstrap Shortcodes</a> </l1>', 'shk-corporate' )),
			
			
			),
    	
    	
    	
	);
}
add_filter( 'pt-ocdi/import_files', 'shk_corporate_import_files', 999 );


function shk_corporate_after_import_setup() {

	// Menus to assign after import.
	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'primary'   => $main_menu->term_id,
	));
	
 // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );	
	
}
add_action( 'pt-ocdi/after_import', 'shk_corporate_after_import_setup' );	                     
?>