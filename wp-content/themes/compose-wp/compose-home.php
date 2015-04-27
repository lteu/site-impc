<?php
/**
 * The custom home template
 *
 * @package Compose
 */
/*
Template Name: Home
*/
get_header(); ?>



<div id="content" class="<?php if ( get_theme_mod( 'compose_site_width' ) === 'full' ) : ?><?php else : ?>container<?php endif; ?> content-bg">

<?php if ( get_theme_mod( 'compose_page_featured' ) ) : // We have a featured page? ?>
	
	<?php $query = new WP_Query( 'page_id=' . get_theme_mod( 'compose_page_featured' ) ); ?>
		
		<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				
				<section class="col-xs-12 col-lg-12 compose-static-image" <?php $image_id = get_post_thumbnail_id( ( $post->ID ) ); $image_url = wp_get_attachment_image_src($image_id,'full', true); ?> style="background-image: url('<?php echo $image_url[0];  ?>');">
					<div class="compose-caption">
						<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
						<?php $trimexcerpt = get_the_excerpt(); $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 10, $more = '...' );  ?>
						<p><?php echo $shortexcerpt ?></p>
						<a class="btn btn-lg btn-info" href="<?php echo get_permalink( ); ?>" role="button">
							<?php if ( get_theme_mod( 'compose_featured_button' ) ) : // Get the button text ?>
								<?php echo get_theme_mod( 'compose_featured_button' ); ?>
							<?php else : ?>
								<?php _e( 'Read More', 'compose' ); ?>
							<?php endif; ?>
						</a>					
					</div><!-- /.compose-caption -->
				</section><!-- /.compose-static-image -->
				
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php wp_reset_postdata(); ?>
			
	<?php else : ?>
		<section class="col-xs-12 col-lg-12 compose-static-image" style="background-image: url('http://i.imgur.com/q7274Vs.jpg');">
			
			<div class="compose-caption">
				<h2><?php _e( 'Your Featured Page Title', 'compose' ); ?></h2>
				<p><?php _e( 'Start by editing the Home Template in your Customize panel', 'compose' ); ?></p>
				<a class="btn btn-lg btn-info" href="wp-admin/customize.php?theme=compose-wp" role="button"><?php _e( 'Set your featured Page', 'compose' ); ?></a>
			</div><!-- /.compose-caption -->
					
		</section><!-- /.compose-static-image -->

<?php endif; // End featured page query ?>

<?php if ( get_theme_mod( 'compose_site_width' ) === 'full' ) : ?><div class="container"><?php else : ?><?php endif; ?>

	<?php if ( get_theme_mod( 'compose_call_to_action' ) ) : // We have a call to action? ?>
		<section class="col-xs-12 col-md-12 compose-action">
			
			<div class="col-xs-12 col-md-8 compose-action-text">
				<?php echo get_theme_mod( 'compose_call_to_action' ); ?>
			</div>
				
			<div class="col-xs-12 col-md-4 compose-action-button">
				<p class="text-right">
					<a href="<?php echo get_theme_mod( 'compose_call_to_action_link' ); ?>" class="btn btn-danger btn-lg">
						<i class="fa <?php echo get_theme_mod( 'compose_call_to_action_icon' ); ?>"></i>
						<?php if ( get_theme_mod( 'compose_call_to_action_text' ) ) : ?>
							<?php echo get_theme_mod( 'compose_call_to_action_text' ); ?>
						<?php else : ?>
							<?php _e( 'Get Started', 'compose' ); ?>
						<?php endif; ?>
					</a>
				</p>
			</div>
				
		</section><!-- /.compose-action -->
	<?php endif; ?>
	
