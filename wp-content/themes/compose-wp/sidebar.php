<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Compose
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<section class="col-xs-12 col-md-4 compose-aside<?php if ( get_theme_mod( 'compose_site_layout' ) === 'left' ) : // What layout? ?> aside-change-layout<?php else :?><?php endif; ?>" role="complementary">

	<ul>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</ul>

</section><!-- /.compose-aside -->

