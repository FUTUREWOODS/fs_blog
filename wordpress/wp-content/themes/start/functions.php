<?php
/**
 * start functions and definitions
 *
 * @package start
 */
// Create a helper function for easy SDK access.
function swp_fs() {
    global $swp_fs;

    if ( ! isset( $swp_fs ) ) {
        // Include Freemius SDK.
        require_once dirname(__FILE__) . '/inc/freemius/start.php';

        $swp_fs = fs_dynamic_init( array(
            'id'                  => '1635',
            'slug'                => 'start',
            'type'                => 'theme',
            'public_key'          => 'pk_2854839ea74ccd44fcad40ce57ab8',
            'is_premium'          => false,
            'has_addons'          => false,
            'has_paid_plans'      => false,
            'menu'                => array(
                'first-path'     => 'themes.php',
                'account'        => false,
                'support'        => false,
            ),
        ) );
    }

    return $swp_fs;
}

// Init Freemius.
swp_fs();
// Signal that SDK was initiated.
do_action( 'swp_fs_loaded' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'start_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function start_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on start, use a find and replace
	 * to change 'start' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'start', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Site Logo
	add_theme_support( 'custom-logo', array(
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'start' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

}
endif; // start_setup
add_action( 'after_setup_theme', 'start_setup' );

/**
 * Register widget area.
 */
function start_widgets_init() {
	// Sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'start' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer 1
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 1', 'start' ),
		'id'            => 'footer-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer 2
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 2', 'start' ),
		'id'            => 'footer-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer 3
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 3', 'start' ),
		'id'            => 'footer-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer 4
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area 4', 'start' ),
		'id'            => 'footer-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );	

}
add_action( 'widgets_init', 'start_widgets_init' );

/*
 * Enqueue scripts and styles.
 */
function start_scripts() {
	wp_enqueue_style( 'start-style', get_stylesheet_uri() );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'start_scripts' );


/*
 * Include Kirki
 */
include_once( dirname( __FILE__ ) . '/inc/customizer/kirki/kirki.php' );

/*
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/*
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * Disable Loader Icon
 */
function startwp_disable_customizer_loader( $config ) {
	return wp_parse_args( array(
		'disable_loader'   => true,
	), $config );
}
add_filter( 'kirki/config', 'startwp_disable_customizer_loader' );	

/*
 * No Menu Set Default Text
 */
function no_menu_set(){
	echo "Please assign a Menu to Primary Location";
}


// Comment Fields Placeholder
function start_comment_fields_placeholder( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'start' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name", "start" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email", "start" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "start" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'start_comment_fields_placeholder' );


// Comment Field Textarea Placeholder
function start_textarea_placeholder( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter comment here...", "start" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'start_textarea_placeholder' );


// Comment Field Textarea Position
function start_textarea_position( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'start_textarea_position' );



// comments List Structure
function start_comment_list($comment, $args, $depth) {
if ( 'div' === $args['style'] ) {
    $tag       = 'div';
    $add_below = 'comment';
} else {
    $tag       = 'li';
    $add_below = 'div-comment';
}
?>

<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">

<div class="main_comment">

<?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
<?php endif; ?>
<div class="comment-author vcard">
    <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
     <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
      <br />
<?php endif; ?>

<div class="comment-meta commentmetadata">
		<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">

    <?php
    /* translators: 1: date, 2: time */
    printf( __('<div class="dt">%1$s at %2$s</div>'), get_comment_date(),  get_comment_time() ); ?></a>
</div>

</div>

<div class="comment_text">
<?php comment_text(); ?>
</div>

<div class="er">
<div class="reply">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
</div>
<div class="edit">
	<?php edit_comment_link( __( 'Edit' ), '  ', '' );?>
</div>
<?php if ( 'div' != $args['style'] ) : ?>
</div>
</div>
<?php endif; ?>
<?php
}


// Kirki Filters
add_filter( 'kirki/start/webfonts/skip_hidden', '__return_false' );
add_filter( 'kirki/start/css/skip_hidden', '__return_false' );


// Customizer Styles
function start_customizer_css() {
	wp_enqueue_style( 'start_customizer_css', get_template_directory_uri() . '/inc/customizer/customizer-sections/css/start_customizer.css');
}
add_action( 'customize_controls_print_styles', 'start_customizer_css' );


// Meta Box 
class startwpsettingsMetabox {
	private $screen = array(
		'post',
		'page',
	);
	private $meta_fields = array(
		array(
			'label' => 'Content Layout',
			'id' => 'content_layout',
			'default' => 'container',
			'type' => 'select',
			'options' => array(
				'container' => 'Container',
				'full-width' => 'Full Width',				
			),
		),
		array(
			'label' => 'Select a Sidebar Layout',
			'id' => 'selectasidebarl_57316',
			'default' => 'Customizer',
			'type' => 'select',
			'options' => array(
				'Customizer',
				'Disable',
				'Left',
				'Right',
			),
		),
		array(
			'label' => 'Disable Conatiner Padding',
			'id' => 'disable_container_padding',
			'default' => 'Disable Padding',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Header',
			'id' => 'disableheader_94951',
			'default' => 'Disable Header',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Navigation',
			'id' => 'disablenavigati_49755',
			'default' => 'Disable Navigation',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Featured Image',
			'id' => 'disablefeatured_51092',
			'default' => 'Disable Featured Image',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Title',
			'id' => 'disabletitle_96814',
			'default' => 'Disable Title',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Footer',
			'id' => 'disablefooter_39975',
			'default' => 'Disable Footer',
			'type' => 'checkbox',
		),
		array(
			'label' => 'Disable Copyright',
			'id' => 'disablecopyrigh_51595',
			'default' => 'Disable Copyright',
			'type' => 'checkbox',
		),
	);
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
		add_action( 'save_post', array( $this, 'save_fields' ) );
	}
	public function add_meta_boxes() {
		foreach ( $this->screen as $single_screen ) {
			add_meta_box(
				'startwpsettings',
				__( 'StartWP Settings', 'start' ),
				array( $this, 'meta_box_callback' ),
				$single_screen,
				'side',
				'core'
			);
		}
	}
	public function meta_box_callback( $post ) {
		wp_nonce_field( 'startwpsettings_data', 'startwpsettings_nonce' );
		$this->field_generator( $post );
	}
	public function field_generator( $post ) {
		$output = '';
		foreach ( $this->meta_fields as $meta_field ) {
			$label = '<label for="' . $meta_field['id'] . '">' . $meta_field['label'] . '</label>';
			$meta_value = get_post_meta( $post->ID, $meta_field['id'], true );
			if ( empty( $meta_value ) ) {
				$meta_value = $meta_field['default']; }
			switch ( $meta_field['type'] ) {
				case 'checkbox':
					$input = sprintf(
						'<label class="switch"><input %s id=" % s" name="% s" type="checkbox" value="1"><span class="startwp_switch round"></span></label>',
						$meta_value === '1' ? 'checked' : '',
						$meta_field['id'],
						$meta_field['id']
						);
					break;
				case 'select':
					$input = sprintf(
						'<select id="%s" name="%s">',
						$meta_field['id'],
						$meta_field['id']
					);
					foreach ( $meta_field['options'] as $key => $value ) {
						$meta_field_value = !is_numeric( $key ) ? $key : $value;
						$input .= sprintf(
							'<option %s value="%s">%s</option>',
							$meta_value === $meta_field_value ? 'selected' : '',
							$meta_field_value,
							$value
						);
					}
					$input .= '</select>';
					break;
				default:
					$input = sprintf(
						'<input %s id="%s" name="%s" type="%s" value="%s">',
						$meta_field['type'] !== 'color' ? 'style="width: 100%"' : '',
						$meta_field['id'],
						$meta_field['id'],
						$meta_field['type'],
						$meta_value
					);
			}
			$output .= $this->format_rows( $label, $input );
		}
		echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
	}
	public function format_rows( $label, $input ) {
		return '<tr><th>'.$label.'</th><td>'.$input.'</td></tr>';
	}
	public function save_fields( $post_id ) {
		if ( ! isset( $_POST['startwpsettings_nonce'] ) )
			return $post_id;
		$nonce = $_POST['startwpsettings_nonce'];
		if ( !wp_verify_nonce( $nonce, 'startwpsettings_data' ) )
			return $post_id;
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return $post_id;
		foreach ( $this->meta_fields as $meta_field ) {
			if ( isset( $_POST[ $meta_field['id'] ] ) ) {
				switch ( $meta_field['type'] ) {
					case 'email':
						$_POST[ $meta_field['id'] ] = sanitize_email( $_POST[ $meta_field['id'] ] );
						break;
					case 'text':
						$_POST[ $meta_field['id'] ] = sanitize_text_field( $_POST[ $meta_field['id'] ] );
						break;
				}
				update_post_meta( $post_id, $meta_field['id'], $_POST[ $meta_field['id'] ] );
			} else if ( $meta_field['type'] === 'checkbox' ) {
				update_post_meta( $post_id, $meta_field['id'], '0' );
			}
		}
	}
}
if (class_exists('startwpsettingsMetabox')) {
	new startwpsettingsMetabox;
};

// Meta boxes Global Variables
function startwp_globals(){
while ( have_posts() ) : the_post(); 
   global $container_layout;
   global $layout;
   global $container_padding;
   global $disable_header;
   global $disable_nav;
   global $disable_featured_image;
   global $disable_title;
   global $disable_footer;
   global $disable_copyright;

   $container_layout =  get_post_meta( get_the_ID(), 'content_layout', true );
   $layout =  get_post_meta( get_the_ID(), 'selectasidebarl_57316', true );
   $container_padding =  get_post_meta( get_the_ID(), 'disable_container_padding', true );
   $disable_header =  get_post_meta( get_the_ID(), 'disableheader_94951', true );
   $disable_nav =  get_post_meta( get_the_ID(), 'disablenavigati_49755', true );
   $disable_featured_image =  get_post_meta( get_the_ID(), 'disablefeatured_51092', true );
   $disable_title =  get_post_meta( get_the_ID(), 'disabletitle_96814', true );
   $disable_footer =  get_post_meta( get_the_ID(), 'disablefooter_39975', true );
   $disable_copyright =  get_post_meta( get_the_ID(), 'disablecopyrigh_51595', true );
  endwhile; 
}
add_action('wp_head', 'startwp_globals');


// Start Layouts
function startwp_layout(){
	  // Sidebar Layout
      global $layout;
      if($layout){
      if($layout == 'Left'){
      	echo "left-sidebar";
      }elseif ($layout == 'Right') { 
      	echo "right-sidebar"; 
      }elseif ($layout == 'Customizer') { 
      	 echo get_theme_mod( 'sidebar_col', 'right-sidebar' );
      }
       elseif ($layout == 'Disable') { echo "no-sidebar"; }
      }elseif(is_404()) { echo'page_404'; }
       else{ echo get_theme_mod( 'sidebar_col', 'right-sidebar' );}

      // Conetainer Layout
      global $container_layout;
      if ($container_layout == 'full-width') { 
      	echo " full-width"; 
      }else{ 
      	echo " container"; 
      }

      // Disable Container Padding
      global $container_padding;
      if ($container_padding == 1) { 
      	echo " padding-zero"; 
      }      
}


// Update CSS within in Admin
function start_admin() {
  wp_enqueue_style('start-admin-styles', get_template_directory_uri().'/start-admin.css');
}
add_action('admin_enqueue_scripts', 'start_admin');


// Submenu div add
class start_navigation extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 1, $args = array() ) {
    	$newid = uniqid();
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<label for='drop-$newid' class='sub_toggle show_mobile'>+</label><input type='checkbox' id='drop-$newid' class='show_mobile'/><ul class='sub-menu'>\n";
    }

    function end_lvl( &$output, $depth = 1, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}