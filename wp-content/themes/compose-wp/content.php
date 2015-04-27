<?php
/**
 * @package Compose
 * Regular content display
 */
?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 compose-blog-post clearfix'); ?>>
		
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	
		<?php if ( is_single() ) : ?>
			<div class="entry-content">
			<div class="col-xs-12 compose-blog-image">
		<?php else : ?>
			<div class="col-xs-12 <?php if ( has_post_thumbnail() ) { ?>col-sm-6<?php } ?> compose-blog-image">
		<?php endif; ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('featured-image' , array( 'class' => 'thumbnail img-responsive' )); ?>
			<?php } ?>
			
		<?php if ( is_single() ) : ?><?php else : // let's show meta below image ?>
			
			<ul>
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
			
		<?php endif; ?>
		
		</div><!-- /.compose-blog-image -->
	
		<?php if ( is_single() ) : // if single show single content ?>
			
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'compose' ) ); ?>
			
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'compose' ),
					'after'  => '</div>',
				) );
			?>
			
		<?php else : // if archive or search show as excerpt ?>
		
			<div class="col-xs-12 <?php if ( has_post_thumbnail() ) { ?>col-sm-6<?php } ?> compose-blog-text">
				<p><?php the_excerpt(); ?>
			</div><!-- /.compose-blog-text -->
			
		<?php endif; ?>		
		
		<?php if ( is_single() ) : // show meta at bottom on single page ?>
		
			<div class="compose-blog-meta">
				<ul>
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
			</div><!-- /.compose-blog-meta -->
		</div><!-- .entry-content -->
			
		<?php endif; ?>
		
		
</article><!-- /.compose-blog-post -->