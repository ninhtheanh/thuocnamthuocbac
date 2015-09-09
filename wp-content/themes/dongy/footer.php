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
						© 2015 Copyright by TA. All rights reserved.
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

<!-- Slider start -->
<script type='text/javascript' src='https://cdn1.colorlib.com/travelify/wp-content/themes/travelify/library/js/jquery.cycle.all.min.js?ver=2.9999.5'></script>
<script type='text/javascript'>
	/* <![CDATA[ */
	var travelify_slider_value = {"transition_effect":"fade","transition_delay":"4000","transition_duration":"1000"};
	/* ]]> */
	/**
	
	/* Slider Setting */
	jQuery(window).load(function() {
	    var transition_effect = travelify_slider_value.transition_effect;
	    var transition_delay = travelify_slider_value.transition_delay;
	    var transition_duration = travelify_slider_value.transition_duration;
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

</body>
</html>
