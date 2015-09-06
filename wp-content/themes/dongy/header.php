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
								<li class="facebook"><a href="https://www.facebook.com/Colorlib" title="Travelify on Facebook" target="_blank"></a></li>
								<li class="twitter"><a href="https://twitter.com/Colorlib" title="Travelify on Twitter" target="_blank"></a></li>
								<li class="google-plus"><a href="https://plus.google.com/+Colorlib/" title="Travelify on Google-Plus" target="_blank"></a></li>				
							</ul>
						</div><!-- .social-icons -->					
					</section><!-- .hgroup-right -->
						<hgroup id="site-logo" class="clearfix">
							<h1 id="site-title">
								<a href="/" title="Travelify" rel="home">Travelify</a>
							</h1>
							<h2 id="site-description">Responsive WordPress Travel Theme Demo</h2>							
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
				   <div class="slider-cycle" style="width: 100%; height: 460px;">
				      <div class="slides displayblock" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 5; opacity: 1; width: 100%;">
				         <figure>
				         	<a href="https://colorlib.com/travelify/layout-test/" title="Content Layout Preview">
					         	<img width="1018" src="https://cdn.colorlib.com/travelify/wp-content/uploads/sites/4/2013/05/spain6-1018x460.jpg" 
					         	class="pngfix wp-post-image" alt="Content Layout Preview" title="Content Layout Preview">				         	
					        </a>
				     	</figure>
			         	<article class="featured-text">
				            <div class="featured-title">
				            	<a href="https://colorlib.com/travelify/layout-test/" title="Content Layout Preview">Content Layout Preview</a>
				            </div>
				            <!-- .featured-title -->
				            <div class="featured-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed odio nibh, tincidunt adipiscing, pretium nec, tincidunt id, enim. Fusce scelerisque nunc vitae nisl. Quisque quis urna in velit dictum pellentesque. </div>
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
