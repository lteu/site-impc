<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Compose
 */

get_header(); ?>

<div id="content" class="container content-bg">

	<section class="col-xs-12 col-md-12 compose-breadcrumbs">

		<?php compose_the_breadcrumb(); ?>
			
	</section><!-- /.compose-breadcrumbs -->
	
	<section class="col-xs-12 col-md-8 compose-content<?php if ( get_theme_mod( 'compose_site_layout' ) === 'left' ) : // What layout? ?> content-change-layout<?php endif; ?>" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

	</section><!-- /.compose-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
