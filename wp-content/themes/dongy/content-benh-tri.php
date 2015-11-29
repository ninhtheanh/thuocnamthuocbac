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
				the_title( '<h2 class="entry-title">', '</h2>' );
			?>
		</header><!-- .entry-header -->

		<div class="entry-meta-bar clearfix">
			<div class="entry-meta">
	         		<?php						
						$category = has_category() ? get_the_category() : ""; //the_category(', ') will show html
						dongy_posted_on($category); 
					?>
	         		<?php dongy_sharing(get_permalink(), "social-right"); ?>					
			</div><!-- .entry-meta -->			
		</div>

		<?php
			if( has_post_thumbnail() ) {
				$image = '';
		 		$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
		 		$image .= '<figure class="post-featured-image">';					
					$image .= get_the_post_thumbnail( $post->ID, 'featured-medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) );
					$image .= '</figure>';

					//echo $image;
			}
		?>

		<div class="entry-content clearfix">
			<?php
				/* translators: %s: Name of current post */
				the_content();				
			?>
			<!-- Post Footer -->
	        <footer class="post-footer-info">
	        	<?php edit_post_link( __( 'Edit', 'dongydinhtuan' ), '<span class="edit-link">', '</span>' ); ?>
	        </footer>
	        <!-- END .post-footer-info -->
		</div><!-- .entry-content -->

	</article><!-- #article-## -->
</section><!-- #section-## -->
