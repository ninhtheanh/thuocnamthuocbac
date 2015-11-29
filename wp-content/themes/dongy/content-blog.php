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
			<?php
				/* translators: %s: Name of current post */
				the_excerpt();				
			?>
		</div><!-- .entry-content -->
		<!-- Post Footer -->
        <footer class="post-footer-info">
        	<?php edit_post_link( __( 'Edit', 'dongydinhtuan' ), '<span class="edit-link">', '</span>' ); ?>
        </footer>
        <!-- END .post-footer-info -->
		

		<div class="entry-meta-bar clearfix">
			<div class="entry-meta">
					<?php dongy_posted_on(); ?>
					<?php if( has_category() ) { ?>
	         		<span class="category"><?php the_category(', '); ?></span>
	         	<?php } ?>
					<?php if ( comments_open() ) { ?>
	         		<span class="comments"><?php comments_popup_link( __( 'No Comments', 'dongy' ), __( '1 Comment', 'dongy' ), __( '% Comments', 'dongy' ), '', __( 'Comments Off', 'dongy' ) ); ?></span>
	         	<?php } ?>
			</div><!-- .entry-meta -->
			<?php			
				echo '<a class="readmore" href="' . get_permalink() . '" title="'.$title_attribute . '" alt="'.$title_attribute.'">' . __( 'Chi Tiết', 'dongy' ).'</a>';
			?>
		</div>


	</article><!-- #article-## -->
</section><!-- #section-## -->
