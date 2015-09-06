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
		<div id="primary" class="no-margin-left">
			<div id="content">
			
			<section id="post-2" class="post-2 page type-page status-publish hentry">
				<article>
					
					<div class="entry-content clearfix">
						<header class="entry-header">							
							<div class="hc_heading_title">		 
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
								while ( $the_query->have_posts() ) {
									$the_query->the_post();								
						?>
						<div class="col-3">
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
								}
							} else {
								// no posts found
							}
						?>						
						
					</div><!-- .entry-content -->

				</article><!-- #article-## -->
			</section>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_sidebar( 'content' ); ?>
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>
