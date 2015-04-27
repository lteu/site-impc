<?php

add_filter( 'wen_business_filter_default_theme_options', 'wen_business_core_default_options' );

/**
 * Core defaults.
 *
 * @since  WEN Business 1.0
 */
if( ! function_exists( 'wen_business_core_default_options' ) ):

  function wen_business_core_default_options( $input ){

    $input['custom_css']         = '*{outline:none;}';
    $input['search_placeholder'] = 'Search...';

    return $input;
  }

endif;


add_filter( 'wen_business_theme_options_args', 'wen_business_core_theme_options_args' );


/**
 * Add core options.
 *
 * @since  WEN Business 1.0
 */
if( ! function_exists( 'wen_business_core_theme_options_args' ) ):

  function wen_business_core_theme_options_args( $args ){

    // Create theme option panel
    $args['panels']['theme_option_panel']['title'] = __( 'Themes Options', 'wen-business' );

    // Advance Section
    $args['panels']['theme_option_panel']['sections']['section_advanced'] = array(
      'title'    => __( 'Advanced', 'wen-business' ),
      'priority' => 1000,
      'fields'   => array(
        'custom_css' => array(
          'title'                => __( 'Custom CSS', 'wen-business' ),
          'type'                 => 'textarea',
          'sanitize_callback'    => 'wp_filter_nohtml_kses',
          'sanitize_js_callback' => 'wp_filter_nohtml_kses',
        ),
      )
    );

    // Search Section
    $args['panels']['theme_option_panel']['sections']['section_search'] = array(
      'title'    => __( 'Search', 'wen-business' ),
      'priority' => 70,
      'fields'   => array(
        'search_placeholder' => array(
          'title'             => __( 'Search Placeholder', 'wen-business' ),
          'type'              => 'text',
          'sanitize_callback' => 'sanitize_text_field',
        ),
      )
    );
    // Social Section
    $args['panels']['theme_option_panel']['sections']['section_social'] = array(
      'title'    => __( 'Social Icons', 'wen-business' ),
      'priority' => 90,
      'fields'   => array(
        'social_icons' => array(
          'title'       => __( 'Social Icons', 'wen-business' ),
          'type'        => 'message',
          'description' => __( 'Please assign social menu.', 'wen-business' ) . ' <a href="' . admin_url( 'customize.php' ).'?autofocus[section]=nav">'.__( 'Assign now', 'wen-business' ) . '</a>',
        ),
      )
    );

    return $args;
  }

endif;
