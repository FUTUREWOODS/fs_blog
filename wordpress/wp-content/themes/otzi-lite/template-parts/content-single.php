<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Otzi Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="entry-thumbnail">
            <?php the_post_thumbnail( 'otzi-featured-image' ); ?>
	    </div><!-- .entry-thumbnail -->
    <?php endif; ?>
	<header class="entry-header">
		<div class="entry-meta">
			<?php otzi_lite_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'otzi-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php otzi_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

