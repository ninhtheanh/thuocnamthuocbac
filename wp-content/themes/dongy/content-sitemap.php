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

		<div class="entry-content clearfix">
			<?php				
		//		the_content();				
			?>

		<div class="widget sitemap">									
			<ul>			
				<li><h3><a href="<?php echo home_url(); ?>">Trang Chủ</a></h3></li>
				<?php		
				$args = array(
					'post_type' => 'page',
					'post_status' => 'publish',
					'posts_per_page' => -1,		
					'orderby' => 'date',	
					'order'=>ASC
				);
				$query = new WP_Query($args);
				while ($query->have_posts()) {
					$query->the_post();
				?>
					<li><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3></li>
				<?php
				}		
				wp_reset_postdata();

				$cats = get_categories();
				foreach ($cats as $cat) {
					echo '<li><h3><a href="' . get_category_link( $cat->term_id ) . '">'.$cat->cat_name.'</a></h3>';
					echo "<ul>";
					$args = array( 'posts_per_page' => 5, 'offset'=> 1, 'category' => $cat->cat_ID );
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); 
						echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
					endforeach; 
					wp_reset_postdata();			
					echo "</ul></li>";
				}
				?>
			</ul>
		</div>

		</div><!-- .entry-content -->

	</article><!-- #article-## -->
</section><!-- #section-## -->

