<?php
/**
 * The template for displaying all single posts.
 *
 * @package Compose
 */

get_header(); ?>

<div id="content" class="container content-bg"><!-- \.container - Remove this line if you do not want a boxed width layout -->

	<section class="col-xs-12 col-md-12 compose-breadcrumbs">

		<?php compose_the_breadcrumb(); ?>
			
	</section><!-- /.compose-breadcrumbs -->

	
	<section class="col-xs-12 col-md-8 compose-content<?php if ( get_theme_mod( 'compose_site_layout' ) === 'left' ) : // What layout? ?> content-change-layout<?php endif; ?>" role="main">
	
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

			<?php compose_post_nav(); ?>

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