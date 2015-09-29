<?php
/**
 * Displays the 404 error page of the theme.
 */
?>
<?php wp_redirect( home_url() ); exit; ?>
<?php get_header(); ?>

<div id="content">
		<header class="entry-header">
			<h1 class="entry-title header-404"><?php _e( 'Error 404 - Page NOT Found', 'dongy' ); ?></a></h1>
		</header>
		<div class="entry-content clearfix" >
			<p><?php _e( 'Rất tiếc, trang bạn yêu cầu không tồn tại hoặc hiện không hoạt động.', 'dongy' ); ?></p>
			<h3><?php _e( 'This might be because:', 'dongy' ); ?></h3>
			<ul>
				<li><?php _e( 'You have typed the web address incorrectly', 'dongy' ); ?></li>
				<li><?php _e( 'The page you were looking for may have been moved, updated or deleted.', 'dongy' ); ?></li>
			</ul>
			<h3><?php _e( 'Please try the following:', 'dongy' ); ?></h3>
			<ul>
				<li><?php _e( 'Check for a mis-typed URL error', 'dongy' ); ?></li>
				<li><?php _e( 'Press the refresh button on your browser.', 'dongy' ); ?></li>
				<li><?php _e( 'Go back to', 'dongy' ); ?> <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home"><?php _e( 'Homepage', 'dongy' ); ?></a></li>
			</ul>
		</div><!-- .entry-content -->
	</div><!-- #content -->

<?php get_footer(); ?>