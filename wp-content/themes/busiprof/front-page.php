<?php
  $is_front_page = get_option('busiprof_theme_options');
  
  if (  $is_front_page['front_page'] != 'yes' ) {
  get_template_part('index');
  }
  else {	
  		get_header();
  		$current_options=get_option('busiprof_theme_options');
  		?>
<!-- Slider Section of Index Page -->
<?php get_template_part('index', 'slider') ;?>
<!-- Service Section of index Page -->
<?php if($current_options['enable_services']=="on") {
  get_template_part('index', 'services') ;
  }
  ?>
<!-- Projects Section of index Page -->
<?php if($current_options['enable_projects']=="on") {
  get_template_part('index', 'projects') ;
  }
  ?>
<?php get_template_part('index', 'testimonials') ;?>
<!-- footer Section of index Page -->
<?php get_footer() ;
  } ?>