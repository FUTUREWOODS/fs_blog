<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package start
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<?php 
		global $disable_footer;
		$footer_width = get_theme_mod( 'footer_width', 'full' );
		if($disable_footer == 0):
		$footercol = get_theme_mod( 'footer_layout' );
		if($footercol !== "footer-no"): ?>
		    <div class="footer-area <?php if($footer_width == 'contained'): ?>container<?php endif; ?>">
				<div class="<?php if($footer_width == 'full'): ?>container<?php endif; ?> <?php echo get_theme_mod( 'footer_layout', 'footer-no' ); ?>">

				<?php
				switch ($footercol) {
				    case "footer-one": ?>
					 			<div><?php dynamic_sidebar( 'footer-1' );?></div>
					 			<?php
				        break;
				    case "footer-two": ?>
					 			<div><?php dynamic_sidebar( 'footer-1' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-2' );?></div>
					 			<?php
				        break;
				    case "footer-three": ?>
					 			<div><?php dynamic_sidebar( 'footer-1' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-2' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-3' );?></div>
					 			<?php
				        break;
				     case "footer-four": ?>
					 			<div><?php dynamic_sidebar( 'footer-1' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-2' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-3' );?></div>
					 			<div><?php dynamic_sidebar( 'footer-4' );?></div>
					 			<?php
				        break;
				         default:
				        	
				}
				?>
				
				</div>
			</div>
		<?php endif; endif; ?>

		<?php 
		global $disable_copyright;
		$copyright_width = get_theme_mod( 'copyright_width', 'full' );
		if($disable_copyright == 0): ?>
			<div class="site-info <?php if($copyright_width == 'contained'): ?>container<?php endif; ?>">
				<div class="<?php if($copyright_width == 'full'): ?>container<?php endif; ?>">
				<?php echo get_theme_mod( 'footer_copyright', 'Copyright &copy; 2017 | Powered by StartWP' ); ?>
				</div>
			</div><!-- .site-info -->
		<?php endif; ?>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
