<?php
/**
 * Compose functions and definitions
 *
 * @package Compose
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 745; /* pixels */
}

if ( ! function_exists( 'compose_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function compose_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Compose, use a find and replace
	 * to change 'compose' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'compose', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	add_image_size('featured-image', 745, 420, true );
	
	/*
	 * Compatible with v4.1
	 */
	// add_theme_support( 'title-tag' );
	
	// Excerpt
	
	function compose_new_excerpt_more( $more ) {
		return '</p><a class="btn btn-xs btn-info read-more" href="'. get_permalink( get_the_ID() ) . '" role="button">' . __('read more', 'compose') . '</a>';
		}
	add_filter( 'excerpt_more', 'compose_new_excerpt_more' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'compose' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Add CSS class to comment input
	
	add_filter( 'comment_form_default_fields', 'compose_comment_form_fields' );
	
    function compose_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();
		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5 = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
		$fields = array(
		'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' , 'compose' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
		'email' => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' , 'compose' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
		'url' => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' , 'compose' ) . '</label> ' .
		'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>',
		);
    return $fields;
    }
	
	add_filter( 'comment_form_defaults', 'compose_comment_form' );
	
    function compose_comment_form( $args ) {
		$args['comment_field'] = '<div class="form-group comment-form-comment">
		<label for="comment">' . _x( 'Comment', 'noun', 'compose' ) . '</label>
		<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</div>';
    return $args;
    }
	
	add_action('comment_form', 'compose_comment_button' );
    function compose_comment_button() {
    echo '<button class="btn btn-info" type="submit">' . __( 'Post Comment' , 'compose' ) . '</button>';
    }

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'compose_custom_background_args', array(
		 'default-color' => 'ffffff',
		// 'default-image' => '',
	 ) ) );
	}
	endif; // compose_setup
	
	add_action( 'after_setup_theme', 'compose_setup' );
	
	// Custom search form
	function compose_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform clearfix" action="' . home_url( '/' ) . '" >
	<div class="form-group clearfix"><label class="screen-reader-text" for="s">' . __( 'Search for:' , 'compose' ) . '</label>
	<div class="col-xs-6"><input class="form-control" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="type and hit enter" /></div></div>
	<div class="form-group"><input type="submit" id="search-submit" class="btn btn-primary btn-xs" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form>';
	return $form; }
	add_filter( 'get_search_form', 'compose_search_form' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function compose_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'compose' ),
		'id'            => 'sidebar-1',
		'description'   => __('Main sitewide Sidebar', 'compose' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'compose' ),
		'id'            => 'footer-1',
		'description'   => __('Left most Footer widget', 'compose' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'compose' ),
		'id'            => 'footer-2',
		'description'   => __('2nd from left Footer widget', 'compose' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'compose' ),
		'id'            => 'footer-3',
		'description'   => __('2nd from right Footer widget', 'compose' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'compose' ),
		'id'            => 'footer-4',
		'description'   => __('Right most Footer widget', 'compose' ),
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'compose_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function compose_scripts() {
	
	wp_enqueue_style( 'compose-bootstrap', get_template_directory_uri() . '/bootstrap.min.css' ); // Bootstrap CSS for Compose
	
	wp_enqueue_style( 'compose-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'compose-googlefont', 'http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,300italic,600,600italic,700,700italic,800,800italic|Source+Sans+Pro:400,300,200italic,200,300italic,400italic,600,600italic,700,700italic,900,900italic'); // Google Font
	
	wp_enqueue_style( 'compose-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css'); // Font Awesome
	
	wp_enqueue_script('jquery', false, '1.11.1', true ); // WordPress jQuery
	
	wp_enqueue_script( 'compose-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.2', true ); // Bootstrap JS for Compose
		
	wp_enqueue_script( 'compose-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'compose-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
		
	wp_enqueue_script( 'compose-fitvid', get_template_directory_uri() . '/js/fitvid.js', array(), '1.0', true ); // Fitvid
	
	wp_enqueue_script( 'compose-themejs', get_template_directory_uri() . '/js/theme.js', array(), '1.0', true ); // Theme JS

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'compose_scripts' );


/**
 * Load Editor css style
 */
add_theme_support('editor_style');

function compose_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'admin_init', 'compose_add_editor_styles' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Navigation Walker

require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Breadcrumbs

function compose_the_breadcrumb() {
    global $post;
    echo '<ul>';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo __( 'Home' , 'compose' );
        echo '</a></li><li class="separator"> / </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li class="separator"> / </li><li> ');
            if (is_single()) {
                echo '</li><li class="separator"> / </li><li>';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } else {
                echo '<li><strong> '.get_the_title().'</strong></li>';
            }
        }
    }
    echo '</ul>';
}

