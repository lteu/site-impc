<?php
/**
 * The header for our theme.
 * @package Compose
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<section class="container-fluid"><!-- This can be changed to 'container' to become boxed width -->
<div id="page" class="row clearfix hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'compose' ); ?></a>
	
	<header id="masthead" class="site-header" role="banner">
	
		<section class="container compose-logo">
			
			<?php if ( get_theme_mod( 'compose_logo' ) ) : // Is there a logo? ?>
			
				<?php if ( is_home() || is_front_page() ) : // Is it the home page? ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_theme_mod( 'compose_logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a></h1>
				<?php else : // Not the home page? But we still have a logo! ?>
					<p class="compose-logo-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( get_theme_mod( 'compose_logo' ) ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a></p>
				<?php endif; // Yay, we showed the logo! ?>
			
			<?php else : // No logo :( ?>
				
				<?php if ( is_home() || is_front_page()  ) : // Let's check if it's the home page... ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="compose-logo-description"><?php bloginfo( 'description' ); ?></p>
				<?php else : // Not home page, no problemo... ?>
					<p class="compose-logo-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<p class="compose-logo-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; // We're done with the site title and/or description ?>
				
			<?php endif; // We'll do it live! ?>
			
		</section><!-- /.compose-logo -->		

		<nav class="navbar navbar-inverse" role="navigation">
			<div class="container">

				<?php if ( get_theme_mod( 'compose_nav_choice' ) !== 'single' ) : // Which menu are we using? ?>
					<div id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
						<button class="menu-toggle"><span><?php _e( 'Primary Menu', 'compose' ); ?></span></button>
						<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'compose' ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					</div>
				<?php else  : ?>
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only"><?php _e( 'Toggle navigation', 'compose' ); ?></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button><!-- /.navbar-toggle -->
					</div><!-- /.navbar-header -->
					 <?php
						wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'navbar-collapse',
							'menu_class'        => 'nav navbar-nav',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
						);
					?>
					
				<?php endif; // End menu choice check ?>
			</div><!-- /.container -->
		</nav><!-- /.navbar -->	
		
	</header><!-- #masthead -->