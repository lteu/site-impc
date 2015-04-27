<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Compose
 */
?>

	</div><!-- /.container .content-bg -->

	<footer id="colophon" class="col-xs-12 col-md-12 compose-footer" role="contentinfo"<?php if ( get_theme_mod( 'compose_frbg_color' ) ) : // bg color ?> style="background: <?php echo get_theme_mod( 'compose_frbg_color' ); ?>"<?php endif; ?>>
		
		<div class="container">
		
			<section class="col-xs-12 col-sm-3 compose-footer-one">
				<ul>
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</ul>
			</section>
			
			<section class="col-xs-12 col-sm-3 compose-footer-two">
				<ul>
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</ul>
			</section>
			
			<section class="col-xs-12 col-sm-3 compose-footer-three">
				<ul>
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</ul>
			</section>
			
			<section class="col-xs-12 col-sm-3 compose-footer-four">
				<ul>
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</ul>
			</section>
			
		</div><!-- /.container -->
			
		<div class="col-xs-12 compose-credit">
			<?php printf( __( 'Built with %1$s by %2$s', 'compose' ), 'Compose', '<a href="http://www.weborithm.com/compose">Weborithm</a>' ); ?>, &copy; <?php _e(date('Y')); ?>
		</div><!-- .compose-credit -->
		
	</footer><!-- #colophon /.compose-footer -->

</div><!-- Main /.row -->
</section><!-- Main /.container -->

<?php wp_footer(); ?>

</body>
</html>