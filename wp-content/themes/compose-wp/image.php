<?php
/**
 * The template for displaying image attachments
 * @package Compose
 * Image display
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header(); ?>

<div id="content" class="container content-bg"><!-- \.container - Remove this line if you do not want a boxed width layout -->

	<section class="col-xs-12 col-md-12 compose-breadcrumbs">

		<?php compose_the_breadcrumb(); ?>
			
	</section><!-- /.compose-breadcrumbs -->
	
	<section class="col-xs-12 col-md-8 compose-content<?php if ( get_theme_mod( 'compose_site_layout' ) === 'left' ) : // What layout? ?> content-change-layout<?php endif; ?>" role="main">

	<?php
		// Start the Loop.
		while ( have_posts() ) : the_post();
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('compose-blog-post clearfix'); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				<div class="entry-meta clearfix">

					<span class="entry-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span> / 

					<span class="full-size-link"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php printf( __( 'Full size', 'compose' ) ); ?></a></span>

					<span class="parent-post-link"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
					
					<?php edit_post_link( __( 'Edit', 'compose' ), '<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' ); ?>
					
				</div><!-- .entry-meta -->
				
			</header><!-- .entry-header -->

			<div class="entry-content">
				<div class="entry-attachment">
					<div class="attachment">
						<?php compose_the_attached_image(); ?>
					</div><!-- .attachment -->

					<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>
				</div><!-- .entry-attachment -->

				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'compose' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						) );
				?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->

			<nav id="image-navigation" class="navigation image-navigation">
				<div class="nav-links">
					<?php previous_image_link( false, '<div class="nav-previous">' . __( 'Previous Image', 'compose' ) . '</div>' ); ?>
					<?php next_image_link( false, '<div class="nav-next">' . __( 'Next Image', 'compose' ) . '</div>' ); ?>
				</div><!-- .nav-links -->
			</nav><!-- #image-navigation -->

			<?php comments_template(); ?>

		<?php endwhile; // end of the loop. ?>

	</section><!-- /.compose-blog-post -->

<?php
get_sidebar();
get_footer(); ?>
