<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Dong_Y
 * @since Dong Y 1.0
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
								   <a style="display:none" href="#" target="_blank"><img title="Twitter" alt="Twitter" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/twitter.png"></a>
								   <a href="https://www.facebook.com/dongydinhtuan" target="_blank"><img title="Facebook" alt="Facebook" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/facebook.png"></a>
								   <a style="display:none" href="#" target="_blank"><img title="Google Plus" alt="Google Plus" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/gplus.png"></a>
								   <a style="display:none" href="#" target="_blank"><img title="LinkedIn" alt="LinkedIn" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/linkedin.png"></a>								   
								   <a href="mailto:ninhtheanh@gmail.com" target="_blank"><img title="Email" alt="Email" src="<?php echo get_template_directory_uri(); ?>/images/social-profiles/email.png"></a>
							   </li>
							</ul>
						</div><!-- .social-icons -->					
					</section><!-- .hgroup-right -->
					<hgroup id="site-logo" class="clearfix">
						<div class="logo">
							<a href="<?php echo site_url(); ?>">
								<img title="Đông Y Đình Tuân" alt="Đông Y Đình Tuân" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
							</a>
						</div>						
						<div class="logo-name">
							<a href="<?php echo site_url(); ?>">
								Đông Y Đình Tuân
							</a>
						</div>
					</hgroup><!-- #site-logo -->
				</div><!-- .hgroup-wrap -->
			</div><!-- .container -->
			<div class="main-menu-contaiter">
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
				<a href="#" class="navbutton" id="top-nav-button"><?php _e( 'Main Menu', 'dongy' ); ?></a>
				<div class="responsive-topnav"></div>
				<div class="dongy-search-button-icon"></div>
				<div class="dongy-search-box-container">
					<div class="dongy-search-box">
						<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="dongy-search-form" method="get">
							<input type="text" placeholder="<?php esc_attr_e( 'Nhập từ khóa', 'dongy' ); ?>" value="" name="s" id="s">
							<input type="submit" value="Search">
						</form>
					</div><!-- th-search-box -->
				</div>
			</div>
			<?php
			if( is_home() || is_front_page() ) {
			?>
				<section class="featured-slider">
				   	<div class="slider-cycle" style="width: 100%;">
				   		<div class="slides displayblock" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 5; opacity: 1; width: 100%;">
					        <figure>
					         	<a href="#" title="">
						         	<img width="960" src="<?php echo get_template_directory_uri(); ?>/images/banner/home/banner-tri.jpg" 
						         	class="pngfix wp-post-image" alt="" title="">				         	
						        </a>
					     	</figure>
				      	</div>
				      	<div class="slides displayblock" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 5; opacity: 1; width: 100%;">
					        <figure>
					         	<a href="#" title="">
						         	<img width="960" src="<?php echo get_template_directory_uri(); ?>/images/banner/home/banner-suynhuocthankinh.jpg" 
						         	class="pngfix wp-post-image" alt="" title="">				         	
						        </a>
					     	</figure>
				      	</div>
				      	<div class="slides displayblock" style="position: absolute; top: 0px; left: 0px; display: block; z-index: 5; opacity: 1; width: 100%;">
					        <figure>
					         	<a href="#" title="">
						         	<img width="960" src="<?php echo get_template_directory_uri(); ?>/images/banner/home/banner-banner-suynhuoc.jpg" 
						         	class="pngfix wp-post-image" alt="" title="">				         	
						        </a>
					     	</figure>
					     	<article class="featured-text" style="display:none">
					            <div class="featured-title">
					            	<a href="#" title="Đông Y Đình Tuân">Thuốc Việt Nam</a>
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
	   		elseif( in_category(array('benh-tri', 'suy-nhuoc-co-the', 'suy-nhuoc-than-kinh')) ){	   			
	   			$category = get_the_category();	   			
	   			$cat_link = get_category_link($category[0]->cat_ID);
	   			$arrURLs = array('benh-tri'=>$cat_link, 'suy-nhuoc-co-the'=>get_page_link(1), 'suy-nhuoc-than-kinh'=>get_page_link(79));

	   			$result = array();
	   			$current_page_url = get_current_page_url();
	   			foreach ($arrURLs as $key => $value) {	   				
	   				if(strpos($value, $current_page_url) !== FALSE)
	   				{	   					
	   					$arrURLs[$key] = "#";
	   				}
	   			}	   			
	   		?>
	   			<section class="featured-banner">
	   				<div>
						<a href="<?php echo $arrURLs[$category[0]->slug];?>"><img width="960" src="<?php echo get_template_directory_uri(); ?>/images/banner/banner-<?php echo $category[0]->slug;?>.jpg" title="Banner Thuoc Nam" alt="Banner Thuoc Nam"></a>
	   				</div>
	   			</section>
	   		<?php
	   		}
			else {
				if( ( '' != dongy_header_title() ) || function_exists( 'bcn_display_list' ) ) {
			?>
				<div class="page-title-wrap">
		    		<div class="container clearfix">
		    			<?php
			    		if( function_exists( 'dongy_breadcrumb' ) )
							dongy_breadcrumb();
						?>
					   <h3 class="page-title"><?php echo dongy_header_title(); ?></h3><!-- .page-title -->
					</div>
		    	</div>
		   <?php		   			
				}
			}?>

		</header>
