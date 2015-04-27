<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Compose
 */

get_header(); ?>

<div id="content" class="container content-bg"><!-- \.container - Remove this line if you do not want a boxed width layout -->

	<section class="col-xs-12 col-md-12 compose-breadcrumbs">

		<ul>
			<li><span class="title-hover" title="<?php bloginfo( 'name' ); ?> <?php printf( __( 'homepage', 'compose' ) ); ?>"><?php _e( 'Home', 'compose' ); ?></span></li>
		</ul>
			
	</section><!-- /.compose-breadcrumbs -->
	
	<section class="no-results not-found compose-404 compose-blog-post clearfix">
		<header>
			<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'compose' ); ?></h1>
		</header><!-- .page-header -->

		<div class="col-xs-12 compose-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'compose' ); ?></p>

			<?php get_search_form(); ?>

			<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

			<?php if ( compose_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
				<div class="widget widget_categories">
					<h2 class="widget-title"><?php _e( 'Most Used Categories', 'compose' ); ?></h2>
					<ul>
					<?php
						wp_list_categories( array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						) );
					?>
					</ul>
				</div><!-- .widget -->
				<?php endif; ?>

				<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'compose' ), convert_smilies('') ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>

				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

			</div><!-- .compose-content -->
		</section><!-- .compose-404 -->

<?php get_footer(); ?>