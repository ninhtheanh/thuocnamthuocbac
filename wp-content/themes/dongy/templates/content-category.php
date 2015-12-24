<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Dong_Y
 * @since Dong Y 1.0
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class( is_sticky() ? "sticky" : null ); ?>>
	<article>
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
		</header><!-- .entry-header -->
		
		<div class="entry-content clearfix">
			<div class="article-text">
			<?php
				$thumb_url = '';
		 		$title_attribute = esc_attr( get_the_title( $post->ID ) );
		 		$thumb_url = wp_get_attachment_thumb_url( get_post_thumbnail_id($post->ID) );
    			if($thumb_url == ""){        				
    				$thumb_url = catch_first_image_in_content(get_the_content( $post->ID ));

    			}	
    			//echo "thumb_url:" . $thumb_url;
    			if($thumb_url != ""){			
			?>
					<div class="item-image intro img-intro-left">
						<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
							<img data-original="<?php echo $thumb_url; ?>" width="150px" height="150px" class=""style="display: inline; height: 150px" title="<?php echo $title_attribute; ?>" alt="<?php echo $title_attribute;?>">
			            </a>
		            </div>
			<?php		
				}
			?>
				

			<p style="text-align: justify" text-align="justify">			
			<?php
				echo get_the_excerpt();				
			?>
			</p>

		</div><!-- .entry-content -->

		<div class="entry-meta-bar clearfix">
			<div class="entry-meta">
					<?php						
						$category = has_category() ? get_the_category() : "";
						dongy_posted_on($category); 
					?>
	         		<?php dongy_sharing(get_permalink(), "social-left"); ?>					
			</div><!-- .entry-meta -->
			<?php
			echo '<a class="readmore" href="' . get_permalink() . '" title="'.$title_attribute . '" alt="'.$title_attribute.'">' . __( 'Chi Tiết', 'dongy' ).'</a>';
			?>
			<!-- Post Footer -->
            <footer class="post-footer-info">
            	<?php edit_post_link( __( 'Edit', 'dongydinhtuan' ), '<span class="edit-link">', '</span>' ); ?>
            </footer>
            <!-- END .post-footer-info -->
		</div>

	</article><!-- #article-## -->
</section><!-- #section-## -->
