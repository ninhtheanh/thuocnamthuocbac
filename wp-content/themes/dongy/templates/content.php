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

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		
		<?php
			if( has_post_thumbnail() ) {
				$image = '';
		 		$title_attribute = esc_attr( get_the_title( $post->ID ) );
		 		$image .= '<figure class="post-featured-image">';
				$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
				$image .= get_the_post_thumbnail( $post->ID, 'featured-medium', array( 'title' => $title_attribute, 'alt' => $title_attribute ) ).'</a>';
				$image .= '</figure>';
				echo $image;
			}
		?>

		<div class="entry-content clearfix">
			<?php				
				the_excerpt();				
			?>
			<!-- Post Footer -->
	        <footer class="post-footer-info">
	        	<?php edit_post_link( __( 'Edit', 'dongydinhtuan' ), '<span class="edit-link">', '</span>' ); ?>
	        </footer>
	        <!-- END .post-footer-info -->
		</div><!-- .entry-content -->

		<div class="entry-meta-bar clearfix">
			<div class="entry-meta">
					<?php						
						$category = has_category() ? get_the_category() : ""; //the_category(', ') will show html
						dongy_posted_on($category); 
					?>
	         		<?php dongy_sharing(get_permalink()); ?>	
			</div><!-- .entry-meta -->
			<?php			
			echo '<a class="readmore" href="' . get_permalink() . '" title="'.$title_attribute . '" alt="'.$title_attribute.'">' . __( 'Chi Tiết', 'dongy' ).'</a>';
			?>
		</div>

	</article><!-- #article-## -->
</section><!-- #section-## -->
