<?php
/**
 * Sidebar Secondary widget area.
 *
 * @package WEN Business
 */
?>

<?php
/**
 * wen_business_action_before_sidebar_secondary hook
 */
do_action( 'wen_business_action_before_sidebar_secondary' );?>

<div id="sidebar-secondary" role="complementary" <?php wen_business_sidebar_secondary_class( 'widget-area sidebar' ); ?> >
  <?php if ( is_active_sidebar( 'sidebar-2' ) ): ?>

    <?php dynamic_sidebar( 'sidebar-2' ); ?>

  <?php else: ?>
    <h3 class="sidebar-message-title"><?php echo __( 'Secondary Sidebar', 'wen-business' ); ?></h3>
    <div class="sidebar-message">
      <?php echo __( 'Widgets of Secondary Sidebar will be displayed here', 'wen-business' ); ?>
    </div>
  <?php endif ?>
</div><!-- #sidebar-secondary -->
<?php
/**
 * wen_business_action_after_sidebar_secondary hook
 */
do_action( 'wen_business_action_after_sidebar_secondary' );?>

