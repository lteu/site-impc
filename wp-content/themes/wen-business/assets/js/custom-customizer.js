( function( $ ) {

  // Breadcrumb option manager
  function wen_business_breadcrumb_option_manager(){

    var breadcrumb_type = $('#customize-control-theme_options-breadcrumb_type select').val();

    switch(breadcrumb_type) {
      case 'disabled':
      case 'advanced':
          $('#customize-control-theme_options-breadcrumb_separator').hide();
          break;
      case 'simple':
          $('#customize-control-theme_options-breadcrumb_separator').show();
          break;
      default:
          break;
    }

  } // end function

  // Slider option manager
  function wen_business_slider_option_manager(){

    var slider_status = $('#customize-control-theme_options-featured_slider_status select').val();

    switch(slider_status) {
      case 'entire-site':
      case 'home-page':
          $('#customize-control-theme_options-featured_slider_type').show();
          $('#customize-control-theme_options-featured_slider_number').show();
          $('#customize-control-theme_options-featured_slider_category').show();
          break;
      case 'disabled':
          $('#customize-control-theme_options-featured_slider_type').hide();
          $('#customize-control-theme_options-featured_slider_number').hide();
          $('#customize-control-theme_options-featured_slider_category').hide();
          break;
      default:
          break;
    }

  } // end function

  $(document).ready(function($){

    // Breadcrumb
    $('#customize-control-theme_options-breadcrumb_type select')
      .on('change', function(e){
        wen_business_breadcrumb_option_manager();
    });
    wen_business_breadcrumb_option_manager();

    // Slider
    $('#customize-control-theme_options-featured_slider_status select')
      .on('change', function(e){
        wen_business_slider_option_manager();
    });
    wen_business_slider_option_manager();


  });


} )( jQuery );
