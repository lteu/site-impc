<?php
/**
 * @package Compose
 * Regular content display
 */
?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 compose-blog-post clearfix'); ?>>
	
		<div class="col-xs-12 compose-blog-text">
			 <?php the_content(); ?>
		</div><!-- /.compose-blog-text -->
		
		<div class="col-xs-12 compose-blog-image">
			<ul>	
				<li><i class="fa fa-indent fa-lg"></i> 
				<?php
				if ( is_single() ) :
					the_title( );
				else :
					the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
				endif;
				?> <?php _e( 'by', 'compose' ); ?> <?php the_author() ?></li>
			
				<li class="cat-links"><i class="fa fa-folder-o"></i>
					<?php the_category( ' ' ); ?>
				</li>
				
				<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'compose' ) );
				if ( $tags_list ) :
				?>
					<li class="tags-links"><i class="fa fa-tags"></i>
						<?php printf( __( '%1$s', 'compose' ), $tags_list ); ?>
					</li>
				<?php endif; // End if $tags_list ?>
				
				<li><i class="fa fa-calendar-o"></i> <?php the_time('jS M, Y'); ?></li>
				
				<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<li><i class="fa fa-comments"></i> <span class="comments-link"><?php comments_popup_link( __( 'Comment', 'compose' ), __( '1', 'compose' ), __( '%' , 'compose' ) ); ?></span></li><?php endif; ?>
				
				<?php edit_post_link( __( 'Edit', 'compose' ), '<li><i class="fa fa-edit"></i> ', '</li>' ); ?>
			</ul>
		</div><!-- /.compose-blog-image -->
	
</article><!-- /.compose-blog-post -->