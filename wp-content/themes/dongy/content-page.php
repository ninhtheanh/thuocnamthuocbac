<?php
/**
 * The template used for displaying page content
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

		<?php
			if( has_post_thumbnail() ) {
				$image = '';
		 		$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
		 		$image .= '<figure class="post-featured-image">';
				$image .= '<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">';
				$image .= get_the_post_thumbnail( $post->ID, 'featured-medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
				$image .= '</figure>';
				//echo $image;
			}
		?>

		<div class="entry-content clearfix">
			<?php				
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

