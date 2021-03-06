<?php
/**
 * 1. lineday_schema
 * 2. lineday_comment_form
 * 3. lineday_comment
 * 4. lineday_attached_image
 * 5. lineday_wp_title
 * 6. lineday_paginate
 * 7. lineday_more_link
 * 8. lineday_password_form
 * 9. lineday_post_nav
 * 10. lineday_truncate_text
 */

/**
 * 1. lineday_schema
 * Schema for HTML, used in header.php
 * Used in header.php
 */
if ( ! ( function_exists( 'lineday_schema' ) ) ):

function lineday_schema() {
    $schema = 'http://schema.org/';

    // Is single post
    if(is_single()) {
        $type = "Article";
    }

    if(is_home()) {
        $type = "BlogPage";
    }

    // Is author page
    elseif( is_author() ) {
        $type = 'ProfilePage';
    }

    // Is search results page
    elseif( is_search() ) {
        $type = 'SearchResultsPage';
    }

    else {
        $type = 'WebPage';
    }

    echo 'itemscope="itemscope" itemtype="' . $schema . $type . '"';
}

endif; // end lineday_schema


/**
 * 2. lineday_comment_form
 * Customized Comment Form
 */
if ( ! function_exists( 'lineday_comment_form' ) ) :

function lineday_comment_form($args) {
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $args['fields'] = array(
        'author' => '
            <div class="comment-form-author form-group">
              <label for="author" class="screen-reader-text">' . __('Author', 'lineday') . '</label>
              <input id="author" name="author" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' placeholder="' . __( 'Your Name', 'lineday' ) . ( $req ? '*' : '' ) . '" />
            </div>
        ',

        'email' => '
            <div class="comment-form-email form-group">
              <label for="email" class="screen-reader-text">' . __('Email', 'lineday') . '</label>
              <input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .    '" size="30"' . ( $req ? " aria-required='true'" : '' ) . ' placeholder="' . __( 'Your Email', 'lineday' ) . ( $req ? '*' : '' ) . '" />
            </div>
        ',

        'url' => '
            <div class="comment-form-url last form-group">
              <label for="url" class="screen-reader-text">' . __('Website', 'lineday') . '</label>
              <input id="url" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . __( 'Your Website', 'lineday' ) . '" />
            </div>
        '
    );
    $args['comment_notes_before'] = "";
    $args['comment_notes_after'] = '';
    $args['label_submit'] = "Submit";
    $args['comment_field'] = '
        <div class="comment-form-comment form-group">
            <textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" placeholder="'. __( 'Your Comment Here ...', 'lineday' ) .'"></textarea>
        </div>
    ';
    return $args;
}
add_filter('comment_form_defaults', 'lineday_comment_form');

endif; // end lineday_comment_form


/**
 * 3. lineday_comment
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
if ( ! function_exists( 'lineday_comment' ) ) :

function lineday_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;

  if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
    <div class="comment-body">
      <?php _e( 'Pingback:', 'lineday' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'lineday' ), '<span class="edit-link"><span" class="glyphicon glyphicon-edit"></span>', '</span>' ); ?>
    </div>

  <?php else : ?>

  <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media" itemscope="itemscope" itemtype="http://schema.org/UserComments">
      <div class="comment-author vcard">
        <a href="#" itemprop="image">
          <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </a>
      </div>

      <div class="media-body">
        <div class="media-body-wrap panel panel-default">

          <div class="panel-heading">
            <h5 class="media-heading" itemprop="name"><?php printf( __( '%s <span class="says">says:</span>', 'lineday' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h5>
            <div class="comment-meta">
              <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <time datetime="<?php comment_time( 'c' ); ?>" itemprop="commentTime">
                  <?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'lineday' ), get_comment_date(), get_comment_time() ); ?>
                </time>
              </a>
              <?php edit_comment_link( __( 'Edit', 'lineday' ), '<span class="edit-link"><span" class="glyphicon glyphicon-edit"></span>', '</span>' ); ?>
            </div>
          </div>

          <?php if ( '0' == $comment->comment_approved ) : ?>
            <div class="alert alert-info">
              <p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lineday' ); ?></p>
            </div>
          <?php endif; ?>

          <div class="comment-content panel-body" itemprop="commentText">
            <?php comment_text(); ?>
          </div><!-- .comment-content -->

          <?php comment_reply_link(
            array_merge(
              $args, array(
                'add_below' => 'div-comment',
                'depth'   => $depth,
                'max_depth' => $args['max_depth'],
                'before'  => '<footer class="reply comment-reply panel-footer">',
                'after'   => '</footer><!-- .reply -->'
              )
            )
          ); ?>

        </div>
      </div><!-- .media-body -->

    </article><!-- .comment-body -->

  <?php
  endif;
}

endif; // end lineday_comment()


/**
 * 4. lineday_attached_image
 * Prints the attached image with a link to the next attached image.
 * Used in image.php
 */
if ( ! function_exists( 'lineday_attached_image' ) ) :

