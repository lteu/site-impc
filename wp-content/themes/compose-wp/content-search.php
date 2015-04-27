<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Compose
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 compose-blog-post'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="col-xs-12 compose-blog-text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="col-xs-12 compose-blog-image">
		<ul>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<li><i class="fa fa-comments"></i> <span class="comments-link"><?php comments_popup_link( __( 'Comment', 'compose' ), __( '1', 'compose' ), __( '%' , 'compose' ) ); ?></span></li><?php endif; ?>
				
			<li><i class="fa fa-calendar-o"></i> <?php the_time('jS M, Y'); ?></li>
			
			<?php edit_post_link( __( 'Edit', 'compose' ), '<li><i class="fa fa-edit"></i> ', '</li>' ); ?>
		</ul>

	</div><!-- /.compose-blog-image -->
</article><!-- /.compose-blog-post -->