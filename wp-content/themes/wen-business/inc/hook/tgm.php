<?php

add_action( 'tgmpa_register', 'wen_business_recommended_plugins' );

if( ! function_exists( 'wen_business_recommended_plugins' ) ) :

  /**
   * Recommended plugins
   *
   * @since  WEN Business 1.0
   */
  function wen_business_recommended_plugins(){

    $plugins = array(
      array(
        'name'     => 'WP-PageNavi',
        'slug'     => 'wp-pagenavi',
        'required' => false,
      ),
      array(
        'name'     => 'Breadcrumb NavXT',
        'slug'     => 'breadcrumb-navxt',
        'required' => false,
      ),
      array(
        'name'     => 'Contact Form 7',
        'slug'     => 'contact-form-7',
        'required' => false,
      ),
    );
    $config = array(
      'dismissable' => true,
    );
    tgmpa( $plugins, $config );

  }

endif;
