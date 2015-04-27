<?php
/**
 * The template for adding Featured Content Settings in Customizer
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.0 
 */

if ( ! defined( 'FULLFRAME_THEME_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}
	// Featured Content Options
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'fullframe_featured_content_options', array(
		    'capability'     => 'edit_theme_options',
			'description'    => __( 'Options for Featured Content', 'fullframe' ),
		    'priority'       => 400,
		    'title'    		 => __( 'Featured Content Options', 'fullframe' ),
		) );
	}


	$wp_customize->add_section( 'fullframe_featured_content_settings', array(
		'panel'			=> 'fullframe_featured_content_options',
		'priority'		=> 1,
		'title'			=> __( 'Featured Content Settings', 'fullframe' ),
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$fullframe_featured_slider_content_options = fullframe_featured_slider_content_options();
	$choices = array();
	foreach ( $fullframe_featured_slider_content_options as $fullframe_featured_slider_content_option ) {
		$choices[$fullframe_featured_slider_content_option['value']] = $fullframe_featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_option]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Enable Featured Content on', 'fullframe' ),
		'priority'	=> '1',
		'section'  	=> 'fullframe_featured_content_settings',
		'settings' 	=> 'fullframe_theme_options[featured_content_option]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_layout]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_layout'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$fullframe_featured_content_layout_options = fullframe_featured_content_layout_options();
	$choices = array();
	foreach ( $fullframe_featured_content_layout_options as $fullframe_featured_content_layout_option ) {
		$choices[$fullframe_featured_content_layout_option['value']] = $fullframe_featured_content_layout_option['label'];
	}

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_layout]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Featured Content Layout', 'fullframe' ),
		'priority'	=> '2',
		'section'  	=> 'fullframe_featured_content_settings',
		'settings' 	=> 'fullframe_theme_options[featured_content_layout]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_position]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_position'],
		'sanitize_callback' => 'fullframe_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_position]', array(
		'label'		=> __( 'Check to Move above Footer', 'fullframe' ),
		'priority'	=> '3',
		'section'  	=> 'fullframe_featured_content_settings',
		'settings'	=> 'fullframe_theme_options[featured_content_position]',
		'type'		=> 'checkbox',
	) );  

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_slider]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_slider'],
		'sanitize_callback' => 'fullframe_sanitize_checkbox'
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_slider]', array(
		'label'		=> __( 'Check to Enable Sliding Effect', 'fullframe' ),
		'priority'	=> '4',
		'section'  	=> 'fullframe_featured_content_settings',
		'settings'	=> 'fullframe_theme_options[featured_content_slider]',
		'type'		=> 'checkbox',
	) );  

	$wp_customize->add_section( 'fullframe_featured_content_type', array(
		'panel'			=> 'fullframe_featured_content_options',
		'priority'		=> 2,
		'title'			=> __( 'Featured Content Type', 'fullframe' ),
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$fullframe_featured_content_types = fullframe_featured_content_types();
	$choices = array();
	foreach ( $fullframe_featured_content_types as $fullframe_featured_content_type ) {
		$choices[$fullframe_featured_content_type['value']] = $fullframe_featured_content_type['label'];
	}

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_type]', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Content Type', 'fullframe' ),
		'priority'	=> '3',
		'section'  	=> 'fullframe_featured_content_type',
		'settings' 	=> 'fullframe_theme_options[featured_content_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_headline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_headline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_headline]' , array(
		'description'	=> __( 'Leave field empty if you want to remove Headline', 'fullframe' ),
		'label'    		=> __( 'Headline for Featured Content', 'fullframe' ),
		'priority'		=> '4',
		'section'  		=> 'fullframe_featured_content_type',
		'settings' 		=> 'fullframe_theme_options[featured_content_headline]',
		'type'	   		=> 'text',
		)
	);

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_subheadline]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_subheadline'],
		'sanitize_callback'	=> 'wp_kses_post',
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_subheadline]' , array(
		'description'	=> __( 'Leave field empty if you want to remove Sub-headline', 'fullframe' ),
		'label'    		=> __( 'Sub-headline for Featured Content', 'fullframe' ),
		'priority'		=> '5',
		'section'  		=> 'fullframe_featured_content_type',
		'settings' 		=> 'fullframe_theme_options[featured_content_subheadline]',
		'type'	   		=> 'text',
		) 
	);

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_content_number'],
		'sanitize_callback'	=> 'fullframe_sanitize_no_of_slider',
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_content_number]' , array(
		'description'	=> __( 'Save and refresh the page if No. of Featured Content is changed (Max no of Featured Content is 20)', 'fullframe' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Featured Content', 'fullframe' ),
		'priority'		=> '6',
		'section'  		=> 'fullframe_featured_content_type',
		'settings' 		=> 'fullframe_theme_options[featured_content_number]',
		'type'	   		=> 'number',
		) 
	);

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_enable_title]', array(
	        'default'			=> $defaults['featured_content_enable_title'],
			'sanitize_callback'	=> 'fullframe_sanitize_checkbox',
		) );

	$wp_customize->add_control(  'fullframe_theme_options[featured_content_enable_title]', array(
		'label'		=> __( 'Check to Enable Title', 'fullframe' ),
        'priority'	=> '7',
		'section'   => 'fullframe_featured_content_type',
        'settings'  => 'fullframe_theme_options[featured_content_enable_title]',
		'type'		=> 'checkbox',
    ) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_enable_excerpt_content]', array(
	        'default'			=> $defaults['featured_content_enable_excerpt_content'],
			'sanitize_callback'	=> 'fullframe_sanitize_checkbox',
		) );

	$wp_customize->add_control(  'fullframe_theme_options[featured_content_enable_excerpt_content]', array(
		'label'		=> __( 'Check to Enable Excerpt Content', 'fullframe' ),
        'priority'	=> '8',
		'section'   => 'fullframe_featured_content_type',
        'settings'  => 'fullframe_theme_options[featured_content_enable_excerpt_content]',
		'type'		=> 'checkbox',
    ) );

	//loop for featured page content
	for ( $i=1; $i <= $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'fullframe_theme_options[featured_content_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'fullframe_sanitize_page',
		) );

		$wp_customize->add_control( 'fullframe_featured_content_page_'. $i .'', array(
			'label'    	=> __( 'Featured Page', 'fullframe' ) . ' ' . $i ,
			'priority'	=> '7' . $i,
			'section'  	=> 'fullframe_featured_content_type',
			'settings' 	=> 'fullframe_theme_options[featured_content_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );
	}

	$wp_customize->add_section( 'fullframe_featured_content_background_settings', array(
		'panel'			=> 'fullframe_featured_content_options',
		'priority'		=> 3,
		'title'			=> __( 'Featured Content Background Settings', 'fullframe' ),
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_content_background_image]', array(
			'capability'		=> 'edit_theme_options',
			'default'			=> $defaults['featured_content_background_image'],
			'sanitize_callback'	=> 'esc_url_raw',
		) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fullframe_theme_options[featured_content_background_image]', array(
		'label'		=> __( 'Select/Add Background Image', 'fullframe' ),
		'priority'	=> '1',
		'section'   => 'fullframe_featured_content_background_settings',
        'settings'  => 'fullframe_theme_options[featured_content_background_image]',
	) ) );
// Featured Content Setting End