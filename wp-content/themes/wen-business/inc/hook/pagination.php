<?php

if ( ! function_exists( 'wen_business_custom_posts_navigation' ) ) :

  /**
   * Posts navigation
   *
   * @since WEN Business 1.0
   *
   */
  function wen_business_custom_posts_navigation() {

    $pagination_type = wen_business_get_option( 'pagination_type' );

    switch ( $pagination_type ) {

      case 'default':
        if ( function_exists( 'the_posts_navigation' ) ) {
          the_posts_navigation();
        }
        else{
          wen_business_the_posts_navigation();
        }
        break;

      case 'numeric':
        if ( function_exists( 'wp_pagenavi' ) ){
          wp_pagenavi();
        }
        else{
          if ( function_exists( 'the_posts_navigation' ) ) {
            the_posts_navigation();
          }
          else{
            wen_business_the_posts_navigation();
          }
        }
        break;

      default:
        break;
    }

  }
endif;
add_action( 'wen_business_action_posts_navigation', 'wen_business_custom_posts_navigation' );

