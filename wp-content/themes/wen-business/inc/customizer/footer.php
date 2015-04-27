<?php

add_filter( 'wen_business_filter_default_theme_options', 'wen_business_footer_default_options' );
if( ! function_exists( 'wen_business_footer_default_options' ) ):

  /**
   * Footer defaults.
   *
   * @since  WEN Business 1.0
   */
  function wen_business_footer_default_options( $input ){

    $input['copyright_text']  = __( 'Copyright. All rights reserved.', 'wen-business' );
    $input['show_powered_by'] = false;
    $input['go_to_top']       = true;

    return $input;
  }

endif;


add_filter( 'wen_business_theme_options_args', 'wen_business_footer_theme_options_args' );


if( ! function_exists( 'wen_business_footer_theme_options_args' ) ):

  /**
   * Add footer options.
   *
   * @since  WEN Business 1.0
   */
  function wen_business_footer_theme_options_args( $args ){

    // Footer Section
    $args['panels']['theme_option_panel']['sections']['section_footer'] = array(
      'title'    => __( 'Footer', 'wen-business' ),
      'priority' => 80,
      'fields'   => array(
        'copyright_text' => array(
          'title' => __( 'Copyright Text', 'wen-business' ),
          'type'  => 'text',
        ),
        'show_powered_by' => array(
          'title' => __( 'Show Powered By', 'wen-business' ),
          'type'  => 'checkbox',
        ),
        'go_to_top' => array(
          'title' => __( 'Show Go To Top', 'wen-business' ),
          'type'  => 'checkbox',
        ),
      )
    );

    return $args;
  }

endif;
