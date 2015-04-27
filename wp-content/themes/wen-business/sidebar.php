<?php
/**
 * Sidebar Primary widget area.
 *
 * @package WEN Business
 */
?>

<?php
/**
 * wen_business_action_before_sidebar_primary hook
 */
do_action( 'wen_business_action_before_sidebar_primary' );?>

<div id="sidebar-primary" role="complementary" <?php wen_business_sidebar_primary_class( 'widget-area sidebar' ); ?> >
  <?php if ( is_active_sidebar( 'sidebar-1' ) ): ?>

    <?php dynamic_sidebar( 'sidebar-1' ); ?>

  <?php else: ?>
    <h3 class="sidebar-message-title"><?php echo __( 'Primary Sidebar', 'wen-business' ); ?></h3>
    <div class="sidebar-message">
      <?php echo __( 'Widgets of Primary Sidebar will be displayed here', 'wen-business' ); ?>
    </div>
  <?php endif ?>
</div><!-- #sidebar-primary -->
<?php
/**
 * wen_business_action_after_sidebar_primary hook
 */
do_action( 'wen_business_action_after_sidebar_primary' );?>

