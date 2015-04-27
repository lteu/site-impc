<?php
/**
 * @package Compose
 * Regular content display
 */
?>
	
<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 compose-blog-post clearfix'); ?>>
				
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			elseif ( is_archive() || is_search() ) :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			else :
			endif;
		?>
	</header><!-- .entry-header -->
		
	<div class="col-xs-12 compose-blog-text">
		<?php the_content(); ?>
	</div><!-- /.compose-blog-text -->
		
	<div class="col-xs-12 compose-blog-image">
		<ul>
			<li><i class="fa fa-pencil-square fa-lg"></i> <?php _e( 'Updated by', 'compose'); ?> <?php the_author() ?> 			
				<?php if ( is_single() ) : ?>
					<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?> 
				<?php else : ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) ; ?> </a>
				<?php endif; ?>
			</li>
			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<li><i class="fa fa-comments"></i> <span class="comments-link"><?php comments_popup_link( __( 'Comment', 'compose' ), __( '1', 'compose' ), __( '%' , 'compose' ) ); ?></span></li><?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'compose' ), '<li><i class="fa fa-edit"></i> ', '</li>' ); ?>
		</ul>
	</div><!-- /.compose-blog-image -->
	
</article><!-- /.compose-blog-post -->