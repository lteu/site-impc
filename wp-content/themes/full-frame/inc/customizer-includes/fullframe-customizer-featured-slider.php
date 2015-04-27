<?php
/**
 * The template for adding Featured Slider Options in Customizer
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
	// Featured Slider
	if( 4 <= get_bloginfo( 'version' ) ) {
		$wp_customize->add_panel( 'fullframe_featured_slider', array(
		    'capability'     => 'edit_theme_options',
		    'description'    => __( 'Featured Slider Options', 'fullframe' ),
		    'priority'       => 500,
			'title'    		 => __( 'Featured Slider Options', 'fullframe' ),
		) );
	}

	$wp_customize->add_section( 'fullframe_featured_slider', array(
		'panel'			=> 'fullframe_featured_slider',
		'priority'		=> 1,
		'title'			=> __( 'Featured Slider Settings', 'fullframe' ),
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slider_option]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_option'],
		'sanitize_callback' => 'sanitize_key',
	) );

	$featured_slider_content_options = fullframe_featured_slider_content_options();
	$choices = array();
	foreach ( $featured_slider_content_options as $featured_slider_content_option ) {
		$choices[$featured_slider_content_option['value']] = $featured_slider_content_option['label'];
	}

	$wp_customize->add_control( 'fullframe_featured_slider_option', array(
		'choices'   => $choices,
		'label'    	=> __( 'Enable Slider on', 'fullframe' ),
		'priority'	=> '1.1',
		'section'  	=> 'fullframe_featured_slider',
		'settings' 	=> 'fullframe_theme_options[featured_slider_option]',
		'type'    	=> 'select',
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slide_transition_effect]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_effect'],
		'sanitize_callback'	=> 'fullframe_sanitize_featured_slide_transition_effects',
	) );

	$fullframe_featured_slide_transition_effects = fullframe_featured_slide_transition_effects();
	$choices = array();
	foreach ( $fullframe_featured_slide_transition_effects as $fullframe_featured_slide_transition_effect ) {
		$choices[$fullframe_featured_slide_transition_effect['value']] = $fullframe_featured_slide_transition_effect['label'];
	}

	$wp_customize->add_control( 'fullframe_theme_options[featured_slide_transition_effect]' , array(
		'choices'  	=> $choices,
		'label'		=> __( 'Transition Effect', 'fullframe' ),
		'priority'	=> '2',
		'section'  	=> 'fullframe_featured_slider',
		'settings' 	=> 'fullframe_theme_options[featured_slide_transition_effect]',
		'type'	  	=> 'select',
		)
	);

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slide_transition_delay]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_delay'],
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_slide_transition_delay]' , array(
		'description'	=> __( 'seconds(s)', 'fullframe' ),
		'input_attrs' => array(
            'style' => 'width: 40px;'
        	),
		'label'    		=> __( 'Transition Delay', 'fullframe' ),
		'priority'		=> '2.1.1',
		'section'  		=> 'fullframe_featured_slider',
		'settings' 		=> 'fullframe_theme_options[featured_slide_transition_delay]',
		)
	);

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slide_transition_length]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_transition_length'],
		'sanitize_callback'	=> 'absint',
	) );

	$wp_customize->add_control( 'fullframe_theme_options[featured_slide_transition_length]' , array(
		'description'	=> __( 'seconds(s)', 'fullframe' ),
		'input_attrs' => array(
	            'style' => 'width: 40px;'
            	),
		'label'    		=> __( 'Transition Length', 'fullframe' ),
		'priority'		=> '2.1.2',
		'section'  		=> 'fullframe_featured_slider',
		'settings' 		=> 'fullframe_theme_options[featured_slide_transition_length]',
		)
	);

	$wp_customize->add_section( 'fullframe_featured_slider_type', array(
		'panel'			=> 'fullframe_featured_slider',
		'priority'		=> 2,
		'title'			=> __( 'Featured Slider Type', 'fullframe' ),
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slider_type]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slider_type'],
		'sanitize_callback'	=> 'sanitize_key',
	) );

	$featured_slider_types = fullframe_featured_slider_types();
	$choices = array();
	foreach ( $featured_slider_types as $featured_slider_type ) {
		$choices[$featured_slider_type['value']] = $featured_slider_type['label'];
	}

	$wp_customize->add_control( 'fullframe_featured_slider_type', array(
		'choices'  	=> $choices,
		'label'    	=> __( 'Select Slider Type', 'fullframe' ),
		'priority'	=> '2.1.3',
		'section'  	=> 'fullframe_featured_slider_type',
		'settings' 	=> 'fullframe_theme_options[featured_slider_type]',
		'type'	  	=> 'select',
	) );

	$wp_customize->add_setting( 'fullframe_theme_options[featured_slide_number]', array(
		'capability'		=> 'edit_theme_options',
		'default'			=> $defaults['featured_slide_number'],
		'sanitize_callback'	=> 'fullframe_sanitize_no_of_slider',
	) );

	$wp_customize->add_control( 'fullframe_featured_slide_number' , array(
		'description'	=> __( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'fullframe' ),
		'input_attrs' 	=> array(
            'style' => 'width: 45px;',
            'min'   => 0,
            'max'   => 20,
            'step'  => 1,
        	),
		'label'    		=> __( 'No of Slides', 'fullframe' ),
		'priority'		=> '2.1.4',
		'section'  		=> 'fullframe_featured_slider_type',
		'settings' 		=> 'fullframe_theme_options[featured_slide_number]',
		'type'	   		=> 'number',
		)
	);

	//loop for featured page sliders
	for ( $i=1; $i <= $options['featured_slide_number'] ; $i++ ) {
		$wp_customize->add_setting( 'fullframe_theme_options[featured_slider_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'fullframe_sanitize_page',
		) );

		$wp_customize->add_control( 'fullframe_featured_slider_page_'. $i .'', array(
			'label'    	=> __( 'Featured Page', 'fullframe' ) . ' # ' . $i ,
			'priority'	=> '4' . $i,
			'section'  	=> 'fullframe_featured_slider_type',
			'settings' 	=> 'fullframe_theme_options[featured_slider_page_'. $i .']',
			'type'	   	=> 'dropdown-pages',
		) );
	}
// Featured Slider End