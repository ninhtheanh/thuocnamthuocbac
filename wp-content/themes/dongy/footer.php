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
<!-- Facebook share start -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '841394139216651',
      xfbml      : true,
      version    : 'v2.4'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     //js.src = "//connect.facebook.net/en_US/sdk.js";
     js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=841394139216651&version=v2.4";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

	function share_feed()
	{
	    var share_link = $("meta[property='og:url']").attr("content");
	    var picture = $("meta[property='og:image']").attr("content");
	    var name = $("meta[property='og:title']").attr("content");
	    var caption = '';
	    var description = $("meta[property='og:description']").attr("content");

	    var obj = {
	        method: 'share',
	        link: share_link,
	        picture: picture,
	        name: name,
	        caption: caption,
	        description: description,
	        actions: [{ name: name, link: share_link }],
	        href: 'http://yougapi.com',
	    };
	    FB.ui(obj);
	}
</script>

<p><a href="javascript:" onclick="fb_display_share_dialog711891220140413707023()">Share Dialog</a>
		<script>
		function fb_display_share_dialog711891220140413707023() {
			FB.ui({ 
				method: 'share',
     			to: '',
     			href: 'http://yougapi.com',
			}, function(response){} );
		}
		</script>

<!-- Facebook share end -->
<input type="button" value="Share" onclick="share_feed()">
</body>
</html>
