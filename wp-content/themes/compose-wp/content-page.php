<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Compose
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('compose-blog-post clearfix'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="col-xs-12 compose-blog-image">
				<?php the_post_thumbnail('featured-image' , array( 'class' => 'thumbnail img-responsive' )); ?>
			</div><!-- /.compose-blog-image -->
		<?php } else; { ?><?php } ?>
		
		<?php the_content(); ?>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'compose' ),
				'after'  => '</div>',
			) );
		?>
		
		<div class="compose-blog-meta">
			<ul>
				<li><i class="fa fa-calendar-o"></i> <?php the_time('jS M, Y'); ?></li>
				<?php edit_post_link( __( 'Edit', 'compose' ), '<li><i class="fa fa-edit"></i> ', '</li>' ); ?>
			</ul>
		</div>
	
	</div><!-- .entry-content -->

</article><!-- #post-## -->
