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
					<div class="copyright">						
						© 2015 Copyright by Đông Y Đình Tuân.
					</div><!-- .copyright -->
					<div class="footer-right">
												
						<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'footer-menu' ) ); ?>
						
					</div>
					<div style="clear:both;"></div>
				</div><!-- .container -->
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

<?php wp_footer(); ?>
</div>
<a href="#" class="back-to-top"></a>
<!-- Slider start -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.cycle.all.min.js?ver=1.0.0'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var dongy_slider_value = {"transition_effect":"fade","transition_delay":"4000","transition_duration":"1000"};
	/* ]]> */
	/**
	
	/* Slider Setting */
	jQuery(window).load(function() {
	    var transition_effect = dongy_slider_value.transition_effect;
	    var transition_delay = dongy_slider_value.transition_delay;
	    var transition_duration = dongy_slider_value.transition_duration;
	    jQuery('.slider-cycle').cycle({
	        fx: transition_effect,
	        pager: '#controllers',
	        activePagerClass: 'active',
	        timeout: transition_delay,
	        speed: transition_duration,	        
	        pause: 1,
	        pauseOnPagerHover: 1,
	        width: '100%',
	        containerResize: 0,
	        fit: 1,
	        after: function() {
	            jQuery(this).parent().css("height", jQuery(this).height())
	        },
	        cleartypeNoBg: true
	    })
	});
</script>
<!-- Slider end -->

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
