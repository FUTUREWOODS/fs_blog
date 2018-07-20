<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package start
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

  <?php
  global $disable_header;
  $header_width = get_theme_mod( 'header_width', 'full' );
  if($disable_header == 0): ?> 
  <header id="masthead" class="site-header <?php if($header_width == 'contained'): ?>container<?php endif; ?>" role="banner">
    <div class="<?php if($header_width == 'full'): ?>container<?php endif; ?> <?php echo get_theme_mod( 'header_layout', 'header-left' ); ?>">
      <div class="site-branding">
        <?php
        the_custom_logo();
        if ( is_front_page() && is_home() ) : ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <?php
        endif;
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php
        endif; ?>

      </div><!-- .site-branding -->

      <?php 
      global $disable_nav;
      if($disable_nav == 0): ?> 
      <nav class="start_nav main-navigation">
        <label for="menu_toggle" class="menu_toggle">Menu</label>
        <input type="checkbox" id="menu_toggle" />
        <?php
         $startwp_primary_menu = array('theme_location' => 'primary', 'container' => '', 'menu' => '', 'menu_class' => 'menu', 'menu_id' => '', 'walker' => new start_navigation
         );

         $startwp_fallback_menu = array('theme_location' => '', 'container' => '', 'menu' => '', 'menu_class' => 'menu', 'menu_id' => '', 'walker' => new start_navigation
         );
  
         if ( has_nav_menu( 'primary' ) ) {
           wp_nav_menu( $startwp_primary_menu );
          } else {
            wp_nav_menu( $startwp_fallback_menu );
          }  
        ?>
      </nav><!-- #site-navigation -->

    <?php endif; ?>
    </div><!-- .container -->
  </header><!-- #masthead -->
<?php endif; ?>
  

  <div id="content" class="site-content <?php echo startwp_layout(); ?>">

