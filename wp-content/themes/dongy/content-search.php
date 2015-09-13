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
		
		<div class="entry-content clearfix">
			<p style="text-align: justify" text-align="justify">
			<?php
				if( has_post_thumbnail() ) {
					$image = '';
			 		$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );					
			?>
			<a href="<?php echo get_permalink(); ?>" title="<?php echo the_title( '', '', false ); ?>">
				<img title="<?php echo the_title( '', '', false ); ?>" alt="<?php echo esc_attr( $title_attribute ); ?>" class="wp-post-image" 
             src="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" width="160" style="float: left; margin: 5px 12px 2px 5px;">
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
						$category = has_category() ? get_the_category() : ""; //the_category(', ') will show html
						dongy_posted_on($category); 
					?>
	         		<?php dongy_sharing(get_permalink()); ?>					
			</div><!-- .entry-meta -->
			<?php
			echo '<a class="readmore" href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">'.__( 'Đọc thêm', 'dongy' ).'</a>';
			?>
		</div>

	</article><!-- #article-## -->
</section><!-- #section-## -->
