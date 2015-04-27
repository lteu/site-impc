<?php
/**
 * The template for displaying search results pages.
 *
 * @package Compose
 */

get_header(); ?>

<div id="content" class="container content-bg">

	<section class="col-xs-12 col-md-12 compose-breadcrumbs">
		<!-- No breadcrumbs -->
	</section><!-- /.compose-breadcrumbs -->
	
	<section class="col-xs-12 col-md-8 compose-content<?php if ( get_theme_mod( 'compose_site_layout' ) === 'left' ) : // What layout? ?> content-change-layout<?php endif; ?>" role="main">

		<?php if ( have_posts() ) : ?>

			<header>
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'compose' ), '<em>' . get_search_query() . '</em>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php compose_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</section><!-- /.compose-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
