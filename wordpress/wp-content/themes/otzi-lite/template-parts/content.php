<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Otzi Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php $categories = get_the_category();
            if ( ! empty( $categories ) ) {
                echo '<a class="entry-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }
		?>
		<?php the_title( sprintf( '<h2 class="entry-subtitle"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">

		<div class="entry-meta">
			<?php otzi_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
	    <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		    <a class="post-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>">
			    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?>
		    </a>
	    <?php endif; ?>

	    <?php
	        if ( strpos( $post->post_content, '<!--more' ) ) {
	            the_content( sprintf(
	                /* translators: %s: Name of current post. */
	                wp_kses( __( 'Continue %s', 'otzi-lite' ), array( 'span' => array( 'class' => array() ) ) ),
	                the_title( '<span class="screen-reader-text">"', '"</span>', false )
	            ) );
	        } else {
	            the_excerpt();
	        }
	    ?>
	</div><!-- .entry-summary -->
</article><!-- #post-## -->