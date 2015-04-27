<?php
  
	define('WEBRITI_TEMPLATE_DIR',get_template_directory());
	define('WEBRITI_THEME_FUNCTIONS_PATH',WEBRITI_TEMPLATE_DIR.'/functions');
	/**Includes reqired resources here**/
  
  	//Files for custom - defaults menus
  	require( WEBRITI_THEME_FUNCTIONS_PATH. '/menu/busiprof_nav_walker.php' );
  	require( WEBRITI_THEME_FUNCTIONS_PATH . '/menu/default_menu_walker.php' );	
  	
  	require( WEBRITI_THEME_FUNCTIONS_PATH .'/resize_image/resize_image.php' );	
  	require_once( WEBRITI_THEME_FUNCTIONS_PATH .'/commentbox/comment-function.php');
 
  
  
  //wp title tag starts here
  
  function busiprof_head( $title, $sep ) {
  	global $paged, $page;
  
  	if ( is_feed() )
  		return $title;
  
  	// Add the site name.
  	$title .= get_bloginfo( 'name' );
  
  	// Add the site description for the home/front page.
  	$site_description = get_bloginfo( 'description', 'display' );
  	if ( $site_description && ( is_home() || is_front_page() ) )
  		$title = "$title $sep $site_description";
  
  	// Add a page number if necessary.
  	if ( $paged >= 2 || $page >= 2 )
  		$title = "$title $sep " ;
  
  	return $title;
  }
  add_filter( 'wp_title', 'busiprof_head', 10, 2 );
  
  //Scripts Enqueue here
  
  function busiprof_scripts(){
  
  	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
  	
  	wp_enqueue_script('busiprof-boot-business',get_template_directory_uri().'/js/menu/boot-business.js',array('jquery')); //Menu JS	
  	wp_enqueue_script('busiprof-bootstrap.min',get_template_directory_uri().'/js/menu/bootstrap.min.js'); //Responsive JS
  	wp_enqueue_script('busiprof-menu',get_template_directory_uri().'/js/menu/menu.js'); //Menu JS
  	wp_enqueue_script('busiprof-bootstrap',get_template_directory_uri().'/js/bootstrap.js'); //Responsive JS
  	wp_enqueue_script('busiprof-bootstrap-tab',get_template_directory_uri().'/js/bootstrap-tab.js'); 
  	wp_enqueue_script('busiprof-bootstrap-transition',get_template_directory_uri().'/js/bootstrap-transition.js');
  	
  	//CSS Links 	
  
  	wp_enqueue_style('busiprof-style', get_stylesheet_uri() );
	wp_enqueue_style('busiprof-font', get_template_directory_uri().'/css/font/font.css');
  	wp_enqueue_style('busiprof-bootstrap', get_template_directory_uri().'/css/bootstrap.css');
  	wp_enqueue_style('busiprof-bootstrap-responsive', get_template_directory_uri().'/css/bootstrap-responsive.css');
  	//wp_enqueue_style('docs',get_template_directory_uri().'/css/docs.css');	
  }
  add_action( 'wp_enqueue_scripts', 'busiprof_scripts' );
  	
  // Theme Setup /default data starts here
  /** Tell WordPress to run busiprof_setup() when the 'after_setup_theme' hook is run. */
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which runs
   * before the init hook. The init hook is too late for some features, such as indicating
   * support post thumbnails.
   *
   * To override busiprof_setup() in a child theme, add your own busiprof_setup to your child theme's
   * functions.php file.
   *
   * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
   * @uses register_nav_menus() To add support for navigation menus.
   * @uses add_custom_background() To add support for a custom background.
   * @uses add_editor_style() To style the visual editor.
   * @uses load_theme_textdomain() For translation/localization support.
   * @uses add_custom_image_header() To add support for a custom header.
   * @uses register_default_headers() To register the default custom header images provided with the theme.
   * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
   *
   * @since BusiProf 1.0
   */
  	global $busiprof_resetno;
  	add_action( 'after_setup_theme', 'busiprof_setup' ); 
  	function busiprof_setup()
  	{	// Load text domain for translation-ready
  		load_theme_textdomain( 'busi_prof', get_template_directory() . '/functions/lang' );	
  		
		 //content width
		if ( ! isset( $content_width ) ) $content_width = 720;
		
  		add_theme_support( 'post-thumbnails' ); //supports featured image
  		add_theme_support( 'automatic-feed-links' ); //feed links enabled
  		do_action('busiprof_init');//load admin pannal file	
  		
  		// setup admin pannel defual data for index page
  		$busiprof_theme_options=Theme_Setup_data(); 
  		$current_theme_options = get_option('busiprof_theme_options'); 						
  		if($current_theme_options)
  		{ 	
  			$busiprof_theme_options = array_merge($busiprof_theme_options, $current_theme_options);
  			update_option('busiprof_theme_options',$busiprof_theme_options);				
  		}
  		else
  		{
  			add_option('busiprof_theme_options',$busiprof_theme_options); 
  		}
  		
  		//add_option('busiprof_theme_options',$busiprof_theme_options); 
  		// This theme uses wp_nav_menu() in one location.
  	register_nav_menu( 'primary', __( 'Primary Menu', 'busi_prof' ) );
  	}
  	
  	// load admin panal file
  	add_action( 'busiprof_init', 'busiprof_load_files', 20 );
  	function busiprof_load_files()
  	{	
  		require_once('theme_setup_data.php');
  		require_once('functions/theme_options/theme_options.php');	// admin options panel		
  	}
  	
  	// admin restore options page
  	add_action('Busiprof_restore_data', 'Busiprof_restore_data_function', $busiprof_resetno );		
  	function Busiprof_restore_data_function($busiprof_resetno)
  	{	
  		$busiprof_theme_options = Theme_Setup_data($busiprof_resetno);
  		update_option('busiprof_theme_options',$busiprof_theme_options);
  		
  	}	
  		
  add_action( 'widgets_init', 'busiprof_widgets_init');
  function busiprof_widgets_init() {
  /*sidebar*/
  register_sidebar(array(
  		'name' => __( ' Sidebar', 'busi_prof' ),
  		'id' => 'sidebar-primary',
  		'description' => __( 'The primary widget area', 'busi_prof' ),
  		'before_widget' => '<div id="%1$s" class="widget">',
  		'after_widget' => '</div><div class="sidebar_seprator"></div>',
  		'before_title' => '<h2 class="widgettitle">',
  		'after_title' => '</h2>',
  	));
  	
  	 register_sidebar( array(
  		'name' => __( 'Footer Widget Area', 'busi_prof' ),
  		'id' => 'footer-widget-area',
  		'description' => __( 'The first footer widget area', 'busi_prof' ),
  		'before_widget' => '<div  class="span3">',
  		'after_widget' => '</div>',
  		
  	) );
  }	
  
  
  	/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
 
add_action( 'tgmpa_register', 'busiprof_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function busiprof_register_required_plugins() {
 
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
 
       
 
       
 
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
        array(
            'name'      => 'Spiceforms Form Builder',
            'slug'      => 'spiceforms-form-builder',
            'required'  => false,
        ),
 
    );
 
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Recommended Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
 
    tgmpa( $plugins, $config );
 
}
  
 ?>