if ( ! function_exists( 'compose_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 * Imported from the Twenty Fourteen theme
 */
function compose_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'compose_attachment_size', array( 745, 450 ) );
	$next_attachment_url = wp_get_attachment_url();

	/*
	 * Grab the IDs of all the image attachments in a gallery so we can get the URL
	 * of the next adjacent image in a gallery, or the first image (if we're
	 * looking at the last image in a gallery), or, in a gallery of one, just the
	 * link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		// or get the URL of the first image attachment.
		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;


// Add excerpts to Pages
add_action( 'init', 'compose_add_excerpts_to_pages' );
function compose_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}


// ------------------------
// Compose Theme Customizer
// ------------------------

function compose_theme_customizer( $wp_customize ) {

	// *********************************************************
    // Main Settings - Home Page Width, Blog Layout, Logo Upload
	// *********************************************************
	$wp_customize->add_section( 'compose_main_section' , array(
		 'title' 				=> __( 'Main Settings' , 'compose' ),
		 'description' 			=> __( 'Home Page Width applies only to the "Home" templates. Blog Layout applies only to your Posts.' , 'compose' ),
		 'priority' 			=> 1,
	) );
	
		// Home Templates Width
		// --------------------
		$wp_customize->add_setting( 'compose_site_width', array( 'default' => 'full', 'sanitize_callback' => 'sanitize_passthrough' ) );
			
			$wp_customize->add_control('compose_site_width', array(
				'section' 		=> 'compose_main_section',
				'label' 		=> __( 'Home Page Width' , 'compose' ),
				'type' 			=> 'select',
				'choices'  		=> array(
							'full'	=> __( 'Full Width' , 'compose' ),
							'boxed'	=> __( 'Boxed' , 'compose' ),
						),
			));
		
		// Blog Layout
		// -----------
		$wp_customize->add_setting( 'compose_site_layout', array( 'default' => 'right', 'sanitize_callback' => 'sanitize_passthrough' ) );
		
			$wp_customize->add_control('compose_site_layout', array(
				'section' 		=> 'compose_main_section',
				'label' 		=> __( 'Blog Layout', 'compose' ),
				'type' 			=> 'select',
				'choices'  		=> array(
							'left'	=> __( 'Align Sidebar Left' , 'compose' ),
							'right'	=> __( 'Align Sidebar Right' , 'compose' ),
						),
			)); 
		
		// Logo Upload
		// -----------
		$wp_customize->add_setting( 'compose_logo', array ( 'sanitize_callback' => 'esc_url_raw' ) );
		
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'compose_logo', array(
				'section' 		=> 'compose_main_section',
				'label' 		=> __( 'Upload your logo' , 'compose' ),
				'context' 		=> 'compose',
			) ) );
		
		
	// ******	
	// Colors
	// ******
	$wp_customize -> get_section( 'colors' )
		-> description	=	__( 'Save your color settings and refresh the page to preview your changes.', 'compose' );
		
		// Link Color
		// -----------
		$wp_customize->add_setting( 'compose_link_color', array( 'default' => '#337ab7', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, 'compose_link_color', array(
						'section'    => 'colors',
						'settings'   => 'compose_link_color',
						'label'      => __( 'Link Color' , 'compose' ),
						)
				)
			);
	
		// Link Hover Color
		// ----------------
		$wp_customize->add_setting( 'compose_link_hover_color', array( 'default' => '#F99111', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, 'compose_link_hover_color', array(
						'section'    => 'colors',
						'settings'   => 'compose_link_hover_color',
						'label'      => __( 'Link Hover Color' , 'compose' ),
					)
				)
			);
	
		// Footer Background
		// -----------------
		$wp_customize->add_setting( 'compose_frbg_color', array( 'default' => '#fafafa', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, 'compose_frbg_color', array(
						'section'    => 'colors',
						'settings'   => 'compose_frbg_color',
						'label'      => __( 'Footer Background' , 'compose' ),
					)
				)
			);
		
		
	// **********
	// Navigation
	// **********
	$wp_customize -> get_section( 'nav' )
		-> description	=	__( 'Your theme supports one menu, you can select the menu type here.', 'compose' );
		
		// Navigation Choice
		// -----------------
		$wp_customize->add_setting( 'compose_nav_choice', array( 'default' => 'single', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_passthrough' ) );
		
			$wp_customize->add_control( 'compose_nav_choice', array(
						'section'  	=> 'nav',
						'settings' 	=> 'compose_nav_choice',
						'label'    	=> __( 'Menu Type' , 'compose' ),
						'type'     	=> 'select',
						'default'	=> 'single',
						'choices'	=> array(
							'multi'		=> __( 'Multi Level' , 'compose' ),
							'single'	=> __( 'Single Level' , 'compose' ),
					),
				)
			);
		
		// Navigation background
		// ---------------------
		$wp_customize->add_setting( 'compose_navbg_color', array( 'default' => '#222222', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'compose_navbg_color', array(
						'section'   => 'nav',
						'settings'  => 'compose_navbg_color',
						'label'     => __( 'Menu Background' , 'compose' ),
					)
				)
			);
			
		// Navigation background hover
		// ---------------------------
		$wp_customize->add_setting( 'compose_navbghover_color', array( 'default' => '#111111', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
			new WP_Customize_Color_Control( $wp_customize, 'compose_navbghover_color', array(
						'section'    => 'nav',
						'settings'   => 'compose_navbghover_color',
						'label'      => __( 'Menu Background, Active + Hover' , 'compose' ),
					)
				)
			);
		
		// Navigation link color
		// ---------------------
		$wp_customize->add_setting( 'compose_navbglink_color', array( 'default' => '#ffffff', 'transport' => 'postMessage', 'sanitize_callback' => 'sanitize_hex_color' ) );
		
			$wp_customize->add_control(
				new WP_Customize_Color_Control( $wp_customize, 'compose_navbglink_color', array(
						'section'    => 'nav',
						'settings'   => 'compose_navbglink_color',
						'label'      => __( 'Menu Links (overwrites Link Color on Navigation)' , 'compose' ),
					)
				)
			);
	

	// **************
	// Home Templates
	// **************
	
		// Main Panel
		// **********
		$wp_customize->add_panel( 'home_panel', array(
			'title'         	=> __( 'Home Template' , 'compose' ),
			'description'		=> __( 'Customize your "Home" template with featured content, call to actions and a preview section' , 'compose' ),
		) );
			
			// Panel Sections
			// **************			
			
			
			// Featured Page
			// -------------
			$wp_customize->add_section( 'compose_homepage_section', array(
				'panel'  		=> 'home_panel',
				'title'         => __( '"Home" Template' , 'compose' ),
				'description'   => __( 'Select a single "Page" to feature. Featured image will be used as background. Title and excerpt will also be used.' , 'compose' ),
				'priority' 		=> 1,
			) );
			
				$wp_customize->add_setting( 'compose_page_featured', array( 'sanitize_callback' => 'sanitize_passthrough' ));
					
					$wp_customize->add_control('compose_page_featured', array(
						'section' 		=> 'compose_homepage_section',
						'label' 		=> __( 'Select a Page' , 'compose' ),
						'type' 			=> 'dropdown-pages',
						'priority' => 1,
					));
					
				$wp_customize->add_setting( 'compose_featured_button', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control( 'compose_featured_button', array(
						'section' 		=> 'compose_homepage_section',
						'label' 		=> __( 'Customize "Read More"' , 'compose' ),
						'type' 			=> 'text',
						'priority' => 2,
					) );
		
			
			// Carousel Category
			// -----------------
			$wp_customize->add_section( 'compose_homepage_carousel', array(
				'panel'  		=> 'home_panel',
				'title'         => __( '"Home Carousel" Template' , 'compose' ),
				'description'   => __( 'Select a single "Category" to feature as a carousel. The three latest Posts will be used. Featured images will be used as background. Titles and excerpts will also be used.' , 'compose' ),
				'priority' 		=> 2,
			) );
				
				$wp_customize->add_setting( 'compose_carousel_category', array( 'sanitize_callback' => 'sanitize_passthrough' ));
					
					$wp_customize->add_control( new WP_Customize_Category_Control( $wp_customize, 'compose_carousel_category', array(
						'section'  => 'compose_homepage_carousel',
						'label'    => __('Select a Category', 'compose'),
						'settings' => 'compose_carousel_category',
					) ) );
					
				
			// Call to Action
			// --------------
			$wp_customize->add_section( 'compose_action', array(
				'panel'  		=> 'home_panel',
				'title'         => __( 'Call to Action' , 'compose' ),
				'description'   => __( 'Set a call to action invitation' , 'compose' ),
				'priority'		=> 3,
			) );
			
				$wp_customize->add_setting( 'compose_call_to_action', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control( 'compose_call_to_action', array(
						'section' 		=> 'compose_action',
						'label' 		=> __( 'Call to Action text' , 'compose' ),
						'type' 			=> 'textarea',
					) );
				
				$wp_customize->add_setting( 'compose_call_to_action_icon', array( 'sanitize_callback' => 'sanitize_passthrough'  ) );
				
					$wp_customize->add_control( 'compose_call_to_action_icon', array(
						'section' 		=> 'compose_action',
						'label' 		=> __( 'Call to Action button icon' , 'compose' ),
						'type' 			=> 'text',
						'input_attrs' 	=> array(
									'placeholder' => 'e.g. fa-cloud-download',
								),
					) );
					
				$wp_customize->add_setting( 'compose_call_to_action_text', array ( 'sanitize_callback' => 'sanitize_passthrough' ));
				
					$wp_customize->add_control( 'compose_call_to_action_text', array(
						'section' 		=> 'compose_action',
						'label' 		=> __( 'Call to Action button text' , 'compose' ),
						'type' 			=> 'text',
					) );
					
				$wp_customize->add_setting( 'compose_call_to_action_link', array ( 'sanitize_callback' => 'esc_url_raw' ) );

					$wp_customize->add_control( 'compose_call_to_action_link', array(
						'section' 		=> 'compose_action',
						'label' 		=> __( 'Call to Action button link' , 'compose' ),
						'type' 			=> 'url',
						'input_attrs' 	=> array(
									'placeholder' => 'http://www.google.com',
								),
					) );
				
				
			// Featured Grid
			// -------------
			$wp_customize->add_section( 'compose_grid', array(
				'panel' 		=> 'home_panel',
				'title'         => __( 'Feature Grid' , 'compose' ),
				'description'  	=> __( 'Select pages to feature in 3 section grid. NOTE: First Page is required to show the section. Icons are optional.' , 'compose' ),
				'priority'		=> 4,
			) );
				
				$wp_customize->add_setting( 'compose_grid_one_icon', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control( 'compose_grid_one_icon', array(
						'section' 		=> 'compose_grid',
						'label' 		=> __( 'First Icon' , 'compose' ),
						'type' 			=> 'text',
						'priority'		=> 1,
						'input_attrs' 	=> array(
									'placeholder' => 'e.g. fa-check',
								),
					) );
					
				$wp_customize->add_setting( 'compose_grid_one', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control('compose_grid_one', array(
						'section' 		=> 'compose_grid',
						'settings'  	=> 'compose_grid_one',
						'label' 		=> __( 'First Page' , 'compose' ),
						'type' 			=> 'dropdown-pages',
						'priority'		=> 2,
					));
					
				$wp_customize->add_setting( 'compose_grid_two_icon', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control( 'compose_grid_two_icon', array(
						'section' 		=> 'compose_grid',
						'label' 		=> __( 'Second Icon' , 'compose' ),
						'type' 			=> 'text',
						'priority'		=> 3,
						'input_attrs' 	=> array(
									'placeholder' => 'e.g. fa-rocket',
								),
					) );
				
				$wp_customize->add_setting( 'compose_grid_two', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
								
					$wp_customize->add_control('compose_grid_two', array(
						'section' 		=> 'compose_grid',
						'settings'   	=> 'compose_grid_two',
						'label' 		=> __( 'Third Page' , 'compose' ),
						'type' 			=> 'dropdown-pages',
						'priority'		=> 4,
					));
				
				$wp_customize->add_setting( 'compose_grid_three_icon', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control( 'compose_grid_three_icon', array(
						'section'		=> 'compose_grid',
						'label' 		=> __( 'Third Icon' , 'compose' ),
						'type' 			=> 'text',
						'priority'		=> 5,
						'input_attrs' 	=> array(
									'placeholder' => 'e.g. fa-cogs',
								),
					) );
					
				$wp_customize->add_setting( 'compose_grid_three', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
					$wp_customize->add_control('compose_grid_three', array(
						'section' 		=> 'compose_grid',
						'settings'   	=> 'compose_grid_three',
						'label' 		=> __( 'Third Page' , 'compose' ),
						'type'			=> 'dropdown-pages',
						'priority'		=> 6,
					));
					
			
			// Preview Section
			// ---------------
			
			$wp_customize->add_section( 'compose_preview', array(
				'panel' 		=> 'home_panel',
				'title'         => __( 'Preview Section' , 'compose' ),
				'description'  	=> __( 'Add content to serve as a preview, you can even upload an image (the image will not show unless Content is entered).' , 'compose' ),
				'priority'		=> 5,
			) );
			
				
				$wp_customize->add_setting( 'compose_preview_text', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
				
						$wp_customize->add_control( 'compose_preview_text', array(
							'section' 		=> 'compose_preview',
							'settings'   	=> 'compose_preview_text',
							'label' 		=> __( 'Preview Content' , 'compose' ),
							'type' 			=> 'textarea',
							'priority'		=> 1,
						) );
						
				$wp_customize->add_setting( 'compose_preview_image', array ( 'sanitize_callback' => 'sanitize_passthrough' ) );
						
						$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'compose_preview_image', array(
							'section' 		=> 'compose_preview',
							'settings'   	=> 'compose_preview_image',
							'label' 		=> __( 'Preview Image' , 'compose' ),
						) ) );
			
			
	// ***********
	// Quick Links
	// ***********
		$wp_customize->add_section( 'compose_quicklinks' , array(
			 'title' 			=> __( 'Quick Links' , 'compose' ),
			 'description'		=> __( '<strong><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9LKN8649QEUVG">Fund Compose development. Make a Donation. Suggested: $10</a></strong><br />.<br /><strong><a href="http://www.weborithm.com/compose/wordpress-documentation/">Compose Documentation</a></strong><br /><strong><a href="https://wordpress.org/support/view/theme-reviews/compose-wp#postform">Rate our theme on WordPress</a></strong><br />.<br />.<br />.<br />.<br />.' , 'compose' ),
		) );
		
			// Empty Field...coz
			$wp_customize->add_setting( 'compose_empty', array( 'sanitize_callback' => 'sanitize_passthrough' ));
				
				$wp_customize->add_control( 'compose_empty', array(
					'section' 		=> 'compose_quicklinks',
					'label' 		=> __( '-' , 'compose' ),
					'type'			=> 'url',
				) );
	
	// if ( $wp_customize->is_preview() && ! is_admin() ) {
    // add_action( 'wp_footer', 'compose_theme_customizer', 20); }
	
}
add_action('customize_register', 'compose_theme_customizer');


// ---------------------------------------
// Category Drop Down for Theme Customizer
// ---------------------------------------

if (class_exists('WP_Customize_Control')) {
    class WP_Customize_Category_Control extends WP_Customize_Control {

        public function render_content() {
            $dropdown = wp_dropdown_categories(
                array(
                    'name'              => '_customize-dropdown-categories-' . $this->id,
                    'echo'              => 0,
                    'show_option_none'  => __( '&mdash; Select &mdash;' , 'compose' ),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
 
            $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
 
            printf(
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}


// -------------------
// Sanitize Everything
// -------------------

function sanitize_passthrough( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}


// ------------------
// CSS via Customizer
// ------------------

function compose_customizer_css() {
    ?>
    <style type="text/css">
		/* Links */
        a, .btn-link { color: <?php echo get_theme_mod( 'compose_link_color' ); ?>; }
		a:hover, .btn-link:hover { color: <?php echo get_theme_mod( 'compose_link_hover_color' ); ?>; }
		
		/* Footer Background */
		.compose-footer { background: <?php echo get_theme_mod( 'compose_frbg_color' ); ?>; }
		
		/* Menu Background */
		.navbar {
			background-color: <?php echo get_theme_mod( 'compose_navbg_color' ); ?>;
			border-color: <?php echo get_theme_mod( 'compose_navbg_color' ); ?>; }
		.primary-navigation ul ul { background-color: <?php echo get_theme_mod( 'compose_navbg_color' ); ?>; }
			
		/* Menu Links */
		.navbar .nav > li > a { color: <?php echo get_theme_mod( 'compose_navbglink_color' ); ?>; }
		.navbar .nav li.dropdown > .dropdown-toggle .caret { border-top-color: <?php echo get_theme_mod( 'compose_navbglink_color' ); ?>; }
		.primary-navigation a { color: <?php echo get_theme_mod( 'compose_navbglink_color' ); ?>; }
		
		/* Menu Links Hover */
		.navbar-inverse .navbar-nav li a:hover,
		.navbar-inverse .navbar-nav > .active > a,
		.navbar-inverse .navbar-nav > .active > a:hover,
		.navbar-inverse .navbar-nav > .active > a:focus,
		.navbar-inverse .navbar-nav > .open > a,
		.navbar-inverse .navbar-nav > .open > a:hover,
		.navbar-inverse .navbar-nav > .open > a:focus,
		.navbar-inverse .navbar-nav .open .dropdown-menu > .active > a,
		.navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover,
		.navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus,
		.navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
			background: <?php echo get_theme_mod( 'compose_navbghover_color' ); ?>; color: <?php echo get_theme_mod( 'compose_navbglink_color' ); ?>; }
		
		.primary-navigation li.current-menu-item a { background-color: <?php echo get_theme_mod( 'compose_navbghover_color' ); ?>; }
		
		.primary-navigation li.current-menu-item li a { background-color: <?php echo get_theme_mod( 'compose_navbghover_color' ); ?>; }
		.primary-navigation li:hover  { background-color: <?php echo get_theme_mod( 'compose_navbghover_color' ); ?>; }
		
    </style>
    <?php
}
add_action( 'wp_head', 'compose_customizer_css' );