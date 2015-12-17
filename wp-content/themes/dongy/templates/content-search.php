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

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
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
			<p style="text-align: justify" text-align="justify">
			<?php
				if( has_post_thumbnail() ) {
					$title_attribute = esc_attr( get_the_title( $post->ID ) );
					$image = '';
			 		$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );					
			?>
			<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" width="150"  class="wp-post-image" style="float: left; margin: 5px 12px 2px 5px;" title="<?php echo $title_attribute; ?>" alt="<?php echo $title_attribute; ?>">
             </a>
			<?php		
				}
			?>
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
	         		<?php dongy_sharing(get_permalink()); ?>					
			</div><!-- .entry-meta -->
			<?php
				echo '<a class="readmore" href="' . get_permalink() . '" title="'.$title_attribute . '" alt="'.$title_attribute.'">' . __( 'Chi Tiết', 'dongy' ).'</a>';
			?>
		</div>

	</article><!-- #article-## -->
</section><!-- #section-## -->
