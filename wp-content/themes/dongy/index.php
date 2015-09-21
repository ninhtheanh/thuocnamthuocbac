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
		<div class="ta-row welcome-row">			
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
					$arr_benhtri_ids = array(9, 11, 13);
					$rand_benhtri_id =  $arr_benhtri_ids[array_rand($arr_benhtri_ids, 1)];
					$args = array(
		                    'post_type' => 'post',
		                    'post__in' => array(1, 79, $rand_benhtri_id) );
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

		<div class="ta-row">
			<header class="entry-header">							
				<div class="heading_title">		 
					<h3><?php _e("Bệnh Trĩ", "dongy")?></h3>		
				</div>
				<br>
			</header><!-- .entry-header -->
			<?php
				$css_circle = rand(0, 1) ? 'circle' : 'item-thumbnail';

				$args = array(
				   'post_type' => 'post',
				   'post__in'      => array(9, 11, 13)
				);								
				// The Query				
	            $posts = get_posts($args);				
				if ( count($posts) > 0 ) {									
					$i = 0;	
					foreach ( $posts as $post ) : setup_postdata( $posts );						
						$css_last = ($i == count($posts) - 1) ? "last" : "";						
			?>
			<div class="col-3 <?php the_ID(); ?> <?php echo $i; ?>  <?php echo $css_last; ?>">				
				<div class="<?php echo $css_circle;?>">
					<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
						<?php the_post_thumbnail( 'thumbnail', array( 'class' => '' ) ); ?>
					</a>
				</div>
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
					endforeach;
				} else {
					// no posts found
				}
			?>	
		</div>

		<div class="ta-row">
			<div class="featured_block">
				<div class="featured_block_inner">
					<div class="featured_block_text">
						<p class="title1">Nếu Bạn Có Bất Kỳ Câu Hỏi Nào?</p>
						<p class="title2">Hảy Liên Hệ Với Chúng Tôi!</p>
						<p class="title3"><a href="<?php echo get_page_link(34); ?>">Liên Hệ Với Thầy Thuốc</a></p>
					</div>
				</div>
			</div>
		</div>

		<div class="ta-row home-recent">
			<header class="entry-header">							
				<div class="heading_title">		 
					<h3><?php _e("Bài mới nhất", "dongy")?></h3>		
				</div>
				<br>
			</header><!-- .entry-header -->
			<?php
				$args = array( 'numberposts' => '6' );
				$recent_posts = wp_get_recent_posts( $args );
				$i = 0;
				foreach( $recent_posts as $recent ){
					//print_r( $recent ); return;
					$css_first_col = ($i%2 == 0 ? "first-col" : "");					
        			$thumb_url = wp_get_attachment_thumb_url( get_post_thumbnail_id($recent["ID"]) );
        			if($thumb_url == "")
        			{        				
        				$thumb_url = catch_first_image_in_content($recent["post_content"]);
        			}
			?>
			<div class="one_half columns">
			    <div class="recent-item <?php echo $css_first_col;?>">
			    	<h3 class="recent-title"><a href="<?php echo get_permalink($recent["ID"]);?>"><?php echo $recent["post_title"];?></a></h3>
			        <div class="recent-thumb">
			        	<span class="image_rounded_shadow">
				        	<a href="<?php echo get_permalink($recent["ID"]);?>">
				        		<img width="150" src="<?php echo $thumb_url;?>" class="frame wp-post-image" alt="<?php echo $recent["post_title"];?>">
				        	</a>
				        </span>
			        </div>			        
			        <span class="smalldate"><?php echo date( 'd/m/Y H:i:s', strtotime( $recent['post_date'] ) );?></span>
			        <div class="sep"></div>
			        <div class="ellipsis-circular-home-rp">
				        <div class="recent-text">
				        	<?php echo $recent["post_excerpt"];?>
				        </div>
			        </div>			        
			    </div>
			</div>
			<?php
					$i++;
				}
			?>			

		</div>
	
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>