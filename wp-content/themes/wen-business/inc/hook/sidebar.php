<?php

if( ! function_exists( 'wen_business_add_sidebar' ) ) :

  /**
   * Add sidebar
   *
   * @since  WEN Business 1.0
   */
  function wen_business_add_sidebar(){

    global $post;

    $global_layout       = wen_business_get_option( 'global_layout' );

    // Check if single
    if ( $post && is_singular() ) {
      $post_options = get_post_meta( $post->ID, 'theme_settings', true );
      if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
        $global_layout = $post_options['post_layout'];
      }
    }

    // Include sidebar
    if ( 'no-sidebar' != $global_layout ) {
      get_sidebar();
    }
    if ( 'three-columns' == $global_layout ) {
      get_sidebar( 'secondary' );
    }

  }

endif;
add_action( 'wen_business_action_sidebar', 'wen_business_add_sidebar' );

if( ! function_exists( 'wen_business_add_contact_sidebar' ) ) :

  /**
   * Add contact sidebar
   *
   * @since  WEN Business 1.0
   */
  function wen_business_add_contact_sidebar(){

    global $post;

    $global_layout       = wen_business_get_option( 'global_layout' );

    // Check if single
    if ( $post && is_singular() ) {
      $post_options = get_post_meta( $post->ID, 'theme_settings', true );
      if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
        $global_layout = $post_options['post_layout'];
      }
    }

    // Include sidebar
    if ( 'no-sidebar' != $global_layout ) {
      get_sidebar('contact');
    }
    if ( 'three-columns' == $global_layout ) {
      get_sidebar( 'secondary' );
    }

  }

endif;
add_action( 'wen_business_action_contact_sidebar', 'wen_business_add_contact_sidebar' );
