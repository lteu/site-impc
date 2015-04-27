<?php
/**
 * Compose Theme Customizer
 *
 * @package Compose
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function compose_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	// commented out for now $wp_customize->get_setting( 'compose_nav_choice' )->transport = 'postMessage';
}
add_action( 'customize_register', 'compose_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function compose_customize_preview_js() {
	wp_enqueue_script( 'compose_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'compose_customize_preview_js' );
