<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
	<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.js?ver=1.0.0'></script>	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<header id="branding" >				
			<div class="container clearfix">
				<div class="hgroup-wrap clearfix">
					<section class="hgroup-right">							
						<div class="social-icons clearfix">
							<ul>
							   <li class="social-profiles-widget"> 
								   <a href="http://twitter.com/" target="_blank"><img title="Twitter" alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/twitter.png"></a>
								   <a href="http://facebook.com/" target="_blank"><img title="Facebook" alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/facebook.png"></a>
								   <a href="https://plus.google.com/" target="_blank"><img title="Google Plus" alt="Google Plus" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/gplus.png"></a>
								   <a href="http://www.linkedin.com/" target="_blank"><img title="LinkedIn" alt="LinkedIn" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/linkedin.png"></a>								   
								   <a href="mailto:ninhtheanh@gmail.com" target="_blank"><img title="Email" alt="Email" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/email.png"></a>
							   </li>
							</ul>
						</div><!-- .social-icons -->					
					</section><!-- .hgroup-right -->
						<hgroup id="site-logo" class="clearfix">
							<a href="<?php echo site_url(); ?>"><img title="Twitter" alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/images/logo2.jpg"></a>
						</hgroup><!-- #site-logo -->
				</div><!-- .hgroup-wrap -->
			</div><!-- .container -->
			<nav id="main-nav" class="clearfix">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						$args = array(
							'theme_location'    => 'primary',
							'container'         => '',
							'items_wrap'        => '<ul class="root">%3$s</ul>'
						);
						echo '<nav id="main-nav" class="clearfix">
								<div class="container clearfix">';
							wp_nav_menu( $args );
						echo '</div><!-- .container -->
								</nav><!-- #main-nav -->';
					}
					else {
						echo '<nav id="main-nav" class="clearfix">
								<div class="container clearfix">';
							wp_page_menu( array( 'menu_class'  => 'root' ) );
						echo '</div><!-- .container -->
								</nav><!-- #main-nav -->';
					}
				?>
			</nav><!-- #main-nav -->		
			
			<?php
			if( is_home() || is_front_page() ) {
			?>
				<section class="featured-slider">
				   <div class="slider-cycle" style="width: 100%; height: 263px;">
				      <div class="slides displayblock" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 5; opacity: 1; width: 100%;">
				         <figure>
				         	<a href="https://colorlib.com/travelify/layout-test/" title="Content Layout Preview">
					         	<img width="960" src="http://localhost:8080/Wordpress/thuocnamthuocbac/wp-content/uploads/2015/09/banner_scr.jpg" 
					         	class="pngfix wp-post-image" alt="Content Layout Preview" title="Content Layout Preview">				         	
					        </a>
				     	</figure>
			         	<article class="featured-text" style="display:none">
				            <div class="featured-title">
				            	<a href="https://colorlib.com/travelify/layout-test/" title="Content Layout Preview">Thuốc Việt Nam</a>
				            </div>
				            <!-- .featured-title -->
				            <div class="featured-content">Chung Tay Chăm Sóc Sức Khỏe Cộng Đồng </div>
				            <!-- .featured-content -->
				        </article>
				         <!-- .featured-text -->
				      </div>
				     
				   </div>
				   <nav id="controllers" class="clearfix"></nav>			   
				   <!-- #controllers -->
				</section>
			<?php	
	   		}
			else {
				if( ( '' != travelify_header_title() ) || function_exists( 'bcn_display_list' ) ) {
			?>
				<div class="page-title-wrap">
		    		<div class="container clearfix">
		    			<?php
			    		if( function_exists( 'travelify_breadcrumb' ) )
							travelify_breadcrumb();
						?>
					   <h3 class="page-title"><?php echo travelify_header_title(); ?></h3><!-- .page-title -->
					</div>
		    	</div>
		   <?php		   			
				}
			}?>

		</header>
