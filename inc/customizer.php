<?php
/**
 * JGM2018 Theme Customizer
 *
 * @package JGM2018
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function jgm2018_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'jgm2018_customize_register' );

/**
 * Add custom logo support
 */
function jgm2018_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'jgm2018_custom_logo_setup' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function jgm2018_customize_preview_js() {
	wp_enqueue_script( 'jgm2018_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'jgm2018_customize_preview_js' );
