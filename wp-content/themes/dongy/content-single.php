<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
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
					<?php dongy_posted_on(); ?>
					<?php if( has_category() ) { ?>
	         		<span class="category"><?php the_category(', '); ?></span>
	         	<?php } ?>
					<?php if ( comments_open() ) { ?>
	         		<span class="comments"><?php comments_popup_link( __( 'No Comments', 'travelify' ), __( '1 Comment', 'travelify' ), __( '% Comments', 'travelify' ), '', __( 'Comments Off', 'travelify' ) ); ?></span>
	         	<?php } ?>
			</div><!-- .entry-meta -->			
		</div>

		<?php
			if( has_post_thumbnail() ) {
				$image = '';
		 		$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
		 		$image .= '<figure class="post-featured-image">';					
					$image .= get_the_post_thumbnail( $post->ID, 'featured-medium', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) );
					$image .= '</figure>';

					echo $image;
			}
		?>

		<div class="entry-content clearfix">
			<?php
				/* translators: %s: Name of current post */
				the_content();				
			?>
		</div><!-- .entry-content -->

	</article><!-- #article-## -->
</section><!-- #section-## -->
