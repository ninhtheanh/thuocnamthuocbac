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
<html lang="vi" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#" class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />	
	<meta name='yandex-verification' content='513dc5c377fa41be' />
	<meta name="alexaVerifyID" content="UphTEFbQEJiblt4raVP28h60nOc"/>
	<meta name="msvalidate.01" content="E9AF1BE6958FDCB438B5AB2B96198BF8" />
	<meta name="google-site-verification" content="eghVEPjMSNDJYEre07eZRY_-htVcCSvAT6rawxtXiwI" />
	<?php
		global $wp;
		$current_url = home_url(add_query_arg(array(),$wp->request)); 
	?>
	<link rel="alternate" href="<?php echo $current_url;?>" hreflang="vi-vn" />
	<meta property="article:author" content="https://www.facebook.com/dongydinhtuan" />
  	<meta property="article:publisher" content="https://www.facebook.com/dongydinhtuan" />
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
								<img title="Đông Y Gia Truyền Đình Tuân" alt="Đông Y Gia Truyền Đình Tuân" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
							</a>
						</div>						
						<div class="logo-name">
							<a href="<?php echo site_url(); ?>">
								Đông Y Gia Truyền Đình Tuân
							</a>
						</div>
					</hgroup><!-- #site-logo -->					
					<div class="top-welcome-col">
						<div class="wow fadeInDown">Liên Hệ</div>
						<div class="wow fadeInLeft" data-wow-delay="1s"><img width="88" align="center" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right88-55.png" border="0"></div>
						<div class="wow fadeInUp" data-wow-delay="2s">Dùng Thuốc</div>
						<div class="wow fadeInLeft" data-wow-delay="3s"><img width="88" align="center" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right88-55.png" border="0"></div>
						<div class="wow fadeInDown" data-wow-delay="4s">Hết Bệnh!</div>				
					</div>
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
				echo do_shortcode ('[metaslider id=219]');
			}
			elseif( in_category(array('benh-tri')) ){
				echo do_shortcode ('[metaslider id=226]');	
			}
			elseif( in_category(array('suy-nhuoc-co-the')) ){
				echo do_shortcode ('[metaslider id=226]');	
			}
			elseif( in_category(array('suy-nhuoc-than-kinh')) ){
				echo do_shortcode ('[metaslider id=226]');	
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
