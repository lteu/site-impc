<?php

if( ! function_exists( 'wen_business_add_image_in_single_display' ) ) :

  /**
   * Add image in single post
   *
   * @since  WEN Business 1.0
   */
  function wen_business_add_image_in_single_display(){

    global $post;

    if ( has_post_thumbnail() ){

      $values = get_post_meta( $post->ID, 'theme_settings', true );
      $theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';
      $theme_settings_single_image_alignment = isset( $values['single_image_alignment'] ) ? esc_attr( $values['single_image_alignment'] ) : '';

      if ( ! $theme_settings_single_image ) {
        $theme_settings_single_image = wen_business_get_option( 'single_image' );
      }
      if ( ! $theme_settings_single_image_alignment ) {
        $theme_settings_single_image_alignment = wen_business_get_option( 'single_image_alignment' );
      }

      if ( 'disable' != $theme_settings_single_image ) {
        $args = array(
          'class' => 'align' . $theme_settings_single_image_alignment,
        );
        the_post_thumbnail( $theme_settings_single_image, $args );
      }

    }

  }

endif;
add_action( 'wen_business_single_image', 'wen_business_add_image_in_single_display' );



