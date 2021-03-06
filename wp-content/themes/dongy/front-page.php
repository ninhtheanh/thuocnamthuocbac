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
		<div class="ta-row welcome-row" style="display:none">			
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

		            $data_wow_delay = 0;
		            if($i == 2)
		            	$data_wow_delay = 0.2;
		            if($i == 3)
		            	$data_wow_delay = 0.4;
				?>
				<div class="col-3-full dongy-column <?php if($i==3) echo "last";?> wow bounceInDown" <?php echo 'data-wow-delay="' . $data_wow_delay . 's"';?> style="z-index: 100;">
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
						$title_attribute = esc_attr( get_the_title() );				
			?>
			<div class="col-3 page-id-<?php the_ID(); ?> <?php echo $css_last; ?>">				
				<div class="<?php echo $css_circle;?>">
					<a href="<?php echo get_permalink(); ?>" title="<?php echo $title_attribute ?>">
						<?php the_post_thumbnail( 'thumbnail', array( 'alt' => $title_attribute, 'title' => $title_attribute, 'class' => '') ); ?>
					</a>
				</div>
				<h2>
					<a href="<?php echo get_permalink(); ?>" title="<?php echo $title_attribute; ?>">
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
						<p class="title2">Hãy Liên Hệ Với Chúng Tôi!</p>
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
					$title_attribute = esc_attr( $recent["post_title"] );
        			$thumb_url = wp_get_attachment_thumb_url( get_post_thumbnail_id($recent["ID"]) );
        			if($thumb_url == "")
        			{        				
        				$thumb_url = catch_first_image_in_content($recent["post_content"]);
        			}
			?>
			<div class="one_half columns page-id-<?php echo $recent["ID"];?>">
			    <div class="recent-item <?php echo $css_first_col;?>">
			    	<h3 class="recent-title"><a href="<?php echo get_permalink($recent["ID"]);?>" title="<?php echo $title_attribute ;?>"><?php echo $recent["post_title"];?></a></h3>
			        <div class="recent-thumb">
			        	<span class="image_rounded_shadow">
				        	<a href="<?php echo get_permalink($recent["ID"]);?>" title="<?php echo $title_attribute ;?>">
				        		<img width="150" height="150" data-original="<?php echo $thumb_url;?>" class="frame wp-post-image" alt="<?php echo $title_attribute;?>" title="<?php echo $title_attribute ;?>" style="height: 138px">
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
			    <!-- Post Footer -->
	            <footer class="post-footer-info">
	            	<?php edit_post_link( __( 'Edit', 'dongydinhtuan' ), '<span class="edit-link">', '</span>' ); ?>
	            </footer>
	            <!-- END .post-footer-info -->
			</div>
			<?php
					$i++;
				}
			?>
		</div>

		<div class="ta-row ta-row-fb-like-fanpage">
			
			<div class="fb-page" data-href="https://www.facebook.com/dongydinhtuan" data-width="600" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/dongydinhtuan"><a href="https://www.facebook.com/dongydinhtuan">Đông Y Gia Truyền Đình Tuân</a></blockquote></div></div>
		</div>
	
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>