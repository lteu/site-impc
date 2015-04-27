<?php
	get_header();
  	$current_options=get_option('busiprof_theme_options'); 
  ?>	<!-- Header top Slide -->
<div class="inner_top_mn">
  <div class="container">
    <div class="row-fluid about_space">
      <h2 class="about_head pull-left"><?php _e('Oops Sorry.','busi_prof'); ?><br /><span><?php _e('No Page or Post found.','busi_prof');?></span></h2>
      <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-append search_head pull-right">				
          <input type="text"name="s" placeholder=<?php _e( 'Search', 'busi_prof' ); ?> class="search_input" id="appendedInputButton">
        </div>
      </form>
    </div>
  </div>
</div>
<div class="container">
  <div class="row-fluid">
    <div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "span8"; } else { echo "span12"; } ?> blog_left">
      <h2><?php _e( 'Unfortunately, the page you tried accessing could not be retrieved. ', 'busi_prof' ); ?></h2>
      <div class="blog_section">
        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'busi_prof' ); ?></p>
      </div>
    </div>
    <?php get_sidebar (); ?>
  </div>
  <!-- #content -->
</div>
<!-- #primary -->
<?php get_footer(); ?>