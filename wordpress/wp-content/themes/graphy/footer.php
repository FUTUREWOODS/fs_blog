<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Graphy
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php get_sidebar( 'footer' ); ?>

		<div class="site-bottom">

			<div class="site-info">
				<div class="site-copyright">
					&copy; <?php echo date( 'Y' ); ?> <a href="http://futurewoods.co.jp/" target="_blank" rel="home">FUTUREWOODS Co., Ltd.</a>
				</div><!-- .site-copyright -->
				
			</div><!-- .site-info -->

		</div><!-- .site-bottom -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
