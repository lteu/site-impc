<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Compose
 */
?>

<section <?php post_class('no-results not-found clearfix'); ?>>
	<header>
		<h1><i class="fa fa-frown-o"></i> <?php _e( 'Nothing found', 'compose' ); ?></h1>
	</header><!-- .page-header -->

	<div class="col-xs-12 compose-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'compose' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but we can&rsquo;t find what you are looking for.', 'compose' ); ?></p>
			<p><?php get_search_form(); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'compose' ); ?></p>
			<p><?php get_search_form(); ?></p>

		<?php endif; ?>
	</div><!-- .compose-404 -->
</section><!-- .no-results -->
