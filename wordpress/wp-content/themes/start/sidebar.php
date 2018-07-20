<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package start
 */

global $layout;
$sidebar_display = get_theme_mod( 'sidebar_col' );

if ($sidebar_display !== "no-sidebar"):
if($layout != 'Disable'): 
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->


<?php endif; endif; ?>