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
			<div class="welcome-inner">
				<div class="welcome-col">
					<div class="welcome-text">Liên Hệ</div>
					<div class="welcome-text"><img width="88" align="center" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right88-55.png" border="0"></div>
					<div class="welcome-text">Dùng Thuốc</div>
					<div class="welcome-text"><img width="88" align="center" src="<?php echo get_template_directory_uri(); ?>/images/arrow-right88-55.png" border="0"></div>
					<div class="welcome-text">Hết Bệnh!</div>				
				</div>
				<div class="welcome-button">					
					<a class="button" href="<?php echo get_page_link(34); ?>"><?php _e('Liên Hệ', "dongy"); ?></a>
				</div>
			</div>			
		</div>
		
		<div class="ta-row">
			<div class="ta-row-inner clearfix">
				<?php
					$args = array(
		                    'post_type' => 'post',
		                    'post__in' => array(1, 79, 9) );
		            $posts = get_posts($args);
		            $i = 0;
		            foreach ( $posts as $post ) : setup_postdata( $posts );
		            $i++;
				?>
				<div class="col-3-full dongy-column <?php if($i==3) echo "last";?>">
					<div class="featured_block-<?php echo $i;?>">							
						<div class="featured_block_text">							
							<h3>
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
						    <div class="ellipsis-block">
							    <div class="text">
							        <?php echo excerpt(45); ?>
							    </div>
							</div>
							<div><a href="<?php the_permalink(); ?>">Chi tiết</a></div>
						</div>
					</div>
				</div>
				<?php 
					endforeach; 
					wp_reset_postdata();
				?>					
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
					<div class="circular" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>) center no-repeat;">
						<img width="160" align="center" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" border="0" title="<?php echo the_title( '', '', false ); ?>">
					</div>
				</a>
				<h2>
					<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
						<?php echo get_the_title()?>
					</a>
				</h2>				
				<div class="ellipsis-circular">
				    <div class="text">
				        <?php echo excerpt(45); ?>
				    </div>
				</div>
				<br>
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

		<section id="post-134" class="post-134 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-new-work category-other-destinations">
			<article>
			<div class="medium-wrap">
							<header class="entry-header">
	    			<h2 class="entry-title">
	    				<a href="https://colorlib.com/travelify/this-post-has-no-body/" title="This post has no body – almost">This post has no body – almost</a>
	    			</h2><!-- .entry-title -->
	  			</header>

	  			
	  			
				<figure class="post-featured-image"><a href="https://colorlib.com/travelify/this-post-has-no-body/" title="This post has no body – almost"><img width="230" height="230" src="https://cdn3.colorlib.com/travelify/wp-content/uploads/sites/4/2013/05/Spain-Plaza-de-Cibeles-Madrid-230x230.jpg" class="attachment-featured-medium wp-post-image" alt="This post has no body – almost" title="This post has no body – almost"></a></figure>
	    		<p>Cras leo tortor, condimentum id semper eu, sodales id elit. Maecenas commodo dolor vel massa gravida vehicula. Morbi tristique sapien ac dui tempus imperdiet.</p>


	  			
	  					</div>
	  			<div class="entry-meta-bar clearfix">
	    			<div class="entry-meta">
		    				<span class="byline"> <span class="author vcard"><a class="url fn n" href="https://colorlib.com/travelify/author/aigars-silkalns/">Aigars</a></span></span><span class="posted-on"><a href="https://colorlib.com/travelify/this-post-has-no-body/" rel="bookmark"><time class="entry-date published" datetime="2014-03-05T09:39:56+00:00">5 March, 2014</time><time class="updated" datetime="2014-11-21T09:04:21+00:00">21 November, 2014</time></a></span>	    					             		<span class="category"><a href="https://colorlib.com/travelify/category/new-work/" rel="category tag">New York</a>, <a href="https://colorlib.com/travelify/category/other-destinations/" rel="category tag">Other Destinations</a></span>
		             		    				    			</div><!-- .entry-meta -->
	    			<a class="readmore" href="https://colorlib.com/travelify/this-post-has-no-body/" title="This post has no body – almost">Read more</a>    		</div>

	    				</article>
		</section>
		
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>