<?php

add_filter( 'wen_business_filter_default_theme_options', 'wen_business_icons_default_options' );

/**
 * Icons defaults.
 *
 * @since  WEN Business 1.0
 */
if( ! function_exists( 'wen_business_icons_default_options' ) ):

  function wen_business_icons_default_options( $input ){

    $input['site_favicon']       = '';
    $input['site_web_clip_icon'] = '';

    return $input;
  }

endif;


add_filter( 'wen_business_theme_options_args', 'wen_business_icons_theme_options_args' );

/**
 * Add icons options.
 *
 * @since  WEN Business 1.0
 */
if( ! function_exists( 'wen_business_icons_theme_options_args' ) ):

  function wen_business_icons_theme_options_args( $args ){

    // Icons Section
    $args['panels']['theme_option_panel']['sections']['section_icons'] = array(
      'title'    => __( 'Icons', 'wen-business' ),
      'priority' => 60,
      'fields'   => array(
        'site_favicon' => array(
          'title'             => __( 'Favicon', 'wen-business' ),
          'type'              => 'image',
          'sanitize_callback' => 'esc_url_raw',
        ),
        'site_web_clip_icon' => array(
          'title'             => __( 'Web Clip Icon', 'wen-business' ),
          'type'              => 'image',
          'sanitize_callback' => 'esc_url_raw',
        ),
      )
    );

    return $args;
  }

endif;