function lineday_attached_image() {
  $post                = get_post();
  $attachment_size     = apply_filters( 'lineday_attachment_size', array( 1200, 1200 ) );
  $next_attachment_url = wp_get_attachment_url();

  /**
   * Grab the IDs of all the image attachments in a gallery so we can get the
   * URL of the next adjacent image in a gallery, or the first image (if
   * we're looking at the last image in a gallery), or, in a gallery of one,
   * just the link to that image file.
   */
  $attachment_ids = get_posts( array(
    'post_parent'    => $post->post_parent,
    'fields'         => 'ids',
    'numberposts'    => -1,
    'post_status'    => 'inherit',
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'order'          => 'ASC',
    'orderby'        => 'menu_order ID'
  ) );

  // If there is more than 1 attachment in a gallery...
  if ( count( $attachment_ids ) > 1 ) {
    foreach ( $attachment_ids as $attachment_id ) {
      if ( $attachment_id == $post->ID ) {
        $next_id = current( $attachment_ids );
        break;
      }
    }

    // get the URL of the next image attachment...
    if ( $next_id )
      $next_attachment_url = get_attachment_link( $next_id );

    // or get the URL of the first image attachment.
    else
      $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
  }

  printf( '<a href="%1$s" title="%2$s" rel="attachment">%3$s</a>',
    esc_url( $next_attachment_url ),
    the_title_attribute( array( 'echo' => false ) ),
    wp_get_attachment_image( $post->ID, $attachment_size )
  );
}

endif; // end lineday_attached_image


/**
 * 5. lineday_wp_title
 * Fix empty title. Replace with posted date.
 */
if ( ! function_exists( 'lineday_wp_title' ) ) :

function lineday_wp_title( $title, $sep ) {
  if (empty($title)) {
      $title = esc_html( get_the_date() );
  }
  return $title;
}
add_filter( 'wp_title', 'lineday_wp_title', 10, 2 );

function lineday_the_title( $title, $id ) {
  if (empty($title)) {
      $title = esc_html( get_the_date() );
  }
  return $title;
}
add_filter( 'the_title', 'lineday_the_title', 10, 2 );

endif; // end lineday_wp_title


/**
 * 6. lineday_paginate
 * Bootstrap Style Pagination
 */
if ( ! function_exists( 'lineday_paginate' ) ) :

function lineday_paginate($args = null) {
  global $wp_query;

  $big = 999999999; // need an unlikely integer
  $paginate_links = paginate_links( array(
    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
    'format' => '?paged=%#%',
    'show_all' => False,
    'end_size' => 1,
    'mid_size' => 2,
    'prev_next' => True,
    'prev_text' => __('&laquo;', 'lineday'),
    'next_text' => __('&raquo;', 'lineday'),
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type' => 'list'
  ) );

  $paginate_links = preg_replace('/page-numbers/', 'page-numbers pagination', $paginate_links, 1);
  echo $paginate_links;
}

endif; // end lineday_paginate

/**
 * 7. lineday_more_link
 * Read more text > bootstrap button.
 */
if ( ! function_exists( 'lineday_more_link' ) ) :
function lineday_more_link( $link, $link_button ) {

    return str_replace( $link_button, '<p><a href="' . get_permalink() . '" class="readmore btn btn-sm btn-primary " title="Read More">' . __( 'Read More', 'lineday' ) . ' </a> </p>', $link );
}
add_filter( 'the_content_more_link', 'lineday_more_link', 10, 2 );

endif; // end lineday_more_link

/**
 * 8. lineday_password_form
 * Bootstrap style for password input adn submit button for password protected post.
 */
if ( ! function_exists( 'lineday_password_form' ) ) :

function lineday_password_form() {
  global $post;
  $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
  $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" class="form-inline">
  ' . __( "This content is password protected. To view it please enter your password below:", 'lineday' ) . '
  <label for="' . $label . '">' . __( "Password: ", 'lineday' ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control" /><input type="submit" class="btn btn-default" name="Submit" value="' . esc_attr__( "Submit", "lineday" ) . '" />
  </form>
  ';
  return $o;
}
add_filter( 'the_password_form', 'lineday_password_form' );

endif; // end lineday_password_form


/**
 * 9. lineday_post_nav
 * Single Post Nav.
 */
if ( ! function_exists( 'lineday_post_nav' ) ) :

function lineday_post_nav() {

  $trunc_limit = 30;
  ?>
  <nav class="navigation post-navigation" role="navigation">
      <h2 class="screen-reader-text"><?php _e( 'Post navigation', 'lineday' ); ?></h2>
      <ul class="pager">

      <?php if( '' != get_previous_post() ) { ?>
        <li class="previous">
          <?php previous_post_link( '<span class="nav-previous">%link</span>', __( '<i class="fa fa-caret-left"></i>', 'lineday' ) . '&nbsp;' . lineday_truncate_text( get_previous_post()->post_title, $trunc_limit ) ); ?>
        </li>
      <?php } // end if ?>

      <?php if( '' != get_next_post() ) { ?>
        <li class="next">
          <?php next_post_link( '<span class="no-previous-page-link nav-next">%link</span>', '&nbsp;' . lineday_truncate_text( get_next_post()->post_title, $trunc_limit ) . '&nbsp;' . __( '<i class="fa fa-caret-right"></i>', 'lineday' ) ); ?>
        </li>
      <?php } // end if ?>

      </ul><!-- .pager -->
  </nav><!-- .navigation -->
<?php
}

endif; // end lineday_post_nav


/**
 * 10. lineday_truncate_text
 * Truncate Text helper for single post nav.
 */
if ( ! function_exists( 'lineday_truncate_text' ) ) :

function lineday_truncate_text( $string, $character_limit = 50, $truncation_indicator = '...' ) {

        $truncated = null == $string ? '' : $string;
    if ( strlen( $string ) >= ( $character_limit + 1 ) ) {

        $truncated = substr( $string, 0, $character_limit );

        if ( substr_count( $truncated, ' ') > 1 ) {
            $last_space = strrpos( $truncated, ' ' );
            $truncated = substr( $truncated, 0, $last_space );
        } // end if

        $truncated = $truncated . $truncation_indicator;

    } // end if/else

    return $truncated;

}

endif; // end lineday_truncate_text
?>
