<?php

/**
 * Add custom CSS
 *
 * @since  WEN Business 1.0
 */

if( ! function_exists( 'wen_business_add_custom_css' ) ) :

  function wen_business_add_custom_css(){

    $custom_css = wen_business_get_option( 'custom_css' );
    $output = '';
    if ( ! empty( $custom_css ) ) {
      $output = "\n" . '<style type="text/css">' . "\n";
      $output .= esc_textarea( $custom_css ) ;
      $output .= "\n" . '</style>' . "\n" ;
    }
    echo $output;

  }

endif;
add_action( 'wp_head', 'wen_business_add_custom_css' );

