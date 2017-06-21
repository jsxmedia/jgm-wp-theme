<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JGM2018
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'jgm2018' ); ?></a>

        <?php if ( get_header_image() ) : ?>
            <figure id="site-header">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                </a>
            </figure>
        <?php endif; ?>
        
	<header id="masthead" class="site-header" role="banner">
            <div class="brand-wrapper">
		<div class="site-branding">
			<div class="site-logo-area"><?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        } ?></div>
                    <div class="site-branding-text">
                        <?php
			if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="super-title screen-reader-text"><?php bloginfo( 'name' ); ?></span> <span class="sub-title">Denver Show <span class="jgm-show-year"><?php echo get_theme_mod('jgm_denver_year'); ?></span></span></a></h1>
                            
			<?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><span class="super-title screen-reader-text"><?php bloginfo( 'name' ); ?></span> <span class="sub-title">Denver Show <span class="jgm-show-year"><?php echo get_theme_mod('jgm_denver_year'); ?></span></span></a></p>

			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
                    </div>
                    <p class="show-date"><span class="jgm-show-start"><?php echo get_theme_mod('jgm_denver_start'); ?></span> &ndash; <span class="jgm-show-end"><?php echo get_theme_mod('jgm_denver_end'); ?></span></p>
		</div><!-- .site-branding -->
            </div><!-- .brand-wrapper -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'jgm2018' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
