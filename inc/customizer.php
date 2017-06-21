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
        
        
        // Add Tucson Show Dates section
        $wp_customize->add_section('jgm2018_tucson_dates_section', array(
            'title' => __('Tucson Show Dates', 'jgm2018'),
            'priority' => 30,
            'description' => __('Here you can change the Tucson Show year and show dates displayed in the header.', 'jgm2018')
         ));
        
        // Add Tucson Year input box
        $wp_customize->add_setting( 'jgm_tucson_year',
                array( 
                    'default' => '',
                    'transport' => 'postMessage'
                ) 
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_tucson_year',
                array(
                    'label' => __( 'Year', 'jgm2018' ),
                    'section' => 'jgm2018_tucson_dates_section',
                    'settings' => 'jgm_tucson_year',
                )
        ) );
        
        // Add Tucson Start Date input box
        $wp_customize->add_setting( 'jgm_tucson_start',
                array(
                    'default' => '',
                    'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_tucson_start',
                array(
                    'label' => __( 'Start Date', 'jgm2018' ),
                    'section' => 'jgm2018_tucson_dates_section',
                    'settings' => 'jgm_tucson_start',
                )
        ) );
        
        // Add Tucson End Date input box
        $wp_customize->add_setting( 'jgm_tucson_end',
                array(
                    'default' => '',
                    'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_tucson_end',
                array(
                    'label' => __( 'End Date', 'jgm2018' ),
                    'section' => 'jgm2018_tucson_dates_section',
                    'settings' => 'jgm_tucson_end',
                )
        ) );
        
        
        // Add Denver Show Dates section
        $wp_customize->add_section('jgm2018_denver_dates_section', array(
            'title' => __('Denver Show Dates', 'jgm2018'),
            'priority' => 31,
            'description' => __('Here you can change the Denver Show year and show dates displayed in the header.', 'jgm2018')
         ));
        
        // Add Denver Year input box
        $wp_customize->add_setting( 'jgm_denver_year',
                array( 
                    'default' => '',
                    'transport' => 'postMessage'
                ) 
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_denver_year',
                array(
                    'label' => __( 'Year', 'jgm2018' ),
                    'section' => 'jgm2018_denver_dates_section',
                    'settings' => 'jgm_denver_year',
                )
        ) );
        
        // Add Denver Start Date input box
        $wp_customize->add_setting( 'jgm_denver_start',
                array(
                    'default' => '',
                    'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_denver_start',
                array(
                    'label' => __( 'Start Date', 'jgm2018' ),
                    'section' => 'jgm2018_denver_dates_section',
                    'settings' => 'jgm_denver_start',
                )
        ) );
        
        // Add Denver End Date input box
        $wp_customize->add_setting( 'jgm_denver_end',
                array(
                    'default' => '',
                    'transport' => 'postMessage'
                )
        );
        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'jgm_denver_end',
                array(
                    'label' => __( 'End Date', 'jgm2018' ),
                    'section' => 'jgm2018_denver_dates_section',
                    'settings' => 'jgm_denver_end',
                )
        ) );

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
