<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage dongy
 * @since dongy 1.0
 */
get_header(); ?>

<div id="main" class="container clearfix">
	<div id="container">
		<div id="primary" class="no-margin-left">
			<div id="content">
			
			<?php if ( have_posts() ) : ?>

				<?php if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php endif; ?>
				
				<?php
					// Start the loop.
					while ( have_posts() ) : the_post();
						get_template_part( 'templates/content', 'search' ); 
					// End the loop.
					endwhile;
				?>

				<?php // Previous/next page navigation.
					if ( $wp_query->max_num_pages > 1 ) : ?>
				        <?php 
				        if(function_exists('wp_pagenavi')) {
				            wp_pagenavi();}
				        else {?>
				            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">←</span> Older posts', 'dongy' ) ); ?></div>
				            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">→</span>', 'dongy' ) ); ?></div>
				        <?php } ?>
				<?php endif; ?>

				<?php	

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'templates/content', 'none' );

				endif;
				?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_sidebar( 'content' ); ?>
	</div><!-- #container -->
</div><!-- #main-content -->

<?php get_footer(); ?>
