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
		 		$title_attribute = esc_attr( get_the_title( $post->ID ) );
		 		$image .= '<figure class="post-featured-image">';					
					$image .= get_the_post_thumbnail( $post->ID, 'featured-medium', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );
					$image .= '</figure>';
			}
		?>

		<div class="entry-content clearfix">
			<?php				
				the_content();				
			?>
		</div><!-- .entry-content -->

	</article><!-- #article-## -->
</section><!-- #section-## -->