<!-- First featured page -->

	<?php if ( get_theme_mod( 'compose_grid_one' ) ) : // We MUST have the first grid page! ?>
	<section class="col-xs-12 col-md-12 compose-boxes">
	<?php else : ?><!-- Remove /.compose-boxes --><?php endif; ?>
		
		<?php if ( get_theme_mod( 'compose_grid_one' ) ) : // So, do we have the first grid page? ?>
		
			<?php $query = new WP_Query( 'page_id=' . get_theme_mod( 'compose_grid_one' ) ); ?>
			<?php if ( $query->have_posts() ) : ?>
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				
				<div class="col-xs-12 col-sm-4 compose-box">
					<i class="fa <?php echo get_theme_mod( 'compose_grid_one_icon' ); ?>"></i>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<?php $trimexcerpt = get_the_excerpt(); $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 25, $more = '...' );  ?>
						<p><?php echo $shortexcerpt ?></p>
						<p><a href="<?php the_permalink(); ?>" rel="nofollow" class="btn btn-sm btn-link" role="button"><?php _e( 'read more...', 'compose' ); ?></a></p>
					</div><!-- /.caption -->
				</div><!-- /.compose-box -->
					
			<?php endwhile; ?>
				
		<?php else : ?><!-- No first featured --><?php endif; ?>
				
		<?php wp_reset_postdata(); ?>
	
	<?php endif; ?>
	
<!-- Second featured page -->
	
	<?php if ( get_theme_mod( 'compose_grid_two' ) ) : // We have the second grid page? ?>

		<?php $query = new WP_Query( 'page_id=' . get_theme_mod( 'compose_grid_two' ) ); ?>
		<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
				<div class="col-xs-12 col-sm-4 compose-box">
					<i class="fa <?php echo get_theme_mod( 'compose_grid_two_icon' ); ?>"></i>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<?php $trimexcerpt = get_the_excerpt(); $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 25, $more = '...' );  ?>
						<p><?php echo $shortexcerpt ?></p>
						<p><a href="<?php the_permalink(); ?>" rel="nofollow" class="btn btn-sm btn-link" role="button"><?php _e( 'read more...', 'compose' ); ?></a></p>
					</div><!-- /.caption -->
				</div><!-- /.compose-box -->
				
			<?php endwhile; ?>
			
		<?php else : ?><!-- No second featured --><?php endif; ?>
			
		<?php wp_reset_postdata(); ?>
	
	<?php endif; ?>
	
<!-- Third featured page -->

	<?php if ( get_theme_mod( 'compose_grid_three' ) ) : // We have the first grid page? ?>
	
		<?php $query = new WP_Query( 'page_id=' . get_theme_mod( 'compose_grid_three' ) ); ?>
		<?php if ( $query->have_posts() ) : ?>
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
			
				<div class="col-xs-12 col-sm-4 compose-box">
					<i class="fa <?php echo get_theme_mod( 'compose_grid_three_icon' ); ?>"></i>
					<div class="caption">
						<h3><?php the_title(); ?></h3>
						<?php $trimexcerpt = get_the_excerpt(); $shortexcerpt = wp_trim_words( $trimexcerpt, $num_words = 25, $more = '...' );  ?>
						<p><?php echo $shortexcerpt ?></p>
						<p><a href="<?php the_permalink(); ?>" rel="nofollow" class="btn btn-sm btn-link" role="button"><?php _e( 'read more...', 'compose' ); ?></a></p>
					</div><!-- /.caption -->
				</div><!-- /.compose-box -->
				
			<?php endwhile; ?>
			
		<?php else : ?><!-- No third featured --><?php endif; ?>
			
		<?php wp_reset_postdata(); ?>
	
	<?php endif; ?>
	
	<?php if ( get_theme_mod( 'compose_grid_one' ) ) : // We have the first grid page? ?>
	</section><!-- /.compose-boxes -->
	<?php else : ?><!-- Remove /.compose-boxes --><?php endif; ?>
	
	<?php if ( get_theme_mod( 'compose_preview_text' ) ) : // Did we set any preview content? ?>
		<section class="col-xs-12 col-md-12 compose-preview">
				
			<div class="col-xs-12 col-md-4 compose-preview-image">
				<img src="<?php echo esc_url( get_theme_mod( 'compose_preview_image' ) ); // Preview image URI ?>"  class="img-responsive" alt="Preview Image" />
			</div><!-- /.compose-preview-image -->
				
			<div class="col-xs-12 col-md-8 compose-preview-text">
				<?php echo get_theme_mod( 'compose_preview_text' ); // Display preview text ?>
			</div><!-- /.compose-preview-text -->
				
		</section><!-- /.compose-preview -->
	<?php endif; ?>
	
<?php if ( get_theme_mod( 'compose_site_width' ) === 'full' ) : ?></div><!-- /.container --><?php else : ?><?php endif; ?>

<?php get_footer(); ?>