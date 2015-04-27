<?php
/**
 * The custom home template
 *
 * @package Compose
 */
/*
Template Name: Full Width
*/

  $options = get_option('Compose');
     
	$layout = htmlspecialchars($options['layout'], ENT_QUOTES);
  
get_header(); ?>

<div id="content" class="container content-bg"><!-- \.container - Remove this line if you do not want a boxed width layout -->

<section class="col-xs-12 col-md-12 compose-breadcrumbs">

	<?php compose_the_breadcrumb(); ?>
			
</section><!-- /.compose-breadcrumbs -->
	
<div <?php post_class('col-xs-12 col-md-12 compose-content compose-content-full') ?> role="main">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		
		<?php if ( ( function_exists('has_post_thumbnail') ) && ( has_post_thumbnail() ) ) { 
			$post_thumbnail_id = get_post_thumbnail_id();
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			?>
			<div class="col-xs-12 compose-blog-image">
				<img title="image title" alt="thumb image" class="thumbnail img-responsive wp-post-image" src="<?php echo $post_thumbnail_url; ?>" style="width:100%; height:auto;">
			</div><!-- /.compose-blog-image -->
		<?php } ?>
		
		<?php the_content(); ?>
			
		<?php wp_link_pages( array( 'before' => '<p><strong>' . __( 'Pages:', 'compose' ) . '</strong>', 'after' => '</p>' ) ); ?>
		
		<div class="compose-blog-meta">
			<ul>
				<li><i class="fa fa-calendar-o"></i> <?php the_time('jS M, Y'); ?></li>
				<?php edit_post_link( __( 'Edit', 'compose' ), '<li><i class="fa fa-edit"></i> ', '</li>' ); ?>
			</ul>
		</div>
	
	<?php endwhile; endif; ?>
	
</div><!-- /.compose-content -->

<?php get_footer(); ?>