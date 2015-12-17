<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage DongY
 * @since Dong Y 1.0
 */
?>
	<footer id="footerarea" class="clearfix">
		<div id="site-generator">
				<div class="container">					
					<div class="footer-right">
												
						<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer-menu' ) ); ?>
						
					</div>					
					<div class="copyright">						
						© 2015 Copyright by Đông Y Gia Truyền Đình Tuân.
					</div><!-- .copyright -->
				</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>	
</div>
<a href="#" class="back-to-top"></a>
<?php echo dongy_facebook_sdk();?>

<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/navigation.js?ver=1.0.0.0'></script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/scripts.js?ver=1.0.0.0'></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-67788550-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
