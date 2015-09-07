<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage dongy
 * @since dongy 1.0
 */
get_header(); ?>

<div id="main" class="container clearfix">
	<div id="container">
		<div class="ta-row">
			<div class="ta-row-inner clearfix">						
				<div class="col-3-full">
					<div class="featured_block-1">							
						<div class="featured_block_text">							
							<h3>
								<a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/" title="Trĩ Hỗn Hợp">
									Trĩ Hỗn Hợp								</a>
							</h3>
							<p>
								Bệnh trĩ hỗn hợp là một trong những bệnh lý ở vùng hậu môn, có thể xuất hiện ở cả nam và nữ....							</p>
							<div><a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/">Chi tiết</a></div>
						</div>
					</div>
				</div>
				<div class="col-3-full">
					<div class="featured_block-2">							
						<div class="featured_block_text">							
							<h3>
								<a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/" title="Trĩ Hỗn Hợp">
									Trĩ Hỗn Hợp								</a>
							</h3>
							<p>
								Bệnh trĩ hỗn hợp là một trong những bệnh lý ở vùng hậu môn, có thể xuất hiện ở cả nam và nữ....							</p>
							<div><a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/">Chi tiết</a></div>
						</div>
					</div>
				</div>
				<div class="col-3-full last">
					<div class="featured_block-3">							
						<div class="featured_block_text">							
							<h3>
								<a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/" title="Trĩ Hỗn Hợp">
									Trĩ Hỗn Hợp								</a>
							</h3>
							<p>
								Bệnh trĩ hỗn hợp là một trong những bệnh lý ở vùng hậu môn, có thể xuất hiện ở cả nam và nữ....							</p>
							<div><a href="http://localhost:8080/Wordpress/thuocnamthuocbac/tri-hon-hop/">Chi tiết</a></div>
						</div>
					</div>
				</div>						
			</div><!-- .entry-content -->
		</div>

		<div class="ta-row" style="display:block">
			<header class="entry-header">							
				<div class="heading_title">		 
					<h3>Bệnh Trĩ</h3>		
				</div>
			</header><!-- .entry-header -->
			<?php
				$myarray = array('9', '11', '13');
				$args = array(
				   'post_type' => 'post',
				   'post__in'      => $myarray
				);
				// The Query
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) {
					$i = 0;					
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						$css_last = "";
						if($i == $the_query->post_count - 1)
							$css_last = "last";
			?>
			<div class="col-3 <?php echo $css_last; ?>">
				<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
					<div class="circular" style="background: url(http://localhost:8080/Wordpress/thuocnamthuocbac/wp-content/uploads/2015/09/tri1.jpg) center no-repeat;">
						<img width="160" align="center" src="http://localhost:8080/Wordpress/thuocnamthuocbac/wp-content/uploads/2015/09/tri1.jpg" border="0" title="<?php echo the_title( '', '', false ); ?>">
					</div>
				</a>
				<h2>
					<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
						<?php echo get_the_title()?>
					</a>
				</h2>
				<p>
					<?php echo excerpt(24); ?>
				</p>
				<p><a href="<?php echo get_permalink(); ?>">Chi tiết</a></p>
			</div>
			<?php			
						$i++;
					}
				} else {
					// no posts found
				}
			?>	
		</div>

		<div class="ta-row">
			<div class="featured_block">
				<div class="featured_block_inner">
					<div class="featured_block_text">
						<p><span style="font-family: Satisfy; font-size: 32px; color: #fff774;">Nếu Bạn Có Bất Kỳ Câu Hỏi Nào?</span></p>
						<p><span style="font-family: lato; font-size: 52px; line-height: 36px; font-weight: 900; color: #ffffff;">Hảy Liên Hệ Với Chúng Tôi!</span></p>
						<p><a style="font-family: lato; font-size: 20px; font-weight: 300; color: #ffffff;" href="<?php echo get_page_link(34); ?>">Liên Hệ Với Thầy Thuốc</a></p>
					</div>
				</div>
			</div>
		</div>

	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>
