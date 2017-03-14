<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package jov
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'jov' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
      <div class="container">
        <div class="site-branding row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php $logo = get_field('custom_logo', 'option'); ?>
                <?php if ($logo): ?>
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logo; ?>" width="250px"></a>
                </div>
                <?php else: ?>
                <h1 class="site-title text-center">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </h1>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="social">
                  <a class="fb" href="https://www.facebook.com/jovincentglassdesigners" target="_blank"><i class="fa fa-facebook-square"></i></a>
                  <a class="tw" href="https://twitter.com/jovincentglass" target="_blank"><i class="fa fa-twitter-square"></i></a>
                  <a class="pn" href="https://www.pinterest.com/jovincentglass/" target="_blank"><i class="fa fa-pinterest-square"></i></a>
                  <a class="ig" href="https://instagram.com/jovincentglass" target="_blank"><i class="fa fa-instagram"></i></a>
              </div>
                <div class="phone_email">
                    <h3><span>Telephone</span> <?php echo the_field('phone', 'option'); ?></h3>
                    <p>Email <a href="mailto:<?php echo the_field('email', 'option'); ?>"><?php echo the_field('email', 'option'); ?></a></p>
                </div>
            </div>
		</div><!-- .site-branding -->
		<?php /*<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'jov' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation --> */?>
      </div>
	</header><!-- #masthead -->
        
	<div id="content" class="site-content container-fluid">
