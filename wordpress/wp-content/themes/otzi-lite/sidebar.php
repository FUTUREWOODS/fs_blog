<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Otzi Lite
 */
if ( ! is_active_sidebar( 'primary-sidebar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">

    <?php if ( get_the_author_meta( 'description' ) != '' ) : ?>
        <div class="widget" id="author-box">
            <h4 class="widget-title"><?php the_author_meta( 'display_name' ) ?></h4>
		    <?php if ( function_exists( 'get_avatar' ) ) { echo get_avatar( get_the_author_meta( 'email' ), '223' ); }?>
			    <p><?php the_author_meta( 'description' ) ?></p>
		</div><!-- .widget -->

	<?php endif; // No description, no box ;) ?>

	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->